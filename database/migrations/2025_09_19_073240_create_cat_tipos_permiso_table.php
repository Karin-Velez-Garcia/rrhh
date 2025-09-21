<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatTiposPermisoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_tipos_permiso', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255)->nullable();
            $table->tinyInteger('descuenta_saldo')->nullable();
            $table->tinyInteger('requiere_soporte')->nullable();
            $table->smallInteger('dias_maximo_anual')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_tipos_permiso');
    }
}