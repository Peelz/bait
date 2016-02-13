<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_cart_entity',function(Blueprint $table){
          $table->increments('id');
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('customer_entity')->onDelete('cascade');
          $table->string('status');
          $table->timestamps();
        });

        Schema::create('sale_cart_product',function(Blueprint $table){
          $table->integer('cart_id')->unsigned();
          $table->foreign('cart_id')->references('id')->on('sale_cart_entity')->onDelete('cascade');
          $table->integer('pro_id')->unsigned();
          $table->foreign('pro_id')->references('id')->on('catalog_product_entity')->onDelete('cascade');
          $table->integer('quanlity')->unsigned();
          $table->timestamps('create_at');
        });
        Schema::create('sale_invoice',function(Blueprint $table){
          $table->increments('id');
          $table->integer('cart_id')->unsigned();
          $table->foreign('cart_id')->references('id')->on('sale_cart_entity')->onDelete('cascade');
          $table->float('total')->unsigned();
          $table->string('status');
          $table->timestamps();
        });
    }
    public function down()
    {

    }

}
