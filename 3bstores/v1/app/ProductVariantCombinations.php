<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariantCombinations extends Model {

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'product_variant_option_id', 'in_stock', 'quantity', 'price', 'mrp'
    ];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
    
     public function enabledProducts() {
        return $this->belongsTo(Product::class, 'product_id')->where('status','1');
    }
    
     public function productVariantOption() {
        return $this->belongsTo(ProductVariantOptions::class, 'product_variant_option_id');
    }
    
    public function wishlist() {
        return $this->hasMany(Wishlist::class, 'product_variant_combination_id');
    }
    
    public function userwishlist() {
        $userId = !empty(auth('api')->user()->id) ? auth('api')->user()->id : 0;
        return $this->wishlist()->where('user_id', $userId);
    }
}
