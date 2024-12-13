@extends('master.master')
@section('content')
    <div class="d-flex overflow-hidden position-relative" style="height: 100vh;">
        <div class="position-absolute w-100 h-100 z-1 object-fit-cover">
            <img src="{{ asset('assets/register-bg.jpg') }}" alt="background">
        </div>

        <div class="d-flex align-items-center justify-content-center z-1 left-section">
            <div class="col-sm-12 col-md-8 col-lg-8 mt-5">
                <div class="mb-4 ms-2">
                    <p class="text-black fw-bold mb-2 fs-2">@lang('auth.lbl_registerTitle')<span class="text-warning">.</span></p>
                    <p class="text-black text-decoration-none fw-semibold">
                        @lang('auth.lbl_login') <a class="text-warning fw-bold link" href="{{ route('login') }}">
                            @lang('auth.link_login')</a>
                    </p>
                </div>
                <div>
                    <form id="registerForm" method="POST" action="{{ url('/register') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control fw-semibold custom-input border-0" id="name"
                                name="name" placeholder="Name" autocomplete="off" style="border-radius: 15px;">
                            <label for="name" style="font-weight: 500;">@lang('auth.lbl_name')</label>
                            <div class="invalid-feedback">@lang('auth.lbl_nameReq')</div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control fw-semibold custom-input border-0" id="email"
                                name="email" placeholder="Email" autocomplete="off" style="border-radius: 15px;">
                            <label for="email" style="font-weight: 500;">@lang('auth.lbl_email')</label>
                            <div class="invalid-feedback">@lang('auth.lbl_emailReq')</div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control fw-semibold custom-input border-0" id="password"
                                name="password" placeholder="Password" style="border-radius: 15px;">
                            <label for="password" style="font-weight: 500;">@lang('auth.lbl_password')</label>
                            <div class="invalid-feedback">
                                @lang('auth.lbl_passwordShort')
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control fw-semibold custom-input border-0"
                                id="password_confirmation" name="password_confirmation" placeholder="Confirm Password"
                                style="border-radius: 15px;">
                            <label for="password_confirmation" style="font-weight: 500;">@lang('auth.lbl_passwordConfirm')</label>
                            <div class="invalid-feedback">
                                @lang('auth.lbl_passwordConfirmReq')
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning w-100 text-white my-3 fw-semibold"
                            style="border-radius: 15px">@lang('auth.btn_register')</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="position-relative right-section"></div>
    </div>

    <script>
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const name = document.getElementById('name');
            const email = document.getElementById('email');
            const password = document.getElementById('password');
            const passwordConfirmation = document.getElementById('password_confirmation');

            let isValid = true;

            if (!name.value.trim()) {
                name.classList.add('is-invalid');
                isValid = false;
            } else {
                name.classList.remove('is-invalid');
            }

            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email.value.trim())) {
                email.classList.add('is-invalid');
                isValid = false;
            } else {
                email.classList.remove('is-invalid');
            }

            if (password.value.trim().length < 8) {
                password.classList.add('is-invalid');
                isValid = false;
            } else {
                password.classList.remove('is-invalid');
            }

            if (password.value.trim() !== passwordConfirmation.value.trim()) {
                passwordConfirmation.classList.add('is-invalid');
                isValid = false;
            } else {
                passwordConfirmation.classList.remove('is-invalid');
            }

            if (!isValid) {
                e.preventDefault();
            }
        });
    </script>
@endsection
