<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Auth ;
use App\Admin ;
class Authenticate extends Controller
{
  protected $redirectTo = '/admin';
  protected $guard = 'admin';

  public function __construct()
  {
      $this->middleware('guest', ['except' => 'logout']);
  }

    public function showLoginForm()
    {
      return view('admin.auth.login');
    }

}
