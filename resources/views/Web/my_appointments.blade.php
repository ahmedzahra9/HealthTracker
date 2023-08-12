@extends('layouts.web.app')
@section('site_content')

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

@endsection
