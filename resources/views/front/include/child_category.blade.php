@foreach ($category as $child)
    <li class="mt-4 mb-4 px-5 child-category">
        <a href="{{ route('article.category',[$child]) }}">{{ $child->title_persian }}</a></li>
    <ul class="ps-2">
        @if (count($child->children))
            @include('front.include.child_category', ['category' => $child->children])
        @endif
    </ul>
@endforeach
