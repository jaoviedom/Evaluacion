<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdeasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ideas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->nullable();
            $table->string('codigo')->nullable();
            $table->string('talento')->nullable();
            $table->string('profesion')->nullable();
            $table->string('tipoActor')->nullable();
            $table->string('email')->nullable();
            $table->string('celular')->nullable();
            $table->bigInteger('gestor')->nullable();
            $table->string('linea')->nullable();
            $table->string('estado')->default('Convocado');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ideas');
    }
}
