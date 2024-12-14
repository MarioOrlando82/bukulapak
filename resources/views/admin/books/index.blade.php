@extends('master.master')

@section('content')
    <div class="container mt-4 mb-5">
        <div class="books-top-section d-flex flex-column align-items-end">
            <a href="{{ url()->previous() }}"
                class="btn btn-outline-warning d-flex align-items-center position-absolute start-0 ms-3 fw-semibold filter">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left" viewBox="0 0 16 16">
                    <path d="M10 12.796V3.204L4.519 8zm-.659.753-5.48-4.796a1 1 0 0 1 0-1.506l5.48-4.796A1 1 0 0 1 11 3.204v9.592a1 1 0 0 1-1.659.753"/>
                  </svg>
                @lang('admin.label_back')
            </a>

            <h2 class="text-center w-100 fs-2 mb-4 mt-2">@lang('admin.label_book')</h2>
            <a href="{{ route('books.create') }}" class="btn btn-warning mt-3 fw-semibold d-flex align-items-center text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-plus-circle me-2" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                </svg>
                @lang('admin.label_addBook')
            </a>
        </div>

        @if ($books->isEmpty())
            <div class="alert alert-info text-center">
                @lang('admin.label_bookEmpty')
            </div>
        @else
            <div class="table-responsive">
                <table class="table books-table align-top">
                    <thead>
                        <tr>
                            <th class="text-center">@lang('admin.label_id')</th>
                            <th>@lang('admin.label_title')</th>
                            <th>@lang('admin.label_author')</th>
                            <th>@lang('admin.label_category')</th>
                            <th>@lang('admin.label_price')</th>
                            <th class="text-center">@lang('admin.label_actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr class="fw-semibold">
                                <td class="text-center">{{ $book->id }}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->category->name }}</td>
                                <td>Rp{{ number_format($book->price, 0, ',', '.') }}</td>
                                <td>
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-warning text-white"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                            </svg></a>
                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                            class="d-inline">
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
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
