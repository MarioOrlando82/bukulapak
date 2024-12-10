@extends('master.master')

@section('content')
    <div class="container-fluid px-0 mt-4 mb-5">
        <div class="position-relative overflow-hidden px-3">
            <img src="{{ asset('assets/hero.png') }}" alt="Hero" class="img-fluid w-100 rounded">
            <div class="position-absolute top-50 start-0 translate-middle-y px-4 p-2 p-sm-3 p-md-5 pe-4 pe-sm-0">
                <h1 class="fs-1 fs-sm-3 fs-md-3 fs-lg-1 fw-bold lh-1 me-4 me-sm-0">
                    Reading Today for a <br class="d-none d-sm-inline">Smarter Tomorrow!
                </h1>
                <button class="btn btn-warning text-white mt-3 mt-sm-3 btn-sm fw-semibold p-2">Read Now</button>
            </div>
        </div>

        <div class="col-12 mt-4">
            <div class="row justify-content-center align-items-center py-2">
                <div class="col-5">
                    <form method="GET" action="{{ route('book.index') }}" class="input-group input-group-sm">
                        @csrf
                        <input type="text" class="form-control border border-warning fw-semibold p-2 pe-2 custom-input"
                            placeholder="Search Book" name="search" value="{{ request('search') }}"
                            style="border-radius: 5px 0px 0px 5px">
                        <button class="btn btn-warning fw-semibold text-white" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="row mt-2 mt-md-4 px-2 px-md-3">
            <div class="col-12">
                <div class="d-flex flex-wrap justify-content-center justify-content-md-start gap-2">
                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-warning dropdown-toggle fw-semibold filter" type="button"
                            id="categoryFilterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Filter by Category
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="categoryFilterDropdown">
                            <li><a class="dropdown-item fw-semibold"
                                    href="{{ route('book.index', ['category' => 'all']) }}">All
                                    Categories</a></li>
                            <li><a class="dropdown-item fw-semibold"
                                    href="{{ route('book.index', ['category' => 'Educational']) }}">Educational</a></li>
                            <li><a class="dropdown-item fw-semibold"
                                    href="{{ route('book.index', ['category' => 'Novel']) }}">Novel</a>
                            </li>
                            <li><a class="dropdown-item fw-semibold"
                                    href="{{ route('book.index', ['category' => 'Comic']) }}">Comic</a>
                            </li>
                            <li><a class="dropdown-item fw-semibold"
                                    href="{{ route('book.index', ['category' => 'Inspirational']) }}">Inspirational</a></li>
                            <li><a class="dropdown-item fw-semibold"
                                    href="{{ route('book.index', ['category' => 'Kid']) }}">Kid</a>
                            </li>
                        </ul>
                    </div>

                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-warning dropdown-toggle fw-semibold filter" type="button"
                            id="priceSortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Sort by Price
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="priceSortDropdown">
                            <li><a class="dropdown-item fw-semibold"
                                    href="{{ route('book.index', ['sort' => 'price_asc', 'category' => request('category')]) }}">Lowest
                                    Price</a></li>
                            <li><a class="dropdown-item fw-semibold"
                                    href="{{ route('book.index', ['sort' => 'price_desc', 'category' => request('category')]) }}">Highest
                                    Price</a></li>
                            <li><a class="dropdown-item fw-semibold"
                                    href="{{ route('book.index', ['sort' => null, 'category' => request('category')]) }}">All
                                    Prices</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-2 g-md-3 mt-3 mt-md-4 px-2 px-md-3">
            @if ($books->isEmpty())
                <div class="d-flex flex-column align-items-center justify-content-center text-center w-100">
                    <img src="{{ asset('assets/search_not_found.png') }}" class="img-fluid mb-2"
                        alt="No Matching Books Found" style="max-width: 400px; height: auto;">
                    <h3>No Matching Books Found</h3>
                    <p class="text-muted mb-5">Try searching with different keywords</p>
                </div>
            @else
                @foreach ($books as $book)
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-flip">
                                <!-- Front -->
                                <div class="card-front">
                                    <img src="data:image/jpeg;base64,{{ $book->cover_image }}" class="card-img-top"
                                        alt="{{ $book->title }}">
                                </div>
                                <!-- Back -->
                                <div class="card-back d-flex align-items-center justify-content-center">
                                    <p class="text-center px-2 fw-semibold">{{ $book->description }}</p>
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column justify-content-between p-2">
                                <div class="title-price-container" style="min-height: 60px;">
                                    <h6 class="card-title fs-6 fw-bold text-truncate">{{ $book->title }}</h6>
                                    <p class="card-text small fw-semibold mb-0">
                                        Rp{{ number_format($book->price, 0, ',', '.') }}</p>
                                </div>
                                <div class="d-grid mt-3">
                                    <a href="{{ route('book.show', $book->id) }}"
                                        class="btn btn-warning text-white btn-sm fw-semibold">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        {{ $books->links() }}
    </div>
@endsection
