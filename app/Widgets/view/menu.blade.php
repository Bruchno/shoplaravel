@if($data)
<div class="menu classic">
 <ul class="sidebar_list">
    @foreach($data as $item)
    <li>
        <a href="/products/category/{{ $item->id }}">{{ $item->title }}</a>
    </li>
    @endforeach
 </ul>
</div>
@endif