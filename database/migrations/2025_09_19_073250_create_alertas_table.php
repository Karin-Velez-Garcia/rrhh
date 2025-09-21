<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alertas', function (Blueprint $table) {
            $table->id();
            $table->string('tipo', 20)->nullable();
            $table->foreignId('id_empleado')->references('id')->on('empleados')->onUpdate('cascade');
            $table->bigInteger('id_referencia')->unsigned()->nullable(false);
            $table->date('fecha_evento')->nullable(false);
            $table->smallInteger('dias_anticipacion')->unsigned()->nullable(false);
            $table->string('mensaje', 255)->nullable();
            $table->tinyInteger('atendida')->nullable();
            $table->timestamp('created_at')->nullable(false);
            $table->index(['fecha_evento', 'atendida', 'tipo'], 'idx_alertas_evento');
            $table->index(['id_empleado', 'atendida'], 'idx_alertas_empleado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alertas');
    }
}