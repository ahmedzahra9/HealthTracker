@extends('layouts.web.app')
@section('site_content')

    <div class="profile-of-doctor py-5">

        <div class="container">
            <div>
                <div class="content p-5">
                    <div class="doc-img">
                        <img src="{{$hospital->image}}" alt="">
                    </div>

                    <div class="text-place p-4 align-items-center">
                        <h4> {{$hospital->name}} </h4>
{{--                        <p class="country  pb-3">--}}
{{--                            <img src="img/icons/Egypt.png" class="ml-2 " width="20px" height="16px" alt="">--}}
{{--                            مصر--}}
{{--                        </p>--}}
                        <p> التخصص : <span> {{$hospital->category->name}}  </span></p>
{{--                        <p> التصنيف : <span> {{$hospital->degree->name}}   </span></p>--}}
                        <p> الوصف :<span> {{$hospital->description}}</span></p>
                        <p> العنوان : <span>  {{$hospital->location_ar}}   </span></p>
                        <p> السعر : <span class="text-danger"> {{$hospital->price}} </span> جنيه</p>
                    </div>

                </div>

{{--                <div class="w-100 pt-3 d-flex justify-content-center">--}}
{{--                    <button class="btn btn-book " data-toggle="modal" data-target="#exampleModalCenter"> حجز موعد--}}
{{--                    </button>--}}
{{--                </div>--}}
            </div>



{{--            <div class="rate px-3  mt-4 py-3">--}}
{{--                <div class="d-flex justify-content-between">--}}
{{--                    <p> <i class="fad fa-map-marker-alt"></i> التقييمات ( من 20 زائر )</p>--}}
{{--                    <p> <span class="font-weight-bold text-danger">4.8 </span> / 5 <a href=""> <i class="fad fa-star"></i> </a>--}}
{{--                    </p>--}}
{{--                </div>--}}


{{--                <section class="CarsSlider">--}}

{{--                    <div class="swiper-container cars">--}}
{{--                        <div class="swiper-wrapper">--}}
{{--                            <div class="swiper-slide">--}}
{{--                                <div class="swipper-contents  ">--}}
{{--                                    <div style="border-radius: 8px;" class=" d-flex bg-white p-2 justify-content-between">--}}
{{--                                        <p style="color: #777777;"> 10 / 10 / 2021</p>--}}
{{--                                        <p style="color: gold;">--}}
{{--                                            <i class="fad fa-star"></i>--}}
{{--                                            <i class="fad fa-star"></i>--}}
{{--                                            <i class="fad fa-star"></i>--}}
{{--                                            <i class="fad fa-star"></i>--}}
{{--                                            <i class="fad fa-star"></i>--}}
{{--                                        </p>--}}

