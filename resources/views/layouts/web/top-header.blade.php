<?php
$message_count =$notification_count = 0;
$messages = $notifications = [];
if (auth()->check()){
    $messages = \App\Models\Chat::with('doctor')->where(['user_id'=>auth()->user()->id,'sender_type'=>'doctor'])->latest()->paginate(50);
    $message_count = \App\Models\Chat::where(['user_id'=>auth()->user()->id,'sender_type'=>'doctor','checked'=>0])->count();
}elseif (doctor()->check()){
    $messages = \App\Models\Chat::with('user')->where(['doctor_id'=>doctor()->user()->id,'sender_type'=>'user'])->latest()->paginate(50);
    $message_count = \App\Models\Chat::where(['doctor_id'=>doctor()->user()->id,'sender_type'=>'user','checked'=>0])->count();
    $notifications = \App\Models\Following::with('user')->where(['doctor_id'=>doctor()->user()->id])->latest()->paginate(50);
    $notification_count = \App\Models\Following::where(['doctor_id'=>doctor()->user()->id,'checked'=>0])->count();
}

?>
<style>
    .nav-unread.badge {
        position: absolute;
        top: 4px;
        left: 26px;
        display: block !important;
        padding: 3px 5px !important;
        width: 19px;
        height: 1rem;
        border-radius: 50%;
        font-size: 11px;
    }
    .header.app-header .dropdown-menu.dropdown-menu-left {
        top: 43px !important;
        position: absolute;
        transform: translate3d(5px, 45px, 0px);
        top: 0px;
        left: 0px;
        will-change: transform;
    }
    .mCustomScrollbar {
        -ms-touch-action: pinch-zoom;
        touch-action: pinch-zoom;
        position: relative;
        overflow: visible;
    }
    .mCustomScrollBox {
        position: relative;
        overflow: scroll;
        height: 100%;
        max-width: 100%;
        outline: none;
        direction: ltr;
        max-height: 250px;
    }
    .header-right-icons .dropdown-menu a {
        padding-top: 0.5rem;
    }
    .align-self-center {
        -ms-flex-item-align: center !important;
        align-self: center !important;
    }
    .avatar i {
        font-size: 125%;
        vertical-align: sub;
    }
</style>

