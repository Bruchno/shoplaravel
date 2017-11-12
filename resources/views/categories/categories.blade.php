@extends('layouts.admin')

@section('content')
<div id="templatemo_menu" class="ddsmoothmenu"><ul><li>
            <a href="/categories/create" class=" selected">Добавить</a></li></ul></div>
@if($message != '')
    <h2>{{$message}}</h2>
@endif
<table style='width: 100%;'>
<tr>
<td>id</td>
<td>Название</td>
<td>Действие</td>
<td>Действие</td>
</tr>
@foreach ($categories as $category)
<tr><td>{{ $category->id }}</td>
<td>{{$category->title}}</td>
<td> <a href="/categories/{{$category->id}}/edit">Изменить</a></td>
<td> 
 <!--   {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete'])!!}
   {!! Form::token() !!} 
   {!! Form::submit("Удалить") !!}
   {!! Form::close() !!}-->
   <form method="POST" action="/categories/{{$category->id}}">
<input type="hidden" name="_method" value="delete"/>
<input type="hidden" name="_token" value="{{csrf_token()}}"/>
<button type="submit"><img src='/images/remove.png'/></button>
</form>
<td>
</tr>
@endforeach

</ul>
</table>
@endsection
<script>
</script>