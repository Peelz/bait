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
        'id',
        'user_id',
        'role',
        'first_name',
        'last_name',
        'email',
        'password',
        'address',
        'sub_district',
        'district',
        'province',
        'country',
        'post_number',
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
        return $this->hasMany('App\Cart','user_id','id');
    }
    public function Invoice(){
        return $this->hasMany('App\Invoice','user_id','id');
    }
    public function Role()
    {
        return $this->hasOne('App\UserRole','user_id','id');
    }
    public function isAdmin()
    {
        return $this->hasOne('App\UserRole')->role ;
    }

    static function getCountUser()
    {
      return User::count();
    }

    static function getLast($count)
    {
      $Last = User::orderBy('created_at','desc')->take($count)->get();
      return $Last ;
    }
}
