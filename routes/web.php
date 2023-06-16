<?php

use App\Http\Controllers;
use App\Http\Controllers\Client;
use App\Http\Controllers\Barber;
use App\Http\Controllers\Branch;
use App\Http\Controllers\Rank;
use App\Http\Controllers\Service;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', Controllers\Main\IndexController::class)->name('main.index');

    Route::group(['prefix' => 'barbers'], function () {
        Route::get('/', Barber\IndexController::class)->name('barber.index');
        Route::get('/create', Barber\CreateController::class)->name('barber.create');
        Route::post('/', Barber\StoreController::class)->name('barber.store');
        Route::get('/{barber}', Barber\ShowController::class)->name('barber.show');
        Route::get('/{barber}/edit', Barber\EditController::class)->name('barber.edit');
        Route::patch('/{barber}', Barber\UpdateController::class)->name('barber.update');
        Route::delete('/{barber}', Barber\DestroyController::class)->name('barber.destroy');
    });

    Route::group(['prefix' => 'branches'], function () {
        Route::get('/', Branch\IndexController::class)->name('branch.index');
        Route::get('/create', Branch\CreateController::class)->name('branch.create');
        Route::post('/', Branch\StoreController::class)->name('branch.store');
        Route::get('/{branch}', Branch\ShowController::class)->name('branch.show');
        Route::get('/{branch}/edit', Branch\EditController::class)->name('branch.edit');
        Route::patch('/{branch}', Branch\UpdateController::class)->name('branch.update');
        Route::delete('/{branch}', Branch\DestroyController::class)->name('branch.destroy');
    });

    Route::group(['prefix' => 'ranks'], function () {
        Route::get('/', Rank\IndexController::class)->name('rank.index');
        Route::get('/create', Rank\CreateController::class)->name('rank.create');
        Route::post('/', Rank\StoreController::class)->name('rank.store');
        Route::get('/{rank}', Rank\ShowController::class)->name('rank.show');
        Route::get('/{rank}/edit', Rank\EditController::class)->name('rank.edit');
        Route::patch('/{rank}', Rank\UpdateController::class)->name('rank.update');
        Route::delete('/{rank}', Rank\DestroyController::class)->name('rank.destroy');
    });

    Route::group(['prefix' => 'services'], function () {
        Route::get('/', Service\IndexController::class)->name('service.index');
        Route::get('/create', Service\CreateController::class)->name('service.create');
        Route::post('/', Service\StoreController::class)->name('service.store');
        Route::get('/{service}', Service\ShowController::class)->name('service.show');
        Route::get('/{service}/edit', Service\EditController::class)->name('service.edit');
        Route::patch('/{service}', Service\UpdateController::class)->name('service.update');
        Route::delete('/{service}', Service\DestroyController::class)->name('service.destroy');
    });
});



Auth::routes();

Route::get('/{any?}', Client\IndexController::class)->where('any', '.*');
