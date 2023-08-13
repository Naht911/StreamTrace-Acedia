<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $table = 'subscription';
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'subscription_date' => 'datetime',
        'expiration_date' => 'datetime',

    ];
    //một user có nhiều subscription
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    //mỗi subscription thuộc về 1 type_price
    public function typePrice()
    {
        return $this->belongsTo(TypePrice::class, 'type_price_id', 'id');
    }
    //mỗi subscription thuộc về 1 streaming_service_provider
    public function streamingServiceProvider()
    {
        return $this->belongsTo(StreamingServiceProvider::class, 'streaming_service_id', 'id');
    }

    //hàm lấy tất cả các subscription của 1 user.
    //sử dụng Eager Loading để lấy luôn tên của type_price và streaming_service_provider
    public function getAllSubscriptionOfUser($user_id)
    {
        return Subscription::where('user_id', $user_id)
            ->with('typePrice')
            ->with('streamingServiceProvider')
            ->get();
    }
}
