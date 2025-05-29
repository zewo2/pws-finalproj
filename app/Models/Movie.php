<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title', 'poster', 'trailer_url', 'description',
        'release_date', 'director', 'genre', 'rating'
    ];

    // Relationship with favorites
    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favs', 'movie_id', 'user_id')
            ->withTimestamps();
    }

    // Check if movie is favorited by current user
    public function isFavoritedBy($user)
    {
        return $this->favoritedBy()->where('user_id', $user->id)->exists();
    }
}
