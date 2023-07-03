@foreach($child as $category)
    <div class="card  item-category bg-white rounded border border-secondary">
        <div class="card-header ">
            {{--start category content --}}

                @if(count($category->children))
                <div class="item-category-title d-flex flex-row">
                    <a class="btn my-3" style="width: 400px" href="#collapse{{ $category->id }}" data-bs-toggle="collapse"><h6>{{ $category->title_persian }}</h6></a>
                </div>
                <div class="item-category-title d-flex flex-row">
                    <a class="btn my-3" style="width: 400px" href="#collapse{{ $category->id }}" data-bs-toggle="collapse"><h6>{{ $category->title_english }}</h6></a>
                </div>
                @else
                <div class="item-category-title d-flex flex-row">
                    <a class="btn my-3" style="width: 400px" href="#collapse{{ $category->id }}" data-bs-toggle="collapse">{{ $category->title_persian }}</a>
                </div>
                <div class="item-category-title d-flex flex-row">
                    <a class="btn my-3 " style="width: 400px" href="#collapse{{ $category->id }}" data-bs-toggle="collapse">{{ $category->title_english }}</a>
                </div>
                @endif

            <div class="item-category-actions my-4">
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
            {{--end category content --}}
        </div>
    </div>
    <div class="collapse show" id="collapse{{$category->id}}">
        @if(!$category->chlidren)
            @include('admin.category.child_category',['child'=>$category->children])
        @endif
    </div>
@endforeach
