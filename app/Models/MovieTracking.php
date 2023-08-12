<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieTracking extends Model
{
    use HasFactory;

    protected $table = 'movie_tracking_out';
}
