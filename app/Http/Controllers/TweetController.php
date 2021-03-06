<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Models\TweetsLikes;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Tweet::all();
    }

    public function list(Request $request, $page , $limit) {
        $data = Tweet::orderBy('created_at','desc')
                ->skip( ($page - 1) * $limit )
                ->take($limit)
                ->get();
        return $data;
    }

    public function like(Request $request) {
        $request->validate([
            'tweet_id' => 'required|integer', 
            'user_id' => 'required|integer',
        ]);

        $tweet_id = $request['tweet_id'];
        $user_id = $request['user_id'];
        
        $tweet = Tweet::where('id', $tweet_id)->first();
        $like_count = $tweet['like_count'];
        $like_count++;

        Tweet::where('id', $tweet_id)->update(
            ['like_count' => $like_count]
        );

        return TweetsLikes::create([
           'user_id' => $user_id,
           'tweet_id' => $tweet_id, 
        ]);
        
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
            'retweet_count' => 'required|integer',
            'like_count' => 'required|integer',
            'quote_count' => 'required|integer',
        ]);
        return Tweet::create($request->all());
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
        $data = Tweet::where('id', $id)->get();
                
        return $data;
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
        $request->validate([
            'user_id' => 'required|integer',
            'tweet_text' => 'required|max:140',
            'retweet_count' => 'required|integer',
            'like_count' => 'required|integer',
            'quote_count' => 'required|integer',        
        ]);
        $tweet = Tweet::find($id);
        $tweet->update($request->all());
        return $tweet;
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
        return Tweet::destroy($id);
    }
}
