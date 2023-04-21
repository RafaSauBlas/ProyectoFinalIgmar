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
        Schema::create('q_r_s', function (Blueprint $table) {
            $table->string('codigoqr')->nullable();
            $table->timestamp('codigoqr_created_at')->nullable();
            $table->timestamp('codigoqr_verified_at')->nullable();
            $table->integer('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('q_r_s');
    }
};
