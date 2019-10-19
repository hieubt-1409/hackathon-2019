<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Session extends Model
{
    protected $table = 'sessions';
    protected $fillable = [
        'title',
        'content',
        'min_bid',
        'max_bid',
        'location',
        'method',
        'payment_methods',
        'time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bider()
    {
        return $this->belongsToMany(User::class, 'session_bids', 'session_id', 'user_id');
    }
}
