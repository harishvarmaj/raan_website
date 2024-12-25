<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referal extends Model
{    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'discount', 'max_amount', 'min_cart_amount','user_id_from','user_id_to','title','description','enable'
    ];
    
  
 
}