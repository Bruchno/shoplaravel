@extends('layouts.layout')

@section('content')
 <div id="content" class="right">
      	<h2>{{$product->name}}</h2>
        <div class="content_half left">
        	<img src="/images/product/{{$product->image}}" alt="{{$product->sort}}" /></a>
        </div>
            <div class="content_half right">
                <table>
                    <tr>
                        <td width="130">Цена:</td>
                        <td width="84"><?php echo sprintf("%01.2f", $product->price); ?>
                        {{$product->curency}}</td>
                    </tr>
                    <tr>
                        <td>Производитель:</td>
                        <td><strong>{{$product->manufacturer}}</strong></td>
                    </tr>
                    <tr><td>Количество</td><td><input type="text" value="1" size="6" maxlength="2" class="selectdiv"/></td></tr>
                </table>
                <div class="cleaner h20"></div>
                <a href="" class="button">В корзину</a>
			</div>
            <div class="cleaner h40"></div>
            
            <h4>Описание</h4>
            <p>{{$product->description}}</p>
            <div class="cleaner h40"></div>
        <div class="blank_box">
        	<a href="#"><img src="images/free_shipping.jpg" alt="Free Shipping" /></a>
        </div>    
    </div>
@endsection

