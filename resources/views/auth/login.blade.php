@extends('master.master')
@section('content')
    <div class="d-flex align-items-center justify-content-center" style="height: 100vh; background-color: #fff8e1;">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-lg border-0">
                <div class="card-header text-center bg-warning text-white">
                    <h3 class="m-0">Login</h3>
                </div>
                <div class="card-body bg-light">
                    <form method="POST" action="{{ url('/login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-warning w-100 text-white mb-3">Login</button>
                        <div class="text-center">
                            <a class="text-black text-decoration-none" href="{{ route('register') }}">
                                Don't have an account? Register Here
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
