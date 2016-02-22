<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_entity', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->unique();
            $table->string('first_name');
            $table->string('last_name');
            /* Address */
            $table->text('address');
            $table->string('sub_district');
            $table->string('district');
            $table->string('province');
            $table->string('country');
            $table->integer('post_number')->unsigned();
            /* */
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
        });



    }
    public function down()
    {

    }

}
