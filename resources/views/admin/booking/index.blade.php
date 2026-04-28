@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Data Booking</h2>

        <form method="GET" action="{{ route('admin.booking') }}" class="row mb-3">

            <div class="col-md-4">
                <input type="text"
                    name="search"
                    class="form-control"
                    placeholder="Cari nama penyewa..."
                    value="{{ request('search') }}">
            </div>

            <div class="col-md-3">
                <select name="status" class="form-control">
                    <option value="">Semua Status</option>
                    <option value="Booking" {{ request('status') == 'Booking' ? 'selected' : '' }}>
                        Booking
                    </option>
                    <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>
                        Selesai
                    </option>
                </select>
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary w-100">Cari</button>
            </div>

            <div class="col-md-2">
                <a href="{{ route('admin.booking') }}" class="btn btn-secondary w-100">
                    Reset
                </a>
            </div>

        </form>

        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalBooking">
            + Tambah Booking
        </button>
    </div>

    <table class="table table-bordered bg-white">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Penyewa</th>
                <th>Kendaraan</th>
                <th>Tgl Sewa</th>
                <th>Tgl Kembali</th>
                <th>Total</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($bookings as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_penyewa }}</td>
                <td>{{ $item->vehicle->nama ?? '-' }}</td>
                <td>{{ $item->tgl_sewa }}</td>
                <td>{{ $item->tgl_kembali }}</td>
                <td>Rp {{ number_format($item->total_harga,0,',','.') }}</td>
                <td>{{ $item->status }}</td>
                <td>
                    @if($item->status == 'Booking')
                    <a href="{{ route('admin.booking.selesai', $item->id) }}"
                        class="btn btn-success btn-sm">
                        Selesai
                    </a>

                    <a href="{{ route('admin.booking.delete', $item->id) }}"
                        class="btn btn-danger btn-sm">
                        Batalkan
                    </a>
                    @else
                    <span class="badge bg-secondary">Done</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">
                    Belum ada booking
                </td>
            </tr>
            @endforelse
        </tbody>

    </table>

    <div class="mt-3">
        {{ $bookings->links() }}
    </div>

</div>

<div class="modal fade" id="modalBooking" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="{{ route('admin.booking.store') }}" method="POST">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Booking</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label>Kendaraan</label>
                        <select name="vehicle_id" class="form-control" required>
                            <option value="">-- Pilih Kendaraan --</option>

                            @foreach($vehicles as $v)
                            <option value="{{ $v->id }}">
                                {{ $v->nama }} - {{ $v->merk }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Nama Penyewa</label>
                        <input type="text" name="nama_penyewa" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>No HP</label>
                        <input type="text" name="no_hp" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Tanggal Sewa</label>
                        <input type="date" name="tgl_sewa" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Tanggal Kembali</label>
                        <input type="date" name="tgl_kembali" class="form-control" required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-success">Simpan</button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection