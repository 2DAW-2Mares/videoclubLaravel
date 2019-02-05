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

    public function getEdit($id)
    {
        return view('catalog.edit', array('id'=>$id));
    }

    public function changeRented($id)
    {
        $pelicula = Movie::findOrFail($id);
        $pelicula->rented = !$pelicula->rented;
        $pelicula->save();
        return back();
    }

}
