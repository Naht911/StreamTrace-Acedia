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
            ->withPivot('id', 'price', 'type_price_id', 'movie_resolution_id', 'url');
    }

    public function providers_distinct()
    {

        return $this->belongsToMany(StreamingServiceProvider::class, 'movie_provider', 'movie_id', 'streaming_service_provider_id')
            ->using(MovieProvider::class)
            ->distinct('streaming_service_provider_id');
    }

    public function popular($num = 10){
        //lấy những movie có movie.count_view cao nhất
        return $this->orderBy('count_view', 'desc')->take($num)->get();
    }

    //10 phim mới nhất
    public function new_movies($num){
        return $this->orderBy('created_at', 'desc')->take($num)->get();
    }
    //10 phim có lượt thumbs up cao nhất. lấy ra những movie có reaction.is_thumbs_up = 1
    public function top_thumbs_up(){
        return $this->belongsToMany(Reaction::class, 'reaction', 'movie_id', 'user_id')
            ->using(MovieProvider::class)
            ->where('is_thumbs_up', 1)
            ->orderBy('count', 'desc')
            ->take(10)
            ->get();
    }


}
