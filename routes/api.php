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

Route::get('/bot/getupdates', function() {
    $updates = Telegram::getUpdates();
    return response()->json($updates);
});

Route::post('/42yUojv1YQPOssPEpn5i3q6vjdhh7hl7djVWDIAVhFDRMAwZ1tj0Og2v4PWyj4PZ/webhook', function () {
    $update = Telegram::commandsHandler(true);
});
