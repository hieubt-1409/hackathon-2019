<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SessionBid extends Model
{
    protected $table = 'session_bids';
    protected $fillable = [
        'session_id',
        'user_id',
        'amount',
    ];

    public function sessionBidMessages()
    {
        return $this->hasMany(SessionMessage::class);
    }

    public function session()
    {
        return $this->belongsTo(Session::class, 'session_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
