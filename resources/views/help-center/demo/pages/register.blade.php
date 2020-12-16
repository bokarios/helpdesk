@extends('help-center.demo.main')

@section('title')
    Register new account
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('demo/css/sign.css') }}">
@endsection

@include('help-center.demo.partials._loader')

@section('content')
    

    <div class="wrapper">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 parent">
                <div class="image">
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 parent">
                <div class="custom-container">
                    <div class="child text-righted">
                        <div class="caption">
                            <h1>سجل حساب جديد</h1>
                            <h4>انجز مشاريعك بسهوله عبر الانترنت</h4>

                        </div>


                        <div class="form">
                            <form action="">

                                <div class="input">
                                    <label for="">
                                        <i class="far fa-user"></i>
                                        اسم المستخدم
                                    </label>
                                    <input type="text" name="" id="">
                                </div>

                                <div class="input">
                                    <label for="">
                                        <i class="far fa-envelope"></i>
                                        البريد الالكتروني
                                    </label>
                                    <input type="email" name="" id="">
                                </div>


                                <div class="input">
                                    <div class="d-flex">
                                        <label for="">
                                            <i class="far fa-lock"></i>
                                            كلمه السر
                                        </label>

                                    </div>
                                    <input type="text" name="" id="">
                                </div>

                                <div class="text-left">
                                    <button class="button">
                                        تسجيل الحساب
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection