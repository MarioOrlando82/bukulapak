<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukulapak</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <style>
        body,
        html {
            padding: 0;
            margin: 0;
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    @include('components.navbar')
    @yield('content')
    @include('components.footer')
    <script src="{{asset('bootstrap/js/bootstrap.bundle.js')}}"></script>
</body>

</html>
