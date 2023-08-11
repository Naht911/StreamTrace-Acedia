<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StreamingServiceProvider extends Model
{
    use HasFactory;

    //chỉ định bảng streaming_service_provider
    protected $table = 'streaming_service_provider';

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_provider', 'streaming_service_provider_id', 'movie_id')->withPivot('movie_resolution_id', 'type_price_id', 'price');
    }


}
