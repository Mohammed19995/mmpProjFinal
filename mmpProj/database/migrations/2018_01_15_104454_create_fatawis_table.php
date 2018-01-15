<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFatawisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fatawis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
            $table->string('question');
            $table->string('answer');
            $table->integer('user_id');
            $table->integer('cat_id');
            $table->integer('private');
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
        Schema::dropIfExists('fatawis');
    }
}
