<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
  protected $table = 'catalog_product_entity';
  protected $fillable = [
      'id','name', 'description', 'sku', 'price', 'special_price', 'is_active','quanlity','category'
  ];

  public function Image()
  {
    return $this->hasMany('App\ProductImage','pro_id');
  }

  public function ImageAvatar()
  {
    return $this->hasOne('App\ProductImage','pro_id');
  }

  public function Price($id){
    if($this->find($id)->first()->special_rpice > 0 ){
      return ['special_price'] ;
    }else {
      return ['price '];
    }
  }




}
