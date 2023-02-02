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
    <button type="button" class="btn btn-danger">Devolver película</button>
    <a class="btn btn-warning" href="{{ url('/catalog/edit/' . $id ) }}">Editar película</a>
    <a class="btn btn-light" href="{{ url('/catalog') }}">Volver al listado</a>
    @else
    <p><b>Estado: </b>Película disponible</p>
    <button type="button" class="btn btn-primary">Alquilar pelicula</button>
    <a class="btn btn-warning" href="{{ url('/catalog/edit/' . $id ) }}">Editar película</a>
    <a class="btn btn-light" href="{{ url('/catalog') }}">Volver al listado</a>
    @endif

</div>
</div>

@endsection