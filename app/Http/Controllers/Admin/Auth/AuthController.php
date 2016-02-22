<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Admin;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Http\Request;


class AuthController extends Controller
{


    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/admin';

    protected $guard = 'admin';

    protected $loginView = 'admin.auth.login';

    protected $redirectAfterLogout = '/admin';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }




}
