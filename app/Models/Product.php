<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table="products"; //нзвание таблицы в базе
    protected $fillable=['name', 'sort', 'price', 'curency', 'description', 'category', 'color', 'manufacturer', 'image'];
    
    public static function getprice($formmodel)
    {
        $arrdata = [];
         if(!preg_match('/^\d+[.,]?\d+$/', $formmodel->price))
         {
             $arrdata['name'] = $formmodel->name;
             $arrdata['sort'] = $formmodel->sort;
             $arrdata['color'] = $formmodel->color;
             $arrdata['price'] = $formmodel->price;
             $arrdata['curency'] = $formmodel->curency;
             $arrdata['description'] = $formmodel->description;
             $arrdata['manufacturer'] = $formmodel->manufacturer;
             $arrdata['category'] = $formmodel->category;      
         }
       return $arrdata;
    }
    
    public static function imgupload($formmodel)
    {
       if($formmodel->hasFile('image')) //Проверяем была ли передана картинка.
		{
           $patch="images/product/"; 
           $f_name=$formmodel->file('image')->getClientOriginalName();//определяем имя файла
           $formmodel->file('image')->move($patch, $f_name); //перемещаем файл в папку с оригинальным именем
    }else {
       $f_name = null; 
    }
    return $f_name;
}
}
