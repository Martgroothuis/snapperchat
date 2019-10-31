<?php

namespace App\Http\Controllers;

use App\Friend;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()) {
            $user_id = auth()->user()->id;
            $messages = Friend::where('friend_id', '=', $user_id)->latest()->get();

        }
        return view('friends.index', compact('messages'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function decline()
    {
        $friend_id = auth()->user()->id;
        $user_id = request('friend');

        Friend::where('friend_id', '=', $friend_id)->where('user_id', '=', $user_id)->delete();;
        return redirect('/messages');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public
    function store()
    {
        $user_id = auth()->user()->id;
        $friend_id = request('friend');


        $acceptedbd = Friend::where('friend_id', '=', $user_id)->value('accepted');

        if ($acceptedbd === 0) {

            Friend::where('friend_id', '=', $user_id)->update(['accepted' => 1]);
            $accepted = 1;

        } else {
            $accepted = 0;

        }
        Friend::create([
            'user_id' => $user_id,
            'friend_id' => $friend_id,
            'accepted' => $accepted,
        ]);

        return redirect('/messages');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Friend $friends
     * @return \Illuminate\Http\Response
     */
    public
    function show(Friend $friends)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Friend $friends
     * @return \Illuminate\Http\Response
     */
    public
    function edit(Friend $friends)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Friend $friends
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, Friend $friends)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Friend $friends
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(Friend $friends)
    {
        //
    }
}
