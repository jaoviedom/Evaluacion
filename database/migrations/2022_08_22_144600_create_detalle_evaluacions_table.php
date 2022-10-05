<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleEvaluacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_evaluacions', function (Blueprint $table) {
            $table->id();
            $table->integer('criterio1');
            $table->integer('criterio2');
            $table->integer('criterio3');
            $table->integer('criterio4');
            $table->integer('criterio5');
            $table->integer('criterio6');
            $table->integer('criterio7');
            $table->integer('criterio8');
            $table->integer('criterio9');
            $table->integer('criterio10');

            $table->string('capAcomp1');
            $table->string('capAcomp2');
            $table->string('capAcomp3');
            $table->string('capAcomp4');
            $table->string('capEjec1');
            $table->string('capEjec2');

            $table->string('observaciones')->nullable();
            
            $table->foreignId('evaluacion_id')->constrained();
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('detalle_evaluacions');
    }
}
