<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\FilmGenre;
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
        'photo',
    ];

    /*
    |--------------------------------------------------------------------------
    | setSlugAttribute
    |--------------------------------------------------------------------------
    */
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] =  str_slug($value, '-');
    }

    /*
    |--------------------------------------------------------------------------
    | convert created_at
    |--------------------------------------------------------------------------
    */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    /*
    |--------------------------------------------------------------------------
    | convert realease_date
    |--------------------------------------------------------------------------
    */
    public function getRealeaseDateAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
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

    /*
    |--------------------------------------------------------------------------
    | Films Genre
    |--------------------------------------------------------------------------
    */
    public function genres_list()
    {
        return $this->hasMany('App\Models\FilmGenre', 'film_id')->with('genre');
    }
}
