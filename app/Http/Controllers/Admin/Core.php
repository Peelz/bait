<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category ;
class Core extends Controller
{

  public function getProduct()
  {
    return Product::all();
  }

}
?>
