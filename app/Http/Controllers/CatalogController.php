<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{

    public function getIndex()
    {   
        return view('catalog.index', ['arrayPeliculas' => $this->arrayPeliculas]);
    }

    public function getShow($id)
    {
        return view('catalog.show', ['pelicula'=>$this->arrayPeliculas[$id],'id' => $id]);
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
