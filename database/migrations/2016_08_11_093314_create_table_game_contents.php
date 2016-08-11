<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGameContents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('type');

            $table->string('title');
            $table->text('desc');
            $table->text('content');
            $table->string('image');
            $table->string('external_link');
            $table->string('order')->default(0);

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
        Schema::drop('game_contents');
    }
}
