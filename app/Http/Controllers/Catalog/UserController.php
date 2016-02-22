<?php

namespace App\Http\Controllers\Catalog;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth ;
use App\User ;
class UserController extends Controller
{
  public function __construct()
  {
     $this->middleware('auth');
     $this->middleware('web');
  }
  public function show($id)
  {
    if(Auth::user()->id != $id ){
      return redirect('/');
    }else {
      return view('catalog.user.show')
      ->with('user', User::find($id) ) ;
    }
  }
  public function update(Request $req,$id){

    $user = User::find($id);

    $user->first_name = $req->first_name ;
    $user->last_name = $req->last_name ;
    $user->email = $req->email ;
    $user->address = $req->address;
    $user->sub_district = $req->sub_district;
    $user->district = $req->district;
    $user->province = $req->province;
    $user->country = $req->country;
    $user->post_number = $req->post_number;
    $user->save();
    if( !is_null($req->password)){
      if($req->password == $req->confirm_password){
        $user->password= bcrypt($req->password);
      }
    }
    return redirect('profile/'.$id);

  }
}
