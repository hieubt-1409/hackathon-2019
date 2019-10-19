<?php

namespace App\Http\Controllers\Teacher;

use App\Events\SessionOffered;
use App\Http\Controllers\Controller;
use App\Models\AcceptedSessions;
use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function offerLession(Request $request, Session $session) {
        $bid = $session->bids()->create([
            'user_id' => $request->user()->id,
            'amount' => $request->post('amount'),
        ]);

        SessionOffered::dispatch($bid);

        return $bid;
    }

    public function cancelOffer(Request $request, Session $session) {
        $session->bids()
            ->where('user_id', $request->user()->id)
            ->delete();
    }

    public function getAccepted(Request $request) {
        $user = $request->user();
        $bidIds = $user->sessionBided()->pluck('session_bids.id')->toArray();

        $accepted = AcceptedSessions::whereIn('session_bid_id', $bidIds)->first();
        if ($accepted) {
            $accepted->load('session', 'session.user', 'bid', 'bid.user');
        }

        return $accepted;
    }
}
