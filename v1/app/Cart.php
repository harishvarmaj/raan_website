<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_variant_combination_id', 'user_id', 'quantity','guest_cart_id'
    ];
    
    public function productCombinations() {
        return $this->belongsTo(ProductVariantCombinations::class, 'product_variant_combination_id');
    }
    
    public function user() {
        return $this->belongsTo(User::class, 'product_variant_combination_id');
    }
}
