@extends('layouts.admin')
@section('content')

<h2>Создание новой категории</h2>
{!! Form::open(['route' => 'categories.store']) !!}
{!! Form::token() !!}
{!! Form::label('title', 'Название категории') !!}<br>
{!! Form::text('title') !!}<br>
{!! Form::submit("Сохранить") !!}
{!!  Form::close() !!}

@if(Session::has('message'))
{{Session::get('message')}}
@endif
</form>
@endsection