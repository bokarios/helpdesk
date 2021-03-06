@extends('help-center.demo.main')

@section('title')
    Sign in
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('demo/css/sign.css') }}">
@endsection

@include('help-center.demo.partials._loader')

@section('content')
    
    <!--sign in and sign up wrapper-->
    <div class="wrapper">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 parent">
                <div class="image">
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 parent mr-auto">
                <div class="custom-container">
                    <div class="child text-righted">
                        <div class="caption">
                            <h1>شغف</h1>
                            <h4>انجز مشاريعك بسهوله عبر الانترنت</h4>

                        </div>


                        <div class="form">
                            <!--form-->
                            <form action="">

                                <div class="input">
                                    <label for="">
                                        <i class="far fa-envelope"></i>
                                        البريد الالكتروني
                                    </label>
                                    <input type="text" name="email" id="email">
                                </div>


                                <div class="input">
                                    <div class="d-flex">
                                        <label for="">
                                            <i class="far fa-lock"></i>
                                            كلمه السر
                                        </label>

                                        <a href="{{ route('demo.forget.password') }}">
                                            نسيت كلمه السر ؟
                                        </a>
                                    </div>
                                    <input type="password" name="password" id="password">
                                </div>
                                <br>

                                <div class="text-left">
                                    {{-- <a href="{{ route('demo.dashboard') }}" class="button">
                                        تسجيل الدخول
                                    </a> --}}
                                    <button class="button" type="button" id="login">
                                        تسجيل الدخول
                                    </button>
                                </div>
                            </form>
                            <div class="text-center">
                                <a href="{{ route('register') }}">
                                    ليس لديك حساب ؟ <span>سجل الان</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $('#login').on('click', function(){
            let btn = $(this)
            btn.attr('disabled', true).css('background-color', 'var(--hover)')
            let email = $('#email').val()
            let password = $('#password').val()

            if(email !== '' && password !== '') {
                // valid
                $('#preloader').show();

                $.ajax({
                    url: '{{ route('demo.login_post') }}',
                    method: 'POST',
                    data: {email, password, _token: '{{ csrf_token() }}'},
                    success: function(data) {
                        if(data.msg == 'success') {
                            if(data.role == 'admin') {
                                window.location.href = '/admin'
                            } else {
                                window.location.href = '{{ route('demo.home') }}'
                            }
                        } else {
                            // fail
                            Swal.fire({
                                text: 'بياناتك غير صحيحة',
                                icon: 'warning',
                                toast: true,
                                position: 'top',
                                showConfirmButton: false,
                                timer: 4000
                            });

                            $('#preloader').fadeOut(1000)
                            setTimeout(function() {
                                btn.attr('disabled', false).css('background-color', 'var(--primary)')
                            }, 3000)
                        }
                    },
                    error: err => console.log('Error: ', err)
                });
                
            } else {
                btn.attr('disabled', false).css('background-color', 'var(--primary)')
                // invalid
                if(password == '') {
                    Swal.fire({
                        text: 'الرجاء ادخال كلمة السر',
                        icon: 'warning',
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 4000
                    });
                }
                if(email == '') {
                    Swal.fire({
                        text: 'الرجاء ادخال البريد الإلكتروني',
                        icon: 'warning',
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 4000
                    });
                }
            }
        });
    </script>
@endsection