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
      return $this->hasOne('App\User','id','user_id');
    }

    public function Product()
    {
      return $this->hasMany('App\CartOrder','cart_id','id') ;
    }


}
