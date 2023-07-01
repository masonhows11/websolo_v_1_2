<div>
    @section('admin_title')
        لیست زبان های سمت کاربر
    @endsection
    <div class="container-fluid">

        <div class="row d-flex justify-content-center admin-front-end">
            <div class="col-xl-4 col-lg-4 col-md-4">
                <form wire:submit.prevent="storeFront">
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">نام زبان ( فارسی )</label>
                        <input type="text" wire:model.lazy="title_persian"
                               class="form-control"
                               id="name">
                    </div>
                    @error('title_persian')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">نام زبان ( انگلیسی )</label>
                        <input type="text"    wire:model.lazy="title_english"
                               class="form-control title_english"
                               id="name">
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
            <div class="col-xl-7 col-lg-7 col-md-7 bg-white rounded-3 admin-lng-list">
                <table class="table">
                    <thead>
                    <tr class="text-center">
                        <th>شناسه</th>
                        <th>نام زبان</th>
                        <th>نام زبان (enlish)</th>
                        <th>ویرایش</th>
                        <th>حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    @isset($front_ends)
                        @foreach($front_ends as $lng)
                            <tr class="text-center">
                                <td><p class="my-3">{{ $lng->id }}</p></td>
                                <td><p class="my-3">{{ $lng->title_persian }}</p></td>
                                <td><p class="my-3">{{ $lng->title_english }}</p></td>
                                <td class="my-2">
                                    <a href="javascript:void(0)" class="btn btn-danger my-2"
                                       wire:click.prevent="deleteConfirmation({{ $lng->id }})">
                                        {{ __('messages.delete_model') }}
                                    </a>
                                </td>
                                <td class="my-2">
                                    <a href="javascript:void(0)" class="btn btn-success my-2"
                                       wire:click.prevent="editFront({{ $lng->id }})" >
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
