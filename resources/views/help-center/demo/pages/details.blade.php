@extends('help-center.demo.main')

@section('title')
    Complaince details
@endsection

@section('content')
    
    <!--user nav-->
    @include('help-center.demo.partials._user_nav')

    <!--dashboard-->
    <div class="dashboard-wrapper text-righted">
        @include('help-center.demo.partials._sidebar')

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
                                {{ $ticket->subject }}

                                <span>
                                    (
                                    اسم المشروع المقدم فيه الشكوى
                                    )
                                </span>
                            </h6>

                            <div class="the-details">
                                <div class="holder">
                                    <div class="profile">
                                        <img src="{{ asset('demo/img/avatar/hero.jpg') }}" alt="">
                                    </div>

                                    <div class="det">
                                        <p>
                                            {{ $ticket->replies[0]['body'] }}
                                        </p>

                                        <div class="attached">
                                            <a href="#">
                                                <i class="far fa-paperclip"></i>
                                                ملف مرفق</a>
                                        </div>

                                        <div class="link">
                                            <span>
                                                رابط المشروع
                                            </span>
                                            <a href="#">shgf.com/develop/projectname</a>
                                        </div>
                                    </div>

                                </div>
                                <hr>

                                <div class="holder holder-left">
                                    <div class="profile">
                                        <img src="{{ asset('demo/img/avatar/1.jpg') }}" alt="">
                                    </div>

                                    <p>
                                        اتبع الخطوات الصحيحه لاضافه الشكوي
                                        اتبع الخطوات الصحيحه لاضافه الشكوي
                                        اتبع الخطوات الصحيحه لاضافه الشكوي

                                    </p>
                                </div>

                                <div class="holder">
                                    <div class="profile">
                                        <img src="{{ asset('demo/img/avatar/hero.jpg') }}" alt="">
                                    </div>

                                    <div class="det">
                                        <p>
                                            اتبع الخطوات الصحيحه لاضافه الشكوي
                                            اتبع الخطوات الصحيحه لاضافه الشكوي

                                        </p>
                                    </div>

                                </div>

                                <div class="holder holder-left">
                                    <div class="profile">
                                        <img src="{{ asset('demo/img/avatar/1.jpg') }}" alt="">
                                    </div>

                                    <p>
                                        اتبع الخطوات الصحيحه لاضافه الشكوي
                                        اتبع الخطوات الصحيحه لاضافه الشكوي
                                        اتبع الخطوات الصحيحه لاضافه الشكوي

                                    </p>
                                </div>

                                <div class="holder">
                                    <div class="profile">
                                        <img src="{{ asset('demo/img/avatar/hero.jpg') }}" alt="">
                                    </div>

                                    <div class="det">
                                        <p>
                                            اتبع الخطوات الصحيحه لاضافه الشكوي
                                            اتبع الخطوات الصحيحه لاضافه الشكوي

                                        </p>
                                    </div>

                                </div>

                                <!--input new msg-->
                                <!--insert new msg - file-->
                                <hr>
                                <div class="insert">
                                    <form action="">
                                        <div class="inputs">
                                            <!--text msg-->
                                            <input type="text" required name="" placeholder="اكتب رسالتك هنا..." id="">

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
                                    <button>
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