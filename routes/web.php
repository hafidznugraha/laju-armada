<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\BookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| User Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| Protected Routes (Login Required)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------
    | Profile
    |--------------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');


    /*
    |--------------------------------------------------
    | Admin Dashboard
    |--------------------------------------------------
    */
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');


    /*
    |--------------------------------------------------
    | CRUD Kendaraan
    |--------------------------------------------------
    */
    Route::get('/admin/kendaraan', [VehicleController::class, 'index'])
        ->name('admin.kendaraan');

    Route::post('/admin/kendaraan/store', [VehicleController::class, 'store'])
        ->name('admin.kendaraan.store');

    Route::put('/admin/kendaraan/update/{id}', [VehicleController::class, 'update'])
        ->name('admin.kendaraan.update');

    Route::get('/admin/kendaraan/delete/{id}', [VehicleController::class, 'destroy'])
        ->name('admin.kendaraan.delete');

    Route::get('/admin/booking', [BookingController::class, 'index'])
        ->name('admin.booking');

    Route::post('/admin/booking/store', [BookingController::class, 'store'])
        ->name('admin.booking.store');

    Route::get('/admin/booking/selesai/{id}', [BookingController::class, 'selesai'])
        ->name('admin.booking.selesai');
});


require __DIR__ . '/auth.php';
