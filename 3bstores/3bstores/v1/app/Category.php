<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Authenticatable {

    use SoftDeletes;

    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id', 'slug', 'description'
    ];

    public function images() {
        return $this->hasMany(CategoryImages::class, 'category_id');
    }
    
    public function products() {
        return $this->hasMany(Product::class, 'category_id')->where('status','1');
    }

}
