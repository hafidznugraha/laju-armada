<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Laju Armada</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#F7F2EB;">

    <div class="container">

        <div class="row min-vh-100 justify-content-center align-items-center">

            <div class="col-md-6">

                <div class="card border-0 shadow-lg rounded-4">
                    <div class="card-body p-5">

                        <!-- Title -->
                        <h2 class="fw-bold text-center mb-2" style="color:#081F5C;">
                            Laju Armada
                        </h2>

                        <p class="text-center text-muted mb-4">
                            Buat akun baru
                        </p>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Nama -->
                            <div class="mb-3">
                                <label class="form-label">Nama</label>

                                <input type="text"
                                    name="name"
                                    class="form-control"
                                    value="{{ old('name') }}"
                                    required autofocus>

                                @error('name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label class="form-label">Email</label>

                                <input type="email"
                                    name="email"
                                    class="form-control"
                                    value="{{ old('email') }}"
                                    required>

                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label class="form-label">Password</label>

                                <input type="password"
                                    name="password"
                                    class="form-control"
                                    required>

                                @error('password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Konfirmasi Password -->
                            <div class="mb-4">
                                <label class="form-label">Konfirmasi Password</label>

                                <input type="password"
                                    name="password_confirmation"
                                    class="form-control"
                                    required>

                                @error('password_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Tombol -->
                            <button type="submit"
                                class="btn w-100 text-white"
                                style="background:#081F5C;">
                                Register
                            </button>

                        </form>

                        <!-- Link Login -->
                        <div class="text-center mt-4">
                            <a href="{{ route('login') }}" class="text-decoration-none">
                                Sudah punya akun? Login
                            </a>
                        </div>

                        <!-- Back -->
                        <div class="text-center mt-2">
                            <a href="/" class="text-decoration-none text-muted">
                                ← Kembali ke Beranda
                            </a>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

</body>

</html>