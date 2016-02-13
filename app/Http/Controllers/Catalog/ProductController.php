<?php

namespace App\Http\Controllers\Catalog;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;

use App\Cart ;

use Auth ;
use App\ProductInCart ;
class ProductController extends Core
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
        $this->middleware('auth');
        $this->middleware('web');
     }

    public function index()
    {

      return   view('catalog.product.list')
              ->with('products',$this->getProduct());
    }

    public function show($id)
    {
      return   view('catalog.product.view')
        ->with('product',$this->getProductbyId($id));
    }
    public function addToCart(Request $req)
    {

      $user = $req->user ;

      $cart = Cart::firstOrCreate([
        'user_id' => $user ,
        'status' => "pending",
      ]);

      $addProduct = new ProductInCart ;
      $addProduct->cart_id = $cart->id ;
      $addProduct->pro_id = $req->product ;
      $addProduct->quanlity = $req->qty;
      $addProduct->save();

      return redirect('/');
    }

}
