<!-- Footer Start -->
<footer id="footer-section" class="footer-section">
    <div class="over-lay"></div>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <!-- <div class="col-md-3">
                    <h4 class="footer-title">علي بن علي</h4>
                    <div class="about-widget white-bg d-flex align-items-center justify-content-center p-1"
                        style="border-radius: 6px;">
                        <p class="logo-p"> الابداع الثالث لتقنية المعلومات توفر عليك عناء ادارة الهوية الرقمية بدون الحاجة لعشرات الموظفين
                        </p>
                        <img src="img/logo.png" class="footer-logo" alt="">
                    </div>
                </div> -->
                <!-- <div class="col-md-3">
                    <h4 class="footer-title">علي بن علي</h4>
                    <div class="about-widget ">
                        <p class="logo-p">
                            للإجابة على أي إستفسارات لديكم حول حالتكم الصحية أو مانقدمه من خدمات,لاتترددوا فى التواصل مع ممثلي الرعاية الصحية بالمستشفى
                        </p>
                        <img src="img/logo1.png" class="footer-logo" alt="">
                    </div>
                </div> -->
                <div class="col-md-4 col-6">
                    <h4 class="footer-title">روابط مختصرة </h4>
                    <ul class="sitemap-widget">
                        <li class="active"><a class="d-flex justify-content-between align-items-center"
                                              href="about.html">
                                من نحن
                            </a></li>
                        <li class="active"><a class="d-flex justify-content-between align-items-center"
                                              href="doctor-search.html">
                                البحث عن طبيب
                            </a></li>
                        <li class="active"><a class="d-flex justify-content-between align-items-center"
                                              href="">الصيدلية
                            </a></li>
                        <li class="active"><a class="d-flex justify-content-between align-items-center" href="">الشروط
                                والأحكام
                            </a></li>
                    </ul>
                </div>
                <!--						<div class="col-md-2 d-none d-md-block">-->
                <!--							<h4 class="footer-title"> </h4>-->
                <!--							<ul class="sitemap-widget">-->
                <!--								<li class="active"><a class="d-flex justify-content-between align-items-center"-->
                <!--										href="about.html">-->
                <!--										من نحن-->
                <!--									</a></li>-->
                <!--								<li class="active"><a class="d-flex justify-content-between align-items-center"-->
                <!--										href="doctor-search.html">-->
                <!--										البحث عن طبيب-->
                <!--									</a></li>-->
                <!--								<li class="active"><a class="d-flex justify-content-between align-items-center"-->
                <!--										href="">الصيدلية-->
                <!--									</a></li>-->
                <!--								<li class="active"><a class="d-flex justify-content-between align-items-center" href="">الشروط-->
                <!--										والأحكام-->
                <!--									</a></li>-->
                <!--							</ul>-->
                <!--						</div>-->
                <div class="col-md-4 col-6">
                    <h4 class="footer-title"> معلومات الإتصال </h4>
                    <div class="about-widget ">
                        <p class="logo-p">
                            <i class="fal fa-phone-alt pl-2"></i>
                            {{setting()->phone}}
                        </p>
                        <p class="logo-p">
                            <i class="fal fa-envelope pl-2"></i>
                            {{setting()->email}}
                        </p>
                        <p class="logo-p mt-4">
                            <a href="{{setting()->facebook}}" target="_blank" class=" social-footer px-2"> <i class="fab fa-facebook-f"></i> </a>
                            <a href="{{setting()->twitter}}" target="_blank" class=" social-footer px-2"> <i class="fab fa-twitter"></i> </a>
                            <a href="{{setting()->insta}}" target="_blank" class=" social-footer px-2"> <i class="fab fa-instagram"></i> </a>
                            <a href="{{setting()->linked_in}}" target="_blank" class=" social-footer px-2"> <i class="fab fa-invision"></i> </a>
                        </p>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <h4 class="footer-title"> إتصل بنا </h4>
                    <form method="post" action="{{route('post_contact_us')}}" id="form">
                        @csrf
                        <input type="text" name="name" class="form-control footer-input mb-2" placeholder="إسم">
                        <input type="email" name="email" class="form-control footer-input mb-2" placeholder="بريد إلكتروني">
                        <input type="text" name="phone" class="form-control footer-input mb-2 numbersOnly" placeholder="رقم الهاتف">
                        <div class="d-flex">
									<textarea name="message" class="form-control footer-textarea" id="" cols="30" rows="4"
                                              placeholder="رسالة"></textarea>
                            <button type="submit" class="btn footer-btn"><i class="fal fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 d-flex align-items-center justify-content-start">
                    <div class="copyright ">
                        <p>&copy; {{date('Y')}} جميع الحقوق محفوظه , <a href="#" target="_blank">موقع HealthTracker </a>.
                        </p>
                    </div>
                </div>
                <div class="col-md-8 col-sm-6">
                    <div class="text-center ft-bottom-right ">
                        <div class="buttons ">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->
