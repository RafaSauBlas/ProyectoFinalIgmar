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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('article');
            $table->string('color');
            $table->string('scent');
            $table->decimal('price',10,2);
            $table->decimal('discount',10,2);
            $table->decimal('total',10,2);
            $table->longText('note');
            $table->unsignedBigInteger('req_id');
            $table->foreign('req_id')->references('id')->on('customer_withdrawa');
            $table->unsignedBigInteger('quotation_id');
            $table->foreign('quotation_id')->references('id')->on('quotation');
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('articles');
    }
};
