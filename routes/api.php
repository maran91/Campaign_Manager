<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\PayoutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/campaigns', [CampaignController::class, 'index']);
Route::get('/campaigns/{id}', [CampaignController::class, 'show']);
Route::post('/campaigns', [CampaignController::class, 'store']);
Route::put('/campaigns/{id}', [CampaignController::class, 'update']);
Route::delete('/campaigns/{id}', [CampaignController::class, 'destroy']);

Route::get('/payouts', [PayoutController::class, 'index']);
Route::get('/payouts/{id}', [PayoutController::class, 'show']);
Route::post('/payouts', [PayoutController::class, 'store']);
Route::put('/payouts/{id}', [PayoutController::class, 'update']);
Route::delete('/payouts/{id}', [PayoutController::class, 'destroy']);
