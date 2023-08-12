@extends('layouts.web.app')
@section('site_content')

    <section class="chose-doctor position-relative" style="height: 45vh;">
        <div class="container py-4">
            <div class="row" style=" margin-right: -10px;   position: absolute;
      width: 85%; bottom: -40px ">
                <div class="col-md-8 mx-auto">
                    <form action="">
                        <div class="select-div p-4 z-depth-1">
                            <div class="form-group w-100">
                                <label for="">
                                    <i class="fal fa-bookmark"></i>
                                    إختر المستشفي
                                </label>
                                <select name="" class="select2" id="category_id">
                                    <option value="" disabled selected> يرجى إختيار التخصص</option>
                                    @foreach($all_categories as $category)
                                        <option
                                            {{$category->id == $selected_category?'selected':''}} value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <a href="{{url('hospitals')}}" style="padding: 20px"
                               class="btn chose-doctor-search doctor_form"> بحث عن مستشفي</a>
                        </div>
                    </form>
                    <form action="">
                        <div class="select-div doctor-filter p-4 z-depth-1 justify-content-between">
                            <div class="form-group">
                                <select name="" class="select2" id="price">
                                    <option value="" disabled selected> الترتيب على حسب السعر</option>
                                    <option {{$selected_price=='asc'?'selected':''}} value="asc"> الاقل سعرا</option>
                                    <option {{$selected_price=='desc'?'selected':''}} value="desc"> الاعلى سعرا</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="" class="select2" id="rate">
                                    <option value="" disabled selected> الترتيب على حسب التقييم</option>
                                    <option {{$selected_rate=='asc'?'selected':''}} value="asc"> الاقل تقييما</option>
                                    <option {{$selected_rate=='desc'?'selected':''}} value="desc"> الاعلى تقييما
                                    </option>
                                </select></div>
                            <div class="form-group">
                                <select name="" class="select2" id="location_ar">
                                    <option value="" disabled selected> الترتيب على حسب القرب</option>
                                    <option {{$selected_location_ar=='asc'?'selected':''}} value="asc"> الاقرب</option>
                                    <option {{$selected_location_ar=='desc'?'selected':''}} value="desc"> الابعد
                                    </option>
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
                    @foreach($hospitals as $hospital)
                        <div class=" col-lg-6 mb-3">
                            <a href="{{url('hospital_profile',$hospital->id)}}">
                                <div data-aos="flip-down" class="contents  z-depth-1">
                                    <div class="img d-flex justify-content-center">
                                        <img src="{{$hospital->image}}" alt="" srcset="">
                                    </div>
                                    <div class="text">
                                        <!--                  <a href="" class="phone-icon"><i class="fas fa-phone-alt"></i></a>-->
                                        <!--                  <a href="" class="video-icon"><i class="fas fa-video"></i></a>-->
                                        <div class="rate">
                                            <p><span class="font-weight-bold text-danger">{{$hospital->rating}} </span> /
                                                5 <a href=""> <i class="fad fa-star"></i> </a>
                                            </p>
                                        </div>

                                        <a class=" py-2 font-weight-bold text-center"> {{$hospital->name}} </a>
                                        <div class="my-custom-div mt-2">
                                            <p><i class="fad fa-map-marked"></i> العنوان : {{$hospital->location}}
                                            </p>
                                        </div>
                                        <div class="my-custom-div mt-2">
                                            <p><i class="fad fa-th-list"></i> التخصص : {{$hospital->category->name}}
                                            </p>
                                        </div>
                                        <div class="btn-div d-flex justify-content-center pt-2 pb-2">
                                            <a href="{{url('hospital_profile',$hospital->id)}}" class="btn">عرض
                                                التفاصيل</a>
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
@endsection

@push('web_js')
    <script>
        $(document).on('click', '.doctor_form', function (e) {
            e.preventDefault()
            var category_id = $('#category_id').val()
            var price = $('#price').val()
            var rate = $('#rate').val()
            var location_ar = $('#location_ar').val()
            var url = $(this).attr('href')
            location.href = url + "?category_id=" + category_id +
                '&price=' + price + '&rate=' + rate + '&location_ar=' + location_ar;
        })
    </script>

@endpush
