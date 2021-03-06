<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilmGenre extends Model
{
    protected $table = "film_genres";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'film_id',
        'genre_id',
    ];


    /*
    |--------------------------------------------------------------------------
    | Films Comments
    |--------------------------------------------------------------------------
    */
    public function genre()
    {
        return $this->hasMany('App\Models\Genre', 'id');
    }

}
