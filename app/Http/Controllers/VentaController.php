<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Cliente;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with('cliente')->get();
        return view('venta.index', compact('ventas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('venta.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:20',
            'cantidad' => 'required|integer',
            'precio' => 'required|numeric',
            'clienteid' => 'required|exists:clientes,id',
        ]);

        Venta::create($request->all());
        return redirect()->route('venta.index')->with('success', 'Venta creada correctamente.');
    }


        public function show(Venta $venta)
    {
        $clientes = Cliente::all();

        return view('venta.show', compact('venta', 'clientes'));
    }

    
    public function edit(Venta $venta)
    {
        $clientes = Cliente::all();
        return view('venta.edit', compact('venta', 'clientes'));
    }

    public function update(Request $request, Venta $venta)
    {
        $request->validate([
            'nombre' => 'required|string|max:20',
            'cantidad' => 'required|integer',
            'precio' => 'required|numeric',
            'clienteid' => 'required|exists:clientes,id',
        ]);

        $venta->update($request->all());
        return redirect()->route('venta.index')->with('success', 'Venta actualizada correctamente.');
    }

    public function destroy(Venta $venta)
    {
        $venta->delete();
        return redirect()->route('venta.index')->with('success', 'Venta eliminada correctamente.');
    }
}
