<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/gqIG3BvtBVZ0yHF2vxmnl3WKkZWqTP1d4ebDpQJCGcBVeDKNbKV9ypyOYqNXGh4z/webhook', function() {
    // $updates = Telegram::getUpdates();
    // return response()->json($updates);
});

