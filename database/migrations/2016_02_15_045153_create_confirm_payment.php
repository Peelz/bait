<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfirmPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_confirm_payment',function(Blueprint $table){

          $table->increments('id');
          $table->integer('invoice_id')->unsigned();
          $table->foreign('invoice_id')->references('id')->on('sale_invoice_entity')->onDelete('cascade');
          $table->string('date');
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('customer_entity')->onDelete('cascade');
          $table->string('path');
          $table->text('comment');
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
