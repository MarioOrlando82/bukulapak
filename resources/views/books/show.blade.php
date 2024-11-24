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
                <a href="{{ route('book.index') }}" class="btn btn-secondary">Back to Books</a>
            </div>
        </div>

        <div class="reviews mt-4">
            <h3>Reviews</h3>

            @forelse($book->reviews as $review)
                <div class="review">
                    <p><strong>{{ $review->user->name }}</strong> (Rating: {{ $review->rating }})</p>
                    <p>{{ $review->content }}</p>

                    @auth
                        @if (Auth::user()->id === $review->user_id)
                            <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        @endif
                    @endauth
                </div>
            @empty
                <p>No reviews yet. Be the first to review this book!</p>
            @endforelse

            @auth
                <h4>Write a Review</h4>
                <form action="{{ route('reviews.store', $book->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <textarea name="content" class="form-control" placeholder="Write your review here..." required></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <label for="rating">Rating (1-5):</label>
                        <input type="number" name="rating" class="form-control" min="1" max="5" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit Review</button>
                </form>
            @endauth
        </div>

    </div>
@endsection
