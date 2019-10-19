<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SessionBid;
use App\Models\SessionMessage;
use App\Models\User;
use Auth;

class ChatController extends Controller
{
    public function index(SessionBid $sessionBid)
    {
        $session = $sessionBid->session;
        $messages = $sessionBid->sessionBidMessages()->with('user')->get();
        $currentUser = Auth::user();

        return view('session.chat', compact('session', 'messages','currentUser'));
    }
}
