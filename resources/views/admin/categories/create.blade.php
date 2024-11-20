@extends('master.master')
@section('content')
    <div class="container mt-4">
        <h2>Create Category</h2>
        <form id="createCategoryForm" action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                <div class="invalid-feedback">Category name is required.</div>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>

    <script>
        document.getElementById('createCategoryForm').addEventListener('submit', function(e) {
            const name = document.getElementById('name');

            let isValid = true;

            if (!name.value.trim()) {
                name.classList.add('is-invalid');
                isValid = false;
            } else {
                name.classList.remove('is-invalid');
            }

            if (!isValid) {
                e.preventDefault();
            }
        });
    </script>
@endsection
