@extends('layouts.web.app')

<style>
    html {
        height: 100%;
        margin: 0;
    }

    .chat {
        margin-top: auto;
        margin-bottom: auto;
    }

    .card {
        height: 600px;
        border-radius: 15px !important;
        background-color: rgba(0, 0, 0, 0.4) !important;
    }

    .msg_card_body {
        overflow-y: auto;
    }

    .card-header {
        border-radius: 15px 15px 0 0 !important;
        border-bottom: 0 !important;
    }

    .card-footer {
        border-radius: 0 0 15px 15px !important;
        border-top: 0 !important;
    }

    .type_msg {
        width: 700px;
        background-color: rgba(0, 0, 0, 0.3) !important;
        border: 0 !important;
        border-radius: 15px !important;
        color: white !important;
        height: 60px !important;
        overflow-y: auto;
    }

    .type_msg:focus {
        box-shadow: none !important;
        outline: 0px !important;
    }

    .attach_btn {
        width: 65px;
        border-radius: 15px !important;
        background-color: rgba(0, 0, 0, 0.3) !important;
        border: 0 !important;
        color: white !important;
        cursor: pointer;
        margin-left: 10px;
    }

    .send_btn {
        width: 65px;
        margin-right: 10px;
        border-radius: 15px !important;
        background-color: rgba(0, 0, 0, 0.3) !important;
        border: 0 !important;
        color: white !important;
        cursor: pointer;
    }

    .user_img {
        height: 60px;
        width: 60px;
        border: 1.5px solid #f5f6fa;
    }

    .user_img_msg {
        height: 40px;
        width: 40px;
        border: 1.5px solid #f5f6fa;
    }

    .img_cont {
        position: relative;
        height: 70px;
        width: 70px;
        margin-right: 20px;
    }

    .img_cont_msg {
        height: 40px;
        width: 40px;
    }

    .online_icon {
        position: absolute;
        height: 15px;
        width: 15px;
        background-color: #4cd137;
        border-radius: 50%;
        bottom: 8px;
        right: 8px;
        border: 1.5px solid white;
    }

    .offline {
        background-color: #c23616 !important;
    }

    .user_info {
        margin-top: auto;
        margin-bottom: auto;
        margin-left: 15px;
    }

    .user_info span {
        font-size: 20px;
        color: white;
    }

    .user_info p {
        font-size: 10px;
        color: rgba(255, 255, 255, 0.6);
    }

    .video_cam {
        position: absolute;
        left: 50px;
        margin-top: 20px;
    }

    .video_cam span {
        color: white;
        font-size: 20px;
        cursor: pointer;
        margin-right: 20px;
    }

    .msg_cotainer {
        margin-top: auto;
        margin-bottom: auto;
        margin-left: 10px;
        border-radius: 25px;
        background-color: #82ccdd;
        padding: 10px;
        position: relative;
    }

    .msg_cotainer_send {
        margin-top: auto;
        margin-bottom: auto;
        margin-right: 10px;
        border-radius: 25px;
        background-color: #78e08f;
        padding: 10px;
        position: relative;
    }

    .msg_time {
        position: absolute;
        left: 0;
        bottom: -15px;
        color: rgba(255, 255, 255, 0.5);
        font-size: 10px;
    }

    .msg_time_send {
        position: absolute;
        right: 0;
        bottom: -15px;
        color: rgba(255, 255, 255, 0.5);
        font-size: 10px;
    }

    .msg_head {
        position: relative;
    }

    #action_menu_btn {
        position: absolute;
        right: 15px;
        top: 25px;
        color: white;
        cursor: pointer;
        font-size: 20px;
    }

    .action_menu {
        z-index: 1;
        position: absolute;
        padding: 15px 0;
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        border-radius: 15px;
        top: 30px;
        right: 15px;
        display: none;
    }

    .action_menu ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .action_menu ul li {
        width: 100%;
        padding: 10px 15px;
        margin-bottom: 5px;
    }

    .action_menu ul li i {
        padding-right: 10px;
    }

    .action_menu ul li:hover {
        cursor: pointer;
        background-color: rgba(0, 0, 0, 0.2);
    }

    .nav-pills .nav-link.active,
    .nav-pills .show > .nav-link {
        color: #fff;
        background-color: #be2b2e;
    }

    /* width */

    ::-webkit-scrollbar {
        width: 10px;
    }


    /* Track */

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }


    /* Handle */

    ::-webkit-scrollbar-thumb {
        background: #888;
    }


    /* Handle on hover */

    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    @media (max-width: 576px) {
        .contacts_card {
            margin-bottom: 15px !important;
        }
    }

    .file-uploader {
        width: 955px;
        height: 200px;
        border: 2px dashed #ccc;
        border-radius: 8px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .upload-container {
        text-align: center;
    }

    .upload-icon {
        font-size: 48px;
        color: #888;
    }

    #file-list {
        margin-top: 10px;
        font-size: 16px;
        color: #888;
    }
    #bt{
        position: absolute;
        right: 815px;
        bottom: 17px;
        width: 160px;
        height: 55px;
        border-radius: 7px;
    }
    #bt2{
        position: absolute;
        right: 815px;
        bottom: 17px;
        width: 160px;
        height: 55px;
        border-radius: 7px;

    }
