<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class faq extends Model
{
    use HasFactory;
    protected $table = 'faq';
    protected $fillable = [
        'id',
        'question',
        'answer',
        'created_at',
        'updated_at'

    ];
}
