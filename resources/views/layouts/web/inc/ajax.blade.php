<script type="text/javascript" src="https://fastly.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js?{{time()}}"></script>
<script type="text/javascript" src="https://fastly.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js?{{time()}}"></script>
<script type="text/javascript" src="https://fastly.datatables.net/v/bs4/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/datatables.min.js?{{time()}}"></script>
<script src="https://fastly.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>
<script src="//fastly.jsdelivr.net/npm/sweetalert2@11"></script>


<script>

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
            success: function (data) {

                window.setTimeout(function () {
                    $('#global-loader').hide()
                    $('#submit').attr('disabled', false);

// $('#product-model').modal('hide')
                    if (data.success === 'true') {
                        // alert(1)
                        my_toaster(data.message)
                        $('#Modal').modal('hide')
                        $('#form')[0].reset();
                        if (data.url) {
                            window.setTimeout(function () {
                                location.href = data.url;
                            }, 1000);
                        }

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

</script>
