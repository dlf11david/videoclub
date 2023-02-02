<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class CatalogController extends Controller
{
    public function getIndex()
    {   
        return view('catalog.index', ['arrayPeliculas' => Movie::all()]);
    }

    public function getShow($id)
    {
        $arrayPeliculas = Movie::all();
        return view('catalog.show', ['pelicula'=> Movie::findOrFail($id+1) ,'id' => $id]);
    }

    public function getCreate()
    {
        return view('catalog.create');
    }

    public function getEdit($id)
    {
        return view('catalog.edit', ['id'=>$id]);
    }

}
