<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'catalog_product_image';

    protected $filable = [
      'pro_id','position','path'
    ];

    public function Product()
    {
      return $this->hasMany('App\Product','pro_id');
    }

}
