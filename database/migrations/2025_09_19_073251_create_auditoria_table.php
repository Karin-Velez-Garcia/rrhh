<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditoria', function (Blueprint $table) {
            $table->id();
            $table->string('entidad', 255)->nullable();
            $table->bigInteger('id_registro')->unsigned()->nullable(false);
            $table->string('accion', 20)->nullable();
            $table->string('usuario_db', 255)->nullable();
            $table->timestamp('created_at')->nullable(false);
            $table->index(['entidad', 'id_registro', 'created_at'], 'idx_auditoria_entidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auditoria');
    }
}