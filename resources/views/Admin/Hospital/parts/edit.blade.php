<!--begin::Form-->
<form id="form" enctype="multipart/form-data" method="POST" action="{{route('hospitals.update',$hospital->id)}}">
    @csrf
    @method('PUT')
    <div class="row mt-0">
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-md-6 mt-0">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">الإسم ( بالعربية ) </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="الإسم ( بالعربية )"></i>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid" placeholder="الإسم ( بالعربية )" name="name_ar" value="{{$hospital->name_ar}}"/>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-md-6 mt-0">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">البريد الالكترونى </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="البريد الالكترونى"></i>
            </label>
            <!--end::Label-->
            <input type="email" class="form-control form-control-solid" placeholder="البريد الالكترونى" name="email" value="{{$hospital->email}}"/>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-md-6 mt-0">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">الموقع ( بالعربية ) </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="الموقع ( بالعربية )"></i>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid" placeholder="الموقع ( بالعربية )" name="location_ar" value="{{$hospital->location_ar}}"/>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-md-6 mt-0">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">التصنيف ( بالعربية ) </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="التصنيف ( بالعربية )"></i>
            </label>
            <!--end::Label-->
            <select name="category_id" class="form-control form-control-solid">
                <option value="" disabled selected>اختر تصنيف</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}" {{$hospital->category_id == $category->id ? 'selected':''}}>{{$category->name_ar}}</option>
                @endforeach
            </select>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12 mt-0">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">الوصف ( بالعربية ) </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="الوصف ( بالعربية )"></i>
            </label>
            <!--end::Label-->
            <textarea type="text" class="form-control form-control-solid" placeholder="الوصف ( بالعربية )" name="description" >{{$hospital->description}}</textarea>
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required"> الصورة </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7  text-primary" title="الصورة"></i>
            </label>
            <!--end::Label-->
            <input accept="image/*" type='file' id="imgInp" name="image"  class="form-control form-control-solid" />
            <img width="100" height="100" id="blah" src="{{$hospital->image}}" alt="your image" />
        </div>
        <!--end::Input group-->
    </div>

</form>
<!--end::Form-->


<script>
    imgInp.onchange = evt => {
        $('#blah').show()
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
</script>
