<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class MovieProvider extends Pivot
{
    use HasFactory;
    //chỉ định bảng movie_provider
    protected $table = 'movie_provider';

    public function resolution()
    {
        return $this->belongsTo(MovieResolution::class, 'movie_resolution_id');
    }
    // Định nghĩa quan hệ với type_price
    public function typePrice()
    {
        return $this->belongsTo(TypePrice::class, 'type_price_id');
    }
}
