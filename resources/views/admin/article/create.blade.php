@extends('admin.include.master')
@section('admin_title')
    مقاله جدید
@endsection
@section('admin_main')
    <div class="container">
        <div class="row d-flex justify-content-center article-section-create">

            <div class="col-xl-12 col-lg-10 col-md-10">

                <form action="{{ route('admin.article.store') }}" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="my-5">
                                <label for="title_persian" class="form-label">عنوان مقاله ( فارسی )</label>
                                <input type="text" name="title_persian"
                                       class="form-control @error('title_persian') is-invalid @enderror"
                                       id="title_persian"
                                       value="{{ old('title_persian') }}">
                                @error('title_persian')
                                <div class="my-5 alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="my-5">
                                <label for="title_english" class="form-label">عنوان مقاله ( انگلیسی ) </label>
                                <input type="text" name="title_english"
                                       class="form-control text-left @error('title_english') is-invalid @enderror"
                                       id="title_english"
                                       value="{{ old('title_english') }}">
                                @error('title_english')
                                <div class="my-5 alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="my-5 col-xl-6 col-lg-6">
                            <label for="tag-select" class="form-label">انتخاب تگ :</label>
                            <select class="chosen-select form-select" multiple data-placeholder="انتخاب تگ...."
                                    id="tag-select" name="tag[]">
                                <option value="0"></option>
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->title_persian }}</option>
                                @endforeach
                            </select>
                            @error('tag')
                            <div class="my-5 alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="my-5 col-xl-6 col-lg-6">
                            <label for="category-select" class="form-label">انتخاب دسته بندی :</label>
                            <select class="chosen-select form-select"
                                    multiple data-placeholder="انتخاب دسته بندی...."
                                    id="category-select"
                                    name="category[]">
                                <option value="0"></option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title_persian }}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <div class="my-5 alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                    </div>


                    <div class="mt-5 row">
                        <div class="mt-5 col-xl-6 col-lg-6">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="button" id="button-image">انتخاب عکس
                                    </button>
                                </div>
                                <input type="text" id="image_label"
                                       class="form-control @error('image') is-invalid @enderror" name="image"
                                       aria-label="Image" aria-describedby="button-image" readonly>
                            </div>
                            @error('image')
                            <div class="my-5 alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="my-5 form-group">
                        <label for="short-description-editor" class="form-label">خلاصه :</label>
                        <textarea class="form-control @error('short_description') is-invalid @enderror"
                                  id="short-description-editor"
                                  name="short_description">{{ old('short_description') }}</textarea>
                    </div>
                    @error('short_description')
                    <div class="my-5 alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="my-5 form-group">
                        <label for="description-editor-text" class="form-label">توضیحات :</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  id="description-editor-text"
                                  name="description">{{ old('description') }}</textarea>
                    </div>
                    @error('description')
                    <div class="my-5 alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="my-5 form-group">
                        <button type="submit" class="btn btn-success">ذخیره</button>
                        <a href="{{ route('admin.article.index') }}" class="btn btn-secondary">بازگشت</a>
                    </div>


                </form>

            </div>
        </div>

    </div>
@endsection
@push('dash_custom_scripts')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/chosen/chosen.min.css') }}">
    <script type="text/javascript" src="{{ asset('assets/admin/plugins/chosen/chosen.jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
    <script>
        // ckeditor
        CKEDITOR.replace('description-editor-text', {
            language: 'fa',
            removePlugins: 'image',
        });
        CKEDITOR.replace('short-description-editor', {
            language: 'fa',
            removePlugins: 'image',
        });
        // file manager
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById('button-image').addEventListener('click', (event) => {
                event.preventDefault();
                window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            });
        });

        // set file link
        function fmSetLink($url) {
            document.getElementById('image_label').value = $url;
        }
        // chosen
        $('.chosen-select').chosen({rtl: true, width: "100%"})
    </script>
@endpush

