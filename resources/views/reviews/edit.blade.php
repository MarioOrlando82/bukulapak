@extends('master.master')

@section('content')
    <div class="container mt-4 mb-5">
        <h2 class="mb-4">Edit Your Review</h2>
        <div class="card shadow-sm" style="background-color: #f9f9f9">
            <div class="card-body">
                <form action="{{ route('reviews.update', $review->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="content">Review Content</label>
                        <textarea name="content" id="content" class="form-control custom-input fw-semibold form-input" rows="4" required>{{ $review->content }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="rating">Rating (1-5)</label>
                        <input type="number" name="rating" id="rating" class="form-control custom-input fw-semibold form-input" min="1"
                            max="5" value="{{ $review->rating }}" required>
                    </div>

                    <button type="submit" class="btn btn-warning fw-semibold mt-3 text-white">Update</button>
                    <a href="{{ route('book.show', $review->book_id) }}" class="btn btn-secondary fw-semibold mt-3 ms-3">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
