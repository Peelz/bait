<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ProductInCart extends Model
{
    protected $table = "sale_cart_product" ;

    protected $filable = [
      'id','cart_id','pro_id','quanlity','create_at'
    ];
    public function getProduct()
    {
      return $this->hasOne('App\Product','id','pro_id');
    }

}
