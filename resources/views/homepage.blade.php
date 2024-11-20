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
                </div>
            </div>
        </div>

        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-2 g-md-3 mt-3 mt-md-4 px-2 px-md-3">
            @foreach ($books as $book)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('storage/' . $book->cover_image) }}" class="card-img-top"
                            alt="{{ $book->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                        <div class="card-body p-2">
                            <h5 class="card-title fs-6">{{ $book->title }}</h5>
                            <p class="card-text small">Rp{{ number_format($book->price, 0, ',', '.') }}</p>
                            <div class="d-grid">
                                <a href="{{ route('book.show', $book->id) }}"
                                    class="btn btn-warning text-black btn-sm">Detail</a>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $books->links() }}
    </div>
@endsection
