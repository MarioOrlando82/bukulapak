@extends('master.master')
@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Add New Category</h2>
        <div class="card shadow-sm" style="background-color: #f9f9f9">
            <div class="card-body">
                <form id="createCategoryForm" action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="form-label fw-semibold">Category Name</label>
                        <input type="text" class="form-control custom-input fw-semibold" id="name" name="name"
                            value="{{ old('name') }}" style="background-color: #eeeeee">
                        <div class="invalid-feedback">Category name is required.</div>
                    </div>
                    <button type="submit" class="btn btn-warning fw-semibold mt-3 text-white">Create</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary fw-semibold mt-3 ms-3">Back</a>
                </form>
            </div>
        </div>
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
