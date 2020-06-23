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

// https://dna.saijaansmartdev.com/api/1245537120:AAGZ4ANo38czRn-K8OSUhY9bYBP15S8z18o/webhook


Route::post('/bot/getupdates', function() {
    $updates = Telegram::getUpdates();
    return (json_encode($updates));
});

Route::post('/bot', function() {
    $response = Telegram::getMe();
    return response()->json($response, 200);
});



