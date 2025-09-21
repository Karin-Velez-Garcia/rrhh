<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_empleado')->references('id')->on('empleados')->onUpdate('cascade');
            $table->foreignId('id_renglon')->references('id')->on('renglones_contrato')->onUpdate('cascade');
            $table->foreignId('id_plantilla')->references('id')->on('plantillas_contrato')->onUpdate('cascade');
            $table->foreignId('id_contrato_origen')->references('id')->on('contratos')->onUpdate('cascade');
            $table->string('numero_contrato', 255)->nullable();
            $table->date('fecha_inicio')->nullable(false);
            $table->date('fecha_fin')->nullable();
            $table->string('estado', 20)->nullable();
            $table->decimal('salario', 8, 2)->nullable();
            $table->char('moneda', 255)->nullable();
            $table->longText('datos_merge')->nullable(false);
            $table->string('url_pdf', 255)->nullable();
            $table->string('observaciones', 255)->nullable();
            $table->timestamp('created_at')->nullable(false);
            $table->timestamp('updated_at')->nullable(false);
            $table->unique('numero_contrato', 'uq_numero_contrato');
            $table->index(['estado', 'fecha_inicio', 'fecha_fin'], 'idx_contratos_estado');
            $table->index('fecha_fin', 'idx_contratos_vencimiento');
            $table->index(['id_empleado', 'estado'], 'idx_contratos_empleado');
            $table->index('id_contrato_origen', 'idx_contratos_cadena');
            $table->index(['id_renglon', 'estado', 'fecha_fin'], 'idx_contratos_busq');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratos');
    }
}