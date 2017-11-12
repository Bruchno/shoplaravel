@extends('layouts.admin')
<style>
    .inputfiles{
        display: none;
    }
</style>
@section('content')
@if($message != '')
    <h3 style="color: beige">{{$message}}</h2>
@endif

{!! Form::open(['route' => ['products.update', $product->id], 'files' => true, 'method' => 'put']) !!}

    <span>Изменить изображение:</span><br/>
@if(!empty($product->image))
<label for="inputfile" id ="output"><img src="/images/product/{{ $product->image }}" /></label>
@else 
<label for="inputfile" id ="output"><img src="/images/no_foto.jpg" /></label>
@endif
<br>
{!! Form::file('image', ['id' => 'inputfile', 'class' => 'inputfiles']) !!}
<div class="content_half left form_field">
Наименование продукта:<br>
{{ Form::text('name', $product->name) }}
<br>
Сорт:<br>
    {{ Form::text('sort', $product->sort) }}<br>
Цвет:<br>
    {{ Form::text('color', $product->color) }}<br>
Цена:<br><div class="price" >
    {{ Form::text('price', $product->price) }}
<select name="curency" class="selectdiv">
    @if($product->curency == 'ГРН')
      <option value="{{ $product->curency }}" selected>&#8372;</option>
      @else <option value="{{ $product->curency }}">&#8372;</option>
     @endif
    @if($product->curency == 'USD')
      <option value="{{ $product->curency }}" selected>&#36;</option>
      @else <option value="{{ $product->curency }}">&#36;</option>
     @endif 
    @if($product->curency == 'EURO')
      <option value="{{ $product->curency }}" selected>&euro;</option>
      @else <option value="{{ $product->curency }}">&euro;</option>
     @endif
</select></div><br>

Производитель:<br>
{{ Form::text('manufacturer', $product->manufacturer) }}
<br>
Описание:<br>
{!! Form::textarea("description", $product->description, ['id' => 'editor', 'cols' => "70", 'rows' => "10"]) !!}

Категория:<br>
<select name="category" class="selectdiv" >
@foreach($categories as $category)
@if($product->category == $category)
<option value="{{$category->title}}" selected>{{$category->title}}</option>
@else <option value="{{$category->title}}">{{$category->title}}</option>
@endif
@endforeach
</select><br>

{{ Form::token() }}
<div style="margin-bottom: 10px;">
{!! Form::submit("Сохранить", []) !!}</div>
 </div>
{{ Form::close()}}

<script>
   function handleFileSelect(evt) {
    var file = evt.target.files; // объект списка файлов ?
    var f = file[0];
    //Только картинки!
    if (!f.type.match('image.*')) {
        alert("Только картинки please....");
    }
    var reader = new FileReader();
    // Закрыть для сбора информации о файле.
    reader.onload = (function(theFile) {
        return function(e) {
            // Делаем миниатюру.
         
            document.getElementById('output').innerHTML= ['<img class="thumb" title="', escape(theFile.name), '" src="', e.target.result, '" style = "width: 400px; margin: 20px;" id = "', escape(theFile.name), '" />'].join('');

        };
    })(f);
    // Чтение изображения в качестве данных  URL файла.
    reader.readAsDataURL(f);
}
document.getElementById('inputfile').addEventListener('change', handleFileSelect, false);
   
   </script>

@endsection
