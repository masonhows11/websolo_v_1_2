<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>{{ env('APP_NAME') }}</title>
    @include('include.styles')
</head>
<body>
{{-- navbar --}}
@include('include.navbar')
{{-- header --}}
@include('include.header')
{{-- about --}}
@include('include.about')
{{-- services --}}
@include('include.services')
{{-- skills --}}
@include('include.skills')
{{-- portfolio --}}
<livewire:front.protfolio/>
{{-- clients --}}
<livewire:front.clients/>
{{-- blog --}}
<livewire:front.blog/>
{{-- hire me --}}
@include('include.hire_me')
{{-- contact --}}
<livewire:front.contact/>
{{-- footer --}}
@include('include.footer')
@include('include.scripts')
</body>
</html>






