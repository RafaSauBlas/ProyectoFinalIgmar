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
        Schema::create('discos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('categoria');
            $table->string('cantante');
            $table->decimal('precio',10,2);
            $table->string('archivo');
            $table->softDeletes();
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
        Schema::dropIfExists('discos');
    }
};
