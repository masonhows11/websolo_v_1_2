<div>

    @section('page_title')
    @endsection
    <div class="container ws-sample-page-main">
    @if($sample != null )
        <!-- main info -->
            <div class="row my-3  w3-flat-clouds rounded-3">

                <div class="col py-4 d-flex justify-content-center">
                    <img src="{{ asset('storage/samples/'. $sample->main_image) }}" loading="lazy"
                         class="h-100" alt="sample-main-image">
                </div>

                <div class="col py-2 d-flex flex-column">
                    <div class="mt-4">
                        <h3 class="my-2 h3">{{ $sample->title_persian }}</h3>
                        <h5 class="my-2 h4">{{ $sample->title_english }}</h5>
                    </div>
                    <div class="mt-4">
                        <h4 class="text-black">جزئیات توسعه پروژه :</h4>
                    </div>
                    <div class="py-3 mt-2">
                        <h5>بک اند (back-end)</h5>
                        @foreach ($sample->backEnds as $lng)
                            <ul class="list-group  ws-sample-back-end-list list-group-flush list-group-horizontal my-2 py-2">
                                <li class="">{{ $lng->title_persian }}</li>
                            </ul>
                        @endforeach
                        <h5>فرانت اند (front-end)</h5>
                        @foreach ($sample->frontEnds as $lng)
                            <ul class="list-group  ws-sample-front-end-list list-group-flush list-group-horizontal my-2 py-2">
                                <li class="">{{ $lng->title_persian }}</li>
                            </ul>
                        @endforeach
                    </div>
                    <div class="mt-5">
                        <h4 class="mb-2">خلاصه :</h4>
                        <div class="">
                            {!! $sample->short_description !!}
                        </div>
                    </div>
                    <div class="mt-5">
                        <p class="ws-sample-created_at_date">ایجاد شده در تاریخ
                            : {{ JDate($sample->created_at)->format('Y/m/d') }}</p>
                    </div>
                </div>
            </div>



            <!-- description -->
            <h4 class="my-3 h3"> توضیحات</h4>
            <div class="row d-flex flex-column  w3-flat-clouds rounded-3">

                <div class="col mx-3 py-5 ws-sample-full-description">
                    {!! $sample->description !!}
                </div>

                <div class="col">
                    <div class="d-flex justify-content-end">

                        <div class="ws-sample-view-count my-2 d-flex flex-row me-2">
                            <div class="me-2">{{ $sample->views }}</div>
                            <div class="me-2">{{ __('messages.views') }}</div>
                        </div>
                        <div class="ws-sample-like-count my-2 d-flex flex-row  me-2">
                            <div class="me-2" id="like-count">{{ $sample->likes()->count() }}</div>
                            <div><i class="far fa-heart"></i></div>
                        </div>

                    </div>
                </div>
            </div>


            <!-- image gallery -->
            <h4 class="my-3 h3">تصاویر پروژه</h4>
            <div
                class="row  row-cols-xxl-4 row-cols-xl-4 row-cols-lg-2 row-cols-md-2 row-cols-1 d-flex justify-content-evenly sample-gallery mt-3 mb-4 w3-flat-clouds rounded-3">
                <div class="col my-5">
                    <img src="{{ asset('storage/samples/' . $sample->image1) }}" class="img-thumbnail h-100"
                         loading="lazy" alt="sample-gallery-image" data-bs-toggle="modal"
                         data-bs-target="#imageModal_1">
                </div>
                <div class="col my-5">
                    <img src="{{ asset('storage/samples/' . $sample->image2) }}" class="img-thumbnail h-100"
                         loading="lazy" alt="sample-gallery-image" data-bs-toggle="modal"
                         data-bs-target="#imageModal_2">
                </div>
                <div class="col my-5">
                    <img src="{{ asset('storage/samples/' . $sample->image3) }}" class="img-thumbnail h-100"
                         loading="lazy" alt="sample-gallery-image" data-bs-toggle="modal"
                         data-bs-target="#imageModal_3">
                </div>
                <div class="col my-5">
                    <img src="{{ asset('storage/samples/' . $sample->image4) }}" class="img-thumbnail h-100"
                         loading="lazy" alt="sample-gallery-image" data-bs-toggle="modal"
                         data-bs-target="#imageModal_4">
                </div>
            </div>


            <!-- The Modal 4 -->
            <div class="modal fade" id="imageModal_4">
                <div class="modal-dialog modal-xl modal-lg modal-sm  modal-dialog-centered">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">تصویر شماره ۴</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body d-flex justify-content-center">
                            <img src="{{ asset('storage/samples/' . $sample->image4) }}"
                                 class="img-fluid img-thumbnail " style="max-height:600px" loading="lazy" alt="">
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">بستن</button>
                        </div>

                    </div>
                </div>
            </div>
            <!-- The Modal 3 -->
            <div class="modal fade" id="imageModal_3">
                <div class="modal-dialog modal-xl modal-lg modal-sm  modal-dialog-centered ">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">تصویر شماره ۳</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body d-flex justify-content-center">
                            <img src="{{ asset('storage/samples/' . $sample->image3) }}"
                                 class="img-fluid img-thumbnail " style="max-height:600px" loading="lazy" alt="">
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">بستن</button>
                        </div>

                    </div>
                </div>
            </div>
            <!-- The Modal 2 -->
            <div class="modal fade" id="imageModal_2">
                <div class="modal-dialog modal-xl modal-lg modal-sm  modal-dialog-centered ">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">تصویر شماره ۲</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body d-flex justify-content-center">
                            <img src="{{ asset('storage/samples/' . $sample->image2) }}"
                                 class="img-fluid img-thumbnail" style="max-height:600px" loading="lazy" alt="">
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">بستن</button>
                        </div>

                    </div>
                </div>
            </div>
            <!-- The Modal 1 -->
            <div class="modal fade " id="imageModal_1">
                <div class="modal-dialog modal-xl modal-lg modal-sm  modal-dialog-centered ">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">تصویر شماره ۱</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body d-flex justify-content-center">
                            <img src="{{ asset('storage/samples/' . $sample->image1) }}"
                                 class="img-fluid img-thumbnail " style="max-height:600px" loading="lazy" alt="">
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">بستن</button>
                        </div>

                    </div>
                </div>
            </div>
        @endif


        <div class="row d-flex justify-content-center  my-4">
            <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-4 col-10">
                <form id="add-comment">
                    @auth
                        <input type="hidden" id="sample-id" value="{{ $sample->id }}">
                        <div class="mb-3">
                            <label for="body-comment" class="form-label">دیدگاه</label>
                            <textarea class="form-control" placeholder="متن دیدگاه خود را وارد کنید." id="body-comment"
                                      rows="6">
                            </textarea>
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

        <div class="row my-5 list-comments-section d-flex justify-content-center align-items-center">
            @if ($sample->comments->where('sample_id', '=', $sample->id)->where('approved', '=', 1))
                @foreach ($sample->comments->where('approved', 1) as $comment)
                    <div class="col-md-11 col-lg-9 col-xl-7">

                        <div class="d-flex flex-start mb-4">

                            <img class="rounded-circle shadow-1-strong me-3"
                                 src="{{ $comment->user->image_path
                                    ? asset('storage/users/' . $comment->user->image_path)
                                    : asset('assets/images/users/no-user.png') }}"
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
</div>


