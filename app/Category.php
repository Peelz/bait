<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'catalog_category_entity';

    protected  $fillable =  [
      'id','name'
    ];

    public function getProduct(){

        $this->hasmany('App/ProCate');
    }
    public function Avatar()
    {
      $this->hasone('App/CategoryImage');
    }
}
