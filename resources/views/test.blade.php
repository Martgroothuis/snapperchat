<!DOCTYPE html>
<head>
    <title>Pusher Test</title>
    <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('9d104eaa5b525f7268f4', {
            cluster: 'eu',
            forceTLS: true
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            document.getElementById('name').innerHTML = data.name;
            document.getElementById('message').innerHTML = data.message;
        });
    </script>
</head>
<body>

<h1 id="name">hoi</h1>
<p id="message">still hoi</p>
</body>