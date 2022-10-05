<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluacions', function (Blueprint $table) {
            $table->id();
            $table->date('fecha')->nullable();
            $table->string('comite')->nullable();
            $table->integer('pCriterio1')->nullable();
            $table->integer('pCriterio2')->nullable();
            $table->integer('pCriterio3')->nullable();
            $table->integer('pCriterio4')->nullable();
            $table->integer('pCriterio5')->nullable();
            $table->integer('pCriterio6')->nullable();
            $table->integer('pCriterio7')->nullable();
            $table->integer('pCriterio8')->nullable();
            $table->integer('pCriterio9')->nullable();
            $table->integer('pCriterio10')->nullable();
            $table->double('viabFormulacion')->nullable();
            $table->double('viabInnovacion')->nullable();
            $table->double('viabMercado')->nullable();
            $table->double('viabPromedio')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('recomendaciones')->nullable();
            $table->foreignId('idea_id')->constrained();
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
        Schema::dropIfExists('evaluacions');
    }
}
