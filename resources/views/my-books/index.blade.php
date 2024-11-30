@extends('master.master')

@section('content')
    <div class="container mt-4">
        <h2>My Books</h2>

        <div class="row">
            @if ($myBooks->isEmpty())
                <div class="col-12 text-center">
                    <p>No books found in your collection.</p>
                </div>
            @else
                @foreach ($myBooks as $myBook)
                    <div class="col-md-3">
                        <div class="card">
                            <img src="data:image/jpeg;base64,{{ $myBook->book->cover_image }}" class="card-img-top"
                                alt="{{ $myBook->book->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $myBook->book->title }}</h5>
                                <a href="data:application/pdf;base64,{{ $myBook->book->pdf_file }}"
                                    download="Book.pdf"
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
