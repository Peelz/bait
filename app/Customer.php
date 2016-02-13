<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

  protected $table = 'user_customer';
  //protected $primaryKey = 'user_id';
  protected $fillable = [
      'id,','user_id','first_name', 'last_name', 'email','password'
  ];


  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  public function Cart()
  {
      return $this->hasOne('App\Cart');
  }
}
