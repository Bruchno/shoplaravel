@extends('layouts.admin')

@section('content')

@if($message != '')
    <span>{{$message}}</span>
@endif

<br>
<button><a href="products" >Назад к продуктам</a></button>
<div class="content_half left form_field" >


    <p>Цена: {{$product['price']}}<span> {{$product['curency']}}</span><br/></p>
        
</div>
@endsection