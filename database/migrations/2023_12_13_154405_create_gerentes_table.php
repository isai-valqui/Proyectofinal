<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGerentesTable extends Migration
{
    public function up()
    {
        Schema::create('gerentes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 30);
            $table->string('apellido', 30);
            $table->string('correo', 50);
            $table->string('telefono', 15);
            $table->unsignedBigInteger('baristas_id');
	        $table->unsignedBigInteger('publicaciones_id');
            $table->timestamps();
            $table->foreign('baristas_id')->references('id')->on('baristas');
            $table->foreign('publicaciones_id')->references('id')->on('publicaciones');
        });
    }

    public function down()
    {
        Schema::dropIfExists('gerentes');
    }
}