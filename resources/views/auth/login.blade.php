<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Laju Armada</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#F7F2EB;">

<div class="container">

    <div class="row min-vh-100 justify-content-center align-items-center">

        <div class="col-md-5">

            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body p-5">

                    <h2 class="fw-bold text-center mb-2" style="color:#081F5C;">
                        Laju Armada
                    </h2>

                    <p class="text-center text-muted mb-4">
                        Login ke Dashboard Admin
                    </p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Email</label>

                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   value="{{ old('email') }}"
                                   required autofocus>

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

                        <!-- Remember -->
                        <div class="mb-3 form-check">
                            <input type="checkbox"
                                   name="remember"
                                   class="form-check-input">

                            <label class="form-check-label">
                                Remember me
                            </label>
                        </div>

                        <!-- Button -->
                        <button class="btn w-100 text-white"
                                style="background:#081F5C;">
                            Login
                        </button>

                    </form>

                    <!-- Link Login -->
                        <div class="text-center mt-4">
                            <a href="{{ route('register') }}" class="text-decoration-none">
                                Belum punya akun? Register
                            </a>
                        </div>

                    <div class="text-center mt-4">
                        <a href="/" class="text-decoration-none">
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