<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TweetsReply extends Model
{
    use HasFactory;
    protected $fillables = [
        'tweet_id',
        'user_id',
        'reply_tweet_id'
    ];
}
