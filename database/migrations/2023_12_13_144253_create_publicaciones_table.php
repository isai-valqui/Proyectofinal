<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicacionesTable extends Migration
{

    public function up()
    {
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->id();
            $table->text('imagen');
            $table->string('titulo', 200);
            $table->text('descripcion');
            $table->timestamps();
        });
    
    }

    public function down()
    {
        Schema::dropIfExists('publicaciones');
    }
}
