<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'customer_entity';
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
        return $this->hasMany('App\Cart');
    }
}
