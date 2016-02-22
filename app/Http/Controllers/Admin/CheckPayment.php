<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Invoice;
use App\Product;

use App\ConfirmPayment;


class CheckPayment extends Controller
{
  public function index()
  {
    $contacts = ConfirmPayment::all();
    return view('admin.contact.payment')
          ->with('contacts',$contacts);

          return dd($contacts->first()->Invoice);
  }
  public function post(Request $req )
  {
    $ids = $req->invoice;
    foreach ($ids as $id) {
      $invoice = Invoice::find($id);
      $invoice->status = "confirm";
      $invoice->save();

      $orders = $invoice->Cart->Product ;
      foreach ($orders as $order) {
        $product = Product::find($order->pro_id);
        $product->quanlity -= $order->quanlity;
        $product->save();
      }
    }

    return redirect('admin/checkpayment');
  }

}
