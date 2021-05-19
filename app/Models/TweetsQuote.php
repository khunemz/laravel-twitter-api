<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TweetsQuote extends Model
{
    use HasFactory;
    protected $fillables = [
        'tweet_id',
        'user_id',
        'quote_tweet_id',
    ];
}
