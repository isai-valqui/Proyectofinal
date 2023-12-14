<?php

namespace App\Http\Controllers;

use App\Models\Barista;
use Illuminate\Http\Request;

class BaristaController extends Controller
{
    public function index()
    {
        $baristas = Barista::all();
        return view('barista.index', compact('baristas'));
    }

    public function create()
    {
        return view('barista.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_bar' => 'required|string|max:30',
            'apellido' => 'required|string|max:30',
            'correo' => 'required|string|email|max:50',
            'telefono' => 'required|string|max:15',
        ]);

        Barista::create($request->all());

        return redirect()->route('barista.index')->with('success', 'Barista creado correctamente.');
    }

    public function show()
    {
        $baristas = Barista::all();
        return view('barista.show', compact('baristas'));
    }

    public function edit(Barista $barista)
    {
        return view('barista.edit', compact('barista'));
    }
    public function update(Request $request, Barista $barista)
    {
        $request->validate([
            'nombre_bar' => 'required|string|max:30',
            'apellido' => 'required|string|max:30',
            'correo' => 'required|string|email|max:50',
            'telefono' => 'required|string|max:15',
        ]);

        $barista->update($request->all());

        return redirect()->route('barista.index');
    }

    public function destroy(Barista $barista)
    {
        $barista->delete();

        return redirect()->route('barista.index');
    }
}