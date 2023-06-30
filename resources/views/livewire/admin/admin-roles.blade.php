<div>
    @section('admin_title')
        نقش ها
    @endsection
    @section('breadcrumb')
      {{--  {{ Breadcrumbs::render('admin.roles') }}--}}
    @endsection
    <div class="container">


        <div class="row d-flex justify-content-center admin-create-new-role">
            <div class="col-xl-7 col-lg-7 col-md-7">
                <form wire:submit.prevent="storeRole">
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">نام نقش :</label>
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
                    @isset($roles)
                        @foreach($roles as $role)
                            <tr class="text-center">
                                <td><p class="my-3">{{ $role->id }}</p></td>
                                <td><p class="my-3">{{ $role->name }}</p></td>
                                @if($role->name == 'admin')
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
                                    <td class="">
                                        <a href="javascript:void(0)" class="btn btn-danger"
                                           wire:click.prevent="deleteConfirmation({{ $role->id }})">
                                           {{ __('messages.delete_model') }}
                                        </a>
                                    </td>
                                    <td class="">
                                        <a href="javascript:void(0)" class="btn btn-success"
                                           wire:click="editRole({{ $role->id }})">
                                            {{ __('messages.edit_model') }}
                                        </a>
                                    </td>
                                @endif
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
