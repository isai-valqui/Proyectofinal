<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 20);
            $table->integer('cantidad');
            $table->decimal('precio', 8, 2); 
            $table->unsignedBigInteger('clienteid'); 
            $table->timestamps();
            $table->foreign('clienteid')->references('id')->on('clientes');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}