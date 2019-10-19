<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Carbon\Carbon;

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

    public function getStartTimeAttribute($value)
    {
        return Carbon::parse($value)->format('l jS M Y h:i A');
    }

    public function getEndTimeAttribute($value)
    {
        return Carbon::parse($value)->format('l jS M Y h:i A');
    }
}
