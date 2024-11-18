@extends('master.master')
@section('content')
<div class="d-flex align-items-center justify-content-center" style="height: 100vh; background-color: #fff8e1;">
    <div class="col-md-6 col-lg-4">
        <div class="card shadow-lg border-0">
            <div class="card-header text-center bg-warning text-white">
                <h3 class="m-0">Register</h3>
            </div>
            <div class="card-body bg-light">
                <form method="POST" action="{{ url('/register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    <button type="submit" class="btn btn-warning w-100 text-white mb-3">Register</button>
                    <div class="text-center">
                        <a class="text-black text-decoration-none" href="{{ route('login') }}">
                            Already have an account? Login Here
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
