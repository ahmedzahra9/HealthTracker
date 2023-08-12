@extends('layouts.web.app')

@section('site_content')

    <div class="doctor-profile   pb-5">

        <div class="container">

            <form action="{{url('store_reservation')}}" id="form" method="post">
                @csrf
                @if($type=='doctor')
                    <input type="hidden" name="doctor_id" value="{{$doctor->id}}">
                @else
                    <input type="hidden" name="hospital_id" value="{{$hospital->id}}">
                @endif
                <input type="hidden" name="date" value="{{$date}}">
                <div class="additional-informations mt-4  ">
                    <h5 class="text-center py-3">معلومات إضافية {{--<small>( اختياري )</small>--}}</h5>
                    <div class="row pt-4">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="Specialization"> <span class="flaticon-medal"><i
                                            class="fad fa-calendar-day"></i></span>
                                    موعد الحجز </label>
                                <input type="date" disabled class="form-control"
                                       placeholder=" {{$day_ar}}  {{date('d',strtotime($date))}}  {{$month_ar}}  "
                                       style="height: 50px;">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="Specialization"> <span class="flaticon-medal"><i
                                            class="fal fa-user"></i></span> الإسم
                                    بالكامل </label>
                                <input type="text" name="name" class="form-control" style="height: 50px;">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="Specialization"> <span class="flaticon-medal"><i
                                            class="fad fa-phone"></i></span> رقم الجوال
                                </label>
                                <input name="phone" type="text" class="form-control numbersOnly" style="height: 50px;">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="Specialization"> <span class="flaticon-medal"><i
                                            class="fad fa-stethoscope"></i></span>
                                    النوع </label>
                                <select  class=" select2" name="gender">
                                    <option value="male"> ذكر</option>
                                    <option value="female"> أنثى</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="Specialization"> <span class="flaticon-medal"><i
                                            class="fad fa-stethoscope"></i></span>
                                    العمر </label>
                                <select class=" select2" name="age">
                                    @if($type=='doctor')
                                        @for($i = $doctor->age_from; $i <= $doctor->age_to ; $i++)
                                            <option value="{{$i}}"> {{$i}}</option>
                                        @endfor
                                    @else
                                        @for($i = $hospital->age_from; $i <= $hospital->age_to ; $i++)
                                            <option value="{{$i}}"> {{$i}}</option>
                                        @endfor
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="Specialization"> <span class="flaticon-medal"><i
                                            class="fad fa-stethoscope"></i></span>
                                    أمراض مزمنة </label>
                                <select class=" select2 multiple" >
                                    @foreach($diseases as $disease)
                                    <option value="{{$disease->id}}"> {{$disease->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 ">
                            <div class="form-group">
                                <label for="Specialization"> <span class="flaticon-medal"><i
                                            class="fal fa-paperclip"></i></span> رفع
                                    تقرير أو أشعه أو ملفات </label>
                                <input type="file" data-default-file="إضغط  " name="image" class="dropify">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 ">
                            <div class="form-group">
                                <label for="Specialization"> <span class="flaticon-medal"><i
                                            class="fal fa-paper-plane"></i></span>  ملاحظات
                                    </label>
                                <textarea name="notes" class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-100 d-flex pt-4 justify-content-center">
                    <button type="submit" class="btn btn-book"> تأكيد الحجز</button>
                </div>
            </form>
        </div>
    </div>

@endsection
@include('layouts.web.inc.ajax')
