<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRenglonesRequisitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renglones_requisitos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_renglon')->references('id')->on('renglones_contrato')->onUpdate('cascade');
            $table->foreignId('id_tipo_documento')->references('id')->on('cat_tipos_documento')->onUpdate('cascade');
            $table->tinyInteger('obligatorio')->nullable();
            $table->tinyInteger('requiere_vigencia')->nullable();
            $table->unique(['id_renglon', 'id_tipo_documento'], 'uq_renglon_tipo_doc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('renglones_requisitos');
    }
}