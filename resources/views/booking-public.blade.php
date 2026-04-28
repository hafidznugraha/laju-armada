<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking Kendaraan</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body style="background:#F7F2EB;">

    <div class="container py-5">

        <h1 class="fw-bold mb-4" style="color:#081F5C;">
            Booking Kendaraan
        </h1>

        <div class="card shadow border-0">
            <div class="card-body p-4">

                <form action="{{ route('booking.public.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label>Kendaraan</label>
                        <select name="vehicle_id" class="form-control" required>
                            <option value="">-- Pilih Kendaraan --</option>

                            @foreach($vehicles as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->nama }} - Rp {{ number_format($item->harga,0,',','.') }}/hari
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

                    <button class="btn text-white"
                        style="background:#334EAC;">
                        Booking Sekarang
                    </button>

                    <a href="/" class="btn btn-secondary">
                        Kembali
                    </a>

                </form>

            </div>
        </div>

    </div>

</body>

</html>