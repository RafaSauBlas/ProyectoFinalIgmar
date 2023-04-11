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
        Schema::create('codigo_utilidads', function (Blueprint $table) {
            $table->string('codigo')->nullable();
            $table->timestamp('codigo_created_at')->nullable();
            $table->timestamp('codigo_verified_at')->nullable();
            $table->integer('funcion')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('user_crea_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('codigo_utilidads');
    }
};
