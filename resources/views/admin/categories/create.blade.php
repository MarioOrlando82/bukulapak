@extends('master.master')
@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">@lang('admin.label_addCategory')</h2>
        <div class="card shadow-sm" style="background-color: #f9f9f9">
            <div class="card-body">
                <form id="createCategoryForm" action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="form-label fw-semibold">@lang('admin.label_name')</label>
                        <input type="text" class="form-control custom-input fw-semibold" id="name" name="name"
                            value="{{ old('name') }}" style="background-color: #eeeeee">
                        <div class="invalid-feedback">@lang('admin.label_nameReq')</div>
                    </div>
                    <button type="submit" class="btn btn-warning fw-semibold mt-3 text-white">@lang('admin.label_create')</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary fw-semibold mt-3 ms-3">@lang('admin.label_back')</a>
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
