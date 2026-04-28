<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="background:#F7F2EB;">

    <div class="d-flex">

        <!-- Sidebar -->
        <div class="text-white p-4 vh-100"
            style="width:260px;background:#081F5C;">

            <h3 class="fw-bold mb-4">Laju Armada</h3>

            <ul class="nav flex-column">

                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-white">Dashboard</a>
                </li>

                <li class="nav-item mb-2">
                    <a href="{{ route('admin.kendaraan') }}" class="nav-link text-white">Kendaraan</a>
                </li>

                <li class="nav-item mb-2">
                    <a href="{{ route('admin.booking') }}" class="nav-link text-white">Booking</a>
                </li>

                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-white">User</a>
                </li>

                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-white">Laporan</a>
                </li>

            </ul>
        </div>

        <!-- Content -->
        <div class="flex-grow-1 p-4">

            <h2 class="fw-bold mb-4" style="color:#081F5C;">
                Dashboard Admin
            </h2>

            <div class="row g-4">

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h5>Total Kendaraan</h5>
                            <h2 class="fw-bold text-primary">{{ $totalKendaraan }}</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h5>Total Booking</h5>
                            <h2 class="fw-bold text-success">{{ $totalBooking }}</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h5>Total User</h5>
                            <h2 class="fw-bold text-danger">{{ $totalUser }}</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <h6>Total Pendapatan</h6>
                            <h3 class="text-success">
                                Rp {{ number_format($pendapatan,0,',','.') }}
                            </h3>
                        </div>
                    </div>
                </div>

            </div>

            <div class="card mt-4 border-0 shadow-sm">
                <div class="card-body">
                    <h5>Selamat Datang Admin</h5>
                    <p class="text-muted">
                        Kelola kendaraan, booking, dan user dari dashboard ini.
                    </p>
                </div>
            </div>

        </div>
    </div>

</body>

</html>