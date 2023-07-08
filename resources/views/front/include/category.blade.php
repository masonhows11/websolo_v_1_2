@foreach ($categories as $category)
    <div class="py-1 root-category mt-2 px-3">
        <a  href="{{ route('article.category',[$category]) }}"   >{{ $category->title_persian }}</a>
    </div>
    <ul class="mt-2">
        @include('front.include.child_category', ['category' => $category->children])
    </ul>
@endforeach
