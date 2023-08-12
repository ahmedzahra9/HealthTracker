@extends('layouts.web.app')


@section('site_content')
    <div class="profile-of-doctor py-5">

        <div class="container">
            <div>
                <div class="content p-5">
                    <div class="doc-img">
                        <img src="{{$doctor->image}}" alt="">
                    </div>

                    <div class="text-place p-4 align-items-center">
                        <h4> {{$doctor->name}} </h4>
                        <p class="country  pb-3">
                            <img src="img/icons/Egypt.png" class="ml-2 " width="20px" height="16px" alt="">
                            مصر
                        </p>
                        <p> التخصص : <span> {{$doctor->category->name}}  </span></p>
                        <p> التصنيف : <span> {{$doctor->degree->name}}   </span></p>
                        <p> المؤهلات العلمية :<span> {{$doctor->description}}</span></p>
                        <p> العنوان : <span>  {{$doctor->location_ar}}   </span></p>
                        <p> السعر : <span class="text-danger"> {{$doctor->price}} </span> جنيه</p>
                    </div>

                </div>
                @if(auth()->check())
                    <div class="w-100 pt-3 d-flex justify-content-center">
                        <button class="btn btn-book " data-toggle="modal" data-target="#exampleModalCenter"> حجز موعد
                        </button>
                    </div>
                @endif
            </div>
            @if(doctor()->check())
                <div class="my-appointments">
                    <!-- <div class="banner-profile py-5  d-flex align-items-center justify-content-center">
                    </div> -->
                    <div class="doctors py-5">
                        <div class="container">
                            <div class="row">
                                @foreach($reservations as $reservation)
                                    <div class=" col-lg-6 mb-5 p-1">
                                        <a href="{{url('patient_profile',$reservation->user_id )}}">
                                            <div data-aos="flip-down" class="contents  z-depth-1">
                                                <i class="fal fa-calendar-alt appoi-icon"></i>
                                                <span class="appoi"> {{$reservation->day_ar}} {{date('d',strtotime($reservation->date))}} {{$reservation->month_ar}} {{date('Y',strtotime($reservation->date))}} </span>
                                                <div class="img d-flex justify-content-center">
                                                    <img src="{{$reservation->doctor?$reservation->doctor->image:$reservation->hospital->image}}" alt=""
                                                         srcset="">
                                                </div>
                                                <div class="text">
                                                    <a class=" py-2 font-weight-bold text-center"> {{$reservation->user->name}} </a>
                                                    <div class="my-custom-div mt-2">
                                                        <p><i class="fad fa-envelope"></i> {{$reservation->user->email}}
                                                        </p>
                                                    </div>
                                                    <div class="my-custom-div mt-2">
                                                        <p><i class="fad fa-phone"></i>{{$reservation->user->phone}}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="w-100 pt-2 three-btns pb-1 position-absolute d-flex justify-content-around">
                                                    <a href=""> <i class="fad fa-map-marked-alt"></i> عرض</a>
                                                    <a target="_blank" href="{{url('following',$reservation->id)}}"> <i class="fal fa-calendar-alt"></i>
                                                        متابعة </a>
                                                    <a href=""> <i class="fal fa-times-circle"></i> إلغاء</a>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="rate px-3  mt-4 py-3">
                <div class="d-flex justify-content-between">
                    <p> <i class="fad fa-map-marker-alt"></i> التقييمات ( من 20 زائر )</p>
                    <p> <span class="font-weight-bold text-danger">4.8 </span> / 5 <a href=""> <i class="fad fa-star"></i> </a>
                    </p>
                </div>


                <section class="CarsSlider">

                    <div class="swiper-container cars">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="swipper-contents  ">
                                    <div style="border-radius: 8px;" class=" d-flex bg-white p-2 justify-content-between">
                                        <p style="color: #777777;"> 10 / 10 / 2021</p>
                                        <p style="color: gold;">
                                            <i class="fad fa-star"></i>
                                            <i class="fad fa-star"></i>
                                            <i class="fad fa-star"></i>
                                            <i class="fad fa-star"></i>
                                            <i class="fad fa-star"></i>
                                        </p>

                                    </div>
                                    <p class="font-weight-bold py-3"> أحمد سمير </p>
                                    <p class="pb-3"> دكتور ممتاز جدا </p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="swipper-contents  ">
                                    <div style="border-radius: 8px;" class=" d-flex bg-white p-2 justify-content-between">
                                        <p style="color: #777777;"> 10 / 10 / 2021</p>
                                        <p style="color: gold;">
                                            <i class="fad fa-star"></i>
                                            <i class="fad fa-star"></i>
                                            <i class="fad fa-star"></i>
                                            <i class="fad fa-star"></i>
                                            <i class="fad fa-star"></i>
                                        </p>
                                    </div>
                                    <p class="font-weight-bold py-3"> أحمد سمير </p>
                                    <p class="pb-3"> دكتور ممتاز جدا </p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="swipper-contents  ">
                                    <div style="border-radius: 8px;" class=" d-flex bg-white p-2 justify-content-between">
                                        <p style="color: #777777;"> 10 / 10 / 2021</p>
                                        <p style="color: gold;">
                                            <i class="fad fa-star"></i>
                                            <i class="fad fa-star"></i>
                                            <i class="fad fa-star"></i>
                                            <i class="fad fa-star"></i>
                                            <i class="fad fa-star"></i>
                                        </p>
                                    </div>
                                    <p class="font-weight-bold py-3"> أحمد سمير </p>
                                    <p class="pb-3"> دكتور ممتاز جدا </p>
                                </div>
                            </div>


                            <div class="swiper-slide">
                                <div class="swipper-contents  ">
                                    <div style="border-radius: 8px;" class=" d-flex bg-white p-2 justify-content-between">
                                        <p style="color: #777777;"> 10 / 10 / 2021</p>
                                        <p style="color: gold;">
                                            <i class="fad fa-star"></i>
                                            <i class="fad fa-star"></i>
                                            <i class="fad fa-star"></i>
                                            <i class="fad fa-star"></i>
                                            <i class="fad fa-star"></i>
                                        </p>

                                    </div>


                                    <p class="font-weight-bold py-3"> أحمد سمير </p>
                                    <p class="pb-3"> دكتور ممتاز جدا </p>
                                </div>
                            </div>

                            <!-- <a href="#!" class="swiper-slide "><img src="img/cars/dodge-icon.jpg"></a> -->
                        </div>
                        <!-- Add Arrows -->
                        <!-- <div class="swiper-button-next"></div>
                          <div class="swiper-button-prev"></div> -->
                    </div>

                </section>


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
                        <input type="hidden" value="{{$doctor->id}}" id="doctor_id" name="doctor_id">
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
                                        <!-- <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div> -->
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


    <script>

        $(document).on('click', '.contents', function (e) {
            e.preventDefault();
            var op = $(this)
            var content_classes = document.getElementsByClassName("contents");

            for (var i = 0; i < content_classes.length; i++) {
                $(content_classes[i]).removeClass('my-active')
            }

            op.addClass('my-active')
            $('#reservation_date').val(op.data('date'))
        })


    </script>

