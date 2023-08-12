<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $table = 'subscription';

    protected $fillable = ['id', 'user_id', 'streaming_service_id', 'custom_name', 'price', 'type_price_id', 'subscription_date', 'expiration_date', 'status', 'created_at', 'updated_at'];

    //mỗi phim có nhiều reaction
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}