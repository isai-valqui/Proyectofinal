<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = [
        'nombre_producto',
        'cantidad_impor',
        'nombre_pais',
        'fecha_impor',
    ];

    public function jefes()
    {
        return $this->hasMany(Jefe::class, 'Compra_id');
    }
}