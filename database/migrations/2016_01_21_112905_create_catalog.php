<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      // Product Entity Table
      Schema::create('catalog_product_entity', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->text('description');
          $table->string('sku');
          $table->integer('category')->nullable()->unsigned();
          $table->integer('price');
          $table->integer('special_price');
          $table->boolean('is_active');
          $table->integer('quanlity');
          $table->timestamps();
      });
      // Product's Image Entity Table
      Schema::create('catalog_product_image', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('pro_id')->unsigned();
          $table->string('path');
          $table->integer('position')->default(0);
          $table->timestamps();
      });

      // Category Entity Table
      Schema::create('catalog_category_entity', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->boolean('is_active');
          $table->timestamps();
      });

      Schema::create('catalog_category_image',function(Blueprint $table){
          $table->increments('id');
          $table->integer('cate_id')->unsigned();
          $table->foreign('cate_id')->references('id')->on('catalog_category_entity')->onDelete('cascade');
          $table->string('path');
          $table->timestamps();
      });

      // Product in Category
      Schema::create('catalog_category_product', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('cate_id')->unsigned();
          $table->integer('pro_id')->unsigned();
          $table->timestamps();
      });


    }
    public function down()
    {

    }

}
