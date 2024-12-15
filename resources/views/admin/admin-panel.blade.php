@extends('master.master')

@section('content')
    <div class="container mt-4 mb-5">
        <h2 class="fs-2 mb-4 mt-2">@lang('admin.label_adminPanel')</h2>
        <div class="row mt-5">
            <div class="col-md-6">
                <a href="{{ route('categories.index') }}" class="text-decoration-none">
                    <div class="card card-categories position-relative">
                        <div class="card-body d-flex align-items-center position-relative" style="z-index: 2;">
                            <div class="left-content flex-grow-1">
                                <h3 class="card-title text-white ms-3">@lang('admin.label_manageCategories')</h3>
                            </div>
                        </div>
                        <svg class="card-svg position-absolute" width="300px" height="300px" viewBox="0 0 24 24"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 10H7C9 10 10 9 10 7V5C10 3 9 2 7 2H5C3 2 2 3 2 5V7C2 9 3 10 5 10Z"
                                stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M17 10H19C21 10 22 9 22 7V5C22 3 21 2 19 2H17C15 2 14 3 14 5V7C14 9 15 10 17 10Z"
                                stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M17 22H19C21 22 22 21 22 19V17C22 15 21 14 19 14H17C15 14 14 15 14 17V19C14 21 15 22 17 22Z"
                                stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M5 22H7C9 22 10 21 10 19V17C10 15 9 14 7 14H5C3 14 2 15 2 17V19C2 21 3 22 5 22Z"
                                stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="{{ route('books.index') }}" class="text-decoration-none">
                    <div class="card card-books position-relative">
                        <div class="card-body d-flex align-items-center position-relative" style="z-index: 2;">
                            <div class="left-content flex-grow-1">
                                <h3 class="card-title text-white ms-3">@lang('admin.label_manageBooks')</h3>
                            </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="card2-svg position-absolute" width="300px"
                            height="300px" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
                        </svg>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
