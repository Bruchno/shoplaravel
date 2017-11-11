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

//Route::get('categories', 'CategoriesController@index');
//Route::get('categories/add', 'CategoriesController@create');
//Route::post('categories/add', 'CategoriesController@store')->name('addCategories');
//Route::get('categories/edit/{id}', 'CategoriesController@edit');
//Route::put('categories/update/{id}', 'CategoriesController@update');
//Route::delete('categories/destroy/{id}', 'CategoriesController@destroy');

Route::get('products', 'ProductController@admin')->name('products');
Route::get('product/add', 'ProductController@create');
Route::post('product/add', 'ProductController@store')->name('addProduct');
Route::get('product/redaction/{id}', 'ProductController@edit');
Route::put('product/update/{id}', 'ProductController@update');
Route::delete('product/destroy/{id}', 'ProductController@destroy');
Route::get('product/show/{id}', 'ProductController@show');
Route::get('product/prodshow/{id}','ProductController@prodshow');
