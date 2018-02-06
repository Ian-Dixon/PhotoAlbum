<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Photos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function(Blueprint $table) {
          $table->engine = 'InnoDB';

          $table->increments('photoKey');
          $table->integer('albumKey')->unsigned();
          $table->string('url');
          $table->string('caption')->default('&nbsp;');
          $table->integer('batch');
          $table->integer('createdByUserKey')->unsigned();
          $table->timestamps();
        });

        //add foreign key constraints
        Schema::table('photos', function(Blueprint $table) {
          $table->foreign('createdByUserKey')->references('userKey')->on('users');
          $table->foreign('albumKey')->references('albumKey')->on('albums');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
