<!doctype html>
<html lang="ar">

<head>
    @include('layouts.web.css')
</head>

<body>
<!-- ================ spinner ================= -->
{{--<div id="loader-wrapper">--}}
{{--    <div id="loader">--}}
{{--        <div class="loader-inner"></div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- ================ spinner ================= -->
<!-- ================ header ================= -->
@include('layouts.web.top-header')
@include('layouts.web.header')

<!-- ================ /header ================= -->
@yield('site_content')

@include('layouts.web.footer')

@include('layouts.web.js')

</body>

</html>

