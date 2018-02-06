<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
          $table->engine = 'InnoDB';

          $table->increments('userKey');
          $table->string('name');
          $table->string('email')->unique();
          $table->string('password');
          $table->integer('permissionKey')->unsigned()->default(2);
          $table->rememberToken();
          $table->timestamps();
        });

        //add foreign key constraints
        Schema::table('users', function(Blueprint $table) {
          $table->foreign('permissionKey')->references('permissionKey')->on('permissions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
