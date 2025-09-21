<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosHistorialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos_historial', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_contrato')->references('id')->on('contratos')->onUpdate('cascade');
            $table->integer('version')->unsigned()->nullable(false);
            $table->string('change_type', 20)->nullable();
            $table->longText('datos_merge')->nullable();
            $table->string('url_pdf', 255)->nullable();
            $table->string('estado', 255)->nullable();
            $table->timestamp('changed_at')->nullable(false);
            $table->string('comentario', 255)->nullable();
            $table->unique(['id_contrato', 'version'], 'uq_hist_contrato_version');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratos_historial');
    }
}