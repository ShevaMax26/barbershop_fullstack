<?php

use App\Http\Controllers;
use App\Http\Controllers\Client;
use App\Http\Controllers\Branch;
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

    Route::group(['prefix' => 'branches'], function () {
        Route::get('/', Branch\IndexController::class)->name('branch.index');
        Route::get('/create', Branch\CreateController::class)->name('branch.create');
        Route::post('/', Branch\StoreController::class)->name('branch.store');
        Route::get('/{branch}', Branch\ShowController::class)->name('branch.show');
        Route::get('/{branch}/edit', Branch\EditController::class)->name('branch.edit');
        Route::patch('/{branch}', Branch\UpdateController::class)->name('branch.update');
        Route::delete('/{branch}', Branch\DestroyController::class)->name('branch.destroy');
    });
});



Auth::routes();

Route::get('/{any?}', Controllers\Client\IndexController::class)->where('any', '.*');
