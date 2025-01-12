@extends('master.master')

@section('content')
    <div class="container mt-4 mb-5">
        <h2 class="mb-4">@lang('my-books.lbl_bookTitle')</h2>

        <div class="row">
            @if ($myBooks->isEmpty())
                <div class="d-flex flex-column align-items-center justify-content-center text-center" style="width: 100%;">
                    <img src="{{ asset('assets/no_file.png') }}" class="img-fluid mb-2" alt="No Matching Books Found"
                        style="max-width: 400px; height: auto;">
                    <h3>@lang('my-books.lbl_bookEmpty')</h3>
                    <p class="text-muted mb-5">@lang('my-books.lbl_bookStart')</p>
                </div>
            @else
                @foreach ($myBooks as $myBook)
                    <div class="col-md-3">
                        <div class="card my-books mb-4">
                            <img src="data:image/jpeg;base64,{{ $myBook->book->cover_image }}" class="card-img-top"
                                alt="{{ $myBook->book->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $myBook->book->title }}</h5>
                                <a href="data:application/pdf;base64,{{ $myBook->book->pdf_file }}" download="Book.pdf"
                                    class="btn btn-warning text-white fw-semibold mt-2">
                                    @lang('my-books.lbl_bookDownload')
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
