<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

    protected $table = 'reaction';

    protected $fillable = ['id', 'is_tracked', 'is_thumbs_down', 'is_thumbs_down', 'user_id'];



    public function movie()
    {
        return $this->hasOne(Movie::class, 'movie_reaction', 'movie_id', 'reaction_id');
    }
}
