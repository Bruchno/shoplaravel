@extends('layouts.admin')
<style>
    .inputfiles{
        display: none;
    }
</style>
@section('content')
<h2>Новый продукт</h2>

@if($message != '')
    <h3 style="color: beige">{{$message}}</h2>
@endif
{!! Form::open(['route' => 'products.store', 'files' => true]) !!}

<h2>Изображение:</h2><br>
<label for="inputfile" id ="output"><img src="/images/no_foto.jpg" /></label>
{!! Form::file('image', ['id' => 'inputfile', 'class' => 'inputfiles']) !!}
<br/>
<div class="content_half left form_field" >
Наименование продукта:
@if(empty($arrdata))
{!! Form::text("name", "Необходимо заполнить") !!}
<br>
Сорт:
{!! Form::text("sort", "Необходимо заполнить") !!}<br>
Цвет:
{!! Form::text("color") !!}<br>

Цена:
<div class="price">
<input type="text" name="price" placeholder="Необходимо заполнить">
<select name="curency" class="selectdiv" >
<option value="ГРН" selected>&#8372;</option>
<option value = "USD">&#36;</option>
<option value="EURO">&euro;</option>
</select></div><br>
Производитель:
{!! Form::text("manufacturer", "Необходимо заполнить") !!}
Описание:
{!! Form::textarea("description", "Необходимо заполнить", ['id' => 'editor', 'cols' => "70", 'rows' => "10"]) !!}
<br>
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
{!! Form::text("name", $arrdata['name']) !!}<br>
Сорт:
{{Form::text('sort', $arrdata['sort'])}}<br>
Цвет:
{{Form::text('color', $arrdata['color'])}}

Цена:<br/><div class="price">
    {{Form::text('price', $arrdata['price'])}}
<select name="curency" class="selectdiv" >
    @if($arrdata['curency'] == 'ГРН')
      <option value='ГРН' selected>&#8372;</option>
      @else <option value='ГРН'>&#8372;</option>
     @endif
    @if($arrdata['curency'] == 'USD')
      <option value='USD' selected>&#36;</option>
      @else <option value='USD'>&#36;</option>
     @endif 
    @if($arrdata['curency'] == 'EURO')
      <option value='EURO' selected>&euro;</option>
      @else <option value='EURO'>&euro;</option>
     @endif
</select></div><br>
<br>
Производитель:
{{Form::text('manufacturer', $arrdata['manufacturer'])}}
Описание:
{!! Form::textarea("description", $arrdata['description'], ['id' => 'editor', 'cols' => "70", 'rows' => "10"]) !!}

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
{{ Form::token() }}
<div style="margin: 30px;">
    {{ Form::submit('Сохранить') }}
    </div>
</div>
{!! Form::close() !!}
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