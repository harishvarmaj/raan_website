<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryImages extends Model {

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'path'
    ];

}
