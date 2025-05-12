<?php

use App\Http\Controllers\CampaignController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/campaigns', [CampaignController::class, 'index']);
Route::post('/campaigns', [CampaignController::class, 'store']);
