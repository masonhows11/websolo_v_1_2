<div>
    @section('admin_title')
        لیست دیدگاه ها
    @endsection
    <div class="container">
        <div class="row d-flex flex-column list-unapproved-comments">
            <div class="col-md-4 post-card-section">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset('/storage/articles/' . $article->image) }}"  class="card-img-top"
                                 alt="article-image">
                            <div class="card-body mt-3 comment-post-title">
                                <h4 class="card-title">{{ $article->user->name }}</h4>
                                <h5 class="card-title">{{ $article->title_persian }}
                                    - {{ $article->title_english }}</h5>
                                <p>{!! substr($article->short_description, 0, 200) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($article->comments->count() != null)
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item mt-5">
                        <div class="accordion-header border border-2" id="headingOne">
                            <bottun class="accordion-button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-{{ $article->id }}" aria-expanded="true"
                                    aria-controls="collapseOne">
                            </bottun>
                        </div>
                        <div id="collapse-{{ $article->id }}"
                             class="accordion-collapse collapse {{ $article->comments->count() >= 1 ? 'show' : '' }}"
                             aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                @foreach ($article->comments as $comment)
                                    <div class="d-flex flex-row p-3 h-auto">
                                        <div class="w-100 border border-1 p-4 rounded-3 bg-light">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex flex-row align-items-center"><span
                                                        class="mr-2 comment-user">{{ $comment->user->name }}</span>
                                                </div>
                                            </div>
                                            <p class="text-justify comment-text mt-4 mb-0">
                                                {{ $comment->body }}
                                            </p>
                                            <div class="comment-operation">
                                                <div class="mbt-3 mt-3 p-4 d-flex flex-row">
                                                    <button type="button"
                                                            wire:click="deleteConfirmation({{ $comment->id }})"
                                                            class="btn btn-danger btn-sm me-7">
                                                            حذف
                                                    </button>
                                                    <button type="button"
                                                            wire:click="CommentConfirm({{$comment->id}})"
                                                            class="btn {{ $comment->approved == 0 ? 'btn-danger' : 'btn-success' }}  btn-sm">
                                                        {{ $comment->approved == 0 ? __('messages.not_confirmed') : __('messages.confirmed') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-md-4">
                    <div class="alert alert-light mt-5 border border-3">
                        <strong class="text-gray-700">{{ __('messages.there_is_no_comment_for_this_post') }}</strong>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@push('dash_custom_scripts')
    <script type="text/javascript">
        window.addEventListener('show-delete-confirmation', event => {
            Swal.fire({
                title: 'آیا مطمئن هستید این آیتم حذف شود؟',
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
        window.addEventListener('show-delete-success', event => {
            Swal.fire({
                icon: 'success',
                text: 'رکورد مورد نظر با موفقیت حذف شد.',
            })
        })
    </script>
@endpush
