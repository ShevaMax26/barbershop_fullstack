<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('rank-services', \App\Http\Controllers\API\Rank\RankServiceController::class);
Route::get('branches', \App\Http\Controllers\API\BranchController::class);
Route::get('/branches/{branch}/barbers', \App\Http\Controllers\API\BarberBranchController::class);


