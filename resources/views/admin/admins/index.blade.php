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
                <table class="table">
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
                                @if($user->hasRole('admin'))
                                @else
                                    <td class="mb-3">
                                        <a href="javascript:void(0)"><i class="fa fa-trash"></i></a>
                                    </td>
                                    <td class="mb-3">
                                        <a href="#" class="btn {{ $admin->banned == 0 ? 'btn-success' : 'btn-danger' }} btn-sm mb-3">
                                            {{ $user->$admin == 0 ? 'فعال' : 'غیر فعال' }}
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
                {{ $admin->links() }}
            </div>

        </div>
    </div>
@endsection
@push('dash_custom_scripts')

@endpush


