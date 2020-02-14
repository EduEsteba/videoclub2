@extends('layouts.master')

@section('content')

<div class="row" style="text-align:center">
<a  href="{{url('/categories/create')}}" type="button" class="btn btn-success" style="display:inline">Afegir Categoria</a>
        <div class="col-lg-12 margin-tb" style="margin-top:10px">
            <div class="pull-left">
                <h2>Categories</h2>
            </div>
            <div class="pull-right">

            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>Titol</th>
            <th>Descripció</th>
            <th>Per qui és?</th>
            <th colspan="3">Acció</th>
        </tr>
                @foreach ($arrayCategories as $category)
                    <tr>
                        <td>{{$category->title}}</td>
                        <td>{{ $category->description }}</td>
                            @if($category->adult)
                        <td><img  width="50em" style  src="https://cdn160.picsart.com/upscale-246208593027212.png?r1024x1024"></td>
                @else
                        <td><img width="50em"  src="https://psmedia.playstation.com/is/image/psmedia/parents-three-column-pegi-3-01-eu-08nov16?$Icon$"></td>
            @endif
        <td>
            <a href="{{ url('/categories/'.$category->id) }}" type="button" class="btn btn-success" style="display:inline">Mostrar</a>
            <a href="{{ url('/categories/'.$category->id.'/edit' ) }}" type="button" class="btn btn-warning" style="display:inline">Editar</a>
        </td>
        <td>
        <form action="{{action('CategoryController@destroy', $category->id)}}" method="POST" style="display:inline">
        {{ method_field('DELETE') }}
            {{ csrf_field() }}
                <button type="submit" class="btn btn-danger" style="display:inline">
                    Eliminar categoria
                </button>
        </form>
    </tr>
    @endforeach
    </table>
@stop