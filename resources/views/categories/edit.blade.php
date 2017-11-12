@extends('layouts.admin')
@section('content')
<h2>Редактирование категории {{$category->title}}</h2>
{!! Form::open(['route' => ['categories.update', $category->id], 'method' => 'put']) !!}

{!! Form::token() !!}
{!! Form::label('title', 'Название категории') !!}<br>
{!! Form::text('title', $category->title) !!}<br>
{!! Form::submit("Сохранить") !!}
{!!  Form::close() !!}

@if(Session::has('message'))
{{Session::get('message')}}
@endif
</form>
@endsection
