<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title',
        'poster',
        'trailer_url',
        'description',
        'release_date',
        'director',
        'genre',
        'rating'
    ];
}
