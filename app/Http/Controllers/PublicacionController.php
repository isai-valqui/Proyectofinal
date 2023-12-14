<?php
namespace App\Http\Controllers;

use App\Models\Publicacion;
use Illuminate\Http\Request;

class PublicacionController extends Controller
{
    public function index()
    {
        $publicaciones = Publicacion::all();
        return view('publicacion.index', compact('publicaciones'));
    }

    public function edit(Publicacion $publicacion)
    {
        return view('publicacion.edit', compact('publicacion'));
    }

    public function update(Request $request, Publicacion $publicacion)
    {
        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'img' => 'required|url',
        ]);

        $publicacion->update($validated);

        return redirect()->route('publicacion.index');
    }
}