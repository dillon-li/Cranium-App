<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardtypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('cardtypes', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('color_id')->unsigned();
          $table->string('title');
          $table->text('instruction', 65535);
          $table->boolean('clubs');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cardtypes');
    }
}
