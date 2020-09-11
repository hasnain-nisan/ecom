<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Payment;
use App\Cart;
use App\User;

class Order extends Model
{
    public $fillable = [
      'user_id',
      'ip_address',
      'payment_id',
      'name',
      'phone_numb',
      'shipping_address',
      'email',
      'message',
      'transaction_id',
      'is_paid',
      'is_completed',
      'is_seen_by_admin'
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function carts()
    {
      return $this->hasMany(Cart::class);
    }

    public function payment()
    {
      return $this->belongsTo(Payment::class);
    }
}
