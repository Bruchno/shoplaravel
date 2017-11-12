<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'ProductController@index');
Route::resource('categories', 'CategoriesController');
Route::get('products/admin', 'ProductController@admin');

Route::resource('products', 'ProductController');
Route::get('products/admin/{id}', 'ProductController@prodshow');

Route::get('products/category/{id}', 'ProductController@showcategory');