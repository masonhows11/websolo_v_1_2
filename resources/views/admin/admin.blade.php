@extends('admin.include.master')
@section('admin_title')
    پنل مدیریت
@endsection
@section('breadcrumb')
    {{--  {{ Breadcrumbs::render('admin.dashboard') }}  --}}
@endsection
@section('admin_main')
@endsection
@push('dash_custom_scripts')
    <script>
        @if(session()->has('success'))
        Toastify({
            text: "{{ session('success')  }}",
            className: "info",
            style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
            }
        }).showToast();
        @endif
    </script>
@endpush

