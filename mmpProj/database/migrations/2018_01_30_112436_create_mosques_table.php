<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMosquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mosques', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('country');
            $table->string('city');
            $table->string('street');
            $table->string('imam_name');
            $table->string('email');
            $table->string('phone');
            $table->integer('friday_prayer');
            $table->integer('woman_chapel');
            $table->string('image');
            $table->float('lat' , 10 , 6);
            $table->float('lng' , 10 , 6);

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
        Schema::dropIfExists('mosques');
    }
}
