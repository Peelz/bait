<?php

namespace App\Http\Controllers\Catalog;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function contactus(Request $request)
    {
      if( $request->isMethod('get')){
        return view('catalog.contact.contactus');
        //return "contact us ";
      }else{

        Mail::send( );
        return " $re() ";
      }
    }


    public function confirmPayment(Request $request)
    {
      if( $request->isMethod('get')){
        //return view('catalog.contact.contactus');
        return view('catalog.contact.confirm-payment');
      }else{

        return redirect('/');
      }

    }
}
