<?php

namespace App\Http\Controllers;

use App\Category;
use App\Ticket;
use App\User;
use App\Services\Mail\IncomingMailHandler;
use Cache;
use Carbon\Carbon;
use Common\Core\BaseController;
use Common\Settings\Settings;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DemoController extends BaseController
{
    const HC_HOME_CACHE_KEY = 'hc.home';

    /**
     * @var Category $category
     */
    private $category;

    /**
     * @var Settings
     */
    private $settings;

    /**
     * @var Request
     */
    private $request;

    /**
     * @param Category $category
     * @param Settings $settings
     * @param Request $request
     */
    public function __construct(Category $category, Settings $settings, Request $request)
    {
        $this->category = $category;
        $this->settings = $settings;
        $this->request = $request;
    }

    /**
     * Return all help center categories, child categories and articles.
     *
     * @return JsonResponse
     */
    public function index()
    {
        // $this->authorize('index2', Category::class);

        $data = $this->getHelpCenterData();

        return view('help-center.demo.pages.index', $data);
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('demo.home');
        }

        return view('help-center.demo.pages.sign');
    }

    public function login_post(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return ['msg' => 'success'];
        }

        return ['msg' => 'fail'];
    }

    public function register()
    {
        return view('help-center.demo.pages.register');
    }

    public function password_reset()
    {
        return view('help-center.demo.pages.reset-pass');
    }

    public function dashboard()
    {
        $tickets = Ticket::where('user_id', auth()->user()->id)->get();
        $data['tickets'] = $tickets;

        return view('help-center.demo.pages.dashboard', $data);
    }

    public function new_complain()
    {
        return view('help-center.demo.pages.new');
    }

    public function dashboard_list()
    {
        $tickets = Ticket::where('user_id', auth()->user()->id)->get();
        $data['tickets'] = $tickets;

        return view('help-center.demo.pages.list', $data);
    }

    public function complain_details($id)
    {
        $ticket = Ticket::find($id);
        $data['ticket'] = $ticket;

        return view('help-center.demo.pages.details', $data);
    }

    private function getHelpCenterData()
    {
        return Cache::remember(self::HC_HOME_CACHE_KEY, Carbon::now()->addDays(2), function () {

            $loadArticles = ['articles' => function (BelongsToMany $query) {
                $query->select('id', 'title', 'position', 'slug');
            }];

            //load categories with children and articles
            $categories = $this->category
                ->rootOnly()
                ->where('hidden', false)
                ->orderByPosition()
                ->limit(10)
                ->withCount('children')
                ->with($loadArticles)
                ->with(['children' => function (HasMany $query) use ($loadArticles) {
                    $query->where('hidden', false)->withCount('articles')->with($loadArticles);
                }])->get();

            $categoryLimit = $this->settings->get('hc_home.children_per_category', 6);
            $articleLimit = $this->settings->get('hc_home.articles_per_category', 5);

            return $categories->each(function (Category $category) use ($categoryLimit, $articleLimit) {
                // limit child category and child category article count
                $category->setRelation('children', $category->children->take($categoryLimit));
                $category->children->each(function (Category $child) use ($articleLimit) {
                    $child->setRelation('articles', $child->articles->take($articleLimit));
                });

                // chunk parent category articles into "virtual" child categories
                if ($category->children->isEmpty()) {
                    $category->chunked_articles = $category->articles->values()->chunk($articleLimit)->map->values()->take($categoryLimit);
                }
                $category->unsetRelation('articles');
            });
        });
    }
}
