<div>
    @section('page_title')
        {{ $article->title_persian }}
    @endsection
    <div class="container   ws-article-page-main">
        @if($article != null)

            <div class="row d-flex flex-column align-items-center my-5">
                <!-- article image -->
                <div class="col-sm-6 d-flex justify-content-center  ws-article-img">
                    <img src="{{ asset('/storage/articles/'.$article->image) }}" loading="lazy" class="rounded-4" alt="article-image">
                </div>
                <!-- article title -->
                <div class="col-sm-6 my-4 d-flex justify-content-evenly ">
                    <div class="col">
                        <h1> {{ $article->title_persian }}</h1>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <h4> {{ $article->title_english }}</h4>
                    </div>
                </div>
                <!-- article author -->
                <div class="col-sm-6 d-flex  justify-content-between mt-2 border border-2 rounded-3 ">
                    <div class="ws-post-author-name py-3">
                        <span class=""><i class="fas fa-pen"></i>{{ $article->user->name }}</span>
                    </div>
                    <div class="ws-post-created-date  py-3">
                        <span class=""> {{ jdate($article->created_at)->ago() }}</span>
                    </div>
                </div>
                <!-- article description -->
                <div class="col-sm-6 d-flex my-4 justify-content-center ws-article-card-text">
                    <div class="desc">
                        {!! $article->description !!}
                    </div>
                </div>
                <!-- article like & view -->
                <div class="col-sm-6 d-flex justify-content-between ws-post-like-section">
                    <div class="col">
                        <span class="ws-post-view-count">{{ $article->views }}</span>
                        <i class="fa-solid fa-eye"></i>
                        @auth
                            <i class="far fa-heart" style="color:tomato" id="add-like"
                               data-article="{{ $article->id }}"></i>
                        @else
                            <i class="far fa-heart fa-border-style" style="color:tomato" id="add-like-un-auth"></i>
                        @endauth
                    </div>
                </div>

            </div>


            <!-- article write comment -->
            <div class="row d-flex justify-content-center ws-article-form-comment my-4">
                <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-9 col-9">
                    <form id="add-comment">
                        @auth
                            <input type="hidden" id="article-id" value="{{ $article->id }}">
                            <div class="mb-3">
                                <label for="body-comment" class="form-label">دیدگاه</label>
                                <textarea class="form-control"
                                          placeholder="متن دیدگاه خود را وارد کنید."
                                          id="body-comment"
                                          rows="6"></textarea>
                            </div>
                            <div class="mb-3 mt-3">
                                <button type="sumbit" class="btn btn-success">ثبت دیدگاه</button>
                            </div>
                        @else
                            <div class="mb-3">
                                <a href="{{ route('register.form') }}" class="btn btn-outline-primary">
                                    برای ارسال
                                    دیگاه ابتدا
                                    وارد سایت
                                    شوید یا اگر عضو نیستید ثبت نام کنید.</a>
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
                                     src="{{ $comment->user->image_path  ? asset('storage/users/' . $comment->user->image_path): asset('assets/images/users/no-user.png') }}"
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
</div>
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
    @endpush

    </div>
