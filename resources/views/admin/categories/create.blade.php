@extends('master.master')
@section('content')
    <div class="container mt-4">
        <h2>Create Category</h2>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
