@extends('layouts.master')
@section('content')
	<div class="row">
	
		<div class="col-sm-4">
        	<img src="{{$pelicula->poster}}" width="100%" style="height:500px"/>
            <br>
            <br>
            <iframe width="100%" frameborder="0" height="200rem" src="{{$pelicula->trailer}}" ></iframe>

		</div>

        <div class="col-sm-8">
        <div>
        </div>
       
			
            <h2><b>{{$pelicula->title}}</b></h2>
            @if(is_null($pelicula->category_id))
            <p><b>Categoria:</b> De moment no te categoria</p>
            @else
            <p><b>Categoria:</b> {{$pelicula->category->title}}</p>
            @endif
            <p><b>Año:</b> {{$pelicula->year}}</p>
            <p><b>Director:</b> {{$pelicula->director}}</p>
            <p><b>Resumen:</b> {{$pelicula->synopsis}}</p>

			
            @if ($pelicula->rented )
                <p><b>Estat:</b> Pel·lícula actualment llogada.</p>
                <form action="{{action('CatalogController@putReturn', $pelicula->id)}}"  method="POST" style="display:inline">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-info">
                        Retornar pel·lícula
                    </button>
                </form>
            @else
                <form action="{{action('CatalogController@putRent', $pelicula->id)}}"  method="POST" style="display:inline">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-info">
                        <span class="glyphicon glyphicon-download" aria-hidden="true"></span> Llogar pel·lícula
                    </button>
                </form>
            @endif

            <a class="btn btn-warning" href="{{ url('/catalog/edit/'.$pelicula->id )}}">Editar pelicula</a>

            <form action="{{action('CatalogController@deleteMovie', $pelicula->id)}}"  method="POST" style="display:inline">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                <button type="submit" class="btn btn-danger">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar pel·lícula 
                </button>
            </form>

            <a class="btn btn-outline-info" href="{{ url('/catalog' ) }}">Tornar al llistat</a>
            <br>
            <br>
            <!-----------------------------------COMENTARIS----------------------->

            <div style="margin-top:25px;">
            <h3>Comentaris</h3>
            @foreach( $Reviews as $Review )
            <div class="card border-light">
            <div class="card-body" style="border-left: 5px solid lightgrey; padding-left: 1%">
            <h5 class="card-title">{{$Review->title}}</h5>
              <h6 class="card-subtitle mb-2 text-muted">{{$Review->stars}} Estrelles</h6>
              <p class="card-text">{{$Review->review}}</p>
              <footer class="blockquote-footer"> {{date('d/m/Y', strtotime($Review->created_at))}} - <cite title="Source Title">{{$Review->user->name}}</cite></footer>
            </div>
            </div>
            @endforeach
            <form method="POST" action="{{action('CatalogController@postReview', $pelicula->id)}}"  style="margin-top:25px;line-height: 5%">
                {{ method_field('POST') }}
                {{ csrf_field() }}
                <div class="form-group mb-3 mt-3">
                    <label for="title">Enviar comentari</label>
                    <input type="text" name="title" id="title" class="form-control mt-3" placeholder="Titol del resum" required>
                 </div>
                 <h5>Valoración</h5>
                 <div class="input-group mb-3 mt-3">
                    <select class="custom-select" id="stars" name="stars" style="width: 100%; height: 5%" required>
                      <option selected value="1">1 Estrella</option>
                      <option value="2">2 Estrelles</option>
                      <option value="3">3 Estrelles</option>
                      <option value="4">4 Estrelles</option>
                      <option value="5">5 Estrelles</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <textarea name="review" id="review" class="form-control" rows="3" placeholder="La teva opinio importa" required></textarea>
                 </div>
                 <div class="form-group text-center" style="display:inline">
                    <input type="submit" class="btn btn-success" style="margin-bottom:25px;" value="Valorar"/>
                    
                 </div>
                 <div class="form-group text-center" style="display:inline">
                    <button class="btn btn-dark btn-close" style="margin-bottom:25px;">
                    Cancelar
                    </button>
                 </div>
            </form>
        </div>

		</div>
	
	</div>


@endsection