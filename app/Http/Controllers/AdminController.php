<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Vehicle;
use App\Models\User;


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

    public function laporan()
    {
        $totalKendaraan = Vehicle::count();

        $bookingSelesai = Booking::where('status', 'Selesai')->count();

        $pendapatan = Booking::where('status', 'Selesai')->sum('total_harga');

        $riwayat = Booking::with('vehicle')
            ->where('status', 'Selesai')
            ->latest()
            ->get();

        return view('admin.laporan.index', compact(
            'totalKendaraan',
            'bookingSelesai',
            'pendapatan',
            'riwayat'
        ));
    }

    public function user()
    {
        $users = User::latest()->get();

        return view('admin.user.index', compact('users'));
    }

    public function deleteUser($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('admin.user');
    }
}
