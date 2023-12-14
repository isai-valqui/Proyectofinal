<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Models\Cliente;
use App\Models\Venta;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'payment' => 'required|string',
            'names' => 'required|string',
            'phone' => 'required|integer',
            'products' => 'required|array',
        ]);

        $payment = $request->input('payment');
        $name = $request->input('names');
        $phone = $request->input('phone');

        $cliente = Cliente::create([
            'nombre' => $name,
            'telefono' => $phone,
            'tipo_pago' => $payment,
        ]);

        $clienteId = $cliente->id; 

        $products = $request->input('products');

        foreach ($products as $product) {
            $productName = $product['name'];
            $price = $product['price'];
            $quantity = $product['quantity'];

            $regVen = Venta::create([
                'nombre' => $productName,
                'precio' => $price,
                'cantidad' => $quantity,
                'clienteid' => $clienteId, 
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Compra almacenada correctamente',
        ]);
    }
}