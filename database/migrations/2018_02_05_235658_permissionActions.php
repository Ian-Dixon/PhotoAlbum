<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PermissionActions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissionActions', function(Blueprint $table) {
          $table->engine = 'InnoDB';

          $table->increments('permissionActionKey');
          $table->integer('permissionKey')->unsigned();
          $table->integer('actionKey')->unsigned();
        });

        Schema::table('permissionActions', function(Blueprint $table) {
          $table->foreign('permissionKey')->references('permissionKey')->on('permissions');
          $table->foreign('actionKey')->references('actionKey')->on('actions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissionActions');
    }
}