{{--    <script>--}}
{{--        $(document).on('submit',"form#my_form",function (e) {--}}
{{--            e.preventDefault();--}}
{{--            var formData = new FormData(this);--}}
{{--            var url = $(this).attr('action');--}}
{{--            var doctor_id = $('#doctor_id').val();--}}
{{--            var reservation_date = $('#reservation_date').val();--}}
{{--            $.ajax({--}}
{{--                url: url+'?doctor_id='+doctor_id+'&date='+reservation_date,--}}
{{--                type: 'GET',--}}
{{--                data: formData,--}}
{{--                beforeSend: function () {--}}
{{--                    $('#global-loader').show()--}}
{{--                },--}}
{{--                success: function (data) {--}}
{{--                    window.setTimeout(function () {--}}
{{--                        $('#global-loader').hide()--}}
{{--                        $('#submit').attr('disabled', false);--}}
{{--                        if (data.success === 'true') {--}}
{{--                            my_toaster(data.message)--}}
{{--                            location.href = data.url;--}}
{{--                        }else {--}}
{{--                            var messages = Object.values(data.messages);--}}
{{--                            $( messages ).each(function(index, message ) {--}}
{{--                                my_toaster(message,'error')--}}
{{--                            });--}}
{{--                        }--}}
{{--                    }, 100);--}}
{{--                },--}}
{{--                cache: false,--}}
{{--                contentType: false,--}}
{{--                processData: false--}}
{{--            });--}}
{{--        });--}}

{{--    </script>--}}
    <script>
        $(document).on('click','a',function (){
            location.href = $(this).attr('href')
        })
    </script>

@endpush
