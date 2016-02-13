<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryImage extends Model
{
  protected $table = 'catalog_category_image';

  protected  $fillable =  [
    'id','path'
  ];
  
}
