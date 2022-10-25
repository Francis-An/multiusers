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
        // Schema::create('carts', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->unsignedInteger('medicine_id');
        //     $table->unsignedBigInteger('user_id')->nullable();
        //     $table->integer('price');
        //     $table->string('medicine_name')->nullable();
        //     $table->integer('quantity')->nullable();
        //     $table->timestamps();
        //     $table->foreign('medicine_id')
        //         ->references('id')
        //         ->on('medicines')
        //         ->onDelete('cascade');
        //     $table->foreign('user_id')
        //         ->references('id')
        //         ->on('users')
        //         ->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
};
