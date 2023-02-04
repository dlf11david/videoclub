@extends('layouts.master')

@section('content')

<div class="row">

<div class="col-sm-4">

    <img src="{{$pelicula->poster}}" style="height:200px"/>

</div>
<div class="col-sm-8">


    <h3>{{$pelicula->title}}</h3>
    <h5>Año: {{$pelicula->year}}</h5>
    <h5>Director: {{$pelicula->director}}</h5>
    <p><b>Resumen: </b>{{$pelicula->synopsis}}</p>
    @if($pelicula->rented)
    <p><b>Estado: </b>Película actualmente alquilada</p>

    <form action="{{action([App\Http\Controllers\CatalogController::class, 'putReturn'], ['id' => $id])}}" 
        method="POST" style="display:inline">
        @method('PUT')
        @csrf
        <button type="submit" class="btn btn-danger" style="display:inline">
            Devolver película
        </button>
    </form>

    @else
    <p><b>Estado: </b>Película disponible</p>

    <form action="{{action([App\Http\Controllers\CatalogController::class, 'putRent'], ['id' => $id])}}" 
        method="POST" style="display:inline">
        @method('PUT')
        @csrf
        <button type="submit" class="btn btn-primary" style="display:inline">
            Alquilar pelicula
        </button>
    </form>

    @endif

    <form action="{{action([App\Http\Controllers\CatalogController::class, 'deleteMovie'], ['id' => $id])}}" 
        method="POST" style="display:inline">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger" style="display:inline">
            Eliminar pelicula
        </button>
    </form>

    <a class="btn btn-warning" href="{{ url('/catalog/edit/' . $id ) }}">Editar película</a>
    <a class="btn btn-light" href="{{ url('/catalog') }}">Volver al listado</a>

</div>
</div>

@endsection