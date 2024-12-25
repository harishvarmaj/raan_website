<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class CmsPage extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'slug', 'remarks','role_id','product_id'
    ];
    
    public function images() {
        return $this->hasMany(CmsImages::class, 'cms_id');
    }
    
    public function offers() {
        return $this->hasMany(Offers::class, 'cms_id');
    }
    
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
