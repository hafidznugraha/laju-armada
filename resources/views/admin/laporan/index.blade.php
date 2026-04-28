@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h2 class="mb-4">Laporan</h2>

    <div class="row mb-4">

        <div class="col-md-4">
            <div class="card p-3">
                <h5>Total Kendaraan</h5>
                <h3>{{ $totalKendaraan }}</h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3">
                <h5>Booking Selesai</h5>
                <h3>{{ $bookingSelesai }}</h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3">
                <h5>Total Pendapatan</h5>
                <h3>Rp {{ number_format($pendapatan,0,',','.') }}</h3>
            </div>
        </div>

    </div>

    <table class="table table-bordered bg-white">
        <thead>
            <tr>
                <th>No</th>
                <th>Penyewa</th>
                <th>Kendaraan</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach($riwayat as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_penyewa }}</td>
                <td>{{ $item->vehicle->nama ?? '-' }}</td>
                <td>Rp {{ number_format($item->total_harga,0,',','.') }}</td>
                <td>{{ $item->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection