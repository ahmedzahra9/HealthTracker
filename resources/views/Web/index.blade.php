@extends('layouts.web.app')
@section('site_content')

    <div class="hero-section" >
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <section class="main">
                        <!-- Swiper -->
                        <div class="swiper-container  gallery-top">
                            <div class="swiper-wrapper">
                                @foreach($sliders as $slider)
                                    <div class="swiper-slide" style="background-image:url({{$slider->image}})"></div>
                                @endforeach
                            </div>
                        </div>
                        <div class="  gallery-thumbs">
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!--/////////////////////////////     cloud       /////////////////////////////////////////-->
    <section class="cloud  py-5" id="about">
        <div class="container">
            <div class="row py-5">
                <div class="col-md-6 d-flex align-items-center">
                    <div class="contents">
                        <h4 class="cloud-heading ">مرحبا بكم في Health Tracker</h4>
                        <div class="bar mb-4"></div>
                        <p class="cloud-p" data-aos="zoom-in" data-aos-duration="1100">
                            يعد الموقع واحد من أكبر مقدمي الخدمات الطبية والرعاية
                            المتميزة بالانترنت , مع توافر أحدث جميع الخدمات
                            الطبية الحديثة, ويقدم
                            الموقع خدماته وفقآ لأحدث المعاييرالعلمية
                            المتعارف عليها وتحت إشراف طاقمآ متميزآ من
                            البروفيسرات والإستشاريين والأخصائيين لعلاج
                            جميع الحالات والحالات المستعصية ويساندة
                            طاقمآ إداريآ للعمل على إرضاء مراجعينا
                            والإعتناء بهم وبما يتناسب مع توقعاتهم
                        </p>
                    </div>
                </div>
                <div class="col-md-6 vv  d-flex align-items-center justify-content-center">
                    <img class="cloud-img" src="{{url('Web')}}/img/city2.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////              //////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!-- newslater-area -->
    <section class="newslater-area pb-5"
             style="background-image: url({{url('Web')}}/img/an-bg06.png);background-position: center bottom; background-repeat: no-repeat;">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-xl-4 col-lg-4 col-lg-4">
                    <div class="section-titlee">
                        <span>صحتك لايف</span>
                        <h2>إستشارات فيديو</h2>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <form id="contact-form4" class="contact-form newslater  ">
                        <div class="form-group">
                            <a href="{{url('doctors')}}" class="btn btn-custom">طلب إستشارة <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </form>
                </div>
                <div class="col-xl-4 col-lg-4 doc-div" style="display: flex;
          justify-content: flex-end;">
                    <img class="doc-img" src="{{url('Web')}}/img/news-illustration.png">
                </div>
            </div>
        </div>
    </section>
    <!-- newslater-aread-end -->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////  مستشفى  صيدلية        //////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <div class="pharma-hosp">
        <div class="container">
            <div class="row py-5">
                <div class="col-lg-6 mb-2" onclick="location.href = '{{url("hospitals")}}'">
                    <div class="contents p-2" data-aos="zoom-in-down">
                        <div class="row py-2">
                            <div class=" col-7 d-flex align-items-center">
                                <div class="text">
                                    <a class="font-weight-bold  ">مستشفى</a>
                                    <p>احجز موعد في المستفي مع أطباء متخصصين في جميع المجالات</p>
                                </div>
                            </div>
                            <div class="img d-flex justify-content-end p-0 col-5">
                                <img width="auto" height="115px" src="{{url('Web')}}/img/hospital.png" alt="" srcset="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-2" onclick="location.href = '{{url("pharmacy")}}'">
                    <div class="contents p-2" data-aos="zoom-in-down">
                        <div class="row py-2">
                            <div class=" col-7 d-flex align-items-center">
                                <div class="text">
                                    <a class="font-weight-bold my-3">صيدلية</a>
                                    <p>اطلب الادوية من اقرب صيدلية</p>
                                </div>
                            </div>
                            <div class="img d-flex justify-content-end p-0 col-5">
                                <img width="auto" height="115px" src="{{url('Web')}}/img/pharma.png" alt="" srcset="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////     doctor-chose        //////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <section class="chose-doctor ">
        <div class="container py-4">
            <h2 class="py-5 mb-4 title text-white text-center">
                ابحث عن طبيب أو مستشفي
            </h2>
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <form action="" >
                        <div class="select-div p-4">
                            <div class="form-group w-100">
                                <label for="">
                                    <i class="fal fa-bookmark"></i>
                                    إختر التخصص
                                </label>
                                <select name="" class="select2" id="category_id">
                                    <option value="" disabled selected> يرجى إختيار التخصص </option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" formaction="{{url('doctors')}}" class="btn chose-doctor-search btn-lg doctor_form" > بحث عن <br> طبيب</button>
                            <button type="submit" formaction="{{url('hospitals')}}" class="btn chose-doctor-search doctor_form"> بحث عن مستشفي </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!-- Start Counter Area -->
    <section class="counter-area py-5" id="services" style="direction: ltr;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-6" data-aos="zoom-in" data-aos-duration="1100">
                    <div class="single-counter">
                        <h2>
                            <i class="fad fa-hand-holding-heart mr-1"></i> <br> <span class="odometer" data-count="420">00</span>
                        </h2>
                        <p> علاج مخفض </p>
                        <div class="counter-shape">
                            <!-- <img src="{{url('Web')}}/img/counter-shape.png" alt="Image"> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6" data-aos="zoom-in" data-aos-duration="1100">
                    <div class="single-counter">
                        <h2>
                            <i class="fad fa-user-md"></i><br> <span class="odometer" data-count="430">00</span>
                        </h2>
                        <p> طبيب</p>
                        <div class="counter-shape">
                            <!-- <img src="{{url('Web')}}/img/counter-shape.png" alt="Image"> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6" data-aos="zoom-in" data-aos-duration="1100">
                    <div class="single-counter">
                        <h2>
                            <i class="fad fa-hand-holding-medical ml-1"></i> <br> <span class="odometer" data-count="155">00</span>
                        </h2>
                        <p> صيدلية </p>
                        <div class="counter-shape">
                            <!-- <img src="{{url('Web')}}/img/counter-shape.png" alt="Image"> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6" data-aos="zoom-in" data-aos-duration="1100">
                    <div class="single-counter">
                        <h2>
                            <i class="fad fa-bed mr-1"></i> <br> <span class="odometer" data-count="248">00</span>
                            <!-- <span class="target">%</span> -->
                        </h2>
                        <p>مستشفي </p>
                        <div class="counter-shape">
                            <!-- <img src="{{url('Web')}}/img/counter-shape.png" alt="Image"> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Counter Area -->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////          //////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////          //////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////          //////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!-- <section class="CarsSlider">
      <div class="container">
        <div class=" Title ">
          <h2> شركات التأمين </h2>
        </div>
        <div class="swiper-container cars">
          <div class="swiper-wrapper">
            <a href="#!" class="swiper-slide "><img src="{{url('Web')}}/img/charity-logos/insurance10.jpg"></a>
            <a href="#!" class="swiper-slide "><img src="{{url('Web')}}/img/charity-logos/insurance11.jpg"></a>
            <a href="#!" class="swiper-slide "><img src="{{url('Web')}}/img/charity-logos/insurance12.jpg"></a>
            <a href="#!" class="swiper-slide "><img src="{{url('Web')}}/img/charity-logos/insurance14.jpg"></a>
            <a href="#!" class="swiper-slide "><img src="{{url('Web')}}/img/charity-logos/insurance15.jpg"></a>
            <a href="#!" class="swiper-slide "><img src="{{url('Web')}}/img/charity-logos/insurance16.jpg"></a>
            <a href="#!" class="swiper-slide "><img src="{{url('Web')}}/img/charity-logos/insurance22.jpg"></a>
            <a href="#!" class="swiper-slide "><img src="{{url('Web')}}/img/charity-logos/insurance33.jpg"></a>
            <a href="#!" class="swiper-slide "><img src="{{url('Web')}}/img/charity-logos/insurance8.jpg"></a>
            <a href="#!" class="swiper-slide "><img src="{{url('Web')}}/img/charity-logos/insurance9.jpg"></a>
           </div>
        </div>
      </div>
    </section> -->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////          //////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <div class="app--download" >
        <!-- Section -->
        <section class="app-download" id="app-download" data-aos="fade-up">
            <div class="over-lay"></div>
            <div class=" ">
                <div class="container my-5">
                    <!-- Grid row -->
                    <div class="row align-items-center  ">
                        <!-- Grid column -->
                        <div class="col-lg-6">
                            <h3 class="font-weight-bold pb-2">
                                حمل تطبيق <span class="px-3 mx-1 py-2 pb-3"> Health Tracker </span>
                            </h3>
                            <br />
                            <div class="line">
                                <img src="{{url('Web')}}/img/linecoffe.png" width="30%" alt="" />
                            </div>
                            <p class="lead pt-5 mb-5">
                                يمكنك الان تحميل التطبيق الي جوالك من خلال google play او app
                                store بادر الان بالتحميل
                            </p>
                            <div class="store-btns">
                                <a href="#" class="btn mybtn down-option">جوجل بلاي
                                    <i class="fab fa-2x pr-2 fa-google-play"></i></a>
                                <a href="#" class="btn mybtn down-option">
                                    متجر أبل<i class="fab fa-apple fa-2x pr-2"></i></a>
                            </div>
                        </div>
                        <!-- Grid column -->
                        <!-- Grid column -->
                        <div class="col-lg-4 d-flex justify-content-center offset-lg-2 wow fadeInUpBig" data-wow-delay=".2s">
                            <img src="{{url('Web')}}/Capture2_iphone13miniblue_portrait.png" alt="Sample image" class="img-fluid"
                                 style="height: 400px !important;" />
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </div>
        </section>
        <!-- Section -->
    </div>

@endsection
@push('web_js')
    <script>
        $(document).on('click','.doctor_form',function (e){
            e.preventDefault()
            var category_id = $('#category_id').val()
            var url = $(this).attr('formaction')
            location.href = url+"?category_id="+category_id
        })
    </script>

@endpush
