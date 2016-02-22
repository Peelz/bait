<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CartOrder extends Model
{
    protected $table = "sale_cart_product" ;

    protected $filable = [
      'id','cart_id','pro_id','quanlity','create_at'
    ];
    public function Product()
    {
      return $this->hasOne('App\Product','id','pro_id');
    }
    public function Cart(){
      return $this->hasOne('App\Cart','id','cart_id');
    }

    static function getTotalOrder(){
      $order = CartOrder::count();
      return $order ;
    }
    static function getLast($count)
    {
      $Last = CartOrder::orderBy('created_at','desc')->take($count)->get();
      return $Last ;
    }



}
