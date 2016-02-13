<?php

namespace App\Http\Controllers\Catalog;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product ;
use App\Category ;


class Core extends Controller
{
  public function getCategory(){
    return Category::all();
  }

  public function getProduct(){
    return Product::all();
  }
  public function getProductbyId($id){
   return Product::findOrFail($id);
  }
  public function getProductByCate($id){

    $products = Product::where('category', $id)->get();

    return $products;

  }
}
