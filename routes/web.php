<?php

use App\Http\Controllers;
use App\Http\Controllers\Client;
use App\Http\Controllers\Employee;
use App\Http\Controllers\Branch;
use App\Http\Controllers\Rank;
use App\Http\Controllers\Role;
use App\Http\Controllers\Service;
use App\Http\Controllers\Order;
use App\Http\Controllers\User;
use App\Http\Controllers\Permission;
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

    Route::group(['prefix' => 'employees'], function () {
        Route::group(['prefix' => 'roles'], function () {
            Route::get('/', Role\IndexController::class)->name('employee.role.index')->middleware('permission:show roles');
            Route::get('/create', Role\CreateController::class)->name('employee.role.create')->middleware('permission:create roles');
            Route::post('/', Role\StoreController::class)->name('employee.role.store')->middleware('permission:create roles');
            Route::get('/{role}', Role\ShowController::class)->name('employee.role.show')->middleware('permission:show roles');
            Route::get('/{role}/edit', Role\EditController::class)->name('employee.role.edit')->middleware('permission:edit roles');
            Route::patch('/{role}', Role\UpdateController::class)->name('employee.role.update')->middleware('permission:edit roles');
            Route::delete('/{role}', Role\DestroyController::class)->name('employee.role.destroy')->middleware('permission:delete roles');
        });

        Route::get('/', Employee\IndexController::class)->name('employee.index')->middleware('permission:show employees');
        Route::get('/create', Employee\CreateController::class)->name('employee.create')->middleware('permission:create employees');
        Route::post('/', Employee\StoreController::class)->name('employee.store')->middleware('permission:create employees');
        Route::get('/{employee}', Employee\ShowController::class)->name('employee.show')->middleware('permission:show employees');
        Route::get('/{employee}/edit', Employee\EditController::class)->name('employee.edit')->middleware('permission:edit employees');
        Route::patch('/{employee}', Employee\UpdateController::class)->name('employee.update')->middleware('permission:edit employees');
        Route::delete('/{employee}', Employee\DestroyController::class)->name('employee.destroy')->middleware('permission:delete employees');
    });

    Route::group(['prefix' => 'branches'], function () {
        Route::get('/', Branch\IndexController::class)->name('branch.index')->middleware('permission:show branches');
        Route::get('/create', Branch\CreateController::class)->name('branch.create')->middleware('permission:create branches');
        Route::post('/', Branch\StoreController::class)->name('branch.store')->middleware('permission:create branches');
        Route::get('/{branch}', Branch\ShowController::class)->name('branch.show')->middleware('permission:show branches');
        Route::get('/{branch}/edit', Branch\EditController::class)->name('branch.edit')->middleware('permission:edit branches');
        Route::patch('/{branch}', Branch\UpdateController::class)->name('branch.update')->middleware('permission:edit branches');
        Route::delete('/{branch}', Branch\DestroyController::class)->name('branch.destroy')->middleware('permission:delete branches');
    });

    Route::group(['prefix' => 'ranks'], function () {
        Route::get('/', Rank\IndexController::class)->name('rank.index')->middleware('permission:show ranks');
        Route::get('/create', Rank\CreateController::class)->name('rank.create')->middleware('permission:create ranks');
        Route::post('/', Rank\StoreController::class)->name('rank.store')->middleware('permission:create ranks');
        Route::get('/{rank}', Rank\ShowController::class)->name('rank.show')->middleware('permission:show ranks');
        Route::get('/{rank}/edit', Rank\EditController::class)->name('rank.edit')->middleware('permission:edit ranks');
        Route::patch('/{rank}', Rank\UpdateController::class)->name('rank.update')->middleware('permission:edit ranks');
        Route::delete('/{rank}', Rank\DestroyController::class)->name('rank.destroy')->middleware('permission:delete ranks');
    });

    Route::group(['prefix' => 'services'], function () {
        Route::get('/', Service\IndexController::class)->name('service.index')->middleware('permission:show services');
        Route::get('/create', Service\CreateController::class)->name('service.create')->middleware('permission:create services');
        Route::post('/', Service\StoreController::class)->name('service.store')->middleware('permission:create services');
        Route::get('/{service}', Service\ShowController::class)->name('service.show')->middleware('permission:show services');
        Route::get('/{service}/edit', Service\EditController::class)->name('service.edit')->middleware('permission:edit services');
        Route::patch('/{service}', Service\UpdateController::class)->name('service.update')->middleware('permission:edit services');
        Route::delete('/{service}', Service\DestroyController::class)->name('service.destroy')->middleware('permission:delete services');
    });
    Route::group(['prefix' => 'service-details'], function () {
        Route::get('/', ServiceDetail\IndexController::class)->name('service-detail.index')->middleware('permission:show service details');
        Route::get('/create/{rank}', ServiceDetail\CreateController::class)->name('service-detail.create')->middleware('permission:create service details');
        Route::post('/{rank}', ServiceDetail\StoreController::class)->name('service-detail.store')->middleware('permission:create service details');
        Route::get('/{serviceDetail}', ServiceDetail\ShowController::class)->name('service-detail.show')->middleware('permission:show service details');
        Route::get('/{serviceDetail}/edit', ServiceDetail\EditController::class)->name('service-detail.edit')->middleware('permission:edit service details');
        Route::patch('/{serviceDetail}', ServiceDetail\UpdateController::class)->name('service-detail.update')->middleware('permission:edit service details');
        Route::delete('/{serviceDetail}', ServiceDetail\DestroyController::class)->name('service-detail.destroy')->middleware('permission:delete service details');
    });
    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', Order\IndexController::class)->name('order.index')->middleware('permission:show orders');
        Route::get('/create', Order\CreateController::class)->name('order.create')->middleware('permission:create orders');
        Route::post('/', Order\StoreController::class)->name('order.store')->middleware('permission:create orders');
//        Route::get('/{order}', Order\ShowController::class)->name('order.show')->middleware('permission:show orders');
        Route::get('/{order}/edit', Order\EditController::class)->name('order.edit')->middleware('permission:edit orders');
        Route::patch('/{order}', Order\UpdateController::class)->name('order.update')->middleware('permission:edit orders');
//        Route::delete('/{order}', Order\DestroyController::class)->name('order.destroy')->middleware('permission:delete orders');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', User\IndexController::class)->name('user.index')->middleware('permission:show users');
        Route::get('/{user}', User\ShowController::class)->name('user.show')->middleware('permission:show users');
        Route::get('/{user}/edit', User\EditController::class)->name('user.edit')->middleware('permission:edit users');
        Route::patch('/{user}', User\UpdateController::class)->name('user.update')->middleware('permission:edit users');
        Route::delete('/{user}', User\DestroyController::class)->name('user.destroy')->middleware('permission:delete users');
    });

    Route::get('/get-permissions', [Permission\PermissionController::class, 'getPermissions'])->name('get-permissions');
});

Auth::routes();

Route::get('/{any?}', Client\IndexController::class)->where('any', '.*');

