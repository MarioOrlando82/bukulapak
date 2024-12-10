@extends('master.master')
@section('content')
    <div class="d-flex overflow-hidden position-relative" style="height: 100vh">
        <div class="position-absolute w-100 h-100 z-1 object-fit-cover">
            <img src="{{ asset('assets/login-bg.jpg') }}" alt="background">
        </div>
        <div class="d-flex align-items-center justify-content-center z-1 left-section">
            <div class="col-sm-12 col-md-8 col-lg-8 mt-5">
                <div class="mb-4 ms-2">
                    <p class="text-black fw-bold mb-2 fs-2">Enter Your Account<span class="text-warning">.</span></p>
                    <p class="text-black text-decoration-none fw-semibold">
                        Don't have an account? <a class="text-warning fw-bold link"
                            href="{{ route('register') }}">Register Here</a>
                    </p>
                </div>
                <div>
                    <form id="loginForm" method="POST" action="{{ url('/login') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control fw-semibold custom-input border-0" id="email"
                                name="email" placeholder="Email" autocomplete="off" style="border-radius: 15px;">
                            <label for="email" style="font-weight: 500;">Email</label>
                            <div class="invalid-feedback">Please enter a valid email.</div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control custom-input border-0" id="password" name="password"
                                placeholder="Password" style="border-radius: 15px;">
                            <label for="password" style="font-weight: 500">Password</label>
                            <div class="invalid-feedback">Password is required.</div>
                        </div>
                        <button type="submit" class="btn btn-warning w-100 text-white my-3 fw-semibold"
                            style="border-radius: 15px">Login</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="position-relative right-section"></div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const email = document.getElementById('email');
            const password = document.getElementById('password');

            let isValid = true;

            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email.value.trim())) {
                email.classList.add('is-invalid');
                isValid = false;
            } else {
                email.classList.remove('is-invalid');
            }

            if (!password.value.trim()) {
                password.classList.add('is-invalid');
                isValid = false;
            } else {
                password.classList.remove('is-invalid');
            }

            if (!isValid) {
                e.preventDefault();
            }
        });
    </script>
@endsection
