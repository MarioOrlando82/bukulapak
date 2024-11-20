@extends('master.master')
@section('content')
    <div class="container mt-4">
        <h2>Edit Book</h2>
        <form id="editBookForm" action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Please select a category.</div>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}">
                <div class="invalid-feedback">Title is required.</div>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" name="author" id="author" class="form-control" value="{{ $book->author }}">
                <div class="invalid-feedback">Author is required.</div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="5">{{ $book->description }}</textarea>
                <div class="invalid-feedback">Description is required.</div>
            </div>
            <div class="mb-3">
                <label for="cover_image" class="form-label">Cover Image</label>
                <input type="file" name="cover_image" id="cover_image" class="form-control">
                <small>Leave blank to keep the current image.</small>
                <div class="invalid-feedback">The file must be an image (jpg, png, jpeg, gif).</div>
            </div>
            <div class="mb-3">
                <label for="pdf_file" class="form-label">PDF File</label>
                <input type="file" name="pdf_file" id="pdf_file" class="form-control">
                <small>Leave blank to keep the current file.</small>
                <div class="invalid-feedback">The file must be a PDF and no larger than 10 MB.</div>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" name="price" id="price" class="form-control" step="0.01"
                    value="{{ $book->price }}">
                <div class="invalid-feedback">Price is required and must be a valid number.</div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>

    <script>
        document.getElementById('editBookForm').addEventListener('submit', function(e) {
            const category = document.getElementById('category_id');
            const title = document.getElementById('title');
            const author = document.getElementById('author');
            const description = document.getElementById('description');
            const coverImage = document.getElementById('cover_image');
            const pdfFile = document.getElementById('pdf_file');
            const price = document.getElementById('price');

            let isValid = true;

            if (!category.value) {
                category.classList.add('is-invalid');
                isValid = false;
            } else {
                category.classList.remove('is-invalid');
            }

            if (!title.value.trim()) {
                title.classList.add('is-invalid');
                isValid = false;
            } else {
                title.classList.remove('is-invalid');
            }

            if (!author.value.trim()) {
                author.classList.add('is-invalid');
                isValid = false;
            } else {
                author.classList.remove('is-invalid');
            }

            if (!description.value.trim()) {
                description.classList.add('is-invalid');
                isValid = false;
            } else {
                description.classList.remove('is-invalid');
            }

            if (coverImage.files.length > 0) {
                const validImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
                if (!validImageTypes.includes(coverImage.files[0].type)) {
                    coverImage.classList.add('is-invalid');
                    isValid = false;
                } else {
                    coverImage.classList.remove('is-invalid');
                }
            }

            if (pdfFile.files.length > 0) {
                const validPdfType = 'application/pdf';
                if (pdfFile.files[0].type !== validPdfType || pdfFile.files[0].size > 10 * 1024 * 1024) {
                    pdfFile.classList.add('is-invalid');
                    isValid = false;
                } else {
                    pdfFile.classList.remove('is-invalid');
                }
            }

            if (!price.value.trim() || isNaN(price.value) || parseFloat(price.value) <= 0) {
                price.classList.add('is-invalid');
                isValid = false;
            } else {
                price.classList.remove('is-invalid');
            }

            if (!isValid) {
                e.preventDefault();
            }
        });
    </script>
@endsection
