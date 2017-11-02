@extends('layouts.admin')

@section('content')



<form method="POST" action="/product/update/{{$product->id}}" enctype="multipart/form-data">
    <span>Изменить изображение:</span><br/>
<input type="hidden" name="_method" value="put">
@if(!empty($product->image))
<label for="inputfile" id ="output"><img src="/images/product/{{ $product->image }}" /></label>
@else 
<label for="inputfile" id ="output"><img src="/images/no_foto.jpg" /></label>
@endif<input type="file" name="image" id = "inputfile" style="display: none;"><br>

<div class="content_half left form_field">
Наименование продукта:<br>
<input type="text" name="name" value="{{ $product->name }}"><br>
Сорт:<br>
<input type="text" name="sort" value="{{ $product->sort }}"><br>
Цвет:<br>
<input type="text" name="color" value="{{ $product->color }}"><br>
Цена:<br><div class="price" >
<input type="text" name="price" value="{{ $product->price }}">
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
<input type="text" name="manufacturer" value="{{ $product->manufacturer }}"><br>
Описание:<br></div>
<textarea id = "editor" cols = "90" rows = "10"  class="selectdiv" 
          name="description">{{ $product->description }}</textarea><br>
Категория:<br>
<select name="category" class="selectdiv" >
@foreach($categories as $category)
@if($product->category == $category)
<option value="{{$category->title}}" selected>{{$category->title}}</option>
@else <option value="{{$category->title}}">{{$category->title}}</option>
@endif
@endforeach
</select><br>

<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="submit" value="Сохранить" class="btn-success" style="margin-bottom: 10px;">
 
</form>

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
