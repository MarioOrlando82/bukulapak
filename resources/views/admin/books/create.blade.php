@extends('master.master')
@section('content')
    <div class="container mt-4 mb-5">
        <h2 class="mb-4">@lang('admin.label_addBook')</h2>
        <div class="card shadow-sm" style="background-color: #f9f9f9">
            <div class="card-body fw-semibold">
                <form id="createBookForm" action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="category_id" class="form-label">@lang('admin.label_category')</label>
                        <select name="category_id" id="category_id" class="form-control custom-input fw-semibold form-input">
                            <option value="" class="fw-semibold">@lang('admin.label_categorySelect')</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" class="fw-semibold">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">@lang('admin.label_CategoryInvalid')</div>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">@lang('admin.label_title')</label>
                        <input type="text" name="title" id="title" class="form-control custom-input fw-semibold form-input" value="{{ old('title') }}">
                        <div class="invalid-feedback">@lang('admin.label_titleInvalid')</div>
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">@lang('admin.label_author')</label>
                        <input type="text" name="author" id="author" class="form-control custom-input fw-semibold form-input" value="{{ old('author') }}">
                        <div class="invalid-feedback">@lang('admin.label_authorInvalid')</div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">@lang('admin.label_description')</label>
                        <textarea name="description" id="description" class="form-control custom-input fw-semibold form-input" rows="5">{{ old('description') }}</textarea>
                        <div class="invalid-feedback">@lang('admin.label_descriptionInvalid')</div>
                    </div>
                    <div class="mb-3">
                        <label for="cover_image" class="form-label">@lang('admin.label_image')</label>
                        <input type="file" name="cover_image" id="cover_image" class="form-control custom-input fw-semibold form-input" >
                        <div class="invalid-feedback">@lang('admin.label_imageInvalid')</div>
                    </div>
                    <div class="mb-3">
                        <label for="pdf_file" class="form-label">@lang('admin.label_pdf')</label>
                        <input type="file" name="pdf_file" id="pdf_file" class="form-control custom-input fw-semibold form-input">
                        <div class="invalid-feedback">@lang('admin.label_pdfInvalid')</div>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">@lang('admin.label_price')</label>
                        <input type="number" name="price" id="price" class="form-control custom-input fw-semibold form-input" step="0.01"
                            value="{{ old('price') }}">
                        <div class="invalid-feedback">@lang('admin.label_priceInvalid')</div>
                    </div>
                    <button type="submit" class="btn btn-warning fw-semibold mt-3 text-white">@lang('admin.label_create')</button>
                    <a href="{{ route('books.index') }}" class="btn btn-secondary fw-semibold mt-3 ms-3">@lang('admin.label_back')</a>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('createBookForm').addEventListener('submit', function(e) {
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
            } else {
                coverImage.classList.add('is-invalid');
                isValid = false;
            }

            if (pdfFile.files.length > 0) {
                const validPdfType = 'application/pdf';
                if (pdfFile.files[0].type !== validPdfType || pdfFile.files[0].size > 10 * 1024 * 1024) {
                    pdfFile.classList.add('is-invalid');
                    isValid = false;
                } else {
                    pdfFile.classList.remove('is-invalid');
                }
            } else {
                pdfFile.classList.add('is-invalid');
                isValid = false;
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
