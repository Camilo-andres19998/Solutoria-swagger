<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicadores', function (Blueprint $table) {
            $table->id();
            $table->string('nombreIndicador')->nullable();
            $table->string('codigoIndicador')->nullable();
            $table->string('unidadMedidaIndicador')->nullable();
            $table->integer('valorIndicador');
            $table->string('fechaIndicador')->nullable();
            //$table->date('fechaIndicador');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indicadores');
    }
};
