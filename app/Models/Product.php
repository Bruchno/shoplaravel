<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table="products"; //нзвание таблицы в базе
    protected $fillable=['name', 'sort', 'price', 'curency', 'description', 'category', 'color', 'manufacturer', 'image'];
}
