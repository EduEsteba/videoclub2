<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Movie;
use Coderatio\Laranotify\Facades\Notify;

class CategoryController extends Controller
{

    public function index(){
        return view('category.index');
    }

    public function create(){
        return view('category.create');
    }

    public function store(Request $request){
        $category = Category::create($request->all());
        Notify::success('Has guardat correctament la categoria');
        return redirect('/category');
    }

    public function show($id){
        $categoria = Category::findOrFail($id);
        $pelicules = Movie::where('category_id',$id)->get();
        return view('category.show', compact('pelicules'));
    }

    public function edit($id){
        $categoria = Category::findOrFail($id);
        return view('category.edit', compact('categoria'));
    }

    public function update(Request $request, $id){
        $category = Category::findOrFail($id);
        $category->update($request->all());
        Notify::success('Has modificat correctament la categoria.');
        return redirect('/category');
    }

    public function destroy($id){
        $categoria = Category::findOrFail($id);
        $categoria->delete();
        Notify::success('Has esborrat una categoria');
        return redirect('/category');
    }
}