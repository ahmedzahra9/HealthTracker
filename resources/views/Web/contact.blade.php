@extends('layouts.web.app')
@section('site_content')

    <section class="contact-section ">
        <div class="container">
            <div class="row my-5">
                <div class="col-lg-4">
                    <div class="contact-info-address">
                        <h3> تواصل سريع </h3>
{{--                        <div class="info-contact">--}}
{{--                            <i class="flaticon-pin"></i>--}}
{{--                            <h3>العنوان</h3>--}}
{{--                            <span><a target="#blank"--}}
{{--                                     href="https://www.google.com.eg/maps/search/%D9%85%D8%AD%D9%85%D8%AF+%D8%B1%D8%B4%D9%8A%D8%AF+%D8%B1%D8%B6%D8%A7%D8%8C+%D8%A7%D9%84%D8%B9%D8%B2%D9%8A%D8%B2%D9%8A%D8%A9%D8%8C+%D8%A7%D9%84%D8%B1%D9%8A%D8%A7%D8%B6+%D8%A7%D9%84%D8%B3%D8%B9%D9%88%D8%AF%D9%8A%D8%A9%E2%80%AD/@24.5747258,46.7677883,16z">محمد--}}
{{--                  رشيد رضا, العزيزية<br> الرياض , السعودية </a></span>--}}
{{--                        </div>--}}
                        <div class="info-contact">
                            <i class="flaticon-call"></i>
                            <h3>هاتف</h3>
                            <span><a href="tel:{{setting()->phone}}">{{setting()->phone}}</a></span> <br>
{{--                            <span><a href="tel:+123-456-789">0112600000</a></span>--}}
                        </div>
                        <div class="info-contact">
                            <i class="flaticon-email"></i>
                            <h3> البريد الإلكتروني</h3>
                            <!-- <span>
                              <a href="/cdn-cgi/l/email-protection#a3cbc6cfcfcce3d3cfc2cec18dc0ccce">
                                <span class="__cf_email__"
                                  data-cfemail="d9aaaca9a9b6abad99b1acabacb4b8f7bab6b4">[email&#160;protected]</span>
                              </a>
                            </span> -->
                            <span>
                <a href="#">
                  <span>{{setting()->email}} </span>
                </a>
              </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 left-contact-col">
                    <div class="contact-area">
                        <div class="contact-content">
                            <h3>تواصل معنا</h3>
                            <p>ارسل رسالة تواصل و سيتم الرد عليك قريبا
                                .</p>
                        </div>
                        <div class="contact-form">
                            <form method="post" action="{{route('post_contact_us')}}" id="form">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control"
                                                    placeholder="الإسم">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="phone" id="phone_number"
                                                   data-error="Please enter your number" class="form-control"
                                                   placeholder="رقم الهاتف">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" class="form-control"
                                                   data-error="Please enter your email"
                                                   placeholder="البريد اللإلكتروني">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-6 col-md-6">
                                      <div class="form-group">
                                        <input type="text" name="msg_website" id="msg_website" class="form-control" required
                                          data-error="Please enter your website" placeholder="الموضوع">
                                        <div class="help-block with-errors"></div>
                                      </div>
                                    </div> -->
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                      <textarea name="message" class="form-control" id="message" cols="30" rows="6"
                                data-error="Write your message" placeholder="إكتب رسالتك"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="send-btn">
                                            <button type="submit" class="default-btn">
                                                إرسال
                                                <i class="flaticon-right"></i>
                                                <span></span>
                                            </button>
                                        </div>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="head-gps ">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d29028.398840059588!2d46.7796732!3d24.5702131!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f09dada453e07%3A0x7739fa5dca216204!2z2YXYs9iq2LTZgdmJINi52YTZiiDYqNmGINi52YTZig!5e0!3m2!1sar!2seg!4v1619085958026!5m2!1sar!2seg"
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>

@endsection
