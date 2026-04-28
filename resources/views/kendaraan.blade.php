<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kendaraan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="background:#F7F2EB;">

    <div class="container py-5">

        <h1 class="fw-bold mb-4" style="color:#081F5C;">
            Daftar Kendaraan
        </h1>

        <div class="row">

            @forelse($vehicles as $item)

            <div class="col-md-4 mb-4">
                <div class="card shadow border-0 h-100">

                    <img src="{{ asset('storage/' . $item->foto) }}"
                        style="height:220px; object-fit:cover;">

                    <div class="card-body">

                        <h5 class="fw-bold">{{ $item->nama }}</h5>

                        <p class="mb-1">Merk: {{ $item->merk }}</p>
                        <p class="mb-1">Kategori: {{ $item->kategori }}</p>

                        <p class="fw-bold text-success">
                            Rp {{ number_format($item->harga,0,',','.') }}/hari
                        </p>

                        <span class="badge bg-success">
                            {{ $item->status }}
                        </span>

                    </div>
                </div>
            </div>

            @empty

            <p>Belum ada kendaraan.</p>

            @endforelse

        </div>

        <a href="/" class="btn btn-secondary mt-3">
            ← Kembali
        </a>

    </div>

</body>

</html>