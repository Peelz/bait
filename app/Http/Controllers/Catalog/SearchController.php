<?php

namespace App\Http\Controllers\Catalog;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product ;

class SearchController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('web');
    }

    public function index(Request $req){

      $products = Product::where('name','LIKE',"%".$req->search."%")
        ->get();

      return view('catalog.search.index')
              ->with('products',$products)
              ->with('search',$req->search);

    }

}
