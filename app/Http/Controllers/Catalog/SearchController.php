<?php

namespace App\Http\Controllers\Catalog;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product ;

class SearchController extends Controller
{
    protected $search ;

    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('web');
    }

    public function index(){

      $products = Product::where('name','like','%'.$this->search.'%')
        ->where('is_active',1)->get();

      return view('catalog.search.index')
              ->with('products',$products);

    }

}
