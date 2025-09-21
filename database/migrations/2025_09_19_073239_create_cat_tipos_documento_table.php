<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatTiposDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_tipos_documento', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255)->nullable();
            $table->tinyInteger('requiere_vencimiento')->nullable();
            $table->tinyInteger('es_obligatorio_ingreso')->nullable();
            $table->smallInteger('dias_aviso_vencimiento')->unsigned()->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_tipos_documento');
    }
}