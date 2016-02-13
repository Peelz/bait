<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image ;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product ;
class TestController extends Controller
{
  public function getNone()
  {
    return "test";
  }
}
