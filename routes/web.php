<?php

use App\Http\Controllers;
use App\Http\Controllers\Client;
use App\Http\Controllers\Barber;
use App\Http\Controllers\Branch;
use App\Http\Controllers\Rank;
use App\Http\Controllers\Role;
use App\Http\Controllers\Service;
use App\Http\Controllers\Order;
use App\Http\Controllers\ServiceDetail;
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
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
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
    Route::group(['prefix' => 'service-details'], function () {
        Route::get('/', ServiceDetail\IndexController::class)->name('service-detail.index');
        Route::get('/create/{rank}', ServiceDetail\CreateController::class)->name('service-detail.create');
        Route::post('/{rank}', ServiceDetail\StoreController::class)->name('service-detail.store');
        Route::get('/{serviceDetail}', ServiceDetail\ShowController::class)->name('service-detail.show');
        Route::get('/{serviceDetail}/edit', ServiceDetail\EditController::class)->name('service-detail.edit');
        Route::patch('/{serviceDetail}', ServiceDetail\UpdateController::class)->name('service-detail.update');
        Route::delete('/{serviceDetail}', ServiceDetail\DestroyController::class)->name('service-detail.destroy');
    });
    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', Order\IndexController::class)->name('order.index');
        Route::get('/create', Order\CreateController::class)->name('order.create');
        Route::post('/', Order\StoreController::class)->name('order.store');
//        Route::get('/{order}', Order\ShowController::class)->name('order.show');
        Route::get('/{order}/edit', Order\EditController::class)->name('order.edit');
        Route::patch('/{order}', Order\UpdateController::class)->name('order.update');
//        Route::delete('/{order}', Order\DestroyController::class)->name('order.destroy');
    });

    Route::group(['prefix' => 'roles', 'middleware' => 'role:super-admin'], function () {
        Route::get('/', Role\IndexController::class)->name('role.index');
        Route::get('/create', Role\CreateController::class)->name('role.create');
        Route::post('/', Role\StoreController::class)->name('role.store');
        Route::get('/{role}', Role\ShowController::class)->name('role.show');
        Route::get('/{role}/edit', Role\EditController::class)->name('role.edit');
        Route::patch('/{role}', Role\UpdateController::class)->name('role.update');
        Route::delete('/{role}', Role\DestroyController::class)->name('role.destroy');
    });
});

Auth::routes();

Route::get('/{any?}', Client\IndexController::class)->where('any', '.*');

