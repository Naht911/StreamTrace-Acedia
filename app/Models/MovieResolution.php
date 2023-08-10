<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieResolution extends Model
{
    use HasFactory;
    //chỉ định bảng movie_resolution
    protected $table = 'movie_resolution';

    // Khai báo quan hệ với model MovieProvider
    public function movieProviders()
    {
        // Sử dụng phương thức hasMany và truyền vào tên model MovieProvider
        // và tên cột khóa ngoại trong bảng movie_provider
        return $this->hasMany(MovieProvider::class, 'movie_resolution_id');
    }

    // Khai báo quan hệ với model Movie
    public function movies()
    {
        // Sử dụng phương thức belongsToMany và truyền vào tên model Movie
        // và tên bảng trung gian movie_provider
        return $this->belongsToMany(Movie::class, 'movie_provider')
            // Sử dụng phương thức withPivot để lấy các cột bổ sung trong bảng trung gian
            ->withPivot('provider_id', 'price', 'type_price_id', 'url')
            // Sử dụng phương thức withTimestamps nếu bạn muốn lấy cả các cột created_at và updated_at trong bảng trung gian
            ->withTimestamps();
    }
}
