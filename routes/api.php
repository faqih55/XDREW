<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AiChatController;

// AI Chat — public route (no auth required)
Route::post('/ai-chat', [AiChatController::class, 'chat'])
    ->middleware('throttle:30,1'); // max 30 req/menit

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
