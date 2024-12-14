@extends('master.master')

@section('content')
    <div class="container mt-4 mb-5">
        <div class="row">
            <div class="col-md-4 d-grid">
                <img src="data:image/jpeg;base64,{{ $book->cover_image }}" class="img-fluid" alt="{{ $book->title }}">
                <a href="{{ route('transactions.create', $book->id) }}" class="btn btn-warning text-white mt-4"><span
                        class="fw-semibold">@lang('show.lbl_buy')</span>
                    <strong>Rp{{ number_format($book->price, 0, ',', '.') }}</strong></a>
                <a href="{{ route('book.index') }}" class="btn btn-secondary mt-3 fw-semibold">@lang('show.lbl_back')</a>
            </div>
            <div class="col-md-8">
                <h2 class="book-show-title">{{ $book->title }}</h2>
                <p>@lang('show.lbl_by') <span class="fw-semibold">{{ $book->author }}</span></p>
                <p class="fw-medium"><span
                        class="border border-warning py-1 px-2 rounded-pill">{{ $book->category->name }}</span></p>
                <p class="fw-medium">{{ $book->description }}</p>


                <div class="reviews mt-5">
                    <h3>@lang('show.lbl_reviews')</h3>

                    @forelse($book->reviews as $review)
                        <div class="review position-relative mb-3">
                            <div
                                class="d-flex flex-column justify-content-between w-100 h-100 px-3 py-2  text-dark shadow-md border border-warning rounded-4">
                                @auth
                                    @if (Auth::user()->id === $review->user_id)
                                        <div class="position-absolute top-0 end-0 mt-2 me-2">
                                            <a href="{{ route('reviews.edit', $review->id) }}"
                                                class="btn btn-sm btn-warning text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                </svg>
                                            </a>
                                            <form action="{{ route('reviews.destroy', $review->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                @endauth

                                <div class="d-flex align-items-center">
                                    <p class="fw-bold m-0 me-2">{{ $review->user->name }}</p>
                                </div>
                                <div class="mt-0 mb-2">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="{{ $i <= $review->rating ? 'gold' : 'gray' }}" class="bi bi-star-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                    @endfor
                                </div>
                                <p class="fw-medium m-0 mt-2">{{ $review->content }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="fw-semibold">@lang('show.lbl_reviewsEmpty')</p>
                    @endforelse

                </div>
            </div>
        </div>

        <div class="reviews mt-4">
            @auth
                <h4>@lang('show.lbl_reviewAdd')</h4>
                <form action="{{ route('reviews.store', $book->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <textarea name="content" class="form-control fw-semibold custom-input" placeholder="@lang('messages.reviewHolder')" required></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <label for="rating" class="fw-semibold">@lang('show.lbl_reviewRating')</label>
                        <input type="number" name="rating" class="form-control fw-semibold custom-input" min="1" max="5"
                            required>
                    </div>
                    <button type="submit" class="btn btn-warning mt-3 fw-semibold mb-5 text-white">@lang('show.btn_review')</button>
                </form>
            @endauth
        </div>
    </div>
@endsection
