@extends('master.master')

@section('content')
<div class="container mt-4">
    <h2>My Books</h2>

    <div class="row">
        @foreach ($myBooks as $myBook)
        <div class="col-md-3">
            <div class="card">
                <img src="{{ asset('storage/' . $myBook->book->cover_image) }}" class="card-img-top" alt="{{ $myBook->book->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $myBook->book->title }}</h5>
                    <a href="{{ asset('storage/' . $myBook->book->pdf_file) }}" class="btn btn-warning text-black">Read Now</a>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
