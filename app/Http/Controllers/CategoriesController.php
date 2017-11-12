<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoriesRequest;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$categories=Category::all();
                $message = '';
		return view('categories.categories')->with(['categories'=>$categories, 'message' => $message]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesRequest $request)
    {
        //
          Category::create($request->all());
          $message = 'Категория '.$request->title.' добавлена';
          $categories=Category::all(); //выбираем все категории
          return view('categories.categories',['categories'=>$categories, 'message' => $message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
		$category=Category::find($id);
		$message = $category->title.' - '.$category->created_at;
		return view('categories.edit',['category'=>$category, 'message' => $message]);
       // return view('categories.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $category=Category::find($id);
	   $category->update($request->all());
	   $category->save();
	   $message = 'Категория '.$category->title.' обновлена';
	   $categories=Category::all(); //выбираем все категории
        return view('categories.categories',['categories'=>$categories, 'message' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
		$category=Category::find($id); 
		$category->delete();
		$message = "Категория ".$category->title." удалена";
		$categories=Category::all(); //выбираем все категории
                return view('categories.categories',['categories'=>$categories, 'message' => $message]);
    }
}
