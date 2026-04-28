<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Vehicle;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('vehicle')->latest()->get();
        $vehicles = Vehicle::where('status', 'Tersedia')->get();

        return view('admin.booking.index', compact('bookings', 'vehicles'));
    }

    public function store(Request $request)
    {
        Booking::create([
            'vehicle_id'    => $request->vehicle_id,
            'nama_penyewa'  => $request->nama_penyewa,
            'no_hp'         => $request->no_hp,
            'tgl_sewa'      => $request->tgl_sewa,
            'tgl_kembali'   => $request->tgl_kembali,
            'total_harga'   => $request->total_harga,
            'status'        => 'Booking',
        ]);

        Vehicle::where('id', $request->vehicle_id)
            ->update([
                'status' => 'Disewa'
            ]);

        return redirect()->route('admin.booking');
    }

    public function selesai($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'status' => 'Selesai'
        ]);

        Vehicle::where('id', $booking->vehicle_id)
            ->update([
                'status' => 'Tersedia'
            ]);

        return redirect()->route('admin.booking');
    }
}
