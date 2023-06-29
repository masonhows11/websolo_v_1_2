@extends('admin.include.master')
@section('admin_title')
    مدیریت مدیران
@endsection
@section('breadcrumb')
    {{--  {{ Breadcrumbs::render('admin.dashboard') }}  --}}
@endsection
@section('admin_main')
    <div class="container">


        <div class="row admin-list-users d-flex justify-content-center align-content-center align-items-center">

            <div class="col-xl-7 col-lg-7 col-md-7 bg-white rounded-3 list-content">
                <table class="table table-striped">
                    <thead>
                    <tr class="text-center">
                        <th>شناسه</th>
                        <th>نام کاربری</th>
                        <th>حذف</th>
                        <th>وضعیت</th>
                    </tr>
                    </thead>
                    <tbody>
                    @isset($admins)
                        @foreach($admins as $admin)

                            <tr class="text-center">
                                <td>{{ $admin->id }}</td>
                                <td>{{ $admin->name }}</td>
                                @if($admin->hasRole('admin'))
                                    <td>
                                        {{ __('translate.not_defined') }}
                                    </td>
                                @else
                                    <td class="my-2">
                                        <a href="#" class="my-2"><i class="fa fa-trash my-4"></i></a>
                                    </td>
                                @endif
                                @if($admin->hasRole('admin'))
                                        <td class="my-2">
                                            {{ __('translate.not_defined') }}
                                        </td>
                                    @else
                                    <td class="my-2">
                                        <a href="#" class="btn {{ $admin->banned == 0 ? 'btn-success' : 'btn-danger' }} btn-sm my-2">
                                            {{ $admin->banned == 0 ? 'فعال' : 'غیر فعال' }}
                                        </a>
                                    </td>
                                @endif
                            </tr>

                        @endforeach
                    @endisset
                    </tbody>
                </table>
            </div>

            <div class="col-xl-7 col-lg-7 col-md-7 mt-5">
                {{ $admins->links() }}
            </div>

        </div>
    </div>
@endsection
@push('dash_custom_scripts')

@endpush


