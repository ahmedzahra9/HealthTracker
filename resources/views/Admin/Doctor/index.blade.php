@extends('layouts.admin.app')
@section('page_title') الاطباء @endsection
<link href="{{url('admin')}}/assets/plugins/select2/select2.min.css" rel="stylesheet"/>
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">الاطباء</h3>
                    <div class="mr-auto pageheader-btn">
                        @if(in_array(7,admin()->user()->permission_ids))
                            <a href="#" id="multiDeleteBtn" class="btn btn-danger btn-icon text-white">
                                            <span>
                                                <i class="fa fa-trash-o"></i>
                                            </span> حذف المحدد
                            </a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="exportexample"
                               class="table table-striped table-responsive-lg  card-table table-vcenter text-nowrap mb-0 table-primary align-items-center mb-0">
                            <thead class="bg-primary text-white">
                            <tr>
                                <th class="text-white"><input type="checkbox" id="master"></th>
                                <th class="text-white">#</th>
                                <th class="text-white">الاسم</th>
                                <th class="text-white">رقم الهاتف</th>
                                <th class="text-white">البريد الالكترونى</th>
                                {{--                                <th class="text-white">الطلبات</th>--}}
                                <th class="text-white">المستشفى</th>
                                <th class="text-white">الصورة</th>
                                <th class="text-white">حظر</th>
                                <th class="text-white">تحكم</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('admin_js')
    <script>
        var columns = [
            {data: 'checkbox', name: 'checkbox', orderable: false, searchable: false},
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'phone', name: 'phone'},
            {data: 'email', name: 'email'},
            {data: 'hospital', name: 'hospital'},
            {data: 'image', name: 'image'},
            // {data: 'orders', name: 'block'},
            {data: 'block', name: 'block'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ];
        //======================== addBtn =============================

    </script>
    @include('layouts.admin.inc.ajax',['url'=>'doctors'])
    @include('Admin.User.parts.block',['url'=>'doctors'])


    <script>
        // Make Better Using Ajax
        $(document).on('change', '.change_hospital', function (event) {
            var id = $(this).attr("data_id")
            var hospital_id = $(this).val()
            var url = $(this).attr("href")
            setTimeout(function () {
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        '_token': "{{csrf_token()}}",
                        'id': id,
                        'hospital_id': hospital_id,
                    },
                    success: function (data) {
                        if (data.success === true) {
                            // $('#exportexample').DataTable().ajax.reload();
                            my_toaster('تم تعديل المستشفى بنجاح')
                        }
                    }
                })
            }, 1000)

        });
    </script>
@endpush
