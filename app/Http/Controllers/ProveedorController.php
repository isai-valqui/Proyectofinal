<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('proveedor.index', compact('proveedores'));
    }

    public function create()
    {
        return view('proveedor.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_p' => 'required|max:30',
            'pais' => 'required|max:30',
            'correo' => 'required|max:50',
            'celular' => 'required|digits:11',
        ]);

        Proveedor::create($validated);

        return redirect()->route('proveedor.index');
    }

    public function show(Proveedor $proveedor)
    {
        return view('proveedor.show', compact('proveedor'));
    }

    public function edit(Proveedor $proveedor)
    {
        return view('proveedor.edit', compact('proveedor'));
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        $validated = $request->validate([
            'nombre_p' => 'required|max:30',
            'pais' => 'required|max:30',
            'correo' => 'required|max:50',
            'celular' => 'required|digits:11',
        ]);

        $proveedor->update($validated);

        return redirect()->route('proveedor.index');
    }

    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();

        return redirect()->route('proveedor.index');
    }
}