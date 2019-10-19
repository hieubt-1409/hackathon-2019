<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\AcceptedSessions;
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
        'start_time',
        'end_time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bids()
    {
        return $this->hasMany(SessionBid::class, 'session_id');
    }

    public function biders()
    {
        return $this->belongsToMany(User::class, 'session_bids', 'session_id', 'user_id')
            ->withPivot(['amount', 'id']);
    }

    public function accepted()
    {
        return $this->hasOne(AcceptedSessions::class, 'session_id');
    }

    public function getStartTimeAttribute($value)
    {
        return Carbon::parse($value)->format('l jS M Y h:i A');
    }

    public function getEndTimeAttribute($value)
    {
        return Carbon::parse($value)->format('l jS M Y h:i A');
    }

    public function sessionBids()
    {
        return $this->hasMany(SessionBid::class);
    }
}
