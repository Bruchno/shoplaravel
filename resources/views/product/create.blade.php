@extends('layouts.admin')

@section('content')
<h2>Новый продукт</h2>

@if($message != '')
    <span>{{$message}}</span>
@endif

<form method="post" action="{{route('addProduct')}}" enctype="multipart/form-data">
<h2>Изображение:</h2><br>
<label for="inputfile" id ="output"><img src="/images/no_foto.jpg" /></label>
<input type="file" name="image" id = "inputfile" style="display: none;"><br>

<div class="content_half left form_field" >
Наименование продукта:
@if(empty($arrdata))
<input type="text" name="name" placeholder="Необходимо заполнить"><br>
Сорт:
<input type="text" name="sort" placeholder="Необходимо заполнить"><br>
Цвет:
<input type="text" name="color"><br>

Цена:
<div class="price">
<input type="text" name="price" placeholder="Необходимо заполнить">
<select name="curency" class="selectdiv" >
<option value="ГРН" selected>&#8372;</option>
<option value = "USD">&#36;</option>
<option value="EURO">&euro;</option>
</select></div><br>
Производитель:
<input type="text" name="manufacturer" ><br>
Описание:
<textarea id = "editor" cols = "70" rows = "10" class="mytest"
          name="description" placeholder="Необходимо заполнить"></textarea><br>
Категория: 
<select name="category" class="selectdiv" >
    <?php $i = 0;?>
@foreach($categories as $category)
@if($i == 0)
<option value="{{$category->title}}" selected>{{$category->title}}</option>
@else <option value="{{$category->title}}">{{$category->title}}</option>
@endif
$i++;
@endforeach
</select> 

@else 

<input type="text" name="name" value = "{{$arrdata['name']}}"><br>
Сорт:
<input type="text" name="sort" value = "{{$arrdata['sort']}}"><br>
Цвет:
<input type="text" name="color" value = "{{$arrdata['color']}}"><br>
Цена:<br/><div class="price">
<input type="text" name="price" value = "{{$arrdata['price']}}">
<select name="curency" class="selectdiv" >
    @if($arrdata['curency'] == 'ГРН')
      <option value="$arrdata['curency']" selected>&#8372;</option>
      @else <option value="{{ $arrdata['curency'] }}">&#8372;</option>
     @endif
    @if($arrdata['curency'] == 'USD')
      <option value="{{ $arrdata['curency'] }}" selected>&#36;</option>
      @else <option value="{{ $arrdata['curency'] }}">&#36;</option>
     @endif 
    @if($arrdata['curency'] == 'EURO')
      <option value="{{ $arrdata['curency'] }}" selected>&euro;</option>
      @else <option value="{{ $arrdata['curency'] }}">&euro;</option>
     @endif
</select></div><br>
<br>
Производитель:
<input type="text" name="manufacturer" value = "{{$arrdata['manufacturer']}}"><br>
Описание:
<textarea id = "editor" cols = "70" rows = "10" class="mytest"
          name="description" value = "{{$arrdata['description']}}"></textarea><br>
Категория: 
<select name="category"class="selectdiv"  >
@foreach($categories as $category)
@if($arrdata['category'] == $category)
<option value="{{$category->title}}" selected>{{$category->title}}</option>
@else <option value="{{$category->title}}">{{$category->title}}</option>
@endif
@endforeach
</select>
@endif


<input type="hidden" name="_token" value="{{csrf_token()}}">
<div style="margin: 30px;">
    <input type="submit" class="btn btn-primary" value="Сохранить"></div>
</div>
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