<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropTable extends Migration
{

  public function up()
  {
    # code...
  }
    public function down()
    {

      Schema::drop('password_resets');
      Schema::drop('sale_cart_product');
      Schema::drop('sale_invoice');
      Schema::drop('sale_cart_entity');
      Schema::drop('customer_entity');
      Schema::drop('admin_user');
      Schema::drop('catalog_category_product');
      Schema::drop('catalog_product_image');
      Schema::drop('catalog_product_entity');
      Schema::drop('catalog_category_image');
      Schema::drop('catalog_category_entity');

      Schema::drop('sale_cart_entity');
      Schema::drop('sale_invoice');




    }

}
