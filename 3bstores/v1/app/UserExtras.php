<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserExtras extends Model
{    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'device_token', 'otp', 'otp_expires_at'
    ];
    
    public function users() {
    	return $this->belongsTo(User::class, 'user_id');
    }
}
