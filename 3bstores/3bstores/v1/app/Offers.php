<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offers extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cms_id', 'code', 'discount', 'title', 'max_amount','min_cart_amount','role_id', 'description', 'expiry_date'
    ];
    
    public function cms() {
        return $this->belongsTo(CmsPage::class, 'cms_id');
    }
    
    public function role() {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
