@if($data)
 <ul>
    @foreach($data as $item)
    <li>
        <a href="/products/category/{{ $item->id }}">{{ $item->title }}</a>
    </li>
    @endforeach
 </ul>

@endif
