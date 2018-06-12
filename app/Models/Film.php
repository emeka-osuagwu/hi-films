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
        'slug', 
        'video_url', 
        'description', 
        'realease_date',
        'rating',
        'ticket_price',
        'country',
        'genre',
        'photo',
    ];

    /*
    |--------------------------------------------------------------------------
    | encrypt password
    |--------------------------------------------------------------------------
    */
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] =  str_slug($value, '-');;
    }

    /*
    |--------------------------------------------------------------------------
    | Films Comments
    |--------------------------------------------------------------------------
    */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
