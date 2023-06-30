<div>
    @section('admin_title')
        مدیریت کاربران
    @endsection
    @section('breadcrumb')
{{--        {{ Breadcrumbs::render('admin.users') }}--}}
    @endsection
    <div class="container">


        <div class="row admin-list-users d-flex justify-content-center align-content-center align-items-center">

            <div class="col-xl-7 col-lg-7 col-md-7 bg-white rounded-3 list-content">
                <table class="table">
                    <thead>
                    <tr class="text-center">
                        <th>شناسه</th>
                        <th>نام کاربری</th>
                        <th>ایمیل</th>
                        <th>حذف</th>
                        <th>وضعیت</th>
                    </tr>
                    </thead>
                    <tbody>
                    @isset($users)
                        @foreach($users as $user)

                            <tr class="text-center">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                    <td class="my-3">
                                        <a href="javascript:void(0)" class="btn btn-danger"
                                           wire:click.prevent="deleteConfirmation({{ $user->id }})">
                                             حذف
                                        </a>
                                    </td>
                                    <td class="my-3">
                                        <a href="#" wire:click.prevent="activeUser({{ $user->id }})" class="btn
                                        {{ $user->banned == 0 ? 'btn-success' : 'btn-danger' }} btn-sm my-3">
                                            {{ $user->banned == 0 ? 'فعال' : 'غیر فعال' }}
                                        </a>
                                    </td>
                            </tr>

                        @endforeach
                    @endisset
                    </tbody>
                </table>
            </div>

            <div class="col-xl-7 col-lg-7 col-md-7 mt-5">
                {{ $users->links() }}
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
            position: 'top',
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

