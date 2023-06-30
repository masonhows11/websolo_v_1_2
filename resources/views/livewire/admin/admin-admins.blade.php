<div>
    @section('admin_title')
        مدیریت مدیران
    @endsection
    @section('breadcrumb')
{{--        {{ Breadcrumbs::render('admin.admins') }}--}}
    @endsection
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
                                <td>
                                    <div>{{ $admin->id }}</div>
                                </td>
                                <td>
                                    <div>{{ $admin->name }}</div>
                                </td>
                                @if($admin->hasRole('admin'))
                                    <td>
                                        <div class="custom-deactive">
                                            دسترسی ندارید
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-deactive">
                                            دسترسی ندارید
                                        </div>
                                    </td>
                                @else
                                    <td>
                                        <div>
                                            <a href="javascript:void(0)"
                                               wire:click.prevent="deleteConfirmation({{ $admin->id }})">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="rounded
                                        {{ $admin->code_verified_at == null ? 'custom-deactive' : 'custom-active' }}">
                                            {{ $admin->code_verified_at == null ? __('messages.deactive') : __('messages.active') }}
                                        </div>
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

</div>
@push('dash_custom_scripts')
    <script type="text/javascript">
        window.addEventListener('show-delete-confirmation', event => {
            Swal.fire({
                title: 'آیا مطمئن هستید این ایتم حذف شود؟',
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله حذف کن!',
                cancelButtonText: 'خیر',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteConfirmed')
                }
            });
        })
    </script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            showCloseButton: true,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        window.addEventListener('show-result', ({detail: {type, message}}) => {
            Toast.fire({
                icon: type,
                title: message
            })
        })

    </script>

@endpush
