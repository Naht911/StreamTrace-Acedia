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

    // public function providers()
    // {
    //     // Sử dụng phương thức belongsToMany và truyền vào tên model StreamingServiceProvider
    //     // và tên bảng trung gian movie_provider
    //     return $this->belongsToMany(StreamingServiceProvider::class, 'movie_provider')
    //         // Sử dụng phương thức withPivot để lấy các cột bổ sung trong bảng trung gian
    //         // Bạn có thể liệt kê tất cả các cột mà bạn muốn lấy hoặc chỉ lấy một số cột cần thiết
    //         ->withPivot('price', 'type_price_id', 'movie_resolution_id', 'url')
    //         //lấy typePrice từ model TypePrice
    //         // ->withPivotModel(MovieProvider::class) ->with('pivot.typePrice', 'pivot.movieResolution')
    //         // Nếu bạn muốn lấy cả các cột created_at và updated_at trong bảng trung gian
    //         // Bạn có thể sử dụng phương thức withTimestamps
    //         ->withTimestamps();
    // }
    public function providers()
    {
        return $this->belongsToMany(StreamingServiceProvider::class, 'movie_provider', 'movie_id', 'streaming_service_provider_id')->using(MovieProvider::class)
            // Chỉ định model MovieProvider
            ->withPivot('price', 'type_price_id', 'movie_resolution_id', 'url');
    }


}
