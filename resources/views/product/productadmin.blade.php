@extends('layouts.admin')

@section('content')

<h2>Изображение:</h2><br>
@if(!empty($product->image))
<img src="/images/product/{{ $product->image }}" />
@endif<br>
<div class="content_half left form_field">
Наименование :
<input type="text" name="name" value="{{ $product->name }}" class="selectdiv" ><br>
Сорт:<br>
<input type="text" name="sort" value="{{ $product->sort }}" class="selectdiv" ><br>
Цвет:<br>
<input type="text" name="color" value="{{ $product->color }}" class="selectdiv" ><br>

Цена:<br/><div class="price" style="white-space: nowrap;">
<input type="text" name="price" value="{{ $product->price }}" class="selectdiv" >
<select class="selectdiv">
@if($product->curency == 'ГРН')
      <option value="{{ $product->curency }}" >&#8372;</option>
     @endif
    @if($product->curency == 'USD')
      <option value="{{ $product->curency }}" >&#36;</option>
     @endif 
    @if($product->curency == 'EURO')
      <option value="{{ $product->curency }}" >&euro;</option>
     @endif
    </select>
</div><br>
Производитель:<br>
<input type="text" name="manufacturer" value="{{ $product->manufacturer }}" class="selectdiv" ><br>
Описание:<br>
<textarea id = "editor" cols = "90" rows = "10"  style="font-family: tahoma; font-size: 18px;" 
          name="description">{{ $product->description }}</textarea><br>
Категория:
<option class="selectdiv" >{{$product->category}}</option>




@endsection

