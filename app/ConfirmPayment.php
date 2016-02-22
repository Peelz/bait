<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfirmPayment extends Model
{

      protected $table = 'form_confirm_payment';

      protected $fillable = [
          'id,','user_id' ,'invoice_id','path','status'
      ];
      public function Invoice()
      {
        return $this->hasOne('App\Invoice','id','invoice_id');
      }
      public function User()
      {
        return $this->hasOne('App\User','id','user_id');
      }

}
