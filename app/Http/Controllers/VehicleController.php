<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::latest()->get();

        return view('admin.kendaraan.index', compact('vehicles'));
    }

    public function publicIndex()
    {
        $vehicles = Vehicle::latest()->get();

        return view('kendaraan-public', compact('vehicles'));
    }

    public function store(Request $request)
    {
        $namaFoto = '';

        if ($request->hasFile('foto')) {
            $namaFoto = $request->file('foto')->store('kendaraan', 'public');
        }

        Vehicle::create([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'merk' => $request->merk,
            'harga' => $request->harga,
            'status' => $request->status,
            'foto' => $namaFoto,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.kendaraan');
    }

    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);

        $namaFoto = $vehicle->foto;

        if ($request->hasFile('foto')) {
            $namaFoto = $request->file('foto')->store('kendaraan', 'public');
        }

        $vehicle->update([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'merk' => $request->merk,
            'harga' => $request->harga,
            'status' => $request->status,
            'foto' => $namaFoto,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.kendaraan');
    }

    public function destroy($id)
    {
        Vehicle::findOrFail($id)->delete();

        return redirect()->route('admin.kendaraan');
    }
}
