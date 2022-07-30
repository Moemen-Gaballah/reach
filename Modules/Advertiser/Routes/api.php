<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/advertiser', function (Request $request) {
    return $request->user();
});

Route::apiResource('categories', Api\CategoryController::class);

Route::apiResource('tags', Api\TagController::class);

Route::apiResource('ads', Api\AdController::class)->only('index', 'store');
Route::get('ads-by-advertiser/{id}', [\Modules\Advertiser\Http\Controllers\Api\AdController::class, 'getAdsByAdvertiserId']);

