<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaldosPermisoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saldos_permiso', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_empleado')->references('id')->on('empleados')->onUpdate('cascade');
            $table->foreignId('id_tipo_permiso')->references('id')->on('cat_tipos_permiso')->onUpdate('cascade');
            $table->smallInteger('anio')->unsigned()->nullable(false);
            $table->decimal('dias_asignados', 8, 2)->nullable();
            $table->decimal('dias_consumidos', 8, 2)->nullable();
            $table->unique(['id_empleado', 'id_tipo_permiso', 'anio'], 'uq_saldo_emp_tipo_anio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saldos_permiso');
    }
}