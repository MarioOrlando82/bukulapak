@extends('master.master')

@section('content')
    <div class="container mt-4 mb-5">
        <h2 class="mb-4">@lang('reviews.lbl_reviewEdit')</h2>
        <div class="card shadow-sm" style="background-color: #f9f9f9">
            <div class="card-body">
                <form action="{{ route('reviews.update', $review->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="content fw-semibold">@lang('reviews.lbl_reviewContent')</label>
                        <textarea name="content" id="content" class="form-control custom-input fw-semibold form-input" rows="4" required>{{ $review->content }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="rating fw-semibold">@lang('reviews.lbl_reviewRating')</label>
                        <input type="number" name="rating" id="rating" class="form-control custom-input fw-semibold form-input" min="1"
                            max="5" value="{{ $review->rating }}" required>
                    </div>

                    <button type="submit" class="btn btn-warning fw-semibold mt-3 text-white">@lang('reviews.btn_update')</button>
                    <a href="{{ route('book.show', $review->book_id) }}" class="btn btn-secondary fw-semibold mt-3 ms-3">@lang('reviews.lbl_cancel')</a>
                </form>
            </div>
        </div>
    </div>
@endsection
