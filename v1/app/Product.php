<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'number', 'category_id', 'hsn_number', 'brand', 'description', 'status'
    ];

    public function variantCombinations() {
        return $this->hasMany(ProductVariantCombinations::class, 'product_id');
    }
    
    public function images() {
        return $this->hasMany(ProductImages::class, 'product_id');
    }
}
