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
    {   Schema::table('users', function (Blueprint $table){
            // $table->string('owner_name')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('address')->nullable();
            $table->string('liscence')->nullable();
            $table->date('founded')->nullable();
            $table->string('phone')->nullable();
            $table->text('bio')->nullable();
            $table->string('region')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            
        Schema::table('users', function (Blueprint $table){      
            $table->dropColumn('profile_image');
            $table->dropColumn('cover_image');
            $table->dropColumn('address');
            $table->dropColumn('liscence');
            $table->dropColumn('founded');
            $table->dropColumn('phone');
            $table->dropColumn('bio');
            $table->dropColumn('region');
            $table->dropColumn('city');
            $table->dropColumn('postal_code');
        });
    }
};
