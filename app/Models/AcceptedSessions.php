<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\User;

class AcceptedSessions extends Model
{
    protected $table = 'accepted_sessions';
    protected $fillable = [
        'session_id',
        'session_bid_id',
    ];

    public function user()
    {
        return $this->hasOneThrough(User::class, 'session_bids');
    }

    public function bid()
    {
        return $this->belongsTo(SessionBid::class, 'session_bid_id');
    }

    public function session()
    {
        return $this->belongsTo(Session::class, 'session_id');
    }
}
