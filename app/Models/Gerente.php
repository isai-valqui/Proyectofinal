<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gerente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'correo',
        'telefono',
        'imagen',
    ];

    public function baristas()
    {
        return $this->hasMany(Barista::class);
    }

    public function publicaciones()
    {
        return $this->hasMany(Publicacion::class);
    }
}