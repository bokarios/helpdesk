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
<script src="{{ asset('demo/js/jquery.js') }}"> </script>
<script src="{{ asset('demo/js/formToJson.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function add_ticket() {
        let sub = $('#subject').val();
        let cat = $('#category').val();
        let bod = $('#body').val();
        let prj = $('#project').val();
        let url = $('#url').val();
        let upd = $('#chooseFile');
        // let uploads = [];

        // file handling
        // if(upd[0].files.length > 0) {
        //     uploads  = new FormData();
        //     uploads.append('uploads', upd[0].files);
        //     console.log(upd[0].files);
        // }

        // console.log(uploads.formToJson())

        if(sub !== '' && cat !== '' && bod !== '' && prj !== '' && url !== '') {
            // valid
            $('#preloader').show();

            $.ajax({
                url: '/secure/tickets',
                method: 'POST',
                // processData: false,
                // contentType: false,
                data: {
                    // uploads: uploads,
                    subject: sub,
                    category: cat,
                    details: bod,
                    project: prj,
                    url: url,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    if(data.id) {
                        // close loader
                        $('#preloader').fadeOut(1000);

                        Swal.fire({
                            text: 'تمت إضافة الشكوى',
                            icon: 'success',
                            toast: true,
                            position: 'top',
                            showConfirmButton: false,
                            timer: 5000
                        });

                        $('#subject').val('');
                        $('#category').val('');
                        $('#body').val('');
                        $('#project').val('');
                        $('#url').val('');
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
                    timer: 4000,
                });    
            }
            
            if(cat == '') {
                Swal.fire({
                    text: 'الرجاء اختيار الفئة',
                    icon: 'warning',
                    toast: true,
                    position: 'top',
                    showConfirmButton: false,
                    timer: 4000,
                });    
            }

            if(url == '') {
                Swal.fire({
                    text: 'الرجاء كتابة رابط المشروع',
                    icon: 'warning',
                    toast: true,
                    position: 'top',
                    showConfirmButton: false,
                    timer: 4000,
                });    
            }
            
            if(prj == '') {
                Swal.fire({
                    text: 'الرجاء كتابة المشروع الشكوى',
                    icon: 'warning',
                    toast: true,
                    position: 'top',
                    showConfirmButton: false,
                    timer: 4000,
                });    
            }

            if(sub == '') {
                Swal.fire({
                    text: 'الرجاء كتابة عنوان الشكوى',
                    icon: 'warning',
                    toast: true,
                    position: 'top',
                    showConfirmButton: false,
                    timer: 4000,
                });    
            }
        }
    }
</script>
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
                                <form id="tick-form">
                                    <div class="row">
                                        <div class="dash-input col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <label for="">
                                                عنوان الشكوي
                                            </label>
                                            <input type="text" name="subject" id="subject" class="@error('subject') border-danger @enderror">
                                            @error('subject')
                                                <p class="text-right text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>

                                        <div class="dash-input col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <label for="">
                                                المشروع المراد فتح الشكوي تبعه
                                            </label>
                                            <input type="text" name="project" id="project" class="@error('project') border-danger @enderror">
                                            @error('project')
                                                <p class="text-right text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>

                                        <div class="dash-input col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <label for="">
                                                رابط المشروع
                                            </label>
                                            <input type="text" name="url" id="url" class="text-left @error('url') border-danger @enderror" placeholder="http://example.com">
                                            @error('url')
                                                <p class="text-right text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>

                                        <div class="dash-input col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <label for="">
                                                الفئة
                                            </label>
                                            <select name="category" id="category" class="choose @error('category') border-danger @enderror">
                                                <option value="" selected>إختر الفئة</option>
                                                @foreach (App\Tag::where('type', 'category')->get() as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->display_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                                <p class="text-right text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>

                                        <div class="dash-input col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <label for="">
                                                تفاصيل الشكوي
                                            </label>
                                            <textarea name="body" id="body" class="@error('body') border-danger @enderror"></textarea>
                                            @error('body')
                                                <p class="text-right text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>

                                        {{-- <div class="dash-input col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <label class="file" for="chooseFile">
                                                <i class="far fa-upload"></i>
                                                اختر ملف
                                            </label>
                                            <input type="file" name="uploads" id="chooseFile" multiple>
                                            @error('uploads')
                                                <p class="text-right text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div> --}}
                                    </div>

                                    <button class="form-add" type="button" id="add" onclick="add_ticket()">
                                        اضافه الشكوى
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <div class="child">
                            <h6>
                                اتبع الخطوات الصحيحه لاضافه الشكوي
                            </h6>
                            <p>
                                الرجاء مراعاة الآتي عند اضافة شكوى
                            </p>
                            <ul>
                                <li>
                                    استخدم عنوان واضح يختصر سبب الشكوى قدر الامكان.
                                </li>

                                <li>
                                    كتابة الاسم الرسمي للمشروع.
                                </li>

                                <li>
                                    الحرص على سلامة الرابط المرفق مع الشكوى.
                                </li>
                                
                                <li>
                                    الحرص على ذكر التفاصيل المهمة و عدم الاذهاب في الشرح.
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