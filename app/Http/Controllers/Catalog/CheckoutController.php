<?php

namespace App\Http\Controllers\Catalog;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Cart;
use App\Invoice ;
use App\Product;
class CheckoutController extends Controller
{
  function __construct() {
    $this->middleware('web');
    $this->middleware('auth');
  }

  public function getTotalPrice($cart)
  {
    $total = 0;
    foreach ($cart->Product as $product) {
      $quanlity = $product->quanlity;
      $product =  Product::find($product->pro_id);

      if($product->special_price > 0){
        $total += $product->special_price*$quanlity;

      }else {
        $total += $product->price*$quanlity;;
      }

    }
    return $total ;
  }

  public function index()
  {
    $user = Auth::user();
    $cart = Cart::where('user_id','=',$user->id)->where('status','=','pending')->first();
    return view('catalog.checkout.checkout')
    ->with('cart',$cart)
    ->with('totalPrice',$this->getTotalPrice($cart));
  }
  public function calculate(){
    $user = Auth::user();
    $cart = Cart::where('user_id','=',$user->id)->where('status','=','pending')->first();
    $invoice = new Invoice ;

    if( !empty($cart)){
      $total =0;
      foreach ($cart->Product as $product) {
        $product->price ;
        if($product->special_price > 0 ){
          $total +=  $product->special_price ;
        }
        else {
            $total +=  $product->price ;
        }
      }

      $invoice->cart_id = $cart->id ;
      $invoice->total  = $total ;
      $invoice->status = 'pending' ;
      $invoice->save();
      $cart->status = 'confirm';
      $cart->save();
      return view('catalog.checkout.success');
    }else{
      return redirect('/');
    }

  }

}
