<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosRequisitosCheckTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados_requisitos_check', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_empleado')->references('id')->on('empleados')->onUpdate('cascade');
            $table->foreignId('id_renglon')->references('id')->on('renglones_contrato')->onUpdate('cascade');
            $table->foreignId('id_tipo_documento')->references('id')->on('cat_tipos_documento')->onUpdate('cascade');
            $table->tinyInteger('cumplido')->nullable();
            $table->dateTime('fecha_revision')->nullable(false);
            $table->string('observaciones', 255)->nullable();
            $table->unique(['id_empleado', 'id_renglon', 'id_tipo_documento'], 'uq_check_emp_renglon_doc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados_requisitos_check');
    }
}