@extends('layouts.admin')
@section('content')
<h2>Создание новой категории</h2>
<form method="POST" action="/categories/update/{{$category->id}}"/>
Название категории<br>
<input type="text" name="title" value="{{$category->title}}"/><br>
<input type="hidden" name="_method" value="put"/>
<input type="hidden" name="_token" value="{{csrf_token()}}"/>
<input type="submit" value="Сохранить">

@if(Session::has('message'))
{{Session::get('message')}}
@endif
</form>
@endsection
