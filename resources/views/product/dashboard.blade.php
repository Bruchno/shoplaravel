@extends('layouts.admin')

@section('content')
<div id="templatemo_menu" class="ddsmoothmenu"><ul>
    <li><a href="/product/add" class="selected">Добавить</a></li></ul></div><br/>
@if($message != '')
    <h3>{{$message}}</h3>
@endif
    <table style="width: 100%">
<tr>
    <td>id</td>
     <td>Превью</td>
    <td>Наименование</td>
    <td>Цена</td>
    <td>Действие</td>
</tr>
@foreach ($products as $product)
<tr>
<td>{{$product->id}}</td>
<td><a href="/product/prodshow/{{$product->id}}">
        <img width="50px" src ="/images/product/{{$product->image}}" title="Просмотреть детали"></a></td>
<td><a href="/product/prodshow/{{$product->id}}">{{$product->name}}</a></td>
<td><?php echo sprintf("%01.2f", $product->price).' '.$product->curency; ?>  </td>
<td><a href="/product/redaction/{{$product->id}}">Редактировать</a> 
    <form method="POST" action="/product/destroy/{{$product->id}}">
<input type="hidden" name="_method" value="delete"/>
<input type="hidden" name="_token" value="{{csrf_token()}}"/>
<button type="submit"><img src="/images/remove.png"/></button>
    
</form>
</td>
</tr>
@endforeach
{!! $products->render('layouts.paginate') !!}
    </ul></table>

@endsection