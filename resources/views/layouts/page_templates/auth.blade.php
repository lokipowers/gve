<div class="wrapper ">
  @include('layouts.navbars.sidebar')
  <div class="main-panel">
    @include('layouts.navbars.navs.auth')
    @yield('content')
    @include('layouts.footers.auth')
  </div>
</div>

@push('js')

    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('f5e3f1013345137a3c8d', {
            cluster: 'eu',
            forceTLS: true
        });

        var channel = pusher.subscribe('Character.Notification.{{ $currentUser->character->id }}');

        channel.bind('characterNotification', function(data){
            displayNotification(data.icon, data.message);
        });

        function displayNotification(icon, message, timer = 1000, type = 'info', from = 'top', align = 'right'){

            $.notify({
                icon: icon,
                message: message

            },{
                type: 'success',
                timer: 4000,
                placement: {
                    from: from,
                    align: align
                }
            });
        }
    </script>
@endpush
