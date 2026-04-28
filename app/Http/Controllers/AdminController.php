<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\Booking;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalKendaraan = Vehicle::count();

        $totalBooking = Booking::where('status', 'Booking')->count();

        $totalUser = User::count();

        $pendapatan = Booking::sum('total_harga');

        return view('admin.dashboard', compact(
            'totalKendaraan',
            'totalBooking',
            'totalUser',
            'pendapatan'
        ));
    }
}