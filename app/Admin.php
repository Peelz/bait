<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admin_entity';

    protected $fillable = [
        'id',
        'user_id',
        'first_name',
        'last_name',
        'email',
        'password',

    ];
    protected $hidden = [
      'password', 'remember_token',
    ];

}
