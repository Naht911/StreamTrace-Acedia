<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StarRating extends Model
{
    use HasFactory;

    protected $table = 'rating';

    protected $fillable = ['id', 'rating', 'user_id', 'movie_id'];

    public function rating()
    {
        return $this->belongsTo(Movie::class, 'movie_id', 'id');
    }
}
