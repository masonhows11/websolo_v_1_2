@foreach ($category as $child)
    <li class="pe-2 mt-3 mb-3 px-3">
        <a href="{{ route('article.category',[$child]) }}">{{ $child->title_persian }}</a></li>
    <ul class="ps-2">
        @if (count($child->children))
            @include('front.include.child_category', ['category' => $child->children])
        @endif
    </ul>
@endforeach