{{--                                    </div>--}}
{{--                                    <p class="font-weight-bold py-3"> أحمد سمير </p>--}}
{{--                                    <p class="pb-3"> دكتور ممتاز جدا </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="swiper-slide">--}}
{{--                                <div class="swipper-contents  ">--}}
{{--                                    <div style="border-radius: 8px;" class=" d-flex bg-white p-2 justify-content-between">--}}
{{--                                        <p style="color: #777777;"> 10 / 10 / 2021</p>--}}
{{--                                        <p style="color: gold;">--}}
{{--                                            <i class="fad fa-star"></i>--}}
{{--                                            <i class="fad fa-star"></i>--}}
{{--                                            <i class="fad fa-star"></i>--}}
{{--                                            <i class="fad fa-star"></i>--}}
{{--                                            <i class="fad fa-star"></i>--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                    <p class="font-weight-bold py-3"> أحمد سمير </p>--}}
{{--                                    <p class="pb-3"> دكتور ممتاز جدا </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="swiper-slide">--}}
{{--                                <div class="swipper-contents  ">--}}
{{--                                    <div style="border-radius: 8px;" class=" d-flex bg-white p-2 justify-content-between">--}}
{{--                                        <p style="color: #777777;"> 10 / 10 / 2021</p>--}}
{{--                                        <p style="color: gold;">--}}
{{--                                            <i class="fad fa-star"></i>--}}
{{--                                            <i class="fad fa-star"></i>--}}
{{--                                            <i class="fad fa-star"></i>--}}
{{--                                            <i class="fad fa-star"></i>--}}
{{--                                            <i class="fad fa-star"></i>--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                    <p class="font-weight-bold py-3"> أحمد سمير </p>--}}
{{--                                    <p class="pb-3"> دكتور ممتاز جدا </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}


{{--                            <div class="swiper-slide">--}}
{{--                                <div class="swipper-contents  ">--}}
{{--                                    <div style="border-radius: 8px;" class=" d-flex bg-white p-2 justify-content-between">--}}
{{--                                        <p style="color: #777777;"> 10 / 10 / 2021</p>--}}
{{--                                        <p style="color: gold;">--}}
{{--                                            <i class="fad fa-star"></i>--}}
{{--                                            <i class="fad fa-star"></i>--}}
{{--                                            <i class="fad fa-star"></i>--}}
{{--                                            <i class="fad fa-star"></i>--}}
{{--                                            <i class="fad fa-star"></i>--}}
{{--                                        </p>--}}

{{--                                    </div>--}}


{{--                                    <p class="font-weight-bold py-3"> أحمد سمير </p>--}}
{{--                                    <p class="pb-3"> دكتور ممتاز جدا </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <!-- <a href="#!" class="swiper-slide "><img src="img/cars/dodge-icon.jpg"></a> -->--}}
{{--                        </div>--}}
{{--                        <!-- Add Arrows -->--}}
{{--                        <!-- <div class="swiper-button-next"></div>--}}
{{--                          <div class="swiper-button-prev"></div> -->--}}
{{--                    </div>--}}

{{--                </section>--}}


{{--            </div>--}}

        </div>
        <div class="doctors-page py-5">
            <div class="doctors mt-5">
                <div class="container">
                    <div class="row">
                        @foreach($hospital->doctors as $doctor)
                            <div class=" col-lg-6 mb-3">
                                <a href="{{url('doctor_profile',$doctor->id)}}">
                                    <div data-aos="flip-down" class="contents  z-depth-1" style="height: 210px">
                                        <div class="img d-flex justify-content-center">
                                            <img src="{{$doctor->image}}" alt="" srcset="">
                                        </div>
                                        <div class="text">
                                            <!--                  <a href="" class="phone-icon"><i class="fas fa-phone-alt"></i></a>-->
                                            <!--                  <a href="" class="video-icon"><i class="fas fa-video"></i></a>-->
                                            <div class="rate">
                                                <p><span class="font-weight-bold text-danger">{{$doctor->rating}} </span> / 5 <a href=""> <i
                                                            class="fad fa-star"></i> </a>
                                                </p>
                                            </div>

                                            <a class=" py-2 font-weight-bold text-center"> {{$doctor->name}} </a>
                                            <div class="my-custom-div mt-2">
                                                <p><i class="fad fa-medal"></i> التخصص : {{$doctor->category->name}} </p>
                                            </div>
                                            <div class="my-custom-div mt-2">
                                                <p><i class="fad fa-map-marked"></i> العنوان : {{$doctor->location}}
                                                </p>
                                            </div>
                                            <div class="my-custom-div mt-2">
                                                <p><i class="fad fa-wallet"></i> السعر : <span
                                                        class="font-weight-bold text-danger"> {{$doctor->price}} </span> جنيه</p>
                                            </div>

                                            <div class="btn-div d-flex justify-content-center pt-2 pb-2">
                                                <a href="{{url('doctor_profile',$doctor->id)}}" class="btn">عرض التفاصيل</a>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade " id="exampleModalCenter" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

            <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">


                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-center">
                        <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle"> الايام المتاحة </h5>

                    </div>
                    <form action="{{url('reservation')}}" id="my_form" method="get">
                        <input type="hidden" value="{{$hospital->id}}" id="hospital_id" name="hospital_id">
                        <input type="hidden" id="reservation_date" name="date">
                        <div class="modal-body">
                            <section class="CarsSlider" style="padding: 0;">
                                <div class="container">
                                    <h4 class="font-weight-bold mb-3"> أختر اليوم </h4>

                                    <div class="swiper-container cars">
                                        <div class="swiper-wrapper">
                                            @foreach($dates as $date)
                                                <div class="swiper-slide day">
                                                    <div class="contents" data-date="{{$date['full_date']}}">
                                                        <p class="text-center mb-3"> {{$date['month_ar']}}</p>
                                                        <h4 class="text-center font-weight-bold"> {{$date['day_number']}} </h4>
                                                        <p class="week"> {{$date['day_ar']}} </p>
                                                    </div>
                                                </div>
                                        @endforeach
                                        <!-- <a href="#!" class="swiper-slide "><img src="img/cars/dodge-icon.jpg"></a> -->
                                        </div>
                                        <!-- Add Arrows -->
{{--                                         <div class="swiper-button-next"></div>--}}
{{--                                        <div class="swiper-button-prev"></div>--}}
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="modal-footer text-center d-flex justify-content-center">
                            <button type="submit" id="submit" class="btn bg-info text-white"><a class="text-white">إستكمال</a></button>
                            <button type="button" class="btn bg-danger text-white" data-dismiss="modal"> إلغاء</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>

@endsection
@push('web_js')

{{--    <script>--}}
{{--        var swiper = new Swiper('.cars', {--}}
{{--            navigation: {--}}
{{--                nextEl: '.swiper-button-next',--}}
{{--                prevEl: '.swiper-button-prev',--}}
{{--            },--}}
{{--            breakpoints: {--}}
{{--                640: {--}}
{{--                    slidesPerView: 2,--}}
{{--                    spaceBetween: 20,--}}
{{--                },--}}
{{--                768: {--}}
{{--                    slidesPerView: 2,--}}
{{--                    spaceBetween: 40,--}}
{{--                },--}}
{{--                1024: {--}}
{{--                    slidesPerView: 3,--}}
{{--                    spaceBetween: 50,--}}
{{--                },--}}
{{--            },--}}
{{--            speed: 1000,--}}
{{--            loop: true,--}}
{{--            autoplay: {--}}
{{--                delay: 1500,--}}
{{--                disableOnInteraction: false,--}}
{{--            },--}}
{{--        });--}}
{{--    </script>--}}


{{--    <script>--}}

{{--        $(document).on('click', '.contents', function (e) {--}}
{{--            e.preventDefault();--}}
{{--            var op = $(this)--}}
{{--            var content_classes = document.getElementsByClassName("contents");--}}

{{--            for (var i = 0; i < content_classes.length; i++) {--}}
{{--                $(content_classes[i]).removeClass('my-active')--}}
{{--            }--}}

{{--            op.addClass('my-active')--}}
{{--            $('#reservation_date').val(op.data('date'))--}}
{{--        })--}}


{{--    </script>--}}

@endpush

