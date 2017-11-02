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
	    $categories=Category::all(); // выбираем все категории
	    return view('product.edit',['product'=>$product,'categories'=>$categories]);
        }
        
        
        public function destroy($id)
        {
            $product = Product::find($id);
            $message = 'Продукт удален';
            $productwithimage = DB::table('products')->where('image', '=', $product->image)->count();
            $product->delete();
            if(!empty($product->image) && $productwithimage == 1)
            {
                unlink('images/product/'.$product->image);
            }
           $products=Product::get();
		return view('product.dashboard',['products'=>$products, 'message' => $message]);
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
         if(!preg_match('/^\d+[.,]?\d+$/', $request->price))
         {
             $arrdata = [];
             $arrdata['name'] = $request->name;
             $arrdata['sort'] = $request->sort;
             $arrdata['color'] = $request->color;
             $arrdata['price'] = $request->price;
             $arrdata['curency'] = $request->curency;
             $arrdata['description'] = $request->description;
             $arrdata['manufacturer'] = $request->manufacturer;
             $arrdata['category'] = $request->category;
             $message = 'Цена должна быть числом';
             return view('product.create',['categories'=>$categories, 'message' => $message, 'arrdata' => $arrdata]);
             //$str = str_replace(",", ".", $request->price);
             return ;
         }
                 $str = str_replace(",", ".", $request->price);
                
		if($request->hasFile('image')) //Проверяем была ли передана картинка.
		{
		
			$patch="images/product/"; 
                        
				$f_name=$request->file('image')->getClientOriginalName();//определяем имя файла
				$request->file('image')->move($patch, $f_name); //перемещаем файл в папку с оригинальным именем
				$all=$request->all(); //в переменой $all будет массив, который содержит все введенные данные в форме
				$str = str_replace(",", ".", $request->price);
                                $all['price'] = $str;
                                $all['image']=$f_name;// меняем значение preview на нашу ссылку, иначе в базу попадет что-то вроде /tmp/sdfWEsf.tmp
				Product::create($all); //сохраняем массив в базу
                               $message = 'Продукт '.$request->name.' добавлен';
				}
				else
				{
                                   $all=$request->all();
                                   $all['price'] = $str;
                                 $message = 'Продукт '.$request->name.' добавлен';
				Product::create($all); // если картинка не передана, то сохраняем запрос, как есть.
					
			}
		$products=Product::get();
                
		return view('product.dashboard',['products'=>$products, 'message' => $message]);
	}
        
     public function update(ProductRequest $request, $id)
    {
        //
		$product = Product::find($id);
		if($request->hasFile('image')) //Проверяем была ли передана картинка, ведь статья может быть и без картинки.
		{
                   $productwithimage = DB::table('products')->where('image', '=', $product->image)->count();
                   if($productwithimage == 1)
                    {
                        unlink('images/product/'.$product->image);
                    }
                   $root="images/product/"; // это папка для загрузки картинок
                   $f_name = $request->file('image')->getClientOriginalName();//определяем имя файла
                   $request->file('image')->move($root, $f_name); //перемещаем файл в папку с оригинальным именем
                   $all = $request->all(); //в переменой $all будет массив, который содержит все введенные данные в форме
                   $all['image']= $f_name;// меняем значение 
                   $message = 'Продукт '.$request->name.' изменен';
                   $product->update($all);
                   }    else  {
                       $message = 'Продукт '.$request->name.' изменен';
                       $product->update($request->all());
                          }     
           $products=Product::get();
          return view('product.dashboard',['products'=>$products, 'message' => $message]);
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
    
}
