<?php

namespace App\Http\Controllers\Catalog;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;

use App\Cart ;

use Auth ;
use App\CartOrder ;
class ProductController extends Controller{

     public function __construct()
     {
        $this->middleware('auth');

     }

    public function index()
    {

      return   view('catalog.product.list')
              ->with('products',Product::all());
    }

    public function show($id)
    {
      return   view('catalog.product.view')
        ->with('product',Product::find($id));
    }
    public function addToCart(Request $req)
    {

      $user = $req->user ;

      $cart = Cart::firstOrCreate([
        'user_id' => $user ,
        'status' => "pending",
      ]);

      $addProduct = new CartOrder ;
      $addProduct->cart_id = $cart->id ;
      $addProduct->pro_id = $req->product ;
      $addProduct->quanlity = $req->qty;
      $addProduct->save();

      return redirect('/');
    }

}
