<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Product ;
use Invoice ;

class DashBoardController extends Controller
{
    public function __construct()
    {
      $this->middleware('admin');

    }
    public function index()
    {
        return view('admin.dashboard.index');
    }


}
