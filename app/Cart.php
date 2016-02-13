<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    protected $table = 'sale_cart_entity';

    protected $fillable = [
      'id','user_id','status'
    ];

    public function User()
    {
      return $this->belongTo('App\User','user_id');
    }

    public function Product()
    {
      return $this->hasMany('App\ProductInCart') ;
    }


}
