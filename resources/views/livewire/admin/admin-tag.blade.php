<div>
    @section('dash_page_title')
        تگ ها
    @endsection
    <div class="container-fluid">

        <div class="row d-flex justify-content-center admin-role-alert">
            @if(session()->has('success'))
                <div
                    class="col-xl-7 col-lg-7 col-md-7 alert alert-success alert-dismissible alert-component text-center">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>{{ session('success') }}</strong>
                </div>
            @endif
            @if(session()->has('error'))
                <div
                    class="col-xl-7 col-lg-7 col-md-7 alert alert-danger alert-dismissible alert-component text-center">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>{{ session('error') }}</strong>
                </div>
            @endif
        </div>

        <div class="row d-flex justify-content-center admin-create-new-tag">
            <div class="col-xl-4 col-lg-4 col-md-4">
                <form wire:submit.prevent="storeTag">
                    <div class="mb-3 mt-3">
                        <label for="title_persian" class="form-label">نام تگ ( فارسی ) :</label>
                        <input type="text" wire:model.lazy="title_persian"
                               class="form-control"
                               id="title_persian" autocomplete="on">
                    </div>
                    @error('title_persian')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="mb-3 mt-3">
                        <label for="title_english" class="form-label">نام تگ ( انگلیسی ) :</label>
                        <input type="text" wire:model.lazy="title_english"
                               class="form-control"
                               id="title_english"  autocomplete="on">
                    </div>
                    @error('title_english')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">ذخیره</button>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">بازگشت</a>
                    </div>
                </form>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-7 bg-white rounded-3 admin-tag-list">
                <table class="table">
                    <thead>
                    <tr class="text-center">
                        <th>شناسه</th>
                        <th>نام تگ</th>
                        <th>ویرایش</th>
                        <th>حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    @isset($tags)
                        @foreach($tags as $tag)
                            <tr class="text-center">
                                <td><div class="my-3">{{ $tag->id }}</div></td>
                                <td><div class="my-3">{{ $tag->title_persian }}</div></td>
                                <td class="my-3">
                                    <a href="javascript:void(0)" class="btn btn-danger my-3"
                                       wire:click.prevent="deleteConfirmation({{ $tag->id }})">
                                        {{ __('messages.delete_model') }}
                                    </a>
                                </td>
                                <td class="my-3">
                                    <a href="javascript:void(0)" class="btn btn-primary my-3"
                                       wire:click.prevent="editTag({{ $tag->id }})" >
                                       {{ __('messages.edit_model') }}
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
        window.addEventListener('show-delete-confirmation',event => {
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
