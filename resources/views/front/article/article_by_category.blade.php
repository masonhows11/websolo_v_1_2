@extends('front.include.master_front')
@section('page_title')
    مقالات
@endsection
@section('main_content')
    <div class="container">

        <div class="row mt-5">

            <div class="col-md-2 article-category mt-2 py-1 w3-flat-clouds rounded-3 ">
                @include('front.include.category')
            </div>

            <div class="col-md-10">
                <div class="row  row-cols-xxl-3 row-cols-xl-3 row-cols-lg-3 row-cols-md-2 row-cols-1">
                    @if ($articles->count())
                        @foreach ($articles as $article)
                            <div class="col my-2">
                                <div class="ws-article-card d-flex flex-column h-100">
                                    <div class="ws-article-img-card">
                                        <img src="{{ asset('storage/articles/' . $article->image) }}"
                                             class="img-fluid rounded" alt="article-image"/>
                                    </div>
                                    <div class="ws-article-card-body">
                                        <div class="ws-article-card-title pt-3"><h5 class="h5">{{ $article->title_persian }}</h5></div>
                                        <div class="ws-article-card-text my-1">
                                            <div class="desc">
                                                {!! $article->short_description !!}
                                            </div>
                                        </div>
                                        <div class="ws-article-card-footer d-flex justify-content-between my-1">
                                            <div class="py-2 px-2 ws-article-date">
                                                <i class="fa-regular fa-clock me-2"></i>
                                                {{ jDate($article->created_at)->ago()  }}
                                            </div>
                                            <a class="ws-article-continue-btn me-3 pt-2" href="{{ route('article', ['article'=>$article->slug]) }}">ادامه....</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 d-flex justify-content-center">
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


{{--@extends('front.include.master_front')
@section('page_title')
    مقالات
@endsection
@section('main_content')
    <div class="container">

        <div class="ws-articles-wrapper d-flex justify-content-evenly mt-5">
            <div class="article-category mt-3 w3-flat-clouds rounded-3 " style=" max-height: max-content;">
                @include('front.include.category')
            </div>
            <div class="d-flex flex-wrap mx-3 ws-articles-page-main">
                @if ($articles->count())
                    @foreach ($articles as $article)
                        <div class="ws-article-card mx-2 my-2">
                            <div class="d-flex flex-column  my-2 h-100">
                                <div class="ws-article-img-card">
                                    <img src="{{ asset('storage/articles/' . $article->image) }}"
                                         class="img-fluid rounded" alt="article-image"/>
                                </div>
                                <div class="ws-article-card-body mt-2">
                                    <div class="ws-article-card-title pt-3">
                                        <h5 class="h5">{{ $article->title_persian }}</h5>
                                    </div>
                                    <div class="ws-article-card-text my-1">
                                        <div class="desc">
                                            {!! $article->short_description !!}
                                        </div>
                                    </div>
                                    <div class="ws-article-card-footer d-flex justify-content-between my-2">
                                        <div class="py-2 px-2 ws-article-date">
                                            <i class="fa-regular fa-clock me-2"></i>
                                            {{ jDate($article->created_at)->ago()  }}
                                        </div>
                                        <a class="ws-article-continue-btn me-3 pt-2"
                                           href="{{ route('article', ['article'=>$article->slug]) }}">ادامه....</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 d-flex justify-content-center">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
@endsection--}}


