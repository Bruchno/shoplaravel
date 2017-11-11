@extends('layouts.admin')
@section('content')
<h2>Редактирование категории {{$category->title}}</h2>
{!! Form::open(['route' => ['categories.update', $category->id]]) !!}

{!! Form::token() !!}
{!! Form::label('title', 'Название категории') !!}<br>
{!! Form::text('title', $category->title) !!}<br>
{!! Form::submit("Сохранить") !!}
{!!  Form::close() !!}
<!--<form method="POST" action="/categories/update/{{$category->id}}"/>
Название категории<br>
<input type="text" name="title" value="{{$category->title}}"/><br>
<input type="hidden" name="_method" value="put"/>
<input type="hidden" name="_token" value="{{csrf_token()}}"/>
<input type="submit" value="Сохранить">-->

@if(Session::has('message'))
{{Session::get('message')}}
@endif
</form>
@endsection
