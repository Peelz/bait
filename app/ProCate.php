<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProCate extends Model
{
    protected $table = 'catalog_category_product';
    protected $filable=['cate_id','pro_id'] ;

    public function Product()
    {
      $this->hasMany('App\Product');
    }
    public function Category()
    {
      $this->hasMany('App\Category');
    }
}
