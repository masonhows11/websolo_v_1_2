@extends('admin.include.master')
@section('admin_title')
    تخصیص مجوز
@endsection
@section('breadcrumb')
    {{ Breadcrumbs::render('admin.perms.assign') }}
@endsection
@section('admin_main')

    <div class="container">

        <div class="row d-flex justify-content-center  admin-role-assign-form">
            <div class="col-xl-7 col-lg-7 col-md-7">
                <form action="{{ route('admin.perms.assign') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="row">
                        <div class="mb-3 mt-3">
                            <label for="user" class="form-label">نام کاربری :</label>
                            <input type="text" class="form-control" value="{{ $user->name }}" readonly id="user">
                        </div>
                    </div>
                    <label for="role-name" class="form-label me-5">نام نقش :</label>
                    @foreach($perms as $perm)
                        <div class="form-check my-5 form-check-inline">
                            <label class="form-check-label">{{ $perm->name }}</label>
                            <input class="form-check-input"
                                   type="checkbox"
                                   id="form-check-input{{ $perm->id }}"
                                   name="perms[]"
                                   {{ in_array( $perm->id,$user->getPermissionIds()->toArray()) ? 'checked' : '' }}
                                   value="{{ $perm->id }}">
                        </div>
                    @endforeach
                    <div class="mb-3 mt-3">
                        <button type="submit" class="btn btn-success">ذخیره نقش ها</button>
                        <a href="{{ route('admin.perm.list.users') }}" class="btn btn-secondary">بازگشت</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@if(session('success'))
    @push('dash_custom_scripts')
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            })
        </script>
    @endpush
@endif
