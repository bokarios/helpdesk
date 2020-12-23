@extends('help-center.demo.main')

@section('title')
    Ticket details
@endsection

@include('help-center.demo.partials._loader')

@section('content')
    
    <!--user nav-->
    @include('help-center.demo.partials._user_nav')

    <!--dashboard-->
    <div class="dashboard-wrapper text-righted">
        @include('help-center.demo.partials._sidebar')

        <script src="{{ asset('demo/js/jquery.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            function message() {
                let body = $('#msg').val();
                const url = '{{route('reply.store')}}';
                const ticket_id = $('#tic').val();
                const user_id = '{{Auth::user()->id}}';
                const _token = '{{csrf_token()}}';
                const method = 'POST';
                const async = false;
                
                if(body !== '') {
                    $('#preloader').show();
                    let res = $.ajax({
                        url,
                        method,
                        data: {body, ticket_id, _token},
                        async
                    }).responseJSON;

                    if(res.id) {
                        // close loader
                        $('#preloader').fadeOut(1000);

                        Swal.fire({
                            text: 'تمت نشر تعليقك',
                            icon: 'success',
                            toast: true,
                            position: 'top',
                            showConfirmButton: false,
                            timer: 5000
                        });

                        $('#msg').val('');

                        // let fresh = null;
                        // fresh = JSON.parse(`{!! json_encode(\App\Reply::where('ticket_id', $ticket->id)->get()->toArray()) !!}`);
                        
                        // let content = '';

                        // fresh.map(reply => {
                        //     if(reply.user_id == Number(user_id)) {
                        //         console.log('excuted1')
                        //         content += `
                        //             <div class="holder">
                        //                 <div class="profile">
                        //                     <img src="{{ asset(Auth::user()->avatar) }}" alt="">
                        //                 </div>

                        //                 <div class="det">
                        //                     <p>${reply.body}</p>
                        //                 </div>
                        //             </div>
                        //         `;
                        //     } else {
                        //         console.log('excuted2')
                        //         content += `
                        //             <div class="holder holder-left">
                        //                 <div class="profile">
                        //                     <img src="{{asset(\App\User::find(1)->avatar)}}" alt="">
                        //                 </div>

                        //                 <div class="det">
                        //                     <p>${reply.body}</p>
                        //                 </div>
                        //             </div>
                        //         `;
                        //     }
                        // });
                        // $('#comments').html('').append(content);

                        setTimeout(() => {
                            document.location.href = '{{url()->current()}}';
                        }, 3000);
                    } else {
                        console.log(res)
                    }
                } else {
                    Swal.fire({
                        text: 'فضلا اكتب تعليق اولا',
                        icon: 'warning',
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 4000,
                    });
                }
            };
        </script>

        <!--content-->
        <div class="content">
            <button class="sidebar-toggle" id="sidebar-toggler">
                <i class="far fa-bars"></i>
            </button>

            <div class="parent">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="child">
                            <h6>
                                {{ Str::title($ticket->subject) }}

                                @if ($ticket->project !== 'لا يوجد')
                                    <span>
                                        ({{ Str::title($ticket->project) }})
                                    </span>
                                @endif
                            </h6>

                            <div class="the-details">
                                <div class="holder">
                                    <div class="profile">
                                        <img src="{{ asset(Auth::user()->avatar) }}" alt="">
                                    </div>

                                    <div class="det">
                                        <p>
                                            {{ $ticket->details }}
                                        </p>

                                        {{-- <div class="attached">
                                            <a href="#">
                                                <i class="far fa-paperclip"></i>
                                                ملف مرفق</a>
                                        </div> --}}

                                        @if ($ticket->url !== 'لا يوجد')
                                            <div class="link">
                                                <span>
                                                    رابط المشروع
                                                </span>
                                                <a href="{{$ticket->url}}" target="_blank">{{$ticket->url}}</a>
                                            </div>
                                        @endif
                                    </div>

                                </div>
                                <hr>

                                <div id="comments">
                                @foreach ($ticket->replies->sortBy('created_at') as $reply)
                                    @if (Auth::user()->id == $reply->user_id)
                                        <div class="holder d-flex">
                                            <div class="profile">
                                                <img src="{{ asset(Auth::user()->avatar) }}" alt="">
                                            </div>

                                            <div class="d-flex flex-column align-items-start">
                                                <div class="det">
                                                    <h6>{{$reply->user->first_name??''}}{{' '}}{{$reply->user->last_name??''}}</h6>
                                                </div>
                                                
                                                <div class="det">
                                                    <p class="pb-0">{{ $reply->body }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="holder holder-left d-flex">
                                            <div class="profile">
                                                <img src="{{ asset($reply->user->avatar) }}" alt="">
                                            </div>
                                            
                                            <div class="d-flex flex-column align-items-end">
                                                <div class="det">
                                                    <h6>{{$reply->user->first_name??''}}{{' '}}{{$reply->user->last_name??''}}</h6>
                                                </div>
                                                
                                                <div class="det">
                                                    <p class="pb-0">{{ $reply->body }}</p>
                                                </div>
                                            </div>
                                        </div>    
                                    @endif
                                @endforeach
                                </div>
                                <!--input new msg-->
                                <!--insert new msg - file-->
                                <hr>
                                <div class="insert">
                                    <form>
                                        <input type="hidden" id="tic" value="{{$ticket->id}}">
                                        <div class="inputs">
                                            <!--text msg-->
                                            <input type="text" name="" placeholder="اكتب رسالتك هنا..." id="msg">

                                            <div class="files">
                                                <!--file msg-->
                                                <input type="file" id="theFile">
                                                <label for="theFile">
                                                    <i class="far fa-paperclip"></i>
                                                </label>

                                                <!--file msg-->
                                                <input type="file" id="theImage" accept="img/*">
                                                <label for="theImage">
                                                    <i class="far fa-camera"></i>
                                                </label>
                                            </div>
                                        </div>
                                    </form>
                                    <button id="message" onclick="message()" type="button">
                                        <i class="far fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!---->


                    <!---->

                </div>

            </div>
        </div>
    </div>

@endsection