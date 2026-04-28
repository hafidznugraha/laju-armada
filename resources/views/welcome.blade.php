<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laju Armada</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark py-3 shadow-sm" style="background:#081F5C;">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3" href="#">Laju Armada</a>

            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link px-3" href="#">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#">Kendaraan</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#">Tentang</a></li>
                    <li class="nav-item">
                        @auth
                        <a href="{{ route('admin.dashboard') }}" class="nav-link px-3">
                            Dashboard
                        </a>
                        @else
                        <a href="{{ route('login') }}" class="nav-link px-3">
                            Login
                        </a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="py-5" style="background:#F7F2EB; min-height:100vh;">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6">
                    <span class="badge mb-3 px-3 py-2" style="background:#D0E3FF; color:#081F5C;">
                        Rental Profesional Terpercaya
                    </span>

                    <h1 class="display-3 fw-bold" style="color:#081F5C;">
                        Sewa Kendaraan Jadi Lebih Mudah
                    </h1>

                    <p class="lead text-muted mt-3">
                        Mobil, motor, dan alat berat dengan harga kompetitif,
                        unit terawat, dan pelayanan cepat.
                    </p>

                    <div class="mt-4">
                        @auth
                        <a href="{{ route('kendaraan.public') }}"
                            class="btn btn-lg me-2 text-white px-4"
                            style="background:#334EAC;">
                            Booking Sekarang
                        </a>
                        @else
                        <a href="{{ route('login') }}"
                            class="btn btn-lg me-2 text-white px-4"
                            style="background:#334EAC;">
                            Booking Sekarang
                        </a>
                        @endauth

                        <a href="{{ route('kendaraan.public') }}"
                            class="btn btn-lg px-4 border"
                            style="border-color:#334EAC;color:#334EAC;">
                            Lihat Unit
                        </a>
                    </div>

                    <div class="row mt-5">
                        <div class="col-4">
                            <h3 class="fw-bold" style="color:#081F5C;">
                                {{ $totalKendaraan }}+
                            </h3>
                            <p class="text-muted">Unit Armada</p>
                        </div>

                        <div class="col-4">
                            <h3 class="fw-bold" style="color:#081F5C;">
                                {{ $totalBooking }}+
                            </h3>
                            <p class="text-muted">Total Booking</p>
                        </div>

                        <div class="col-4">
                            <h3 class="fw-bold" style="color:#081F5C;">
                                {{ $totalUser }}+
                            </h3>
                            <p class="text-muted">Pengguna</p>
                        </div>

                        <div class="col-4">
                            <h3 class="fw-bold" style="color:#081F5C;">24/7</h3>
                            <p class="text-muted">Support</p>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6 text-center mt-5 mt-lg-0">
                    <img src="https://cdn-icons-png.flaticon.com/512/744/744465.png"
                        class="img-fluid" width="520">
                </div>

            </div>
        </div>
    </section>

</body>

</html>