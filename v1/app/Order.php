<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaction_id', 'payment_method_id', 'amount_paid', 'user_id', 'customer_address_id', 'total', 'sub_total', 'discount', 'offer_code', 'shipping_number',
        'shipping_tax', 'delivery_charge', 'shipping_charge', 'order_status', 'delivery_boy_id', 'cancelled_reason','cancelled_at'
    ];

    public function orderItems() {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
    
    public function address() {
        return $this->hasOne(OrderAddress::class, 'order_id');
    }
    
      public function user() {
        return $this->hasOne(User::class,'id', 'user_id');
    }
}
