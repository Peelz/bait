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
    return $this->hasMany('App\ProductImage','pro_id','id');
  }

  public function ImageAvatar()
  {
    return $this->hasOne('App\ProductImage','pro_id','id');
  }

  static function getPrice($id){
    $product = Product::find($id)->first() ;
    if($product->special_price > 0 && $product->price  ){
      return $product->special_price ;
    }else{
        return $product->price ;
    }
  }




}
