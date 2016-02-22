<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'catalog_category_entity';

    protected  $fillable =  [
      'id','name','path','is_active','created_at','updated_at'
    ];

    public function getProduct(){
      return $this->hasmany('App\Product','category','id');
    }


}
