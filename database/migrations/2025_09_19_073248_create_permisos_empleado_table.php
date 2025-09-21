<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisosEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos_empleado', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_empleado')->references('id')->on('empleados')->onUpdate('cascade');
            $table->foreignId('id_tipo_permiso')->references('id')->on('cat_tipos_permiso')->onUpdate('cascade');
            $table->foreignId('id_aprobador')->references('id')->on('empleados')->onUpdate('cascade');
            $table->dateTime('fecha_inicio')->nullable(false);
            $table->dateTime('fecha_fin')->nullable(false);
            $table->decimal('horas', 8, 2)->nullable();
            $table->text('motivo')->nullable();
            $table->string('url_soporte', 255)->nullable();
            $table->string('estado', 20)->nullable();
            $table->dateTime('fecha_aprobacion')->nullable();
            $table->string('observaciones_aprobacion', 255)->nullable();
            $table->timestamp('created_at')->nullable(false);
            $table->timestamp('updated_at')->nullable(false);
            $table->index(['id_empleado', 'estado'], 'idx_perm_empleado_estado');
            $table->index(['fecha_inicio', 'fecha_fin'], 'idx_perm_fechas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permisos_empleado');
    }
}