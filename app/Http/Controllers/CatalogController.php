<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Alert;

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

    public function postCreate(Request $request)
    {
        $p = new Movie;
        $p->title = $request->input('title');
        $p->year = $request->input('year');
        $p->director = $request->input('director');
        $p->poster = $request->input('poster');
        $p->rented = false;
        $p->synopsis = $request->input('synopsis');
        $p->save();
        Alert::success('Película guardada', 'La película se ha guardado correctamente');
        return redirect()->action([CatalogController::class, 'getIndex']);
    }

    public function getEdit($id)
    {
        return view('catalog.edit', ['id'=>$id]);
    }

    public function putEdit(Request $request, $id)
    {
        if( $request->has('title') )
        {
            $movie = Movie::findOrFail($id+1);
            $movie->title = $request->input('title');
            $movie->year = $request->input('year');
            $movie->director = $request->input('director');
            $movie->poster = $request->input('poster');
            $movie->synopsis = $request->input('synopsis');
            $movie->save();
            Alert::success('Película editada', 'La película se ha modificado correctamente');
            return view('catalog.show', ['pelicula'=> Movie::findOrFail($id+1) ,'id' => $id]);
        }
    }

    public function putRent(Request $request, $id)
    {
        $movie = Movie::findOrFail($id+1);
        $movie->rented = true;
        $movie->save();
        Alert::success('Película alquilada', 'La película se ha alquilado correctamente');
        return view('catalog.show', ['pelicula'=> Movie::findOrFail($id+1) ,'id' => $id]);
    }

    public function putReturn(Request $request, $id)
    {
        $movie = Movie::findOrFail($id+1);
        $movie->rented = false;
        $movie->save();
        Alert::success('Película devuelta', 'La película se ha devuelto correctamente');
        return view('catalog.show', ['pelicula'=> Movie::findOrFail($id+1) ,'id' => $id]);
    }

    public function deleteMovie(Request $request, $id)
    {
        $movie = Movie::findOrFail($id+1);
        $movie->delete();
        Alert::success('Película borrada', 'La película se ha borrado correctamente');
        return redirect()->action([CatalogController::class, 'getIndex']);
    }

}
