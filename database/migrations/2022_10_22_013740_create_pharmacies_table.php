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
        Schema::create('pharmacies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->string('profile_image')->nullable();
            $table->string('cover_image')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('liscence')->nullable();
            $table->date('founded')->nullable();
            $table->integer('phone')->nullable();
            $table->text('bio')->nullable();
            
            $table->string('region')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('pharmacies');
    }
};
