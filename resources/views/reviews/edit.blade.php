@extends('master.master')

@section('content')
    <div class="container mt-4">
        <h3>Edit Your Review</h3>
        <form action="{{ route('reviews.update', $review->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="content">Review Content:</label>
                <textarea name="content" id="content" class="form-control" rows="4" required>{{ $review->content }}</textarea>
            </div>

            <div class="form-group mt-2">
                <label for="rating">Rating (1-5):</label>
                <input type="number" name="rating" id="rating" class="form-control" min="1" max="5" value="{{ $review->rating }}" required>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Update Review</button>
            <a href="{{ route('book.show', $review->book_id) }}" class="btn btn-secondary mt-2">Cancel</a>
        </form>
    </div>
@endsection
