@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Añadir película
         </div>
         <div class="card-body" style="padding:30px">
            {{-- TODO: Abrir el formulario e indicar el método POST --}}
            <form action="" method="POST">

            {{ method_field('POST')}}
            {{ csrf_field() }}

            <div class="form-group">
            <label for="categoria">Categoria</label><br>
            <select class="form-control form-control-lg" name="categoria" id="categoria">
            @foreach (App\Category::all() as $cat)
               <option value="{{$cat->id}}">{{$cat->title}}</option>
            @endforeach
            </select>
            </div>

            <div class="form-group">
               <label for="title">Título</label>
               <input type="text" name="title" id="title" class="form-control">
            </div>

            <div class="form-group">
               <label for="title">Año</label>
               <input type="text" name="año" id="year" class="form-control">
            </div>

            <div class="form-group">
               <label for="title">Director</label>
               <input type="text" name="director" id="director" class="form-control">
            </div>

            <div class="form-group">
               <label for="title">Imagen</label>
               <input type="img" name="imagen" id="imagen" class="form-control">
            </div>

            <div class="form-group">
               <label for="synopsis">Resumen</label>
               <textarea name="synopsis" id="synopsis" class="form-control" rows="3"></textarea>
            </div>

            <div class="form-group">
               <label for="title">Trailer</label>
               <textarea name="trailer" type="text" id="trailer" class="form-control"></textarea>
            </div>

         
            <div class="form-group text-center">
               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                   Afegir película
               </button>
            </div>
            </form>
            
         </div>
      </div>
   </div>
</div>


@stop