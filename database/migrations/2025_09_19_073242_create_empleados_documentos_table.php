<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados_documentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_empleado')->references('id')->on('empleados')->onUpdate('cascade');
            $table->foreignId('id_tipo_documento')->references('id')->on('cat_tipos_documento')->onUpdate('cascade');
            $table->string('numero_documento', 255)->nullable();
            $table->date('fecha_emision')->nullable();
            $table->date('fecha_vencimiento')->nullable();
            $table->string('url_archivo', 255)->nullable();
            $table->string('observaciones', 255)->nullable();
            $table->timestamp('created_at')->nullable(false);
            $table->timestamp('updated_at')->nullable(false);
            $table->primary('id');
            $table->unique(['id_empleado', 'id_tipo_documento'], 'uq_emp_doc');
            $table->index('fecha_vencimiento', 'idx_docs_vencimiento');
            $table->index(['id_empleado', 'id_tipo_documento'], 'idx_docs_empleado_tipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados_documentos');
    }
}