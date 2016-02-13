<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('catalog_product_entity', function($table){
          $table->foreign('category')->references('id')->on('catalog_category_entity')->onDelete('cascade');
      });

      Schema::table('catalog_product_image', function($table){
          $table->foreign('pro_id')->references('id')->on('catalog_product_entity')->onDelete('cascade');
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
