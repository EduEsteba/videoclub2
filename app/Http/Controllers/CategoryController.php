<?php

namespace App\Http\Controllers;

use App\Category;
use Notify;
use App\Movie;
use Illuminate\Http\Request;

class CategoryController extends Controller{

    public function index(){
        $categories=Category::all();
        return view('categories.index',array('arrayCategories'=> $categories));
    }

    public function create(){
        return view('categories.create');
    }

    public function createP(Request $request){
        $category=new Category();
        $category->title= $request->input('title');
        $category->description= $request->input('description');
        if($request->input('adult')=="false"){
            $category->adult= false;
        }
        if($request->input('adult')=="true"){
            $category->adult= true;
        }
        $category->save();
        Notify::success('La categoria sha creat correctament'); 
        return redirect("/categories");
    }

    public function store(Request $request){
        Category::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'adult' => $request['adult']
        ]);
        Notify::success('La categoria sha creat correctament');
        return redirect('/categories');
    }

    public function show($id){
        $pelis = Movie::all();
        $pelis = $pelis->where('category_id', '=', $id);
        return view('categories.show', array('pelis'=>$pelis));
    }

    
    public function edit($id){
        $category=Category::findOrFail($id);
        return view('categories.edit', array('category'=> $category));
    }

    
    public function editcategoria(Request $request, $id){
        $categories=Category::all();
        $category = Category::findOrFail($id);
        $category->title = $request->input('title');
        $category->description = $request->input('description');
        if($request->input('adult')=="true"){
            $category->adult= true;
        }
        if($request->input('adult')=="false"){
            $category->adult= false;
        }
        
        $category->save();
        Notify::success('La categoria sha editat correctament');
        return redirect('/categories');
    }


    public function destroy($id){
        $category = new Category;
        $category = $category->findOrFail($id);
        $category->delete();
        Notify::success('La categoria sha eliminat correctament');
        return redirect('/categories');
    }
}