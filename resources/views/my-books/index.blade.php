@extends('master.master')

@section('content')
    <div class="container mt-4">
        <h2>My Books</h2>

        <div class="row">
            @if ($myBooks->isEmpty())
                <div class="d-flex flex-column align-items-center justify-content-center text-center" style="width: 100%; ">
                    <img src="{{ asset('assets/no_file.png') }}" class="img-fluid mb-2" alt="No Matching Books Found"
                        style="max-width: 400px; height: auto;">
                    <h3>No Books Found in Your Collection</h3>
                    <p class="text-muted mb-5">Try adding some books to get started!</p>
                </div>
            @else
                @foreach ($myBooks as $myBook)
                    <div class="col-md-3">
                        <div class="card">
                            <img src="data:image/jpeg;base64,{{ $myBook->book->cover_image }}" class="card-img-top"
                                alt="{{ $myBook->book->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $myBook->book->title }}</h5>
                                <a href="data:application/pdf;base64,{{ $myBook->book->pdf_file }}" download="Book.pdf"
                                    class="btn btn-warning text-black">
                                    Download PDF
                                </a>

                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
