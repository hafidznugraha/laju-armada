<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\BookingController;
use App\Models\Vehicle;
use App\Models\Booking;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    $totalKendaraan = Vehicle::count();
    $totalBooking   = Booking::count();
    $totalUser      = User::count();

    return view('welcome', compact(
        'totalKendaraan',
        'totalBooking',
        'totalUser'
    ));
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

    Route::get('/admin/booking', [BookingController::class, 'index'])->name('admin.booking');

    Route::post('/admin/booking/store', [BookingController::class, 'store'])->name('admin.booking.store');

    Route::put('/admin/booking/update/{id}', [BookingController::class, 'update'])->name('admin.booking.update');

    Route::get('/admin/booking/selesai/{id}', [BookingController::class, 'selesai'])->name('admin.booking.selesai');

    Route::get('/admin/booking/delete/{id}', [BookingController::class, 'destroy'])->name('admin.booking.delete');

    Route::get('/admin/laporan', [AdminController::class, 'laporan'])->name('admin.laporan');

    Route::get('/admin/user', [AdminController::class, 'user'])->name('admin.user');
    Route::get('/admin/user/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.user.delete');
});


require __DIR__ . '/auth.php';
