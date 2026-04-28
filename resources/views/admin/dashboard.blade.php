@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <!-- Judul -->
    <div class="mb-4">
        <h2 class="fw-bold" style="color:#081F5C;">
            Dashboard Admin
        </h2>
    </div>

    <!-- Card Statistik -->
    <div class="row g-4">

        <!-- Total Kendaraan -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h5 class="text-muted">Total Kendaraan</h5>
                    <h1 class="fw-bold text-primary">
                        {{ $totalKendaraan }}
                    </h1>
                </div>
            </div>
        </div>

        <!-- Total Booking -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h5 class="text-muted">Total Booking</h5>
                    <h1 class="fw-bold text-success">
                        {{ $totalBooking }}
                    </h1>
                </div>
            </div>
        </div>

        <!-- Total User -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h5 class="text-muted">Total User</h5>
                    <h1 class="fw-bold text-danger">
                        {{ $totalUser }}
                    </h1>
                </div>
            </div>
        </div>

        <!-- Pendapatan -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h5 class="text-muted">Total Pendapatan</h5>

                    <h3 class="fw-bold text-success">
                        Rp {{ number_format($pendapatan,0,',','.') }}
                    </h3>
                </div>
            </div>
        </div>

    </div>

    <!-- Welcome Box -->
    <div class="card border-0 shadow-sm mt-4">
        <div class="card-body">
            <h5 class="fw-bold mb-2">
                Selamat Datang Admin
            </h5>

            <p class="text-muted mb-0">
                Kelola kendaraan, booking, user, dan laporan melalui dashboard ini.
            </p>
        </div>
    </div>

</div>

@endsection