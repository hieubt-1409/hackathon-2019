<?php

namespace App\Http\Controllers\Student;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $currentSession = $user->currentSession->load(['biders', 'accepted.bid.user']);

        return view('student.home', compact('user', 'currentSession'));
    }
}
