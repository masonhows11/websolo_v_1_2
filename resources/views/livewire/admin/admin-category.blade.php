<div>
    @section('dash_page_title')
        دسته بندی ها
    @endsection
    <div class="container-fluid">

        <div class="row d-flex justify-content-center  mt-5 category-section-index">
            <!-- creat category -->
            <div class="col-lg-4 col-md-5  col-sm-5 col-xs-5  category-create">
                <form wire:submit.prevent="storeCategory">
                    <div class="mb-3 mt-3">
                        <label for="title" class="form-label">عنوان دسته بندی به فارسی :</label>
                        <input type="text" wire:model.lazy="title_persian"
                               class="form-control"
                               id="title">
                    </div>
                    @error('title_persian')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">عنوان دسته بندی به انگلیسی:</label>
                        <input type="text" wire:model.lazy="title_english" dir="ltr"
                               class="form-control text-left" id="name">
                    </div>
                    @error('title_english')
                    <div class="alert alert-danger">{{ $message}}</div>
                    @enderror
                    <div class="mb-3 mt-3">
                        <label for="parent" class="form-label">انتخاب دسته بندی والد:</label>
                        <select class="form-control" wire:model.lazy="parent" id="parent">
                            <option value="null">فاقد دسته بندی</option>
                            @foreach($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->title_persian }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 mt-3">
                        <button type="submit" class="btn btn-success">ذخیره</button>
                    </div>
                </form>
            </div>

            <!-- list categories -->
            <div class="col-xl-7 col-lg-7 col-sm-6 col-xs-10">
                @if($categories->isEmpty())
                    <div
                        class="alert d-flex justify-content-center border border-2 border-light alert-light no-categories">
                        <p class="text-center my-auto">دسته بندی وجود ندارد.</p>
                    </div>
                @else
                    <div class="category-content">
                        @foreach($category_tree as $category)
                            <div id="accordion">
                                <div class="card mt-4">
                                    <div class="card-header d-flex justify-content-around item-category bg-white rounded border border-secondary">

                                        <div class="item-category-title">
                                            <a class="btn my-3 text-black" href="#collapse{{ $category->id }}"
                                               data-bs-toggle="collapse" ><h6>{{ $category->title_persian }}</h6>
                                            </a>
                                        </div>

                                        <div class="item-category-title me-5">
                                            <a class="btn my-3 text-black " href="#collapse{{ $category->id }}"
                                               data-bs-toggle="collapse" ><h6>{{ $category->title_english }}</h6>
                                            </a>
                                        </div>



                                        <div class="item-category-actions  my-5">
                                            @if($category->parent_id == null)
                                                <a href="javascript:void(0)" wire:click.prevent="editCategory({{ $category->id}})" class="btn btn-primary mx-4">
                                                   {{ __('messages.edit_model') }}
                                                </a>
                                                <a href="javascript:void(0)" wire:click.prevent="deleteConfirmation({{ $category->id }})" class="btn btn-danger">
                                                   {{ __('messages.delete_model') }}
                                                </a>
                                            @else
                                                <a href="javascript:void(0)" wire:click.prevent="editCategory({{ $category->id}})" class=" btn btn-primary mx-4">
                                                    {{ __('messages.edit_model') }}
                                                </a>
                                                <a href="javascript:void(0)" wire:click.prevent="detachCategory({{ $category->id }})" class="btn btn-warning mx-4">
                                                    {{ __('messages.detach') }}
                                                </a>
                                                <a href="javascript:void(0)" wire:click.prevent="deleteConfirmation({{ $category->id }})" class="btn btn-danger">
                                                    {{ __('messages.delete_model') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse show" id="collapse{{$category->id}}">
                                    @if(!$category->chlidren)
                                        @include('admin.category.child_category',['child'=>$category->children])
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
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
