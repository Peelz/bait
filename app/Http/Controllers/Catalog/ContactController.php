<?php

namespace App\Http\Controllers\Catalog;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

use Auth ;
use App\ConfirmPayment;
class ContactController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('web');
    }
    public function getContactus()
    {
        return view('catalog.contact.contactus');
    }


    public function getConfirmPayment()
    {
        $invoices = Auth::user()->Invoice->where('status','pending');

        return view('catalog.contact.confirm-payment')
        ->with('invoices', $invoices);

    }
    public function postConfirmPayment(Request $req){

      $img = $req->image ;
      $fileName = $img->getClientOriginalName();
      $path = '/verify/'.Auth::user()->id.'_'.$req->invoice.'/';


      $obj = new ConfirmPayment ;
      $obj->user_id = Auth::user()->id ;
      $obj->invoice_id = $req->invoice ;
      $obj->comment = $req->comment ;
      $obj->date = $req->date ;
      $obj->path = $path.$fileName ;
      $obj->save();
      $req->image->move(public_path($path),$fileName);
      return redirect('/');
    }
}
