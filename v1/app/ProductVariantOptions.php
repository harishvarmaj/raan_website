<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVariantOptions extends Model
{
    protected $fillable = [
        'name', 'product_variant_id'
    ];
    
    public function productVariants($param) {
        return $this->belongsTo(ProductVariants::class, 'product_variant_id');
    }
    
     public function userwishlist() {
        $userId = !empty(auth('api')->user()->id) ? auth('api')->user()->id : 0;
        return $this->wishlist()->where('user_id', $userId);
    }
}
