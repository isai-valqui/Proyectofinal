<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_producto', 30);
            $table->integer('cantidad_impor');
            $table->string('nombre_pais', 30);
            $table->date('fecha_impor');
            $table->timestamps();  
        });
    }

    public function down()
    {
        Schema::dropIfExists('compras');
    }
}