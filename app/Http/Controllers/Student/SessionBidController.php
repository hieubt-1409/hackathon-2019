<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Session;
use App\Models\SessionBid;
use Illuminate\Http\Request;

class SessionBidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Session $session)
    {
        return $session->bids;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SessionBid  $sessionBid
     * @return \Illuminate\Http\Response
     */
    public function show(SessionBid $sessionBid)
    {
        return $sessionBid;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SessionBid  $sessionBid
     * @return \Illuminate\Http\Response
     */
    public function edit(SessionBid $sessionBid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SessionBid  $sessionBid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SessionBid $sessionBid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SessionBid  $sessionBid
     * @return \Illuminate\Http\Response
     */
    public function destroy(SessionBid $sessionBid)
    {
        //
    }
}
