<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaristasTable extends Migration
{
    public function up()
    {
        Schema::create('baristas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_bar', 30);
            $table->string('apellido', 30);
            $table->string('correo', 50);
            $table->string('telefono', 15);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('baristas');
    }
}