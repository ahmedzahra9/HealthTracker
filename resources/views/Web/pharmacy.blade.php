@extends('layouts.web.app')
@section('site_content')
<section class="chose-doctor position-relative" style="height: 45vh;">
    <div class="container py-4">
        <div class="row mx-auto" style=" position: absolute;
      width: 85%; bottom: -40px">
            <div class="col-md-8 mx-auto">
                <form action="">
                    <div class="select-div p-4 z-depth-1">
                        <a href="" style="padding: 20px" class="btn chose-doctor-search"> بحث عن
                            صيدلية</a>
                    </div>
                </form>
                <form action="">
                    <div class="select-div doctor-filter p-4 z-depth-1 justify-content-center">
                        <div class="form-group">
                            <select name="" class="select2" id="">
                                <option value="" disabled selected> الترتيب على حسب التقييم</option>
                                <option value=""> الاقل تقييما </option>
                                <option value=""> الاعلى تقييما </option>
                            </select></div>
                        <div class="form-group">
                            <select name="" class="select2" id="">
                                <option value="" disabled selected> الترتيب على حسب القرب</option>
                                <option value=""> الاقرب </option>
                                <option value=""> الابعد </option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////          //////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<div class="doctors-page py-5">
    <div class="doctors mt-5">
        <div class="container">
            <div class="row">
                <div class=" col-lg-6 mb-3">
                    <a href="">
                        <div data-aos="flip-down" class="contents  z-depth-1" style="height: 150px">
                            <div class="img d-flex justify-content-center">
                                <img src="{{url('Web')}}/img/charity-logos/insurance9.jpg" alt="" srcset="">
                            </div>
                            <div class="text">
                                <!--                  <a href="" class="phone-icon"><i class="fas fa-phone-alt"></i></a>-->
                                <!--                  <a href="" class="video-icon"><i class="fas fa-video"></i></a>-->
                                <div class="rate">
                                    <p><span class="font-weight-bold text-danger">4.8 </span> / 5 <a href=""> <i
                                            class="fad fa-star"></i> </a>
                                    </p>
                                </div>

                                <a class=" py-2 font-weight-bold text-center"> صيدلية أمانة </a>
{{--                                <div class="my-custom-div mt-2">--}}
{{--                                    <p><i class="fad fa-medal"></i> التخصص : أنف وأذن </p>--}}
{{--                                </div>--}}
                                <div class="my-custom-div mt-2">
                                    <p><i class="fad fa-map-marked"></i> العنوان : شبين الكوم
                                    </p>
                                </div>
{{--                                <div class="my-custom-div mt-2">--}}
{{--                                    <p><i class="fad fa-wallet"></i> السعر : <span--}}
{{--                                            class="font-weight-bold text-danger"> 200 </span> جنيه</p>--}}
{{--                                </div>--}}

                                <div class="btn-div d-flex justify-content-center pt-2 pb-2">
                                    <a href="" class="btn">عرض التفاصيل</a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class=" col-lg-6 mb-3">
                    <a href="">
                        <div data-aos="flip-down" class="contents  z-depth-1" style="height: 150px">
                            <div class="img d-flex justify-content-center">
                                <img src="{{url('Web')}}/img/charity-logos/insurance10.jpg" alt="" srcset="">
                            </div>
                            <div class="text">
                                <!--                  <a href="" class="phone-icon"><i class="fas fa-phone-alt"></i></a>-->
                                <!--                  <a href="" class="video-icon"><i class="fas fa-video"></i></a>-->
                                <div class="rate">
                                    <p><span class="font-weight-bold text-danger">4.5 </span> / 5 <a href=""> <i
                                            class="fad fa-star"></i> </a>
                                    </p>
                                </div>

                                <a class=" py-2 font-weight-bold text-center"> صيدلية سلامة </a>
{{--                                <div class="my-custom-div mt-2">--}}
{{--                                    <p><i class="fad fa-medal"></i> التخصص : أنف وأذن </p>--}}
{{--                                </div>--}}
                                <div class="my-custom-div mt-2">
                                    <p><i class="fad fa-map-marked"></i> العنوان : منوف
                                    </p>
                                </div>
{{--                                <div class="my-custom-div mt-2">--}}
{{--                                    <p><i class="fad fa-wallet"></i> السعر : <span--}}
{{--                                            class="font-weight-bold text-danger"> 200 </span> جنيه</p>--}}
{{--                                </div>--}}

                                <div class="btn-div d-flex justify-content-center pt-2 pb-2">
                                    <a href="" class="btn">عرض التفاصيل</a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class=" col-lg-6 mb-3">
                    <a href="">
                        <div data-aos="flip-down" class="contents  z-depth-1" style="height: 150px">
                            <div class="img d-flex justify-content-center">
                                <img src="{{url('Web')}}/img/charity-logos/insurance16.jpg" alt="" srcset="">
                            </div>
                            <div class="text">
                                <!--                  <a href="" class="phone-icon"><i class="fas fa-phone-alt"></i></a>-->
                                <!--                  <a href="" class="video-icon"><i class="fas fa-video"></i></a>-->
                                <div class="rate">
                                    <p><span class="font-weight-bold text-danger">5 </span> / 5 <a href=""> <i
                                            class="fad fa-star"></i> </a>
                                    </p>
                                </div>

                                <a class=" py-2 font-weight-bold text-center"> صيدلية العربية </a>
{{--                                <div class="my-custom-div mt-2">--}}
{{--                                    <p><i class="fad fa-medal"></i> التخصص : أنف وأذن </p>--}}
{{--                                </div>--}}
                                <div class="my-custom-div mt-2">
                                    <p><i class="fad fa-map-marked"></i> العنوان : البتانون
                                    </p>
                                </div>
{{--                                <div class="my-custom-div mt-2">--}}
{{--                                    <p><i class="fad fa-wallet"></i> السعر : <span--}}
{{--                                            class="font-weight-bold text-danger"> 200 </span> جنيه</p>--}}
{{--                                </div>--}}

                                <div class="btn-div d-flex justify-content-center pt-2 pb-2">
                                    <a href="" class="btn">عرض التفاصيل</a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class=" col-lg-6 mb-3">
                    <a href="">
                        <div data-aos="flip-down" class="contents  z-depth-1" style="height: 150px">
                            <div class="img d-flex justify-content-center">
                                <img src="{{url('Web')}}/img/charity-logos/insurance33.jpg" alt="" srcset="">
                            </div>
                            <div class="text">
                                <!--                  <a href="" class="phone-icon"><i class="fas fa-phone-alt"></i></a>-->
                                <!--                  <a href="" class="video-icon"><i class="fas fa-video"></i></a>-->
                                <div class="rate">
                                    <p><span class="font-weight-bold text-danger">3 </span> / 5 <a href=""> <i
                                            class="fad fa-star"></i> </a>
                                    </p>
                                </div>

                                <a class=" py-2 font-weight-bold text-center"> صيدلية التعاونية </a>
{{--                                <div class="my-custom-div mt-2">--}}
{{--                                    <p><i class="fad fa-medal"></i> التخصص : أنف وأذن </p>--}}
{{--                                </div>--}}
                                <div class="my-custom-div mt-2">
                                    <p><i class="fad fa-map-marked"></i> العنوان : تلا
                                    </p>
                                </div>
{{--                                <div class="my-custom-div mt-2">--}}
{{--                                    <p><i class="fad fa-wallet"></i> السعر : <span--}}
{{--                                            class="font-weight-bold text-danger"> 200 </span> جنيه</p>--}}
{{--                                </div>--}}

                                <div class="btn-div d-flex justify-content-center pt-2 pb-2">
                                    <a href="" class="btn">عرض التفاصيل</a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


            </div>
        </div>
    </div>
</div>

@endsection
