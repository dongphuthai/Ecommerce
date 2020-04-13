<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->string('screen')->nullable();
            $table->string('operating_system')->nullable();
            $table->string('cpu')->nullable();
            $table->string('rear_camera')->nullable();
            $table->string('front_camera')->nullable();
            $table->integer('ram')->default(2);
            $table->integer('internal_memory')->default(32);
            $table->string('memory')->nullable();
            $table->string('sim')->nullable();
            $table->string('pin')->nullable();
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
        Schema::dropIfExists('parameters');
    }
}
