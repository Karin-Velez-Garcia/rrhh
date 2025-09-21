<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_empleado', 255)->nullable();
            $table->string('nombres', 255)->nullable();
            $table->string('apellidos', 255)->nullable();
            $table->string('cui', 255)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('telefono', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('direccion', 255)->nullable();
            $table->date('fecha_ingreso')->nullable(false);
            $table->foreignId('id_estado')->references('id')->on('cat_estados_empleado')->onUpdate('cascade');
            $table->foreignId('id_puesto')->references('id')->on('cat_puestos')->onUpdate('cascade');
            $table->foreignId('id_area')->references('id')->on('cat_areas')->onUpdate('cascade');
            $table->foreignId('id_motivo_baja')->references('id')->on('cat_motivos_baja')->onUpdate('cascade');
            $table->decimal('salario_base', 8, 2)->nullable();
            $table->date('fecha_baja')->nullable();
            $table->string('detalle_baja', 255)->nullable();
            $table->timestamp('created_at')->nullable(false);
            $table->timestamp('updated_at')->nullable(false);
            $table->unique('codigo_empleado', 'uq_empleado_codigo');
            $table->unique('cui', 'uq_empleado_cui');
            $table->index(['apellidos', 'nombres'], 'idx_empleados_busqueda');
            $table->index('id_estado', 'idx_empleados_estado');
            $table->index('fecha_ingreso', 'idx_empleados_ingreso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}