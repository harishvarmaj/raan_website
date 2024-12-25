<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'profile_image', 'role_id', 'forgot_password_token','api_token','phone_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function loginUser() {
        $field = (filter_var(request('login'), FILTER_VALIDATE_EMAIL)) ? 'email' : 'phone';
        $getUser = $this->with('extras','deliveryboy')->where($field, '=', request('login'))->get()->first();
        $extras = $getUser->extras()->updateOrCreate(['user_id' => $getUser['id']]);
        
        if(request('device_token')) {
            $getUser->api_token = Str::uuid();            
            $getUser->extras->device_token = request('device_token');
            $getUser->save();
        }     
        return $getUser;
    }
    
    public function extras() {
        return $this->hasOne(UserExtras::class, 'user_id');
    }
    
    public function deliveryboys() {
        return $this->hasMany(DeliveryBoy::class, 'user_id');
    }
    
    public function deliveryboy() {
        return $this->hasOne(DeliveryBoy::class, 'user_id');
    }
    
    public function addresses() {
        return $this->hasMany(Address::class, 'user_id');
    }
    
    public function role() {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
