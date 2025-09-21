<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRenglonesContratoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renglones_contrato', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 255)->nullable();
            $table->string('nombre', 255)->nullable();
            $table->string('descripcion', 255)->nullable();
            $table->tinyInteger('activo')->nullable();
            $table->unique('codigo', 'uq_renglon_codigo');
            $table->unique('nombre', 'uq_renglon_nombre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('renglones_contrato');
    }
}