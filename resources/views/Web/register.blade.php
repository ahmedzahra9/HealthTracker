@extends('layouts.web.app')
<style>
    img {
        padding-left: 15px;
    }
</style>

@section('site_content')
    <section class="register">
        <div class="container  py-5 ">
            <!--Section: Content-->
            <section class=" mt-3 ">
                <!--Grid row-->
                <div class="row py-4 py-md-0 d-flex justify-content-center">
                    <!--Grid column-->
                    <div class="col-md-10 main-col  px-md-5 ">
                        <div class="formDiv  p-3 py-4 ">
                            <p class="h4 text-center  mt-3 font-weight-bold">إنشاء حساب</p>
                            <div class="hr d-flex align-items-center justify-content-center">
                                <hr class="border-line  mb-5">
                            </div>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs md-tabs nav-justified " role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#panel555" role="tab">
                                        <i class="fad fa-user-injured px-2"></i>مريض</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#panel666" role="tab">
                                        <i class="fad fa-user-md px-2"></i>طبيب</a>
                                </li>
                            </ul>
                            <!-- Nav tabs -->
                            <!-- Tab panels -->
                            <div class="tab-content">
                                <!-- Panel 1 -->
                                <div class="tab-pane fade in show active" id="panel555" role="tabpanel">
                                    <!-- Nav tabs -->
                                    <form action="{{route('user_register')}}" class="text-center register_form" method="post">
                                        @csrf
                                        <div class="row py-5">
                                            <div class="col-md-6">
                                                <div class="input-1">
                                                    <input type="text" name="name" class="   form-control mb-3 pr-5"
                                                           placeholder=" الإسم بالكامل  ">
                                                    <i class="fad fa-id-card-alt user"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- رقم الجوال -->
                                                <div class="input-2">
                                                    <input type="text" name="phone" id="defaultLoginFormPassword"
                                                           class="form-control  pr-5 mb-3 numbersOnly"
                                                           placeholder=" رقم الجوال  ">
                                                    <i class="fad fa-phone user"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- كلمة المرور -->
                                                <div class="input-1">
                                                    <input type="email" name="email" class="  form-control mb-3 pr-5"
                                                           placeholder="اكتب البريد الالكترونى">
                                                    <i class="fad fa-envelope user"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- إعادة كلمةالمرور   -->
                                                <div class="input-2">
                                                    <input type="password" name="password"
                                                           class="form-control  pr-5 mb-3" placeholder="اكتب الباسورد">
                                                    <i class="fad fa-lock-alt user"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Sign in button -->
                                        <button class="btn btn-login  mb-2" type="submit">تسجيل</button>
                                    </form>
                                    <!-- Nav tabs -->
                                </div>
                                <!-- Panel 1 -->
                                <!-- Panel 2 -->
                                <div class="tab-pane fade" id="panel666" role="tabpanel">
                                    <!-- Nav tabs -->
                                    <form action="{{route('doctor_register')}}" class="text-center register_form" method="post">
                                        @csrf
                                        <div class="row py-5">
                                            <div class="col-md-12 d-flex justify-content-center mb-4">
                                                <input type="file" class="dropify" name="image"
                                                       data-default-file="{{url('Web')}}/img/dropify-doc.png"
                                                       style="height: auto !important;">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-1">
                                                    <input name="name_ar" type="text" class="   form-control mb-3 pr-5"
                                                           placeholder=" إسم الطبيب    ">
                                                    <i class="fad fa-id-card-alt user"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- رقم الجوال -->
                                                <div class="input-2">
                                                    <input name="phone" type="text" id="defaultLoginFormPassword"
                                                           class="form-control numbersOnly pr-5 mb-3"
                                                           placeholder=" رقم الجوال  ">
                                                    <i class="fad fa-phone user"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-1">
                                                    <input type="email" name="email" class="  form-control mb-3 pr-5"
                                                           placeholder="اكتب البريد الالكترونى">
                                                    <i class="fad fa-envelope user"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- كلمة المرور -->
                                                <div class="input-1">
                                                    <input type="password" name="password" class="  form-control mb-3 pr-5"
                                                           placeholder="اكتب الباسورد">
                                                    <i class="fad fa-lock-alt user"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-1">
                                                    <input name="location_ar" type="text" class="   form-control mb-3 pr-5"
                                                           placeholder=" العنوان      ">
                                                    <i class="fad fa-map-marker-alt user"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-1">
                                                    <input name="price" type="text" class=" numbersOnly  form-control mb-3 pr-5"
                                                           placeholder=" السعر ">
                                                    <i class="fad fa-dollar-sign user"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6" >
                                                <div class="form-group" style="margin-left: 9px;margin-right: -18px;">
                                                    <select name="gender" class=" select2 ">
                                                        <option selected disabled> النوع</option>
                                                        <option value="male"> ذكر</option>
                                                        <option value="female"> أنثى</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6" >
                                                <div class="form-group" style="margin-left: 9px;margin-right: -18px;">
                                                    <select name="degree_id" class=" select2 ">
                                                        <option selected disabled> الدرجة العلمية </option>
                                                        @foreach($degrees as $degree)
                                                            <option value="{{$degree->id}}"> {{$degree->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6" >
                                                <div class="form-group " style="margin-left: 9px;margin-right: -18px;">
                                                    <select name="category_id" id="category_id" class=" select2 ">
                                                        <option selected disabled> التخصص</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}"> {{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
{{--                                            <div class="col-md-6" >--}}
{{--                                                <div class="form-group" style="margin-left: 9px;margin-right: -18px;">--}}
{{--                                                    <select id="type" name="type" class=" select2 ">--}}
{{--                                                        <option selected disabled> محل العمل </option>--}}
{{--                                                        <option value="hospital"> مستشفى</option>--}}
{{--                                                        <option value="clinic"> عيادة</option>--}}
{{--                                                        <option value="both"> كلاهما </option>--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-6 hospital_div " style="display: none" >--}}
{{--                                                <div class="form-group " style="margin-left: 9px;margin-right: -18px;">--}}
{{--                                                    <select name="hospital_id" id="hospital_id" class=" select2 ">--}}
{{--                                                        <option selected disabled> المستشفى</option>--}}
{{--                                                        @foreach($hospitals as $hospital)--}}
{{--                                                            <option value="{{$hospital->id}}"> {{$hospital->name}}</option>--}}
{{--                                                        @endforeach--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="col-md-6">--}}
{{--                                                <!-- إعادة كلمةالمرور   -->--}}
{{--                                                <div class="input-2">--}}
{{--                                                    <input type="password" class="form-control  pr-5 mb-3"--}}
{{--                                                           placeholder="إعادة كتابة الباسورد">--}}
{{--                                                    <i class="fad fa-lock-alt user"></i>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                            <div class="col-md-6 {{--clinic_div--}}"{{-- style="display: none" --}}>
                                                <div class="input-1">
                                                    <input name="day_limit" type="text" class=" numbersOnly form-control mb-3 pr-5"
                                                           placeholder=" عدد الحجوزات باليوم  ">
                                                    <i class="fad fa-calendar user"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6 {{--clinic_div--}}"{{-- style="display: none"--}} >
                                                <div class="input-1">
                                                    <input name="age_from" type="text" class=" numbersOnly form-control mb-3 pr-5"
                                                           placeholder=" اقل عمر  ">
                                                    <i class="fad fa-user-clock user"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6 {{--clinic_div--}}" {{--style="display: none"--}} >
                                                <div class="input-1">
                                                    <input name="age_to" type="text" class=" numbersOnly form-control mb-3 pr-5"
                                                           placeholder=" أكبر عمر  ">
                                                    <i class="fad fa-user-clock user"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-12 {{--clinic_div--}}" {{--style="display: none"--}} >
                                                <div class="input-2">
                                                  <textarea style="    border-radius: 20px; border: none;
                                                  background: #e6f4ff;" rows="3" class="form-control position-relative mb-3 pr-3" type="text"
                                                         name="description"   placeholder="الدرجة العلمية  "></textarea>
                                                </div>
                                            </div>

{{--                                            <div class="input-1 col-md-6 clinic_div"  style="display: none">--}}
{{--                                                <input type="text" class="form-control" placeholder="خط الطول" name="latitude" id="lat">--}}
{{--                                            </div>--}}
{{--                                            <div class="input-1 col-md-6 clinic_div"  style="display: none">--}}
{{--                                                <input type="text" class="form-control" placeholder="خط العرض" name="longitude" id="lng">--}}
{{--                                            </div>--}}

{{--                                            <div id="map" style="height:250px;display: none" class="my-3 col-12 clinic_div"></div>--}}

                                        </div>
                                        <!-- Sign in button -->
                                        <div class="text-center">
                                            <button class="btn btn-login  mb-2" type="submit">تسجيل</button>
                                        </div>
                                    </form>
                                    <!-- Nav tabs -->
                                </div>
                                <!-- Panel 2 -->
                            </div>
                            <!-- Tab panels -->
                            <div class="socia my-3">
                                <!--Facebook-->
                                <!-- <a class="btn-floating btn-md btn-fb" type="button" role="button"><i
                                      class="fab fa-facebook-f"></i></a> -->
                                <!--Google +-->
                                <!-- <a class="btn-floating btn-md btn-gplus" type="button" role="button"><i
                                      class="fab fa-google-plus-g"></i></a> -->
                            </div>
                            {{--                <p>لديك حساب بالفعل ؟ <a href="{{url('register')}}">إنشاء حساب</a></p>--}}
                            <p class="text-center text-dark"> لديك حساب بالفعل ؟ <a class="login-link"
                                                                                    href="{{url('login')}}"> تسجيل
                                    الدخول</a></p>
                        </div>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </section>
            <!--Section: Content-->
        </div>
    </section>

@endsection
@push('web_js')
    <script>
        $(document).on('change','#type', function(e) {
            e.preventDefault();
            var type = $(this).val()
            if (type == 'hospital'){
                $('.hospital_div').show();
                $('.clinic_div').hide();
            }else if (type == 'clinic'){
                $('.hospital_div').hide();
                $('.clinic_div').show();
            }else {
                $('.hospital_div').show();
                $('.clinic_div').show();
            }
        })
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer></script>
    <script>
        let map;
        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: 30.614177666367688, lng: 30.962062534117802 },
                zoom: 8,
                scrollwheel: true,
            });
            const uluru = { lat: 30.614177666367688, lng: 30.962062534117802 };
            let marker = new google.maps.Marker({
                position: uluru,
                map: map,
                draggable: true
            });
            google.maps.event.addListener(marker,'position_changed',
                function (){
                    let lat = marker.position.lat()
                    let lng = marker.position.lng()
                    $('#lat').val(lat)
                    $('#lng').val(lng)
                })
            google.maps.event.addListener(map,'click',
                function (event){
                    pos = event.latLng
                    marker.setPosition(pos)
                })
        }
    </script>
    <script>
        $(document).on('submit', '.register_form', function (event) {
            event.preventDefault();
            // var myForm = $("#Form")[0]
            // var formData = new FormData(myForm)
            var form_data = new FormData($(this)[0]);
            var url = $(this).attr('action');
            $.ajax({
                type: 'POST',
                url: url,
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function(){
                    $('#global-loader').show()
                },
                success: function (data) {
                    window.setTimeout(function() {
                        $('#global-loader').hide()
                        if (data.success == 'true') {
                            location.href = 'login';
                            my_toaster(data.message)
                        }
                        if (data.success == 'false') {
                            var messages = Object.values(data.messages);
                            $( messages ).each(function(index, message ) {
                                my_toaster(message,'error')
                            });
                        }
                    }, 500);
                }, error: function (data) {
                    $('#global-loader').hide()
                    var error = Object.values(data.responseJSON.errors);
                    $( error ).each(function(index, message ) {
                        my_toaster(message,'error')
                    });
                }
            });
        });
    </script>


@endpush
