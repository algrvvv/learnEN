<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="x.png" type="image/x-icon">
    @vite(['resources/css/app.css','resources/css/message.css'])
    @stack('styles')
</head>
<body>
    @include('message')
    @include('inc.header')
    @yield('content')
    @stack('scripts')

    {{-- figma layout: https://www.figma.com/file/eWP1AMJzYWDDTbxzkSu4Bg/dYdX-Grants?node-id=2352%3A32163&mode=dev --}}
</body>
</html>