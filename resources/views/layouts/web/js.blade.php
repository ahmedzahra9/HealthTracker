<script src="{{url('Web')}}/js/jquery-3.4.1.min.js"></script>
<script src="{{url('Web')}}/js/popper.min.js"></script>
<script src="{{url('Web')}}/js/bootstrap.min.js"></script>
<script src="{{url('Web')}}/js/mdb.min.js"></script>
<script src="{{url('Web')}}/js/smooth-scroll.min.js"></script>
<script src="{{url('Web')}}/js/swiper.js"></script>
<script src="{{url('Web')}}/js/aos.js"></script>
<script src="{{url('Web')}}/js/dropify.min.js"></script>
<script src="{{url('Web')}}/js/jquery.appear.min.js"></script>
<script src="{{url('Web')}}/js/odometer.min.js"></script>
<script src="{{url('Web')}}/js/jquery.fancybox.min.js"></script>
<!-- venobox js -->
<script src="{{url('Web')}}/js/venobox.min.js"></script>
<script src="{{url('Web')}}/js/select2.js"></script>
<script src="{{url('Web')}}/js/fontawesome-pro.js"></script>
<script src="{{url('Web')}}/js/stars.js"></script>
<script src="{{url('Web')}}/js/main.js"></script>



<script>
    var galleryThumbs = new Swiper('.gallery-thumbs', {
        slidesPerView: 'auto',
        // spaceBetween: 10,
        speed: 1500,
        loop: true,
        freeMode: true,
        loopedSlides: 5, //looped slides should be the same
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
    });
    var galleryTop = new Swiper('.gallery-top', {
        loop: true,
        effect: 'fade',
        keyboard: {
            enabled: true,
        },
        speed: 1500,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        loopedSlides: 5, //looped slides should be the same
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        thumbs: {
            swiper: galleryThumbs,
        },
        pagination: {
            el: '.swiper-pagination',
            type: 'progressbar',
        },
    });
</script>
<script>
    /* 14. VENOBOX JS */
    $('.venobox').venobox({
        numeratio: true,
        titleattr: 'data-title',
        spinner: 'cube-grid',
        spinColor: '#fff'
    });
</script>

{{--=================== default toster ==============================--}}
<script type="text/javascript" src="https://fastly.jsdelivr.net/npm/toastify-js"></script>
@include('layouts.admin.inc.toaster')

@include('layouts.web.inc.ajax')

<script>
    $(document).on('keyup','.numbersOnly',function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });
</script>

@stack('web_js')
@include('layouts.web.inc.pusher_js')

