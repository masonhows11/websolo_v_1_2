<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>{{ env('APP_NAME') }}</title>
    @include('front.include.styles')
</head>
<body>
{{-- navbar --}}
@include('front.include.navbar')
{{-- header --}}
@include('front.include.header')
{{-- about --}}
@include('front.include.about')
{{-- services --}}
@include('front.include.services')
{{-- skills --}}
@include('front.include.skills')
{{-- portfolio --}}
<livewire:front.protfolio/>
{{-- clients --}}
<livewire:front.clients/>
{{-- blog --}}
<livewire:front.article/>
{{-- hire me --}}
@include('front.include.hire_me')
{{-- contact --}}
<livewire:front.contact-us/>
{{-- footer --}}
@include('front.include.footer')
@include('front.include.scripts')
</body>
</html>






