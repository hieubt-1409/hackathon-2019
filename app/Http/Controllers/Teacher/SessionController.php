<?php

namespace App\Http\Controllers\Teacher;

use App\Events\SessionOffered;
use App\Http\Controllers\Controller;
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
}
