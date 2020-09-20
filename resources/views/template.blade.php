<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Template Engine</title>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @include('navbar')

    <div class="container">
        @yield('main')

    </div>

<div id="footer">
    <p>&copy; Laravel 2020 </p>
</div>

</body>
</html>
