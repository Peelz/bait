<?php

namespace App\Http\Controllers\Catalog\Auth;

use Illuminate\Http\Request;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
  protected $redirectTo = '/';


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
     protected function validator(array $data)
     {
         return Validator::make($data, [
             'first_name' => 'required',
             'last_name' => 'required',
             'user_id' => 'required|max:255|unique:customer_entity',
             'address' => 'required',
             'sub_district' => 'required',
             'district' => 'required',
             'province' => 'required',
             'country' => 'required',
             'post_number' => 'required|max:5',
             'email' => 'required|email|max:255|unique:customer_entity',
             'password' => 'required|confirmed|min:6',
         ]);
     }
     protected function create(array $data)
     {
          return User::create([
             'first_name' => $data['first_name'],
             'last_name' => $data['last_name'],
             'user_id' => $data['user_id'],
             'email' => $data['email'],
             'address' => $data['address'],
             'sub_district' => $data['sub_district'],
             'district' => $data['district'],
             'province' => $data['province'],
             'country' => $data['country'],
             'post_number' => $data['post_number'],
             'password' => bcrypt($data['password']),
         ]);


     }

}
