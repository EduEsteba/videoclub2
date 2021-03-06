<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use Notify;
use App\Review;
use Illuminate\Support\Facades\Auth;
use App\Category;
use DB;


class CatalogController extends Controller{

    
    public function getIndex()
    {
       
        $movies = Movie::all();
        
        return view('catalog.index',  array('arrayPeliculas'=>$movies));
    }
    public function getShow($id){
        $movie = Movie::findOrFail($id);
        $chapters = $movie->chapters;
        $dades['id']=$id;
        $dades['pelicula']=$movie;
        $Reviews = Review::where('movie_id', $id)->get();
        return view('catalog.show',$dades, array('Reviews'=>$Reviews));
    }
    
    public function getCreate(){
        return view('catalog.create');
    }
    
    public function postCreate(Request $request){
        $movie = new Movie;
        
        $movie->title = $request->title;
        $movie->year = $request->year;
        $movie->director = $request->director;
        $movie->poster = $request->poster;
        $movie->synopsis = $request->synopsis;
        $movie->segonafoto = $request->segonafoto;
        $movie->trailer = $request ('trailer');
        Notify::success('La pelicula sha creat correctament'); 
        return redirect()->back();
    }
    
    public function getEdit($id){
        $movie = Movie::findOrFail($id);

        return view('catalog.edit',array('pelicula'=>$movie));
    }
    
    
    public function putEdit(Request $request, $id){
        $movie = Movie::findOrFail($id);
        $movie->title = $request->title;
        $movie->year = $request->year;
        $movie->director = $request->director;
        $movie->poster = $request->poster;
        $movie->synopsis = $request->synopsis;
        $movie->id = $request->id;
        $movie->trailer = $request('trailer');
        $movie->save();
        Notify::success('La pelicula sha creat correctament'); 
        return redirect('catalog/show/'.$id);
    }

    public function putRent($id){
        $movie = Movie::findOrFail($id);
        
        $movie->rented = true;
        $movie->save();
        
        Notify::success('Pel·lícula llogada!');
        return redirect()->back();
        
        
    }

    /**************** AFEGIR A FAVORITS*******************/
 

    /*public function putnoFavorits($id)
    {
        //Obtenim la pel·lícula que té el id=$id
        $movie = Movie::findOrFail($id);
        
        $movie->favorito = true;
        $movie->save();
        
        Notify::success('Pel·licula treta de favorits!');
        return redirect()->back();
        
    }*/
    /***********************************/

    
    public function putReturn($id)
    {
        $movie = Movie::findOrFail($id);
        
        $movie->rented = false;
        $movie->save();
        
        Notify::success('Pel·lícula retornada');
        return redirect()->back();
        
    }
    
    public function deleteMovie($id)
    {
        $movie = Movie::findOrFail($id);
        
        $movie->delete();
        Notify::success('Pel·lícula eliminada');
        
        return redirect('catalog');
        
    }

    /*COMENTARIS*/
    public function postReview(Request $request, $id){

        $user = Auth::id();
        $pelicula = Movie::findOrFail($id);
        $r = new Review;
        $r->title = $request->title;
        $r->review = $request->review;
        $r->stars = $request->stars;
        $r->user_id = $user;
        $r->movie_id = $pelicula->id;
        $r->save();

        $Reviews = Review::where('movie_id', $pelicula->id)->get();

        Notify::success('La teva opinió importa');

        return view('catalog.show', array('pelicula'=>$pelicula, 'Reviews'=>$Reviews));

    }

    /*CERCADOR*/
    public function search(Request $request){
        $search = $request['search'];
        $arrayPeliculas = Movie::where('title','like','%' . $search . '%')->orWhere('director','like','%' . $search . '%')->get();
        return view('catalog.index', compact('arrayPeliculas'));
    }




}