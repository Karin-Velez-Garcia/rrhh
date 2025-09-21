<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatPuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_puestos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255)->nullable();
            $table->foreignId('id_area')->references('id')->on('cat_areas')->onUpdate('cascade');
            $table->decimal('salario_base', 8, 2)->nullable();
            $table->primary('id');
            $table->unique(['nombre', 'id_area'], 'uq_puesto_nombre_area');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_puestos');
    }
}