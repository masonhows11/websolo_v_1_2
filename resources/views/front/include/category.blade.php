@foreach ($categories as $category)
    <div class="px-3 mt-3 mb-3  root-category ">
        <a  href="{{ route('article.category',[$category]) }}"   >{{ $category->title_persian }}</a>
    </div>
    <ul class="mt-2">
        @include('front.include.child_category', ['category' => $category->children])
    </ul>
@endforeach
