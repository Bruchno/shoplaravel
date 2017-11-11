@extends('layouts.admin')

@section('content')
@if($message != '')
    <span>{{$message}}</span>
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
<td> <form method="POST" action="/categories/{{$category->id}}">
<input type="hidden" name="_method" value="delete"/>
<input type="hidden" name="_token" value="{{csrf_token()}}"/>
<input type="submit" value="Удалить"/>
</form>
<td>
</tr>
@endforeach

</ul>
</table>
@endsection
<script>
</script>