<?php

use App\Http\Controllers\API\Cabinet;
use App\Http\Controllers\User;
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

Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('login',  [App\Http\Controllers\AuthController::class, 'login']);
    Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('refresh', [App\Http\Controllers\AuthController::class, 'refresh']);
    Route::post('me', [App\Http\Controllers\AuthController::class, 'me']);

});

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::group(['prefix' => 'cabinet'], function () {
        Route::get('/', Cabinet\CabinetController::class);
    });
});

Route::group(['prefix' => 'users'], function () {
    Route::post('/', User\StoreController::class);
});

Route::post('/orders', \App\Http\Controllers\API\Order\StoreController::class);
Route::get('rank-services', \App\Http\Controllers\API\RankService\RankServiceController::class);
Route::get('branches', \App\Http\Controllers\API\BranchController::class);
Route::get('/branches/{branch}/barbers', \App\Http\Controllers\API\BarberBranchController::class);
Route::get('/barbers/{barber}/services', [\App\Http\Controllers\API\Barber\BarberController::class, 'getServices']);
Route::get('/barbers/{barber}/available-hours', [\App\Http\Controllers\API\Barber\BarberController::class, 'getAvailableHours']);
Route::get('/barbers/{barber}/available-date', [\App\Http\Controllers\API\Barber\BarberController::class, 'getAvailableDate']);

