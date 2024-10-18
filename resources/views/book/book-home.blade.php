@extends('master.master')
@section('content')
<div class="container-fluid px-0">
    <div class="position-relative overflow-hidden px-3">
        <img src="{{ asset('assets/hero.png') }}" alt="Hero" class="img-fluid w-100">
        <div class="position-absolute top-50 start-0 translate-middle-y px-4 p-2 p-sm-3 p-md-5 pe-4 pe-sm-0">
            <h1 class="fs-1 fs-sm-3 fs-md-3 fs-lg-1 fw-bold lh-1 me-4 me-sm-0">
                Reading Today for a <br class="d-none d-sm-inline">Smarter Tomorrow!
            </h1>
            <button class="btn btn-warning text-black mt-2 mt-sm-3 btn-sm">Read Now</button>
            @if (Session::has('status'))
                <div>
                    {{Session::get('message')}}
                </div>
            @endif
        </div>
    </div>


    <div class="row mt-3 mt-md-4 px-2 px-md-3">
        <div class="col-12">
            <div class="d-flex flex-wrap justify-content-center justify-content-md-start gap-2">
                <button class="btn btn-sm btn-outline-warning text-black">Educational</button>
                <button class="btn btn-sm btn-outline-warning text-black">Novel</button>
                <button class="btn btn-sm btn-outline-warning text-black">Comic</button>
                <button class="btn btn-sm btn-outline-warning text-black">Inspirational</button>
                <button class="btn btn-sm btn-outline-warning text-black">Kid</button>
                <button class="btn btn-sm btn-outline-warning text-black">All Filters</button>
                <a href="book-add">
                    <button class="btn btn-sm btn-outline-warning text-black">Add Book</button>
                </a>
            </div>
        </div>
    </div>

    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-2 g-md-3 mt-3 mt-md-4 px-2 px-md-3">
        @foreach ($bookList as $bl)
        <div class="col">
            <div class="card h-100">
                <img src="{{ asset('assets/calculus.jpg') }}" class="card-img-top" alt="Calculus" style="width: 100%; height: 100%; object-fit: cover;">
                <div class="card-body p-2">
                    <h5 class="card-title fs-6">{{$bl->title}}</h5>
                    <p class="card-text small">{{$bl->price}}</p>
                    <div class="d-grid">
                        <button class="btn btn-warning text-black btn-sm">Add to Cart</button>
                        <a href="book-update/{{$bl->id}}">
                            <button>Edit Book</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
