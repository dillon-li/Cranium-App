<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('cards', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('set_id')->unsigned();
          $table->string('hint');
          $table->text('instruction', 65535);
          $table->text('question', 65535);
          $table->string('answer');
          $table->boolean('played')->default(0);
          $table->integer('skips');
          $table->integer('plays');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cards');
    }
}
