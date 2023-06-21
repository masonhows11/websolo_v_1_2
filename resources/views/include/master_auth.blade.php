<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page_title')</title>
    @livewireStyles
    @include('include.styles')
</head>
<body>
@include('include.navbar')
@include('include.header')
@yield('main')
@include('include.footer');
@include('include.scripts')
@stack('front_custom_scripts')
@livewireScripts
</body>
</html>
