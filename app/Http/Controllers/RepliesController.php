<?php

namespace App\Http\Controllers;

use App\Events\TicketReplyCreated;
use App\Reply;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Services\Ticketing\ReplyRepository;
use App\Services\Ticketing\TicketRepository;
use App\Events\TicketUpdated;
use Common\Core\BaseController;
use Str;

class RepliesController extends BaseController
{

    /**
     * @var Request
     */
    private $request;

    /**
     * Reply model.
     *
     * @var Reply
     */
    private $reply;

    /**
     * @var ReplyRepository
     */
    private $repository;

    /**
     * @var TicketRepository
     */
    private $ticketRepository;

    /**
     * @param Request $request
     * @param ReplyRepository $repository
     * @param TicketRepository $ticketRepository
     */
    public function __construct(Request $request, Reply $reply, ReplyRepository $repository, TicketRepository $ticketRepository)
    {
        $this->request    = $request;
        $this->reply  = $reply;
        $this->repository = $repository;
        $this->ticketRepository = $ticketRepository;
    }

    /**
     * Show specified reply.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $reply = $this->repository->findOrFail($id);

        $this->authorize('show', $reply);

        $reply->load('user', 'uploads', 'ticket');

        return $this->success(['reply' => $reply]);
    }

    /**
     * Store reply.
     * 
     * @return mixed
     */
    public function store()
    {
        // $this->authorize('store',  Reply::class);

        $this->validate($this->request, [
            'user_id'       => 'integer|exists:users,id',
            'body'         => 'required',
            'ticket_id'     => 'required|integer|exists:tickets,id',
        ]);

        $data = $this->request->all();

        $ticket = \App\Ticket::find($this->request->post('ticket_id'));

        $reply = $this->reply->create([
            'body'      => isset($data['body']) ? $data['body'] : '',
            'user_id'   => isset($data['user_id']) ? $data['user_id'] : auth()->user()->id,
            'ticket_id' => $ticket->id,
            'type'      => 'replies',
            'uuid'      => Str::random(30),
        ]);

        event(new TicketReplyCreated($ticket, $reply));

        return response($reply, 201);
    }

    /**
     * Update specified reply.
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function update($id)
    {
        $reply = $this->repository->findOrFail($id);

        $this->authorize('update', $reply);

        $this->validate($this->request, [
            'body'      => 'string|min:1',
            'uploads'   => 'array|max:5|exists:file_entries,id',
        ]);

        $reply = $this->repository->update($this->request->all(), $reply);

        if ($reply->type !== Reply::DRAFT_TYPE) {
            $ticket = $this->ticketRepository->find($reply->ticket_id);
            event(new TicketUpdated($ticket, $ticket));
        }

        return $this->success(['data' => $reply]);
    }

    /**
     * Delete specified reply of any type.
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $reply = $this->repository->findOrFail($id);

        $this->authorize('destroy', $reply);

        $ticket = $this->ticketRepository->find($reply->ticket_id);

        $this->repository->delete($reply);

        event(new TicketUpdated($ticket));

        return $this->success(null, 204);
    }
}
