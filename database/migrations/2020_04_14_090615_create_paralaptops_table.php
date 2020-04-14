<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParalaptopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paralaptops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->string('cpu')->nullable();
            $table->string('ram')->nullable();
            $table->string('hard_drive')->nullable();
            $table->string('screen')->nullable();
            $table->string('card_screen')->nullable();
            $table->string('connector')->nullable();
            $table->string('operating_system')->nullable();
            $table->string('design')->nullable();
            $table->string('size')->nullable();
            $table->string('time_launch')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('product_id')
            ->references('id')->on('products')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paralaptops');
    }
}
