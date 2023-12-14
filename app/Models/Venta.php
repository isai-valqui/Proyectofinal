<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'cantidad', 'precio', 'clienteid'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'clienteid');
    }
}