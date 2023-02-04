<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class APICatalogController extends Controller
{
    public function index()
    {
        return response()->json( Movie::all() );
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $p = new Movie;
        $p->title = $request->input('title');
        $p->year = $request->input('year');
        $p->director = $request->input('director');
        $p->poster = $request->input('poster');
        $p->rented = false;
        $p->synopsis = $request->input('synopsis');
        $p->save();
        return response()->json( Movie::all() );
    }


    public function show($id)
    {
        return response()->json( Movie::findOrFail($id) );
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->director = $request->input('director');
        $movie->poster = $request->input('poster');
        $movie->synopsis = $request->input('synopsis');
        $movie->save();
        return response()->json( Movie::findOrFail($id) );
    }


    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return response()->json( Movie::all() );
    }

    public function putRent($id) 
    {
        $m = Movie::findOrFail($id);
        $m->rented = true;
        $m->save();
        return response()->json(['error' => false, 'msg' => 'La película se ha marcado como alquilada']);
    }

    public function putReturn($id) 
    {
        $m = Movie::findOrFail($id);
        $m->rented = false;
        $m->save();
        return response()->json(['error' => false, 'msg' => 'La película se ha marcado como alquilada']);
    }

}
