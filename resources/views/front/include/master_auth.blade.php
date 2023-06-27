<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page_title')</title>
    @livewireStyles
    @include('front.include.styles')
</head>
<body>
@include('front.include.navbar')
<section class="main-content">
    @yield('main_content')
</section>
@include('front.include.footer');
@include('front.include.scripts')
@stack('front_custom_scripts')
@livewireScripts
</body>
</html>
