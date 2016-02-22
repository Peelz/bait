<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminEntity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('admin_entity', function (Blueprint $table) {
          $table->increments('id');
          $table->string('user_id')->unique();
          $table->string('first_name');
          $table->string('last_name');
          $table->string('email')->unique();
          $table->string('password', 60);
          $table->rememberToken();
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
        //
    }
}
