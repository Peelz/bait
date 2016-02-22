<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

    protected $table = 'sale_invoice_entity';

    protected $fillable = [
        'id,','cart_id','user_id','total','status',
    ];

    protected $hidden = [
      'password', 'remember_token',
    ];
  public function Cart(){
    return $this->hasOne('App\Cart','id','cart_id');
  }

  public function User(){
    return $this->hasOne('App\User','id','user_id');
  }
  static function getTotalSale()
  {
    $total = 0;
    $invoices = Invoice::all()->where("status", "confirm");
    foreach ($invoices as $invoice) {
      $total += $invoice->total ;
    }
    return $total ;
  }

  static function getCountInvoice(){
    $count = Invoice::count();
    return $count ;
  }
  static function getLast($count)
  {
    $Last = Invoice::orderBy('created_at','desc')->take($count)->get();
    return $Last ;
  }


}
