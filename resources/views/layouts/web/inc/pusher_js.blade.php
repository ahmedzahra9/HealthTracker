

{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--      if ($('#message_count').text() == 0)  {--}}
{{--          $('#message_count').css('display', 'none');--}}
{{--      }--}}
{{--    })--}}
{{--</script>--}}
<script src="//js.pusher.com/3.1/pusher.min.js"></script>
<script>
    Pusher.logToConsole = true;
    var pusher = new Pusher('f3b4db1b634ad8e962d8', {
        encrypted: true,
        cluster: 'eu'
    });
</script>
<script>
    if ('{{auth()->check()}}'){
        // Subscribe to the channel we specified in our Laravel Event
        var channel = pusher.subscribe('user_chat'+'{{(string)auth()->user()?auth()->user()->id:''}}');

        // Bind a function to a Event (the full Laravel class)
        channel.bind('user_chat_bind', function(data) {
            // this is called when the event notification is received...
            var old_notifications = $('.notifications-menu').html();
            var new_notification = '';
            new_notification = `
                 <a class="dropdown-item d-flex pb-4" href="{{url('following')}}/${data.reservation_id}">
                        <span style="width: 29px!important;text-align: center!important;border-radius: 20px!important;"
                              class="avatar ml-3 bl-3 pt-2 align-self-center avatar-md cover-image
                            bg-light brround">
                            <i class="fa fa-envelope" style="fill:rgba(236,10,18,0.5);
                                        position: relative;bottom: 5px!important;"></i>
                        </span>
                        <div>
                        <span class="font-weight-bold text-danger">
                                ${data.message}
                        </span>
                            <div class="small text-primary d-flex">
                            ${data.doctor_name}
                        </div>
                        <div class="small text-muted d-flex">
                            {{date('Y/m/d')}} &nbsp;{{date('h:i:s A')}}
                        </div>
                    </div>
                </a>`;

            $('.notifications-menu').html(new_notification+old_notifications);

            if (location.href != '{{url('following')}}'+ '/'+data.reservation_id){
                var old_num = parseInt( $('#message_count').text() || 0 ) ;
                var plus = parseInt(1);
                var total = +old_num + +plus
                $('#message_count').text(total);
            }
        });

    }
    else if('{{doctor()->check()}}'){
        // Subscribe to the channel we specified in our Laravel Event
        var channel = pusher.subscribe('doctor_chat'+'{{(string)doctor()->user()?doctor()->user()->id:''}}');

        // Bind a function to a Event (the full Laravel class)
        channel.bind('doctor_chat_bind', function(data) {
            // this is called when the event notification is received...
            var old_notifications = $('.notifications-menu').html();
            var new_notification = '';
            new_notification = `
                 <a class="dropdown-item d-flex pb-4" href="{{url('following')}}/${data.reservation_id}">
                        <span style="width: 29px!important;text-align: center!important;border-radius: 20px!important;"
                              class="avatar ml-3 bl-3 pt-2 align-self-center avatar-md cover-image
                            bg-light brround">
                            <i class="fa fa-envelope" style="fill:rgba(236,10,18,0.5);
                                        position: relative;bottom: 5px!important;"></i>
                        </span>
                        <div>
                        <span class="font-weight-bold text-danger">
                                ${data.message}
                        </span>
                            <div class="small text-primary d-flex">
                            ${data.user_name}
                        </div>
                        <div class="small text-muted d-flex">
                            {{date('Y/m/d')}} &nbsp;{{date('h:i:s A')}}
                                </div>
                            </div>
                        </a>`;

            $('.notifications-menu').html(new_notification+old_notifications);

            if (location.href != '{{url('following')}}'+ '/'+data.reservation_id){
                if (location.href != '{{url('following')}}'+ '/'+data.reservation_id){
                    var old_num = parseInt( $('#message_count').text() || 0 ) ;
                    var plus = parseInt(1);
                    var total = +old_num + +plus
                    $('#message_count').text(total);
                }
            }
        });

    }
</script>
{{--///////////////////  Following  //////////////////////--}}
<script>
    // Initiate the Pusher JS library
        // Subscribe to the channel we specified in our Laravel Event
    if('{{doctor()->check()}}'){
        var channel = pusher.subscribe('following'+'{{(string)doctor()->user()?doctor()->user()->id:''}}');

        // Bind a function to a Event (the full Laravel class)
        channel.bind('following_bind', function(data) {
            // this is called when the event notification is received...
            var old_notifications = $('.notifications-menu2').html();
            var new_notification = '';
            new_notification = `
                 <a class="dropdown-item d-flex pb-4" href="{{url('following')}}/${data.reservation_id}">
                        <span style="width: 29px!important;text-align: center!important;border-radius: 20px!important;"
                              class="avatar ml-3 bl-3 pt-2 align-self-center avatar-md cover-image
                            bg-light brround">
                            <i class="fa fa-bell" style="fill:rgba(236,10,18,0.5);
                                        position: relative;bottom: 5px!important;"></i>
                        </span>
                        <div>
                        <span class="font-weight-bold text-danger">
                                ${data.message}
                        </span>
                            <div class="small text-primary d-flex">
                            ${data.user_name}
                        </div>
                        <div class="small text-muted d-flex">
                            {{date('Y/m/d')}} &nbsp;{{date('h:i:s A')}}
                                </div>
                            </div>
                        </a>`;

            $('.notifications-menu2').html(new_notification+old_notifications);

            var old_num = parseInt( $('#notification_count').text() || 0 ) ;
            var plus = parseInt(1);
            var total = +old_num + +plus
            $('#notification_count').text(total);

        });

    }
</script>
