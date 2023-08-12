<script type="text/javascript" src="https://fastly.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js?{{time()}}"></script>
<script type="text/javascript" src="https://fastly.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js?{{time()}}"></script>
<script type="text/javascript" src="https://fastly.datatables.net/v/bs4/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/datatables.min.js?{{time()}}"></script>
<script src="https://fastly.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>
<script src="//fastly.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    var loader = ` <div class="linear-background">
                            <div class="inter-crop"></div>
                            <div class="inter-right--top"></div>
                            <div class="inter-right--bottom"></div>
                        </div>
        `;
    $(function () {
        var table = $("#exportexample").DataTable({
            bLengthChange: true,
            serverSide: true,
            ajax: window.location.href,
            columns: columns,
            order: [
                [0, "desc"]
            ],
            "language": {
                paginate: {
                    previous: "<i class='simple-icon-arrow-left'></i>",
                    next: "<i class='simple-icon-arrow-right'></i>"
                },
                "sProcessing": "جاري التحميل ..",
                "sLengthMenu": "اظهار _MENU_ سجل",
                "sZeroRecords": "لا يوجد نتائج",
                "sInfo": "اظهار _START_ الى  _END_ من _TOTAL_ سجل",
                "sInfoEmpty": "لا نتائج",
                "sInfoFiltered": "للبحث",
                "sSearch": "بحث :    ",
                "oPaginate": {
                    "sPrevious": "السابق",
                    "sNext": "التالي",
                }
            },
            dom: 'lBfrtip',
            buttons: [
                'colvis',
                'excel',
                'print',
                'copy',
                'csv',
            ],
            searching: true,
            destroy: true,
            info: false,
            lengthChange: true,
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],     // page length options
            pageLength: 10,

        });

        table.buttons().container().appendTo( '#exportexample_wrapper .col-md-6:eq(0)' );

    });


    $(document).on('click', '#addBtn', function () {
        $('#form-load').html(loader)
        $('#Modal').modal('show')

        setTimeout(function (){
            $('#form-load').load("{{route("$url.create")}}")
        },100)
    });

    $(document).on('submit',"form#form",function (e) {
        e.preventDefault();
        var formData = new FormData(this);

        var url = $(this).attr('action');
        // alert(url)
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            beforeSend: function () {
                $('#global-loader').show()
            },
            complete: function () {
            },
            success: function (data) {

                window.setTimeout(function () {
                    $('#global-loader').hide()
                    $('#submit').attr('disabled', false);

// $('#product-model').modal('hide')
                    if (data.success === 'true') {
                        // alert(1)
                        $('#Modal').modal('hide')
                        my_toaster(data.message)
                        $('#exportexample').DataTable().ajax.reload(null, false);
                    }else {
                        var messages = Object.values(data.messages);
                        $( messages ).each(function(index, message ) {
                            my_toaster(message,'error')
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
                    my_toaster('هناك خطأ ما','error')
                }

                if (data.status === 422) {
                    var errors = $.parseJSON(data.responseText);

                    $.each(errors, function (key, value) {
                        if ($.isPlainObject(value)) {
                            $.each(value, function (key, value) {
                                my_toaster(value,'error')
                            });

                        } else {

                        }
                    });
                }
                if (data.status == 421){
                    my_toaster(data.message,'error')
                }

            },//end error method

            cache: false,
            contentType: false,
            processData: false
        });
    });
    $(document).on('click', '.delete', function () {
        var id = $(this).data('id');
        swal.fire({
            title: "هل أنت متأكد من الحذف؟",
            text: "لا يمكنك التراجع بعد ذلك؟",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "موافق",
            cancelButtonText: "الغاء",
            okButtonText: "موافق",
            closeOnConfirm: false
        }).then((result) => {
            if (!result.isConfirmed){
                return true;
            }


            var url = '{{ route("$url.destroy",":id") }}';
            url = url.replace(':id',id)
            console.log(url);
            $.ajax({
                url: url,
                type: 'DELETE',
                beforeSend: function(){
                    $('#global-loader').show()
                },
                success: function (data) {

                    window.setTimeout(function() {
                        $('#global-loader').hide()
                        if (data.code == 200){
                            my_toaster(data.message , 'info')
                            $('#exportexample').DataTable().ajax.reload(null, false);
                        }else {
                            my_toaster("هناك خطأ",'error')
                        }

                    }, 500);
                }, error: function (data) {
                    $('#global-loader').hide()

                    if (data.status === 500) {
                        my_toaster("هناك خطأ",'error')
                    }


                    if (data.status === 422) {
                        var errors = $.parseJSON(data.responseText);

                        $.each(errors, function (key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    my_toaster(value,'error')
                                });

                            } else {

                            }
                        });
                    }
                }

            });
        });
    });


    $(document).on('click', '#multiDeleteBtn', function () {
        var allVals = [];
        $(".sub_chk:checked").each(function() {
            allVals.push($(this).attr('data-id'));
        });
        if(allVals.length <=0)
        {
            my_toaster("يجب تحديد المراد حذفه",'warning')
        }
        else {
            swal.fire({
                title: "هل أنت متأكد من الحذف؟",
                text: "لا يمكنك التراجع بعد ذلك؟",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "موافق",
                cancelButtonText: "الغاء",
                okButtonText: "موافق",
                closeOnConfirm: false
            }).then((result) => {
                if (!result.isConfirmed){
                    return true;
                }
                var url = '{{ route("$url.multiDelete") }}';
                var ids = allVals.join(",");
                // console.log(url);
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {'ids': ids},
                    beforeSend: function () {
                        $('#global-loader').show()
                    },
                    success: function (data) {

                        window.setTimeout(function () {
                            $('#global-loader').hide()
                            if (data.code == 200) {
                                my_toaster(data.message, 'info')
                                $('#exportexample').DataTable().ajax.reload(null, false);
                            } else {
                                my_toaster("هناك خطأ", 'error')
                            }

                        }, 100);
                    }, error: function (data) {
                        $('#global-loader').hide()

                        if (data.status === 500) {
                            my_toaster("هناك خطأ", 'error')
                        }


                        if (data.status === 422) {
                            var errors = $.parseJSON(data.responseText);

                            $.each(errors, function (key, value) {
                                if ($.isPlainObject(value)) {
                                    $.each(value, function (key, value) {
                                        my_toaster(value, 'error')
                                    });

                                } else {

                                }
                            });
                        }
                    }

                });
            });
        }

    });

    $(document).on('click', '#editBtn', function () {
        var  id = $(this).data('id');
        $('#form-load').html(loader)
        $('#Modal').modal('show')

        var url = "{{route("$url.edit",':id')}}";
        url = url.replace(':id',id)

        setTimeout(function (){
            $('#form-load').load(url)
        },100)


    });

</script>