<div class="container-fluid  mb-lg-0 topHeader">
    <div class="row">
        <div class=" col-md-4 col-12 TopLogo d-flex justify-content-center  align-items-center px-md-5">
            <!-- justify-content-md-end -->
            <a href="{{route('/')}}">
                <img src="{{setting()->logo}}">
            </a>
        </div>
        <div class=" col-md-4 col-12  my-2 d-flex justify-content-center align-items-center">
            <form class=" position-relative search">
                <input class="form-control" type="text" placeholder="كلمات البحث">
                <button type="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
            </form>
            <a href="" class="book_head">إحجز الان</a>
        </div>
        <div
            class=" col-md-4 col-12 d-flex my-2 justify-content-center justify-content-md-center align-items-center px-md-5 ">
            <!-- class socialIcons-->
            <!-- <a href="" style="color: rgb(90, 90, 90);"> english <img src="img/us.png" class="mx-1" alt=""> </a>
              <a href="" style="color: rgb(90, 90, 90);"> العربية <img src="img/sa.png" width="16px" height="11px"
                  class="mx-1" alt=""> </a> -->
            <div class="last_tHead clearfix d-flex justify-content-between align-items-center">
                <!--  <ul class="head_info"> -->

                <!--        <a href="tel:966123456456" target="_blank">-->
                <!--          <li>-->
                <!--            <span><img src="https://dmf.med.sa/wp-content/themes/hospital/images/call-doctor.svg" alt=""></span>-->
                <!--            0123456789-->
                <!--          </li>-->
                <!--        </a>-->
                <!--        <a href="mailto:info@yourhealth.eg" target="_blank">-->
                <!--          <li>-->
                <!--            <span><img src="https://dmf.med.sa/wp-content/themes/hospital/images/letter.svg" alt=""></span>-->
                <!--            info@yourhealth-->
                <!--          </li>-->
                <!--        </a>-->
                <!--        </ul> -->

                <div class="lang_social" style="/*margin-left: 60px;*/">
                    <li class="btns_head_action d-flex align-items-center nav-item menu-item"  style="display: inline-block !important;    position: relative;">



                        <!--          <a href="" class="btn_lang"> En</a>-->
                        @if(!auth()->check() && !auth()->guard('doctor')->check())
                            <li class="nav-item menu-item" style="display: inline-block">
                                <a class="nav-link " style=" color: #0d0d0d" href="{{url('login')}}">تسجيل الدخول </a>
                            </li>
                        @endif
                        @if(auth()->guard('doctor')->check())
                        <li class="nav-item menu-item" style="display: inline-block">
                            <a class="nav-link icon text-center " data-toggle="dropdown" id="notifications_div"
                               style="margin: 5px;padding: 12px;height: 2.5rem;font-size: 1.2rem;position: relative;">
                                <i class="fa fa-bell"></i>
                                {{--                                @if($message_count > 0)--}}
                                <span id="notification_count" style="width: 19px;" class="nav-unread badge badge-danger badge-pill pulse">{{$notification_count}}</span>
                                {{--                                @endif--}}
                            </a>
                            <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow">
                                <div class="notifications-menu2" style="max-height: 268px;overflow: auto;">
                                    @foreach($notifications as $notification)
                                        <a class="dropdown-item d-flex pb-4" href="{{url('following',$notification->reservation_id)}}">
                                    <span style="width: 29px!important;text-align: center!important;border-radius: 20px!important;"
                                          class="avatar ml-3 bl-3 pt-2 align-self-center avatar-md cover-image
                                        bg-light brround">
                                        <i class="fa fa-bell" style="fill:@if($notification->checked==0) rgba(236,10,18,0.5);@else rgba(80,68,68,0.51);@endif
                                            position: relative;bottom: 5px!important;"></i>
                                    </span>
                                            <div>
                                            <span class="font-weight-bold text-@if($notification->checked==0)danger
                                                @else dark
                                                @endif">
                                            {{$notification->message}}
                                            </span>
                                                <div class="small text-primary d-flex">
                                                    {{$notification->user->name}}
                                                </div>
                                                <div class="small text-muted d-flex">
                                                    {{date('Y/m/d',strtotime($notification->created_at))}} &nbsp;
                                                    {{date('h:i:s A',strtotime($notification->created_at))}}
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </li><!-- NOTIFICATIONS -->
                        @endif
                        @if(auth()->check() || auth()->guard('doctor')->check())
                        <li class="nav-item menu-item" style="display: inline-block">
                            <a class="nav-link icon text-center " data-toggle="dropdown" id="notifications_div"
                               style="margin: 5px;padding: 12px;height: 2.5rem;font-size: 1.2rem;position: relative;">
                                <svg xmlns="http://www.w3.org/2000/svg" style="fill: rgba(236,10,18,0.51);" height="24" viewBox="0 0 24 24" width="24">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M20 8l-8 5-8-5v10h16zm0-2H4l8 4.99z" opacity=".3" />
                                    <path d="M4 20h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2zM20 6l-8 4.99L4 6h16zM4 8l8 5 8-5v10H4V8z" /></svg>
{{--                                @if($message_count > 0)--}}
                                    <span id="message_count" style="width: 19px;" class="nav-unread badge badge-danger badge-pill pulse">{{$message_count}}</span>
{{--                                @endif--}}
                            </a>
                            <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow">
                                <div class="notifications-menu" style="max-height: 268px;overflow: auto;">
                                    @foreach($messages as $message)
                                        <a class="dropdown-item d-flex pb-4" href="{{url('following',$message->reservation_id)}}">
                                    <span style="width: 29px!important;text-align: center!important;border-radius: 20px!important;"
                                          class="avatar ml-3 bl-3 pt-2 align-self-center avatar-md cover-image
                                        bg-light brround">
                                        <i class="fa fa-envelope" style="fill:@if($message->checked==0) rgba(236,10,18,0.5);@else rgba(80,68,68,0.51);@endif
                                                                position: relative;bottom: 5px!important;"></i>
                                    </span>
                                            <div>
                                            <span class="font-weight-bold text-@if($message->checked==0)danger
                                                @else dark
                                                @endif">
                                            {{$message->message}}
                                            </span>
                                                <div class="small text-primary d-flex">
                                                    {{$message->doctor?$message->doctor->name:$message->user->name}}
                                                </div>
                                                <div class="small text-muted d-flex">
                                                    {{date('Y/m/d',strtotime($message->created_at))}} &nbsp;
                                                    {{date('h:i:s A',strtotime($message->created_at))}}
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </li><!-- NOTIFICATIONS -->

                        <li class=" nav-item" style="display: inline-block">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="{{url('Web')}}/img/300_9.jpg" class=" useImg">
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="
                        @if(doctor()->check()){{url('doctor_profile',doctor()->user()->id)}}
                                        @else     {{url('patient_profile',auth()->user()->id)}}
                                        @endif"> <i class="fad fa-user mx-2"></i>البروفايل</a>
                                        <a class="dropdown-item" href="{{url('logout')}}"> <i
                                                class="fad fa-power-off mx-2" aria-hidden="true"></i> تسجيل الخروج</a>
                                    </div>
                                </div>
                            </li>
                        @endif

                    </div>
                    <!--        <ul class="head_social clearfix">-->
                    <!--          <li>-->
                    <!--            <a href=" " target="_blank"><i class="fab fa-facebook-f"></i></a>-->
                    <!--          </li>-->
                    <!--          <li>-->
                    <!--            <a href=" " target="_blank"><i class="fab fa-twitter"></i></a>-->
                    <!--          </li>-->
                    <!--          <li>-->
                    <!--            <a href=" " target="_blank"><i class="fab fa-instagram"></i></a>-->
                    <!--          </li>-->
                    <!--          <li>-->
                    <!--            <a href=" " target="_blank"><i class="fab fa-linkedin-in"></i></a>-->
                    <!--          </li>-->
                    <!--        </ul>-->
                </div>
            </div>
        </div>
    </div>
</div>
