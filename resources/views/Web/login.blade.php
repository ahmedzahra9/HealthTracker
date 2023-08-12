@extends('layouts.web.app')
@section('site_content')
<section class="login">
    <div class="container  py-5 ">
        <!--Section: Content-->
        <section class="pb-5   ">
            <!--Grid row-->
            <div class="row py-4 py-md-0 d-flex justify-content-center">
                <!--Grid column-->
                <div class="col-md-6  px-md-5 ">
                    <div class="formDiv  p-4 py-4 ">
                        <form class="text-center login_form" method="post" {{--action="code.html"--}} action="{{route('user_login')}}">
                           @csrf
                            <p class="h4  mt-3 font-weight-bold">تسجيل الدخول</p>
                            <div class="hr d-flex align-items-center justify-content-center">
                                <hr class="border-line  mb-5">
                            </div>
                            <!-- Email -->
                            <div class="input-1">
                                <input type="email" id="defaultLoginFormEmail" class=" mt-3 form-control mb-3 pr-5"
                                       placeholder="البريد الالكترونى  " name="email">
                                <i class="fad fa-envelope user"></i>
                            </div>
{{--                            <div class="input-1">--}}
{{--                                <input type="text" id="defaultLoginFormEmail" class=" mt-3 form-control mb-3 pr-5"--}}
{{--                                       placeholder="رقم الجوال  ">--}}
{{--                                <i class="fad fa-phone user"></i>--}}
{{--                            </div>--}}
                            <!-- Password -->
                            <div class="input-2">
                                <input type="password" id="defaultLoginFormPassword" class="form-control  pr-5 mb-3"
                                       placeholder="  اكتب الباسورد" name="password">
                                <i class="fal user fa-lock-alt"></i>
                            </div>
{{--                            <p class="text-right pb-3"><a href="reset-password.html">هل نسيت كلمة المرور ؟</a></p>--}}
                            <!-- Sign in button -->
                            <button type="submit" class="btn btn-login  mb-2"> تأكيد </button>
                            <div class="socia my-3">
                                <!--Facebook-->
                                <!-- <a class="btn-floating btn-md btn-fb" type="button" role="button"><i
                                    class="fab fa-facebook-f"></i></a> -->
                                <!--Google +-->
                                <!-- <a class="btn-floating btn-md btn-gplus" type="button" role="button"><i
                                    class="fab fa-google-plus-g"></i></a> -->
                            </div>
                            <p>ليس لديك حساب ؟ <a href="{{url('register')}}">إنشاء حساب</a></p>
                        </form>
                    </div>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </section>
        <!--Section: Content-->
    </div>
</section>
@endsection
@push('web_js')
    <script>
        $(document).on('submit', '.login_form', function (event) {
            event.preventDefault();
            var form_data = new FormData($(this)[0]);
            var url = $(this).attr('action');
            $.ajax({
                type: 'POST',
                url: url,
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function(){
                    $('#global-loader').show()
                },
                success: function (data) {
                    window.setTimeout(function() {
                        $('#global-loader').hide()
                        if (data.success == 'true') {
                            location.href = 'login';
                            my_toaster(data.message)
                        }
                        if (data.success == 'false') {
                            var messages = Object.values(data.messages);
                            $( messages ).each(function(index, message ) {
                                my_toaster(message,'error')
                            });
                        }
                    }, 500);
                }, error: function (data) {
                    $('#global-loader').hide()
                    var error = Object.values(data.responseJSON.errors);
                    $( error ).each(function(index, message ) {
                        my_toaster(message,'error')
                    });
                }
            });
        });
    </script>
@endpush