</style>

@section('site_content')
    {{--          ============================================= -->--}}
    <section id="tabs-1" class="pb-5 tabs-section division">
        <div class="container">
            <!-- TABS NAVIGATION -->
            <div id="tabs-nav" class="list-group text-center">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <!-- TAB-1 LINK -->
                    <li class="nav-item icon-xs mb-2">
                        <a class="nav-link active" id="tab1-list" data-toggle="pill" href="#tab-1" role="tab"
                           aria-controls="tab-1"
                           aria-selected="true">
                            <span class="flaticon-083-stethoscope"></span> مراسلة @if(auth()->check())الدكتور @else
                                المريض @endif
                        </a>
                    </li>
                    <!-- TAB-2 LINK -->
                    <li class="nav-item icon-xs mb-2">
                        <a class="nav-link" id="tab2-list" data-toggle="pill" href="#tab-2" role="tab"
                           aria-controls="tab-2"
                           aria-selected="false">
                            <span class="flaticon-005-blood-donation-3"></span>متابعة مع @if(auth()->check())
                                الدكتور @else المريض @endif
                        </a>
                    </li>
                    <li class="nav-item icon-xs mb-2">
                        <a class="nav-link " id="tab3-list" data-toggle="pill" href="#tab-3" role="tab"
                           aria-controls="tab-3"
                           aria-selected="false">
                            <span class="flaticon-083-stethoscope"></span> الأشعة
                        </a>
                    </li>
                    @if(doctor()->check())
                        <li class="nav-item icon-xs mb-2">
                            <a class="nav-link " id="tab4-list" data-toggle="pill" href="#tab-4" role="tab"
                               aria-controls="tab-4"
                               aria-selected="false">
                                <span class="flaticon-070-stethoscope"></span> اضافة تقرير
                            </a>
                        </li>
                    @endif

                </ul>
            </div> <!-- END TABS NAVIGATION -->
            <!-- TABS CONTENT -->
            <div class="tab-content p-0" id="pills-tabContent">
                <!-- TAB-1 CONTENT -->
                <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab1-list">
                    <section class="contact-section ">
                        <div class="row justify-content-center h-100">
                            <div class="col-md-10 col-xl-10 chat">
                                <div class="card">
                                    <div class="card-header msg_head">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont">
                                                <img src="{{$reservation->doctor?$reservation->doctor->image:''}}"
                                                     class="rounded-circle user_img">
                                                <span class="online_icon"></span>
                                            </div>
                                            <div class="user_info">
                                                <span>{{$reservation->doctor?$reservation->doctor->name:''}}</span>
                                                <p>نشط الأن</p>
                                            </div>
                                            {{--                                        @if(doctor()->check())--}}
                                            {{--                                            <div class="video_cam" >--}}
                                            {{--    --}}{{--                                            <a></a>--}}
                                            {{--                                                <a href="tel: +201004834728" ><i class="fas fa-phone"></i></a>--}}
                                            {{--    --}}{{--                                            <span><i class="fas fa-video"></i></span>--}}

                                            {{--                                            </div>--}}
                                            {{--                                        @endif--}}
                                        </div>
                                        {{--                                    <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>--}}
                                        {{--                                    <div class="action_menu">--}}
                                        {{--                                        <ul>--}}
                                        {{--                                            <li><i class="fas fa-user-circle"></i> View profile</li>--}}
                                        {{--                                            <li><i class="fas fa-users"></i> Add to close friends</li>--}}
                                        {{--                                            <li><i class="fas fa-plus"></i> Add to group</li>--}}
                                        {{--                                            <li><i class="fas fa-ban"></i> Block</li>--}}
                                        {{--                                        </ul>--}}
                                        {{--                                    </div>--}}
                                    </div>
                                    <div class="card-body msg_card_body">
                                        @foreach($reservation->chats as $chat)

                                            <div
                                                class="d-flex justify-content-{{$chat->sender_type=='doctor'?'end':'start'}} mb-4 ">
                                                @if($chat->sender_type == 'doctor')

                                                    <div class="msg_cotainer_send">
                                                        {{$chat->message}}
                                                        <span class="msg_time_send"
                                                              style="min-width: 102px!important;"> {{date('Y-m-d  h:i A',strtotime($chat->created_at))}}</span>
                                                    </div>
                                                    <div class="img_cont_msg">
                                                        <img
                                                            src="{{$reservation->doctor?$reservation->doctor->image:url('Web').'\img\doctors\doctor13.png'}}"
                                                            class="rounded-circle user_img_msg">
                                                    </div>
                                                @else
                                                    <div class="img_cont_msg">
                                                        <img src="{{url('Web')}}\img\users-photo\user-default.jpg"
                                                             class="rounded-circle user_img_msg">
                                                    </div>
                                                    <div class="msg_cotainer">
                                                        {{$chat->message}}
                                                        <span class="msg_time"
                                                              style="right: 0;min-width: 102px!important;">{{date('Y-m-d ',strtotime($chat->created_at))}} &nbsp; {{date('h:i A',strtotime($chat->created_at))}}</span>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                    <form id="message_form" method="post" action="{{route('send_chat')}}"
                                          enctype="application/x-www-form-urlencoded">
                                        @csrf
                                        <div class="card-footer">
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <label class="input-group-text attach_btn" type="file" for="file"
                                                           style="cursor: pointer"><i class="fas fa-paperclip"
                                                                                      style="margin-right: 13px"></i></label>
                                                    <input type="file" style="display: none" id=""
                                                           data-multiple-caption="{count} files selected" multiple/>
                                                </div>

                                                {{--                                        <div class="input-group-append">--}}
                                                {{--                                            <span class="input-group-text attach_btn"><i class="fas fa-paperclip" style="margin-right: 13px"></i></span>--}}
                                                {{--                                        </div>--}}
                                                <textarea name="message" class="form-control type_msg"
                                                          placeholder="اكتب رسالتك..."></textarea>
                                                <div class="input-group-append">
                                                    <button type="submit" class="input-group-text send_btn"><i
                                                            class="fas fa-location-arrow"
                                                            style="margin-right: 13px"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </section>
                </div> <!-- END TAB-1 CONTENT -->
                <!-- TAB-2 CONTENT -->
                <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab2-list">
                    <section class="contact-section ">
                        <div class="container">
                            <div class="row my-5">
                                <div class="col-lg-12 left-contact-col">
                                    <div class="contact-area">
                                        <div style="margin-right: 15px" class="contact-content">
                                            <h3>متابعة حالة المريض</h3>
                                        </div>
                                        <div class="contact-form">
                                            @if(auth()->check())
                                                <form id="form" action="{{route('store_following')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" value="{{$reservation->id}}"
                                                           name="reservation_id">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <input type="text" name="temp" id="temp"
                                                                       class="form-control numbersOnly"
                                                                       placeholder="ادخل درجة الحرارة">
                                                            </div>
                                                            <button type="button" class="default-btn" id="bt2" >
                                                                القياس تلقائيا
                                                                <i class="flaticon-right"></i>
                                                                <span></span>
                                                            </button>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <input type="text" name="heart" id="heart"
                                                                       class="form-control numbersOnly"
                                                                       placeholder="ادخل مقياس نبض القلب">
                                                            </div>
                                                            <button type="button" class="default-btn" id="bt" >
                                                                القياس تلقائيا
                                                                <i class="flaticon-right"></i>
                                                                <span></span>
                                                            </button>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                      <textarea name="message" class="form-control" id="message"
                                                                cols="30" rows="6"
                                                                data-error="Write your message"
                                                                placeholder="اكتب ما تشعر به"></textarea>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="send-btn">
                                                                <button type="submit" class="default-btn">
                                                                    إرسال إلي الطبيب
                                                                    <i class="flaticon-right"></i>
                                                                    <span></span>
                                                                </button>
                                                            </div>
                                                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </div>
                                                </form>
                                            @else
                                                @foreach($reservation->follows as $follow)
                                                    <div class="badge badge-light text-danger col-12 text-center"
                                                         style="font-size: 15px;display:inline-block ">
                                                        {{date('Y-m-d ',strtotime($follow->created_at))}}
                                                        &nbsp; {{date('h:i A',strtotime($follow->created_at))}}
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-12">
                                                            <h5 class="col-5" style="display: inline-block">درجة
                                                                الحرارة</h5>
                                                            <div class="col-6"
                                                                 style="display: inline-block">{{$follow->temp}}</div>
                                                        </div>
                                                        <div class="col-md-12 col-12">
                                                            <h5 class="col-5" style="display: inline-block">الضغط</h5>
                                                            <div class="col-6"
                                                                 style="display: inline-block">{{$follow->heart}}</div>
                                                        </div>
                                                        <div class="col-12">
                                                            <h5 class="col-5" style="display: inline-block">ملاحظات</h5>
                                                            <div class="col-6"
                                                                 style="display: inline-block">{{$follow->message}}</div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div> <!-- END TAB-2 CONTENT -->
                <!-- TAB-3 CONTENT -->
                <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab3-list">
                    <section class="contact-section ">
                        <div class="container">
                            <div class="row my-5">
                                <div class="col-lg-12 left-contact-col">
                                    <div class="contact-area">
                                        <div style="margin-right: 15px" class="contact-content">
                                            <h3>@if(auth()->check()) برجاء إرفاق الأشعة @else الأشعة @endif </h3>
                                        </div>
                                        <div class="contact-form">
                                            <div class="row">
                                                @if(auth()->check())
                                                    <form id="form" action="{{route('store_reservation_xray')}}"
                                                          method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" value="{{$reservation->id}}"
                                                               name="reservation_id">
                                                        <div class="file-uploader">
                                                            <div class="box__input">

                                                                <div class="upload-container">
                                                                    <div class="upload-icon">
                                                                        <i class="fas fa-cloud-upload-alt"></i>
                                                                    </div>
                                                                    <p><label type="file" for="file"
                                                                              style="cursor: pointer"><strong>تحميل
                                                                                الملف من هنا</strong></label></p>
                                                                    <input name="images[]"
                                                                           type="file" style="display: none" id="file"
                                                                           data-multiple-caption="{count} files selected"
                                                                           multiple/>
                                                                    <div id="file-list"></div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="send-btn">
                                                            <button type="submit" class="default-btn">
                                                                إرسال إلي الطبيب
                                                                <i class="flaticon-right"></i>
                                                                <span></span>
                                                            </button>
                                                        </div>

                                                    </form>
                                                @else
                                                    @foreach($reservation->x_rays as $x_ray)
                                                        <div class="col-md-4 pic-col d-inline-block ">
                                                            <a href="">
                                                                <img src="{{$x_ray->image}}" width="90%"  onclick="window.open(this.src)">
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                @endif

                                                {{--                                                    <div id="msgSubmit1" class="h3 text-center hidden"></div>--}}
                                                {{--                                                    <div class="clearfix"></div>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="tab4-list">
                    <section class="contact-section ">
                        <div class="container">
                            <div class="row my-5">
                                <div class="col-lg-12 left-contact-col">
                                    <div class="contact-area">
                                        <div style="margin-right: 15px" class="contact-content">
                                            <h3> برجاء إرفاق صور التقارير </h3>
                                        </div>
                                        <div class="contact-form">
                                            <div class="row">
                                                <form id="form" action="{{route('store_reservation_report')}}"
                                                      method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" value="{{$reservation->id}}"
                                                           name="reservation_id">
                                                    <div class="file-uploader">
                                                        <div class="box__input">

                                                            <div class="upload-container">
                                                                <div class="upload-icon">
                                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                                </div>
                                                                <p><label type="file" for="file"
                                                                          style="cursor: pointer"><strong>تحميل الملف من
                                                                            هنا</strong></label></p>
                                                                <input name="images[]"
                                                                       type="file" style="display: none" id="file"
                                                                       data-multiple-caption="{count} files selected"
                                                                       multiple/>
                                                                <div id="file-list"></div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="send-btn">
                                                        <button type="submit" class="default-btn">
                                                            إرسال إلي المريض
                                                            <i class="flaticon-right"></i>
                                                            <span></span>
                                                        </button>
                                                    </div>

                                                </form>

                                                {{--                                                    <div id="msgSubmit1" class="h3 text-center hidden"></div>--}}
                                                {{--                                                    <div class="clearfix"></div>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

            <!-- TAB-3 CONTENT -->
            </div> <!-- END TABS CONTENT -->
        </div> <!-- End container -->
    </section> <!-- END TABS-1 -->
@endsection

@push('web_js')
    <script>
        $(document).ready(function () {
            $('#action_menu_btn').click(function () {
                $('.action_menu').toggle();
            });
            $(".msg_card_body").animate({scrollTop: $('.msg_card_body').prop("scrollHeight")}, 1000);
            {{--        alert('reservation_chat'+'{{(string)$reservation->id}}')--}}
            //         var url = location.href;
            {{--        alert(url + '{{url('following')}}'+ '{{$reservation->id}}');--}}
            // alert(url);

        });
    </script>

    <script>
        $(document).on('submit', "#message_form", function (e) {
            e.preventDefault();
            // alert(1)
            var message = $('.type_msg').val();
            var reservation_id = '{{$reservation->id}}'
            var formData = new FormData(this);
            formData.append('reservation_id', reservation_id);
            if (message == '') {
                my_toaster('اكتب رسالتك', 'error')
            } else {
                $.ajax({
                    url: '{{route("send_chat")}}',
                    type: 'POST',
                    data: formData,
                    beforeSend: function () {
                        $('#global-loader').show()
                    },
                    success: function (data) {

                        window.setTimeout(function () {
                            $('#global-loader').hide()
                            $('#submit').attr('disabled', false);

                            if (data.success === 'true') {
                                // alert(1)
                                $("#message_form")[0].reset();
                                var html_user_content = '';

                                if ('{{auth()->check()}}') {
                                    html_user_content = `
                            <div class="d-flex justify-content-start mb-4 ">
                                <div class="img_cont_msg">
                                    <img src="{{url('Web')}}/img/users-photo/user-default.jpg" class="rounded-circle user_img_msg">
                                </div>
                                <div class="msg_cotainer">${message}
                                    <span class="msg_time" style="right: 0;min-width: 102px!important;"> {{date('Y-m-d ')}} &nbsp; {{date('H:i A ')}} </span>
                                </div>
                            </div>`;
                                } else {
                                    html_user_content = `
                            <div class="d-flex justify-content-end mb-4 ">
                                <div class="msg_cotainer_send">${message}
                                    <span class="msg_time_send" style="min-width: 102px!important;"> {{date('Y-m-d ')}} &nbsp; {{date('H:i A ')}} </span>
                                </div>
                                <div class="img_cont_msg">
                                    <img src="{{$reservation->doctor?$reservation->doctor->image:url('Web').'\img\doctors\doctor13.png'}}" class="rounded-circle user_img_msg">
                                </div>
                            </div>`;
                                }
                                $('.msg_card_body').append(html_user_content);
                                $(".msg_card_body").animate({scrollTop: $('.msg_card_body').prop("scrollHeight")}, 1000);

                            } else {
                                var messages = Object.values(data.messages);
                                $(messages).each(function (index, message) {
                                    my_toaster(message, 'error')
                                });
                            }
                        }, 100);

                    },
                    error: function (data) {
                        $('#global-loader').hide()
                        $('#form-load > .linear-background').hide(loader)
                        $('#submit').html('حفظ').attr('disabled', false);
                        $('#form').show()
                        console.log(data)
                        if (data.status === 500) {
                            my_toaster('هناك خطأ ما', 'error')
                        }

                        if (data.status === 422) {
                            var errors = $.parseJSON(data.responseText);

                            $.each(errors, function (key, value) {
                                if ($.isPlainObject(value)) {
                                    $.each(value, function (key, value) {
                                        my_toaster(value, 'error')
                                    });

                                }
                            });
                        }
                        if (data.status == 421) {
                            my_toaster(data.message, 'error')
                        }

                    },//end error method

                    cache: false,
                    contentType: false,
                    processData: false
                });
            }
        });

    </script>

    <script src="//js.pusher.com/3.1/pusher.min.js"></script>
    <script>
        // $(document).ready(function() {
        //     alert('1')
        // });
        // Initiate the Pusher JS library
        Pusher.logToConsole = true;
        var pusher = new Pusher('f3b4db1b634ad8e962d8', {
            encrypted: true,
            cluster: 'eu'
        });

        // Subscribe to the channel we specified in our Laravel Event
        var channel = pusher.subscribe('reservation_chat' + '{{(string)$reservation->id}}');

        // Bind a function to a Event (the full Laravel class)
        channel.bind('reservation_chat_bind', function (data) {
            // this is called when the event notification is received...
            var html_user_content = '';
            if ('{{auth()->check()}}' && data.sender_type == 'doctor') {
                html_user_content = `
                    <div class="d-flex justify-content-end mb-4 ">
                        <div class="msg_cotainer_send">${data.message}
                            <span class="msg_time_send" style="min-width: 102px!important;"> {{date('Y-m-d ')}} &nbsp; {{date('H:i A ')}} </span>
                        </div>
                        <div class="img_cont_msg">
                            <img src="{{$reservation->doctor?$reservation->doctor->image:url('Web').'\img\doctors\doctor13.png'}}" class="rounded-circle user_img_msg">
                        </div>
                    </div>`;
            }
            if ('{{doctor()->check()}}' && data.sender_type == 'user') {
                html_user_content = `
                    <div class="d-flex justify-content-start mb-4 ">
                        <div class="img_cont_msg">
                            <img src="{{url('Web')}}/img/users-photo/user-default.jpg" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">${data.message}
                            <span class="msg_time" style="right: 0;min-width: 102px!important;"> {{date('Y-m-d ')}} &nbsp; {{date('H:i A ')}} </span>
                        </div>
                    </div>`;
            }
            $('.msg_card_body').append(html_user_content);
            $(".msg_card_body").animate({scrollTop: $('.msg_card_body').prop("scrollHeight")}, 1000);

        });
    </script>
    <script>
        document.getElementById('file').addEventListener('change', function () {
            var fileList = document.getElementById('file').files;
            var fileNames = '';
            for (var i = 0; i < fileList.length; i++) {
                fileNames += fileList[i].name + '<br />';
            }
            document.getElementById('file-list').innerHTML = fileNames;
        });
    </script>

{{--    //======================================= firebase ============================================--}}
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-database.js"></script>
    <script>
        const firebaseConfig = {
            apiKey: "AIzaSyDNMMoXJ-wN5vQ2A6iCN-O4aiUWmbnPohk",
            authDomain: "healthtracker-156e3.firebaseapp.com",
            databaseURL: "https://healthtracker-156e3-default-rtdb.europe-west1.firebasedatabase.app",
            projectId: "healthtracker-156e3",
            storageBucket: "healthtracker-156e3.appspot.com",
            messagingSenderId: "251882240021",
            appId: "1:251882240021:web:decc35cfeae17d9582361c",
            measurementId: "G-WHV86LCMTJ"
        };

        firebase.initializeApp(firebaseConfig);


    </script>

{{--    <script type="module">--}}
{{--        // Import the functions you need from the SDKs you need--}}
{{--        import { initializeApp } from "https://www.gstatic.com/firebasejs/10.1.0/firebase-app.js";--}}
{{--        import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.1.0/firebase-analytics.js";--}}
{{--        // TODO: Add SDKs for Firebase products that you want to use--}}
{{--        // https://firebase.google.com/docs/web/setup#available-libraries--}}

{{--        // Your web app's Firebase configuration--}}
{{--        // For Firebase JS SDK v7.20.0 and later, measurementId is optional--}}
{{--        const firebaseConfig = {--}}
{{--            apiKey: "AIzaSyDNMMoXJ-wN5vQ2A6iCN-O4aiUWmbnPohk",--}}
{{--            authDomain: "healthtracker-156e3.firebaseapp.com",--}}
{{--            databaseURL: "https://healthtracker-156e3-default-rtdb.europe-west1.firebasedatabase.app",--}}
{{--            projectId: "healthtracker-156e3",--}}
{{--            storageBucket: "healthtracker-156e3.appspot.com",--}}
{{--            messagingSenderId: "251882240021",--}}
{{--            appId: "1:251882240021:web:decc35cfeae17d9582361c",--}}
{{--            measurementId: "G-WHV86LCMTJ"--}}
{{--        };--}}

{{--        // Initialize Firebase--}}
{{--        const app = initializeApp(firebaseConfig);--}}
{{--        const analytics = getAnalytics(app);--}}
{{--    </script>--}}

    <script>
        // Get a reference to the database root
        const databaseRef = firebase.database().ref();

        // Reference to the specific node in the database you want to fetch data from
        const dataRef = databaseRef.child("HealthTracker/BPM");
        const dataRef2 = databaseRef.child("HealthTracker/Temperature");

        // Fetch the data once (this will retrieve the data at the specified location once)

        $(document).on('click','#bt2',function (){
            dataRef2.once("value")
            .then((snapshot) => {
                // `snapshot` contains the data at the specified location
                const data = snapshot.val();
                $('#temp').val(data)
            })
            .catch((error) => {
                my_toaster('خطأ فى الاتصال .. حاول لاحقا ...', 'error')
            });
        })
        $(document).on('click','#bt',function (){
            dataRef.once("value")
                .then((snapshot) => {
                    const data = snapshot.val();
                    $('#heart').val(data)
                })
                .catch((error) => {
                    my_toaster('خطأ فى الاتصال .. حاول لاحقا ...', 'error')
                    // console.error("Error fetching data:", error);
                });
        })

    </script>
@endpush
