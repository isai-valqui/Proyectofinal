<?php
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\BaristaController;
use App\Http\Controllers\ProveedorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('cafe');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/jefe-de-compra', function () {
        return view('proveedor');
    })->name('jefe-de-compra');

    Route::get('/gerente-de-operaciones', function () {
        return view('barista.show');
    })->name('gerente-de-operaciones');

    Route::resource('venta', VentaController::class)->only(['show']);
    Route::resource('barista',BaristaController::class);

    Route::resource('cliente',ClienteController::class);
    Route::resource('proveedor',ProveedorController::class);

});
Route::post('/purchase/store', 'App\Http\Controllers\PurchaseController@store');



