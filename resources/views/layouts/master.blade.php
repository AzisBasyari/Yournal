<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="css/app.css">
    @yield('css')

    
    <title>{{ $title }}</title>
</head>

<body>

    @include('partials.navbar')

    @yield('content')

    @yield('footer')

    <script src="{{asset('/js/jquery.js')}}"></script>
    <script src="{{asset('/js/app.js')}}"></script>
    
    @yield('js')
</body>

</html>