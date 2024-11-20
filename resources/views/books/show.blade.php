@extends('master.master')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset('storage/' . $book->cover_image) }}" class="img-fluid" alt="{{ $book->title }}">
        </div>
        <div class="col-md-8">
            <h2>{{ $book->title }}</h2>
            <p><strong>Author:</strong> {{ $book->author }}</p>
            <p><strong>Category:</strong> {{ $book->category->name }}</p>
            <p><strong>Description:</strong></p>
            <p>{{ $book->description }}</p>
            <p><strong>Price:</strong> Rp{{ number_format($book->price, 0, ',', '.') }}</p>
            <a href="{{ route('transactions.create', $book->id) }}" class="btn btn-warning text-black">Buy Now</a>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to Books</a>
        </div>
    </div>
</div>
@endsection
