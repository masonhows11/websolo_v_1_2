<div>
    @section('admin_title')
        مجوزها
    @endsection
    @section('breadcrumb')
        {{ Breadcrumbs::render('admin.perms') }}
    @endsection
    <div class="container">

        <div class="row d-flex justify-content-center admin-create-new-role">
            <div class="col-xl-7 col-lg-7 col-md-7">
                <form wire:submit.prevent="storePerm">
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">نام مجوز :</label>
                        <input type="text" wire:model.defer="name"
                               class="form-control"
                               id="name">
                    </div>
                    @error('name')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">ذخیره</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row d-flex justify-content-center admin-list-roles">
            <div class="col-xl-7 col-lg-7 col-md-7 bg-white rounded-3 list-content">
                <table class="table">
                    <thead>
                    <tr class="text-center">
                        <th>شناسه</th>
                        <th>نام نقش</th>
                        <th>ویرایش</th>
                        <th>حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    @isset($perms)
                        @foreach($perms as $perm)
                            <tr class="text-center">
                                <td>{{ $perm->id }}</td>
                                <td>{{ $perm->name }}</td>
                                <td class="mb-3">
                                    <a href="javascript:void(0)"
                                       wire:click.prevent="deleteConfirmation({{ $perm->id }})">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td class="mb-3">
                                    <a href="javascript:void(0)" wire:click="editPerm({{ $perm->id }})">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endisset
                    </tbody>
                </table>
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
