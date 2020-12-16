@extends('help-center.demo.main')

@section('title')
    Reset Password
@endsection

@include('help-center.demo.partials._loader')

@section('content')
    
    <!--sign in and sign up wrapper-->
    <div class="wrapper signup">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 parent forget-image">
                <div class="image">
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 parent">
                <div class="custom-container">
                    <div class="child text-righted">
                        <div class="caption">
                            <h1>اعاده كلمه السر</h1>
                            <h4> اعد تعيين كلمه السر</h4>
                        </div>


                        <div class="form">
                            <form action="">
                                <div class="input">
                                    <label for="">
                                        <i class="far fa-lock"></i>
                                        كلمه السر الحديده
                                    </label>
                                    <input type="password" name="" id="">
                                </div>

                                <div class="input">
                                    <label for="">
                                        <i class="far fa-lock"></i>
                                        اعاده تعيين كلمه السر
                                    </label>
                                    <input type="password" name="" id="">
                                </div>

                                <div class="text-left">
                                    <button class="button">
                                        اعاده تعيين
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