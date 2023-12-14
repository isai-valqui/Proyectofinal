<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJefesTable extends Migration
{
    public function up()
    {
        Schema::create('jefes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 30);
            $table->unsignedBigInteger('proveedores_id');
            $table->unsignedBigInteger('gerentes_id');
            $table->unsignedBigInteger('compras_id');
            $table->timestamps();
            $table->foreign('proveedores_id')->references('id')->on('proveedores');
            $table->foreign('gerentes_id')->references('id')->on('gerentes');
            $table->foreign('compras_id')->references('id')->on('compras');
        });
    }

    public function down()
    {
        Schema::dropIfExists('jefes');
    }
}
