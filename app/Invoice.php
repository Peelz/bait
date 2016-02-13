<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

    protected $table = 'sale_invoice';

    protected $fillable = [
        'id,','cart_id','total','status',
    ];

    protected $hidden = [
      'password', 'remember_token',
    ];
  public function Cart(){
    return $this->hasOne('App\Cart');
  }

}
