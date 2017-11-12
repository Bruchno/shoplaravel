<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ProductController extends Controller
{
    public function index()
	{
		$products=Product::paginate(4);
		return view('product.index',['products'=>$products]);
		
	}
        public function admin()
        {
          
            //$products=Product::get()->paginate(3);
            $products = DB::table('products')->paginate(3);
            $message ='';
		return view('product.dashboard',['products'=>$products, 'message' => $message]);
        }
        
        
        public function edit($id)
        {
            $product = Product::find($id);
            $message = '';
	    $categories=Category::all(); // выбираем все категории
	    return view('product.edit',['product'=>$product,'categories'=>$categories, 'message' => $message]);
        }
        
        
        public function destroy($id)
        {
            $product = Product::find($id);
            $prod = [];
            $prod['price'] = $product->price;
            $prod['curency'] = $product->curency;
            $message = 'Продукт '.$product->name.' удален';
            $productwithimage = DB::table('products')->where('image', '=', $product->image)->count();
            $product->delete();
            if(!empty($product->image) && $productwithimage == 1)
            {
                unlink('images/product/'.$product->image);
            }
		return view('product.showdel',['product' => $prod, 'message' => $message]);
        }
        
        public function create()
    {
		$categories=Category::all();//выбираем все категории
                $message = '';
                $arrdata = [];
		return view('product.create',['categories'=>$categories, 'message' => $message, 'arrdata' => $arrdata]);
    }
    
     public function store(ProductRequest $request)
    {
         $arrdata = Product::getprice($request);
         if(!empty($arrdata))
         {
             $message = 'Цена должна быть числом';
	     $categories=Category::all();
             return view('product.create',['categories'=>$categories, 'message' => $message, 'arrdata' => $arrdata]);
         }
                $str = str_replace(",", ".", $request->price);
                $all=$request->all(); 
                $all['price'] = $str;
                $all['image']=Product::imgupload($request); 
                $model = Product::create($all); //сохраняем массив в базу
                $message = 'Продукт '.$request->name.' добавлен';
                $id = $model->id;
                $product = Product::find($id);
                return view('product.productadmin',['product'=>$product, 'message' => $message]);
	}
        
     public function update(ProductRequest $request, $id)
    {
        
         $product = Product::find($id);
         $arrdata = Product::getprice($request);
         if(!empty($arrdata))
         {
             $message = 'Цена должна быть числом';
	     $categories=Category::all();
             return view('product.edit',['product'=>$product,'categories'=>$categories, 'message' => $message]);
         }
         $str = str_replace(",", ".", $request->price);
         $all=$request->all(); 
         $all['price'] = $str;
         $all['image']=Product::imgupload($request);
		if($all['image'] != null) //Проверяем была ли передана картинка, ведь статья может быть и без картинки.
		{
                   $productwithimage = DB::table('products')->where('image', '=', $product->image)->count();
                   if($productwithimage == 1)
                    {
                        unlink('images/product/'.$product->image);
                    }
                   
                   $message = 'Продукт '.$request->name.' изменен';
                   $product->update($all);
                   }    else  {
                       $message = 'Продукт '.$request->name.' изменен';
                       $product->update($request->all());
                          }     
          $product = Product::find($id);
        return view('product.productadmin',['product'=>$product]);
    }  
        
    public function show($id)
    {
        $product = Product::find($id);
        return view('product.show',['product'=>$product]);
    }
    
     public function prodshow($id)
    {
        $product = Product::find($id);
        return view('product.productadmin',['product'=>$product]);
    }
    
    public function showcategory($id)
    {
        $category = Category::find($id);
        $products = DB::table('products')->where('category', '=', $category->title)->paginate(4);
        return view('product.index',['products'=>$products]);
    }
}
