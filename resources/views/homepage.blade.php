@extends('master.master')
@section('content')
<div class="container-fluid">
    <div class="col-12 position-relative overflow-hidden">
        <img src="{{ asset('assets/hero.png') }}" alt="Hero" class="img-fluid w-100">
        <div class="position-absolute top-50 start-0 translate-middle-y ps-5">
            <h1>Reading Today for a <br>Smarter Tomorrow!</h1>
            <button class="btn btn-warning text-black">Read Now</button>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="btn-group">
                <button class="btn btn-outline-warning text-black">Educational</button>
                <button class="btn btn-outline-warning text-black">Novel</button>
                <button class="btn btn-outline-warning text-black">Comic</button>
                <button class="btn btn-outline-warning text-black">Inspirational</button>
                <button class="btn btn-outline-warning text-black">Kid</button>
                <button class="btn btn-outline-warning text-black">All Filters</button>
            </div>
        </div>
    </div>

    <div class="grid-container mt-5" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
        <?php for($i = 0; $i < 17; $i++): ?>
        <div class="card h-100" style="max-width: 100%; margin: 0;">
            <img src="{{ asset('assets/calculus.jpg') }}" class="card-img-top" alt="Calculus" style="height: 70%; object-fit: cover;">
            <div class="card-body p-2">
                <h5 class="card-title" style="font-size: 1.2rem;">Calculus</h5>
                <p class="card-text" style="font-size: 0.9rem;">Rp25.000</p>
                <div class="d-grid">
                    <button class="btn btn-warning text-black btn-sm">Add to Cart</button>
                </div>
            </div>
        </div>
        <?php endfor; ?>
    </div>



    </div>


</div>
@endsection
