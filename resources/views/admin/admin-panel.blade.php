@extends('master.master')

@section('content')
<div class="container mt-4">
    <h2>Admin Panel</h2>
    <div class="d-flex flex-column gap-3 mt-4">
        <a href="{{ route('categories.index') }}" class="btn btn-primary btn-lg">
            Manage Categories
        </a>
        <a href="{{ route('books.index') }}" class="btn btn-secondary btn-lg">
            Manage Books
        </a>
    </div>
</div>
@endsection
