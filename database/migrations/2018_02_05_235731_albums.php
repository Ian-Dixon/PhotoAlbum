<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Albums extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function(Blueprint $table) {
          $table->engine = 'InnoDB';

          $table->increments('albumKey');
          $table->string('title')->default('&nbsp;');
          $table->integer('displayOrder')->default(0);
          $table->integer('createdByUserKey')->unsigned();
          $table->timestamps();
        });

        //add foreign key constraints
        Schema::table('albums', function(Blueprint $table) {
          $table->foreign('createdByUserKey')->references('userKey')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('albums');
    }
}
