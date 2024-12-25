<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderPayments extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */w
    protected $fillable = [
        'order_id', 'payment_method_id', 'amount_paid', 'transaction_id', 'razorpay_payment_id', 'razorpay_signature', 'payment_status'
    ];

    public function orderItems() {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function order() {
        return $this->hasOne(Order::class, 'payment_method_id');
    }
    public function order() {
        return $this->hasOne(Order::class, 'transaction_id');
    }
    public function order() {
        return $this->hasOne(Order::class, 'amount_paid');
    }


}
