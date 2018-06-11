<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'description', 
        'realease_date',
        'rating',
        'ticket_price',
        'country',
        'genre',
        'photo',
    ];
}
