<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movie';


    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'movie_genre', 'movie_id', 'genre_id');
    }

    public function providers()
    {
        return $this->belongsToMany(StreamingServiceProvider::class, 'movie_provider', 'movie_id', 'streaming_service_provider_id')
            ->using(MovieProvider::class)
            ->withPivot('price', 'type_price_id', 'movie_resolution_id', 'url');
    }

    public function providers_distinct()
    {

        return $this->belongsToMany(StreamingServiceProvider::class, 'movie_provider', 'movie_id', 'streaming_service_provider_id')
            ->using(MovieProvider::class)
            ->distinct('streaming_service_provider_id');
    }
}
