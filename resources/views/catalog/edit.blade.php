@extends('layouts.master')

@section('content')
    
    <h3>Modificar pel·lícula</h3>
    
    <form action="{{action('CatalogController@putEdit', $pelicula->id)}}"  method="POST">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
            
        <input  type="hidden" name="_method" value="PUT">
        
        <div class="form-group">
            <label for="title">Títol</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Títol" value="{{$pelicula->title}}">
        </div>
        <div class="form-group">
            <label for="year">Any</label>
            <input type="text" class="form-control" id="year" name="year" placeholder="Any" value="{{$pelicula->year}}">
        </div>
        <div class="form-group">
            <label for="director">Director</label>
            <input type="text" class="form-control" id="director" name="director" placeholder="Director" value="{{$pelicula->director}}">
        </div>
        <div class="form-group">
            <label for="category_id">Categoria</label>
            <input type="text" class="form-control" id="category_id" name="category_id" placeholder="Director" value="{{$pelicula->category_id}}">
        </div>
        <div class="form-group">
            <label for="poster">Poster</label>
            <input type="text" class="form-control" id="poster" name="poster" placeholder="Poster" value="{{$pelicula->poster}}">
        </div>
        <div class="form-group">
            <label for="synopsis">Resum</label>
            <textarea class="form-control" rows="3" id="synopsis" name="synopsis" placeholder="Synopsis">{{$pelicula->synopsis}}</textarea>
        </div>
        
        <button type="submit" class="btn btn-success">
          <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Guardar canvis
        </button>
        
        <a class="btn btn-danger" href="{{ url()->previous() }}">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancel·lar
        </a>
    </form>

@stop