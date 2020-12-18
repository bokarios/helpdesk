@extends('help-center.demo.main')

@section('title')
    Help Desk
@endsection

@include('help-center.demo.partials._loader')

@section('content')
        
    <!--navigation bar-->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url()->current() }}">
                شغف
            </a>

            <div id="wrapper" class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <div class="main-item menu">
                    <span class="line line01"></span>
                    <span class="line line02"></span>
                    <span class="line line03"></span>
                </div>
            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a class="nav-link " id="s" href="{{ route('demo.dashboard.new') }}">
                            <i class="far fa-edit"></i>
                            تقديم شكوي
                        </a>
                    </li>
                    @if (!Auth::check())
                    <li class="nav-item">
                        <a class="nav-link sign" id="" href="{{ route('login') }}">
                            <i class="far fa-user"></i>
                            تسجيل الدخول
                        </a>
                    </li>
                    @else
                    <div class="admin">
                        <ul>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle mt-0 pt-1" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="profile">
                                        <img src="{{ asset(Auth::user()->avatar?? 'demo/img/avatar/hero.jpg') }}" alt="" />
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-left animate slideIn"
                                    aria-labelledby="navbarDropdown">
                                    <div class="title">
                                        <span>
                                            {{ Auth::user()->first_name?? 'Anonymous' }}{{' '}}{{ Auth::user()->last_name?? '' }}
                                        </span>
                                    </div>
                                    <a class="dropdown-item" href="#">
                                        <i class="far fa-user"></i> الصفحة الشخصية
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="far fa-cog"></i> الضبط
                                    </a>
                                    <a class="dropdown-item" href="{{ route('demo.logout') }}">
                                        <i class="far fa-sign-out"></i> الخروج
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <header class="header" style="z-index: 1">
        <div class="caption">
            <div class="custom-container">
                <div class="text text-center">
                    <h1>
                        موقع الدعم والمساعدة الخاص بمنصة شغف هو عبارة عن موقع يقدم خدمات الدعم
                    </h1>
                    <p>
                        الان مع شغف انجز مشاريعك عبر الانترنت بكل سهوله
                    </p>
                    <a href="{{ route('demo.dashboard.new') }}">
                        تقديم شكوي
                    </a>
                </div>
            </div>
        </div>

    </header>


    <!--about-->
    <section class="about">
        <div class="custom-container">
            <div class="text-center">
                <h2 class="title">
                    ما هو موقع الدعم والمساعدة
                </h2>

                <p>
                    موقع الدعم والمساعدة الخاص بمنصة شغف هو عبارة عن موقع يقدم خدمات الدعم والمساعدة في شكل تزاكر بحيث
                    يقوم مدير الموقع باستقبال الشكاوي من قبل طالب الخدمة ومقدم الخدمة عن طريق موقع الدعم والمساعدة .
                    تقوم الادارة باستلام الشكوي والرد عليها حسب ما ورد فيها لحل المشكلة.
                </p>
            </div>
        </div>
    </section>

    <!--methodology-->
    <section class="methodlogy">
        <div class="custom-container text-center">

            <h2 class="title">
                كیف یعمل الموقع
            </h2>
            <p class="sub">
                يتكون الموقع من الصفحات
            </p>
            <div class="row text-righted">
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 parent">
                    <div class="child">
                        <div class="icon">
                            <i class="far fa-user"></i>
                        </div>

                        <h6>
                            تسجيل الدخول
                        </h6>

                        <p>
                            موقع يقدم خدمات الدعم والمساعدة في شكل تزاكر بحيث يقوم مدير الموقع باستقبال الشكاوي من قبل
                            طالب الخدمة ومقدم الخدمة عن طريق موقع الدعم والمساعدة
                        </p>
                    </div>
                </div>
                <!---->
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 parent">
                    <div class="child">
                        <div class="icon">
                            <i class="far fa-edit"></i>
                        </div>

                        <h6>
                            فتح شكوي جديدة
                        </h6>

                        <p>
                            موقع يقدم خدمات الدعم والمساعدة في شكل تزاكر بحيث يقوم مدير الموقع باستقبال الشكاوي من قبل
                            طالب الخدمة ومقدم الخدمة عن طريق موقع الدعم والمساعدة
                        </p>
                    </div>
                </div>
                <!---->
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 parent">
                    <div class="child">
                        <div class="icon">
                            <i class="far fa-tasks"></i>
                        </div>

                        <h6>
                            متابعة الشكوي
                        </h6>

                        <p>
                            موقع يقدم خدمات الدعم والمساعدة في شكل تزاكر بحيث يقوم مدير الموقع باستقبال الشكاوي من قبل
                            طالب الخدمة ومقدم الخدمة عن طريق موقع الدعم والمساعدة
                        </p>
                    </div>
                </div>
                <!---->

            </div>
        </div>
    </section>



    <!--featurs-->
    <section class="features">
        <div class="features">
            <div class="custom-container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <div class="feat-details text-right">

                            <h2 class="title">

                                نافذة فتح شكوي جديدة
                            </h2>

                            <p>
                                موقع الدعم والمساعدة الخاص بمنصة شغف هو عبارة عن موقع يقدم خدمات الدعم والمساعدة في شكل
                                تزاكر بحيث يقوم مدير الموقع باستقبال الشكاوي من قبل طالب الخدمة ومقدم الخدمة عن طريق
                                موقع الدعم والمساعدة
                            </p>



                            <a href="{{ route('demo.dashboard.new') }}">
                                قدم شكوي
                            </a>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <div class="feat-image">
                            <img src="{{ asset('demo/img/background/1.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="features no-padding">
            <div class="custom-container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <div class="feat-image">
                            <img src="{{ asset('demo/img/background/2.jpg') }}" alt="">
                        </div>
                    </div>


                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <div class="feat-details text-right">


                            <h2 class="title">
                                نافذة متابعة الشكوي الواحدة
                                <br>
                                والرد عليها
                            </h2>


                            <p>
                                موقع الدعم والمساعدة الخاص بمنصة شغف هو عبارة عن موقع يقدم خدمات الدعم والمساعدة في شكل
                                تزاكر بحيث يقوم مدير الموقع باستقبال الشكاوي من قبل طالب الخدمة ومقدم الخدمة عن طريق
                                موقع الدعم والمساعدة
                            </p>

                            <a href="{{ route('demo.dashboard.new') }}">
                                قدم شكوي

                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <!--faq -->
    <section class="faq">
        <div class="my-container">
            <div class="text-center">

                <h2 class="title">
                    الأسئلة الشائعة
                </h2>

                <p class="sub">
                    جد الاجوبه لكل سؤال يخطر في بالك
                </p>
            </div>

            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="false" aria-controls="collapseOne"> <i class="fa"
                                            aria-hidden="true"></i>
                                        ما هي شغف ؟
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordion">
                                <div class="card-body text-righted">
                                    هنا تكون الاجابه
                                </div>
                            </div>
                        </div>
                        <!---->
                        <div class="card">
                            <div class="card-header" id="HeadingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="fa" aria-hidden="true"></i>
                                        كيف يمكن أن أستفيد من شغف ؟
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="HeadingTwo"
                                data-parent="#accordion">
                                <div class="card-body text-righted">
                                    هنا تكون الاجابه
                                </div>
                            </div>
                        </div>
                        <!---->
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        <i class="fa" aria-hidden="true"></i>
                                        لماذا التوظيف عن بعد عبر مستقل هو الخيار الأفضل ؟
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordion">
                                <div class="card-body text-righted">
                                    هنا تكون الاجابه

                                </div>
                            </div>
                        </div>
                        <!---->

                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <h5 class="mb-0">
                                    <button class="btn btn-link " data-toggle="collapse" data-target="#collapseFour"
                                        aria-expanded="false" aria-controls="collapseFour"> <i class="fa"
                                            aria-hidden="true"></i>
                                        ما هي شغف ؟
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseFour" class="collapse show" aria-labelledby="headingFour"
                                data-parent="#accordion">
                                <div class="card-body text-righted">
                                    هنا تكون الاجابه
                                </div>
                            </div>
                        </div>
                        <!---->
                        <div class="card">
                            <div class="card-header" id="HeadingFive">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        <i class="fa" aria-hidden="true"></i>
                                        كيف يمكن أن أستفيد من شغف ؟
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="HeadingFive"
                                data-parent="#accordion">
                                <div class="card-body text-righted">
                                    هنا تكون الاجابه
                                </div>
                            </div>
                        </div>
                        <!---->
                        <div class="card">
                            <div class="card-header" id="headingSix">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        <i class="fa" aria-hidden="true"></i>
                                        لماذا التوظيف عن بعد عبر مستقل هو الخيار الأفضل ؟
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                                data-parent="#accordion">
                                <div class="card-body text-righted">
                                    هنا تكون الاجابه

                                </div>
                            </div>
                        </div>
                        <!---->

                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--footer-->
    <footer>
        <div class="custom-container">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 text-righted">
                    <h5>
                        من نحن
                    </h5>
                    <ul>
                        <li>
                            <a href="faq.html">
                                السمتقلين
                            </a>
                        </li>
                        <li>
                            <a href="privacy.html">
                                المشاريع
                            </a>
                        </li>

                        <li>
                            <a href="privacy.html">
                                المشاريع
                            </a>
                        </li>

                        <li>
                            <a href="privacy.html">
                                المشاريع
                            </a>
                        </li>

                        <li>
                            <a href="privacy.html">
                                المشاريع
                            </a>
                        </li>

                        <li>
                            <a href="privacy.html">
                                شروط الاستخدام
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                    <h5>
                        الروابط
                    </h5>
                    <ul>
                        <li>
                            <a href="faq.html">
                                السمتقلين
                            </a>
                        </li>
                        <li>
                            <a href="privacy.html">
                                المشاريع
                            </a>
                        </li>

                        <li>
                            <a href="privacy.html">
                                المشاريع
                            </a>
                        </li>

                        <li>
                            <a href="privacy.html">
                                المشاريع
                            </a>
                        </li>

                        <li>
                            <a href="privacy.html">
                                المشاريع
                            </a>
                        </li>

                        <li>
                            <a href="privacy.html">
                                شروط الاستخدام
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                    <h5>
                        اتصل بنا
                    </h5>
                    <ul>
                        <li>
                            <a href="faq.html">
                                السمتقلين
                            </a>
                        </li>
                        <li>
                            <a href="privacy.html">
                                المشاريع
                            </a>
                        </li>

                        <li>
                            <a href="privacy.html">
                                المشاريع
                            </a>
                        </li>

                        <li>
                            <a href="privacy.html">
                                المشاريع
                            </a>
                        </li>

                        <li>
                            <a href="privacy.html">
                                المشاريع
                            </a>
                        </li>

                        <li>
                            <a href="privacy.html">
                                شروط الاستخدام
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="col-12 col-sm-6 col-md-6 col-lg-12 col-xl-12">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 linker">
                            <div class="d-flex">
                                <span class="span-t">
                                    تابعنا علي
                                </span>
                                <div class="d-flex">
                                    <span class="social-icon">
                                        <a href="">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </span>

                                    <span class="social-icon">
                                        <a href="">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </span>

                                    <span class="social-icon">
                                        <a href="">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </span>

                                    <span class="social-icon">
                                        <a href="">
                                            <i class="fab fa-google"></i>
                                        </a>
                                    </span>

                                    <span class="social-icon">
                                        <a href="">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 linker">
                            <div class="d-flex">
                                <span class="span-t">
                                    حمل التطبيق
                                </span>
                                <div class="d-flex">
                                    <span class="social-icon">
                                        <a href="">
                                            <i class="fab fa-apple"></i>
                                        </a>
                                    </span>

                                    <span class="social-icon">
                                        <a href="">
                                            <i class="fab fa-android"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyRights text-center">
                <p>
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    &copf;
                    جميع الحقوق محفوظة شغف
                </p>

            </div>
        </div>
    </footer>

@endsection