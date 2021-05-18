<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\FollowsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::resource('tweets',TweetController::class);
Route::resource('follows', FollowsController::class);


Route::get('/list/{page}/{limit}', [TweetController::class, 'list']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
