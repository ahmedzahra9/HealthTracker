<div id="Header" class="main-header sticky-top" style="z-index: 900">
<nav class="navbar navbar-expand-lg navbar-light" >
    <!--fixed-top-->
    <div class="container">
        <a class="navbar-brand d-lg-none" href="{{url('/')}}">
            تتيع صحتك
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse  navbar-collapse " id="navbarTogglerDemo01">
            <ul class="navbar-nav index-navbar-nav main_menu  mx-auto">
                <li class="nav-item menu-item">
                    <a class="nav-link " href="{{url('/')}}">
                        <span class="mn_icon mn_home"></span>
                        الرئيسية
                    </a>
                </li>
                @if(!doctor()->check())
                <li class="nav-item menu-item">
                    <a class="nav-link " href="{{url('doctors')}}">
                        <span class="mn_icon mn_find"></span>
                        إبحث عن طبيب </a>
                </li>
                <li class="nav-item menu-item">
                    <a class="nav-link " href="{{url('hospitals')}}">
                        <span class="mn_icon mn_find"></span>
                        إبحث عن مستشفي </a>
                </li>
                @else
                    <li class="nav-item menu-item">
                        <a class="nav-link " href="{{url('my-appointments')}}">
                            <span class="mn_icon mn_find"></span>
                            مواعيدى </a>
                    </li>
                @endif
                <!--        <li class="nav-item menu-item">-->
                <!--          <a class="nav-link " href="hire.html"> خدماتنا    </a> -->
                <!--        </li>-->
                <li class="nav-item menu-item">
                    <a class="nav-link " href="{{url('about')}}">
                        <span class="mn_icon mn_about"></span>
                        من نحن </a>
                </li>
                <!-- <li class="nav-item menu-item">
                  <a class="nav-link " href="add-request.html">  تقدم بطلبك  </a>
                </li>
                -->
                <!-- <li class="nav-item menu-item">
                  <a class="nav-link " href="Media-Center.html">
                    <span class="mn_icon mn_medai"></span>
                    المركز الإعلامي </a>
                </li>
                <li class="nav-item menu-item">
                  <a class="nav-link " href="hire.html">
                    <span class="mn_icon mn_center"></span>
{{--                    <!-- صحة المجتمع -->--}}
{{--                <!-- إنضم إلينا--}}
              </a>
            </li> -->
                <li class="nav-item menu-item">
                    <a class="nav-link " href="{{url('contact')}}">
                        <span class="mn_icon mn_contact"></span>
                        تواصل معنا </a>
                </li>
                <!-- <li class="nav-item menu-item">
                  <a class="nav-link " href="login.html">تسجيل الدخول </a>
                </li> -->
                <!-- <li class=" nav-item">
                  <div class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          <img src="img/300_9.jpg" class=" useImg">
                      </a>
                      <div class="dropdown-menu">
                          <a class="dropdown-item" href="doctor-profile.html"> <i class="fad fa-user mx-2"></i>البروفايل</a>
                          <a class="dropdown-item" href="index.html"> <i class="fad fa-power-off mx-2" aria-hidden="true"></i> تسجيل الخروج</a>
                      </div>
                  </div>
              </li> -->
            </ul>
            <!-- <div class=" d-flex justify-content-center align-items-center">
              <div class="nav-item position-relative">
                <div class="nav-link notificationsIcon">
                  <i class="fal fa-bell"></i>
                  <span class=" badge"> 3 </span>
                </div>
                <div class=" notifications ">
                  <h6 class=" font-weight-bold px-3 pt-21 pb-2 border-bottom"> الاشعارات </h6>
                  <h5 class=" font-weight-bold"> </h5>
                  <div class="row">
                    <div class="col-3 p-1 d-flex justify-content-center align-items-center">
                      <i class="far fa-bell"></i>
                    </div>
                    <div class="col-9 p-1 d-flex justify-content-start align-items-center pl-4">
                      <a href="#">
                        <h6>إشعار جديد </h6>
                        <p> لديك إستشارة </p>
                      </a>
                    </div>
                    <span class="closeIcon"><i class="fas fa-times"></i></span>
                  </div>
                  <div class="see-all pb-1 pt-2 d-flex  align-items-center justify-content-center">
                    <a href="notification page.html" class="text-dark">إظهار كل التعليقات</a>
                  </div>
                </div>
              </div>
            </div> -->
        </div>
    </div>
</nav>
<!-- <script>
  $("body").click(function (event) {
    $('.notifications').slideUp();
  });
  $(".notifications").click(function (event) {
    event.stopPropagation();
  });
  $(".nav-link.notificationsIcon").click(function (event) {
    event.stopPropagation();
    $('.notifications').slideToggle();
  });
</script> -->
</div>
<script>
    $(document).ready(function () {
        // SideNav Default Options
        $('.button-collapse').sideNav({
            edge: 'right',
            breakpoint: 992,
            menuWidth: 240,
        });
    });
</script>
