@foreach ($category as $child)
    <li class="py-1 pe-2 py-2 px-3">
        <a href="{{ route('article.category',[$child]) }}">{{ $child->title_persian }}</a></li>
    <ul class="ps-2">
        @if (count($child->children))
            @include('front.include.child_category', ['category' => $child->children])
        @endif
    </ul>
@endforeach
