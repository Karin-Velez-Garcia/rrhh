<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantillasContratoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantillas_contrato', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_renglon')->references('id')->on('renglones_contrato')->onUpdate('cascade');
            $table->smallInteger('version')->unsigned()->nullable(false);
            $table->string('titulo', 255)->nullable();
            $table->longText('cuerpo')->nullable(false);
            $table->longText('campos_requeridos')->nullable(false);
            $table->date('vigente_desde')->nullable(false);
            $table->date('vigente_hasta')->nullable();
            $table->tinyInteger('activo')->nullable();
            $table->primary('id');
            $table->unique(['id_renglon', 'version'], 'uq_plantilla_renglon_version');
            $table->index(['id_renglon', 'activo', 'vigente_desde', 'vigente_hasta'], 'idx_plantillas_vigencia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plantillas_contrato');
    }
}