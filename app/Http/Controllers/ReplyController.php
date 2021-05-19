<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Models\TweetReply;


class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

        $request->validate([
            'user_id' => 'required|integer',
            'tweet_text' => 'required|max:140',
            'tweet_id' => 'required'  
        ]);

        $replyTweet = Tweet::create([
            'user_id' => $request['user_id'],
            'tweet_text' => $reqe['tweet_text'];
        ]);
        $tweet = Tweet::find($request['tweet_id']);
        return TweetReply::create([
            'tweet_id' => $tweet['id'],
            'user_id' => $replyTweet['user_id'],
            'reply_tweet_id' => $replyTweet['id'],
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
