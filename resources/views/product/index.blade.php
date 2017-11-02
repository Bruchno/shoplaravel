
@extends('layouts.layout')

@section('content')

    
	
	
    <div id="content" class="right">
         
		<h2>Добро пожаловать в наш магазин</h2>
               
		<p>
  @foreach($products as $product)
		 <div class="product_box">
		<a href="{{action('ProductController@show',['id'=>$product->id])}}"><img src="/images/product/{{$product->image}}" style="width: 165px; height: 165px;"/></a>
           <h3><a href="{{action('ProductController@show',['id'=>$product->id])}}">{{$product->name}}</a></h3>
		   <small>Сорт: {{$product->sort}}</small>
          <p class="product_price"><?php echo sprintf("%01.2f", $product->price).' грн.'; ?> {{  $product->curency  }}</p>
		   <p class="add_to_cart">
                <a href="productdetail.html">Подробно</a>
                <a href="shoppingcart.html">В корзину</a>
            </p>
        </div>     

@endforeach
<div style="width:100%"> {!! $products->render('layouts.paginate') !!}  </div>
	</div>
      
	@stop	
		
		
		