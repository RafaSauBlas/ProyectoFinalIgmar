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
        Schema::create('peticiones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('usuario_id')->nullable();
            $table->string('accion')->nullable();
            $table->timestamp('fechasolicita')->nullable();
            $table->integer('aprobada')->nullable();
            $table->timestamp('fechaaprueba')->nullable();
            $table->integer('usuario_autoriza')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peticiones');
    }
};
