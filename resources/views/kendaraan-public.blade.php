<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Katalog Kendaraan</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body style="background:#F7F2EB;">

    <nav class="navbar navbar-dark shadow-sm py-3"
        style="background:#081F5C;">
        <div class="container">
            <a href="/" class="navbar-brand fw-bold fs-3">
                Laju Armada
            </a>
        </div>
    </nav>

    <div class="container py-5">

        <h1 class="fw-bold mb-4" style="color:#081F5C;">
            Katalog Kendaraan
        </h1>

        <div class="row g-4">

            @foreach($vehicles as $item)

            <div class="col-md-4">

                <div class="card border-0 shadow h-100">

                    @if($item->foto)
                    <img src="{{ asset('storage/' . $item->foto) }}"
                        style="height:220px;object-fit:cover;"
                        class="card-img-top">
                    @else
                    <img src="https://via.placeholder.com/400x220"
                        class="card-img-top">
                    @endif

                    <div class="card-body">

                        <h4 class="fw-bold">{{ $item->nama }}</h4>

                        <p class="text-muted mb-1">
                            {{ $item->merk }} • {{ $item->kategori }}
                        </p>

                        <p class="fw-bold text-success">
                            Rp {{ number_format($item->harga,0,',','.') }}/hari
                        </p>

                        @if($item->status == 'Tersedia')
                        <span class="badge bg-success">
                            Tersedia
                        </span>
                        @else
                        <span class="badge bg-danger">
                            Disewa
                        </span>
                        @endif

                        <div class="mt-3">

                            @if($item->status == 'Tersedia')
                            <a href="{{ url('/booking?id=' . $item->id) }}"
                                class="btn w-100 text-white"
                                style="background:#334EAC;">
                                Booking Sekarang
                            </a>
                            @else
                            <button class="btn btn-secondary w-100" disabled>
                                Tidak Tersedia
                            </button>
                            @endif

                        </div>

                    </div>
                </div>

            </div>

            @endforeach

        </div>

    </div>

</body>

</html>