@extends('layouts.admin')

@section('content')

@if($message != '')
    <span>{{$message}}</span>
@endif

<br>
<a href="/products" ><button>Назад к продуктам</button></a>
<div class="content_half left form_field" >


    <p>Цена: {{$product['price']}}<span> {{$product['curency']}}</span><br/></p>
        
</div>
@endsection