<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Website\WebsiteController;

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ResortController;


Route::get('/', [WebsiteController::class, 'home'])->name('website.home');
Route::post('/book', [WebsiteController::class, 'booking_form'])->name('booking_form');


Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function (){
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard.index');


    Route::group(['prefix' => 'role'], function() {
        Route::get('/',[ RoleController::class, 'index' ])->name('role.index');
        Route::get('/create',[ RoleController::class, 'create' ])->name('role.create');
        Route::post('/',[ RoleController::class, 'store' ])->name('role.store');
        Route::get('/show/{slug}',[ RoleController::class, 'show' ])->name('role.show');
        Route::get('/edit/{slug}',[ RoleController::class, 'edit' ])->name('role.edit');
        Route::put('/update/{slug}',[ RoleController::class, 'update' ])->name('role.update');
        Route::get('/softdelete/{slug}',[ RoleController::class, 'softdelete' ])->name('role.softdelete');
        Route::get('/delete/{slug}',[ RoleController::class, 'destroy' ])->name('role.destroy');
    });

    Route::group(['prefix' => 'booking'], function() {
        Route::get('/',[ BookingController::class, 'index' ])->name('booking.index');
        Route::get('/show/{slug}',[ BookingController::class, 'show' ])->name('booking.show');
        Route::get('/softdelete/{slug}',[ BookingController::class, 'softdelete' ])->name('booking.softdelete');

    });

    Route::group(['prefix' => 'resort'], function() {
        Route::get('/',[ ResortController::class, 'index' ])->name('resort.index');
        Route::get('/create',[ ResortController::class, 'create' ])->name('resort.create');
        Route::post('/',[ ResortController::class, 'store' ])->name('resort.store');
        Route::get('/show/{slug}',[ ResortController::class, 'show' ])->name('resort.show');
        Route::get('/edit/{slug}',[ ResortController::class, 'edit' ])->name('resort.edit');
        Route::put('/update/{slug}',[ ResortController::class, 'update' ])->name('resort.update');
        Route::get('/softdelete/{slug}',[ ResortController::class, 'softdelete' ])->name('resort.softdelete');
        Route::get('/delete/{slug}',[ ResortController::class, 'destroy' ])->name('resort.destroy');
    });

});













// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
