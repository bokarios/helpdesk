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

            <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 parent mr-auto">
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
                                        <i class="far fa-envelope"></i>
                                        البريد الالكتروني
                                    </label>
                                    <input type="email" name="" id="email">
                                </div>


                                <div class="input">
                                    <div class="d-flex">
                                        <label for="">
                                            <i class="far fa-lock"></i>
                                            كلمة السر
                                        </label>
                                    </div>
                                    <input type="password" name="" id="password">
                                </div>


                                <div class="input">
                                    <div class="d-flex">
                                        <label for="">
                                            <i class="far fa-lock"></i>
                                            تأكيد كلمة السر
                                        </label>
                                    </div>
                                    <input type="password" name="" id="password-confirm">
                                </div>


                                <div class="text-left">
                                    <button class="button" type="button" id="register">
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

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $('#register').on('click', function(){
            let btn = $(this)
            btn.attr('disabled', true).css('background-color', 'var(--hover)')
            let email = $('#email').val()
            let password = $('#password').val()
            let confirm = $('#password-confirm').val()

            if(email !== '' && password !== '' && confirm !== '') {
                // valid
                $('#preloader').css('display', 'block')

                $.ajax({
                    url: '{{ route('demo.register_post') }}',
                    method: 'POST',
                    data: {email, password, confirm, _token: '{{ csrf_token() }}'},
                    success: function(data) {
                        if(data.msg == 'success') {
                            window.location.href = '{{ route('demo.login') }}'
                        } else {
                            // fail
                            Swal.fire({
                                text: 'لم يتم إنشاء حسابك. حاول مرة اخرى',
                                icon: 'warning',
                                toast: true,
                                position: 'top',
                                showConfirmButton: false,
                            });

                            $('#preloader').fadeOut(1000)
                            setTimeout(function() {
                                btn.attr('disabled', false).css('background-color', 'var(--primary)')
                                
                                console.log('done')
                            }, 3000)
                        }
                    },
                    error: err => {
                        console.log('Error: ', err.responseJSON.message)
                        Swal.fire({
                            text: 'لم يتم إنشاء حسابك. حاول مرة اخرى',
                            icon: 'warning',
                            toast: true,
                            position: 'top',
                            showConfirmButton: false,
                        });

                        $('#preloader').fadeOut(1000)
                        setTimeout(function() {
                            btn.attr('disabled', false).css('background-color', 'var(--primary)')
                            
                            console.log('done')
                        }, 3000)
                    }
                });
                
            } else {
                btn.attr('disabled', false).css('background-color', 'var(--primary)')
                // invalid
                if(confirm == '') {
                    Swal.fire({
                        text: 'الرجاء ادخال تأكيد كلمة السر',
                        icon: 'warning',
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                    });
                }
                if(password == '') {
                    Swal.fire({
                        text: 'الرجاء ادخال كلمة السر',
                        icon: 'warning',
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                    });
                }
                if(email == '') {
                    Swal.fire({
                        text: 'الرجاء ادخال البريد الإلكتروني',
                        icon: 'warning',
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                    });
                }
            }
        });
    </script>
@endsection