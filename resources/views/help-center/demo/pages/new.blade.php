@extends('help-center.demo.main')

@section('title')
    Add new
@endsection

@section('styles')
    <style>
        .choose {
            padding: 10px;
            width: 100%;
            background-color: #e6e6e6;
            outline: none;
            border: none;
            border-radius: 4px;
            height: 48px;
        }

        .choose:focus {
            border: 2px solid var(--primary);
            /* outline-style: auto; */
            transition: all ease-in-out 1s;
        }
    </style>
@endsection

<!--user nav-->
@include('help-center.demo.partials._user_nav')

@include('help-center.demo.partials._loader')

@section('content')
    
    <!--dashboard-->
    <div class="dashboard-wrapper text-righted">
        @include('help-center.demo.partials._sidebar')

        <!--content-->
        <input type="hidden" id="defaultOpen">
        <div class="content">
            <button class="sidebar-toggle" id="sidebar-toggler">
                <i class="far fa-bars"></i>
            </button>

            <div class="parent">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                        <div class="child">
                            <h6>
                                اضافه شكوى
                            </h6>

                            <div class="dash-form">
                                <form method="POST" enctype="multipart/form-data" id="form">
                                    <div class="row">
                                        <div class="dash-input col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <label for="">
                                                عنوان الشكوي
                                            </label>
                                            <input type="text" name="subject" id="subject">
                                        </div>

                                        {{-- <div class="dash-input col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <label for="">
                                                المشروع المراد فتح الشكوي تبعه
                                            </label>
                                            <input type="text" name="" id="">
                                        </div> --}}

                                        <div class="dash-input col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <label for="">
                                                الفئة
                                            </label>
                                            <select name="category" id="category" class="choose">
                                                <option value="" selected>إختر الفئة</option>
                                                @foreach (App\Tag::where('type', 'category')->get() as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->display_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="dash-input col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <label for="">
                                                تفاصيل الشكوي
                                            </label>
                                            <textarea name="body" id="body"></textarea>
                                        </div>

                                        {{-- <div class="dash-input col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <label class="file" for="chooseFile">
                                                <i class="far fa-upload"></i>
                                                اختر ملف
                                            </label>
                                            <input type="file" id="chooseFile">
                                        </div> --}}
                                    </div>

                                    <button class="form-add" type="button" id="add">
                                        اضافه الشكوى
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!---->

                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <div class="child">
                            <h6>
                                اتبع الخطوات الصحيحه لاضافه الشكوي
                            </h6>
                            <p>
                                اتبع الخطوات الصحيحه لاضافه الشكوي
                                اتبع الخطوات الصحيحه لاضافه الشكوي
                                اتبع الخطوات الصحيحه لاضافه الشكوي

                            </p>
                            <ul>
                                <li>
                                    اتبع الخطوات الصحيحه لاضافه الشكوي
                                </li>

                                <li>
                                    اتبع الخطوات الصحيحه لاضافه الشكوي
                                </li>

                                <li>
                                    اتبع الخطوات الصحيحه لاضافه الشكوي
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!---->

                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        let loader = $('#preloader');
        $('#add').on('click', function(){
            let sub = $('#subject').val();
            let cat = $('#category').val();
            let bod = $('#body').val();

            // console.log('sub: ', sub)
            // console.log('cat: ', cat)
            // console.log('bod: ', bod)

            if(sub !== '' && cat !== '' && bod !== '') {
                // valid
                loader.css('display', 'block');

                $.ajax({
                    url: '/secure/tickets',
                    method: 'POST',
                    data: {subject: sub, category: cat, body: bod, _token: '{{ csrf_token() }}'},
                    success: function(data) {
                        if(data.id) {
                            // close loader
                            loader.css('display', 'none');

                            Swal.fire({
                                text: 'تمت إضافة الشكوى',
                                icon: 'success',
                                toast: true,
                                position: 'top',
                                showConfirmButton: false,
                            });

                            $('#subject').val('');
                            $('#category').val('');
                            $('#body').val('');
                        }
                    },
                    error: err => console.log('Error: ', err)
                });
            } else {
                // invalid
                if(bod == '') {
                    Swal.fire({
                        text: 'الرجاء كتابة تفاصيل الشكوى',
                        icon: 'warning',
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                    });    
                }
                
                if(cat == '') {
                    Swal.fire({
                        text: 'الرجاء اختيار الفئة',
                        icon: 'warning',
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                    });    
                }
                
                if(sub == '') {
                    Swal.fire({
                        text: 'الرجاء كتابة عنوان الشكوى',
                        icon: 'warning',
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                    });    
                }

                // Swal.fire({
                //     text: 'الرجاء اكمال البيانات بشكل صحيح',
                //     icon: 'warning',
                //     toast: true,
                //     position: 'top',
                //     showConfirmButton: false,
                // });
            }
        });
    </script>
@endsection