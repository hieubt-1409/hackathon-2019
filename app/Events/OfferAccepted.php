<?php

namespace App\Events;

use App\Models\SessionBid;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OfferAccepted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var SessionBid
     */
    protected $sessionBid;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(SessionBid $sessionBid)
    {
        $this->sessionBid = $sessionBid;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

    public function broadcastWith()
    {
        return [
            'session_bid_id' => $this->sessionBid->id,
        ];
    }
}
