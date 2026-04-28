<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laju Armada Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background:#f4f4f4;">

<div class="d-flex">

    <!-- Sidebar -->
    <div style="width:250px; min-height:100vh; background:#0d2a6b;" class="text-white p-4">
        <h3 class="mb-4">Laju Armada</h3>

        <a href="{{ route('admin.dashboard') }}" class="d-block text-white mb-3 text-decoration-none">Dashboard</a>
        <a href="{{ route('admin.kendaraan') }}" class="d-block text-white mb-3 text-decoration-none">Kendaraan</a>
        <a href="#" class="d-block text-white mb-3 text-decoration-none">Booking</a>
        <a href="#" class="d-block text-white mb-3 text-decoration-none">User</a>
        <a href="#" class="d-block text-white mb-3 text-decoration-none">Laporan</a>

        <hr class="bg-light">

        <div>{{ Auth::user()->name }}</div>
    </div>

    <!-- Content -->
    <div class="flex-grow-1 p-4">
        @yield('content')
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>