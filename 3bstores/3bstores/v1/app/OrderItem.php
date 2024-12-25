<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_variant_combination_id', 'order_id', 'name', 'price', 'mrp', 'quantity', 'gst', 'sub_total'
    ];
    
    public function productCombinations() {
        return $this->belongsTo(ProductVariantCombinations::class, 'product_variant_combination_id');
    }
}
