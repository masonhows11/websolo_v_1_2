<div>
    @section('page_title')
        {{ $article->title_persian }}
    @endsection
    <div class="container   ws-article-page-main">
        @if($article != null)

            <div class="row d-flex flex-column align-items-center my-5">
                <!-- article image -->
                <div class="col-sm-6 d-flex justify-content-center  ws-article-img">
                    <img src="{{ asset('/storage/articles/'.$article->image) }}" loading="lazy"
                         class="img-thumbnail rounded-4" alt="article-image">
                </div>
                <!-- article title -->
                <div class="col-sm-6 my-4 d-flex justify-content-evenly ">
                    <div class="col">
                        <h4 class="h4"> {{ $article->title_persian }}</h4>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <h4 class="h4"> {{ $article->title_english }}</h4>
                    </div>
                </div>
                <!-- article author -->
                <div class="col-sm-6  d-flex justify-content-between  mt-2 border border-2 rounded-3 ">
                    <div class="ws-article-author-name py-3">
                        <span class=""><i class="fas fa-pen"></i>{{ $article->user->name }}</span>
                    </div>
                    <div class="ws-article-created-date  py-3">
                        <span class=""> {{ jdate($article->created_at)->ago() }}</span>
                    </div>
                </div>
                <!-- article description -->
                <div
                    class="col-sm-6 mx-auto d-flex flex-column my-4 rounded rounded-4    w3-flat-clouds ws-article-card-text">

                    <div class="desc px-2 py-3 ">
                        {!! $article->description !!}
                    </div>

                    <div class="col ws-article-view-like">
                        <!-- article like & view -->
                        <div class="d-flex justify-content-end">
                            <div class="ws-sample-view-count my-2 d-flex flex-row me-2">
                                <div class="me-2 py-1">{{ $view_count }}</div>
                                <div class="me-2">{{ __('messages.views') }}</div>
                            </div>
                            <div class="ws-sample-like-count my-2 d-flex flex-row  me-2">
                                <div class="me-2 py-1">{{ $like_count }}</div>
                                <div wire:click="add_like">
                                    <i class="{{ $is_auth_liked  ? 'fa-solid fa-heart' : 'far fa-heart'  }}"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <!-- article write comment -->
            <div class="row d-flex justify-content-center  my-4">
                <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-4 col-10">
                    <form wire:submit.prevent="add_comment">
                        @auth
                            <div class="mb-3">
                                <label for="body-comment" class="form-label">دیدگاه</label>
                                <textarea class="form-control"
                                          id="body-comment"
                                          wire:model="body"
                                          placeholder="متن دیدگاه خود را وارد کنید."
                                          rows="6"></textarea>
                                @error('body')
                                <div class="alert alert-danger mt-3">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <button type="sumbit" class="btn btn-success">ثبت دیدگاه</button>
                            </div>
                        @else
                            <div class="mb-3 d-flex justify-content-center">
                                <a href="{{ route('register.form') }}" class="btn btn-outline-primary text-center">
                                    {{ __('messages.login_first_to_post_your_comment') }}
                                </a>
                            </div>
                        @endauth
                    </form>
                </div>
            </div>

            <!-- article list comment -->
            <div class="row my-5 ws-article-list-comment d-flex">
                @if ($article->comments->where('article_id', '=', $article->id)->where('approved','=',1))
                    @foreach ($article->comments->where('approved',1) as $comment)
                        <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-9 col">
                            <div class="d-flex flex-start mb-4">
                                <img class="rounded-circle shadow-1-strong me-3"
                                     src="{{ $comment->user->image_path
                                    ? asset('storage/users/' . $comment->user->image_path):
                                     asset('assets/front/images/avatar/no-user.png') }}"
                                     alt="avatar"/>
                                <div class="card w-100">
                                    <div class="card-body p-4">
                                        <div class="">
                                            <h5>{{ $comment->user->name }}</h5>
                                            <p class="small comment-date">{{ jDate($comment->created_at)->ago() }}</p>
                                            <p> {{ $comment->body }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

    </div>

    @endif
    @push('front_custom_scripts')
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
            @if(session()->has('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        text: {{ session('success') }},
                    })
                </script>
            @endif
    @endpush
</div>




