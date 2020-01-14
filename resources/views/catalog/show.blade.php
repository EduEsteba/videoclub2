@extends('layouts.master')
@section('content')
	<div class="row">
	
		<div class="col-sm-4">
        	<img src="{{$pelicula->poster}}" style="height:500px"/>
		</div>

        <div class="col-sm-8">
			<h2 style="min-height:45px;margin:5px 0 10px 0"><b>{{$pelicula->title}}</b></h2>
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

			

            <a class="btn btn-outline-info" href="{{ url('/catalog' ) }}">Volver al listado</a>

		</div>
	
	</div>

@endsection