<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use App\Category ;
use App\CategoryImage ;


use File ;


class InvoiceController extends Controller{

  public function index()
  {
      return view('admin.sale.invoice.index');
  }

  public function show($id){
    return view('catalog.sale.invoice')
    ->with( App\Invoice::find($id));
  }

}


?>
