<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jefe extends Model
{
    protected $fillable = [
        'nombre',
        'proveedores_id',
        'geren_ops_id',
        'reg_comps_id',
    ];

    public function proveedores()
    {
        return $this->belongsTo(Proveedor::class, 'proveedores_id');
    }

    public function gerentes()
    {
        return $this->belongsTo(Gerente::class, 'gerentes_id');
    }

    public function compras()
    {
        return $this->belongsTo(Compra::class, 'compras_id');
    }
}
