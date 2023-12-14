<?php

namespace App\Http\Controllers;

use App\Models\Barista;
use App\Models\Publicacion;
use Illuminate\Http\Request;

class GerenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index()
    {
        $baristas = Barista::all();
        $publicaciones = Publicacion::all();

        return view('gerente.index', compact('baristas', 'publicaciones'));
    }
}
