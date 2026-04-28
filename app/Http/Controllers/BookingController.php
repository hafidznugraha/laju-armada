<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Vehicle;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::with('vehicle');

        if ($request->search) {
            $query->where('nama_penyewa', 'like', '%' . $request->search . '%');
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $bookings = $query->latest()->paginate(5)->withQueryString();
        $vehicles = Vehicle::where('status', 'Tersedia')->get();

        return view('admin.booking.index', compact('bookings', 'vehicles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id'     => 'required',
            'nama_penyewa'   => 'required',
            'no_hp'          => 'required',
            'tgl_sewa'       => 'required|date',
            'tgl_kembali'    => 'required|date|after_or_equal:tgl_sewa',
        ]);

        $vehicle = Vehicle::findOrFail($request->vehicle_id);

        $tglSewa = Carbon::parse($request->tgl_sewa);
        $tglKembali = Carbon::parse($request->tgl_kembali);

        $jumlahHari = $tglSewa->diffInDays($tglKembali) + 1;

        $totalHarga = $vehicle->harga * $jumlahHari;

        Booking::create([
            'vehicle_id'    => $request->vehicle_id,
            'nama_penyewa'  => $request->nama_penyewa,
            'no_hp'         => $request->no_hp,
            'tgl_sewa'      => $request->tgl_sewa,
            'tgl_kembali'   => $request->tgl_kembali,
            'total_harga'   => $totalHarga,
            'status'        => 'Booking',
        ]);

        $vehicle->update([
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

        Vehicle::where('id', $booking->vehicle_id)->update([
            'status' => 'Tersedia'
        ]);

        return redirect()->route('admin.booking');
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'nama_penyewa' => $request->nama_penyewa,
            'no_hp' => $request->no_hp,
            'tgl_sewa' => $request->tgl_sewa,
            'tgl_kembali' => $request->tgl_kembali,
        ]);

        return redirect()->route('admin.booking');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);

        Vehicle::where('id', $booking->vehicle_id)
            ->update([
                'status' => 'Tersedia'
            ]);

        $booking->delete();

        return redirect()->route('admin.booking');
    }
}
