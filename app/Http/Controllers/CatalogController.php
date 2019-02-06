<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class CatalogController extends Controller
{

    public function getIndex()
    {
        $arrayPeliculas = Movie::all();
        return view('catalog.index', array('arrayPeliculas'=> $arrayPeliculas));
    }

    public function getShow($id)
    {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.show', array(
            'pelicula' => $pelicula
        ));
    }

    public function getCreate()
    {
        return view('catalog.create');
    }
    
    public function postCreate(Request $request)
    {
        $movie = new Movie();
        $movie->title = $request->title;
        $movie->year = $request->year;
        $movie->director = $request->director;
        $movie->poster = $request->poster;
        $movie->synopsis = $request->synopsis;
        $movie->save();
        return redirect('/catalog');
    }    

    public function getEdit($id)
    {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.edit', array(
            'pelicula' => $pelicula
        ));
    }

    public function putEdit(Request $request, $id)
    {
        $pelicula = Movie::findOrFail($id);
        $pelicula->title = $request->title;
        $pelicula->year = $request->year;
        $pelicula->director = $request->director;
        $pelicula->poster = $request->poster;
        $pelicula->synopsis = $request->synopsis;
        $pelicula->save();
        return redirect('/catalog/show/' . $pelicula->id);
    }

    public function changeRented($id)
    {
        $pelicula = Movie::findOrFail($id);
        $pelicula->rented = !$pelicula->rented;
        $pelicula->save();
        return back();
    }

}
