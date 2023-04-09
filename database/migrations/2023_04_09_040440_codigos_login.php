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
        Schema::create('codigos_logins', function (Blueprint $table) {
            $table->string('codigomail')->nullable();
            $table->timestamp('codigomail_created_at')->nullable();
            $table->timestamp('codigomail_verified_at')->nullable();
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
        Schema::dropIfExists('codigos_logins');
    }
};
