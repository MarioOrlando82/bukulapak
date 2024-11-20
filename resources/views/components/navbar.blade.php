<div class="bg-warning text-white py-2 col-12 ps-3 pe-3">
    <div class="d-flex align-items-center justify-content-between">
        <div class="dropdown d-inline">
            <button class="btn btn-outline-secondary dropdown-toggle text-black" type="button" id="languageDropdown"
                data-bs-toggle="dropdown" aria-expanded="false">
                Language
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                <li><a class="dropdown-item" href="?lang=en">English</a></li>
                <li><a class="dropdown-item" href="?lang=id">Bahasa Indonesia</a></li>
            </ul>
        </div>
        <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
            @auth
                <p class="text-black text-center mb-0">Welcome, {{ Auth::user()->name }}!</p>
            @else
                <p class="text-black text-center mb-0">Welcome, Guest!</p>
            @endauth
        </div>
    </div>
</div>

<div class="col-12 ps-3 pe-3">
    <div class="row align-items-center py-2">
        <div class="col-3">
            <a href="/" class="fs-6 fs-sm-5 fs-md-4 m-0 text-decoration-none text-dark">Bukulapak</a>
        </div>

        <div class="col-5">
            <form method="GET" action="{{ route('book.index') }}" class="input-group input-group-sm">
                <input type="text" class="form-control border border-warning" placeholder="Search Book" name="search" value="{{ request('search') }}">
                <button class="btn btn-outline-warning" type="submit">Search</button>
            </form>
        </div>

        <div class="col-4 d-flex justify-content-end">
            @auth
                @if (Auth::user()->role === 'admin')
                    <a href="{{ route('admin.panel') }}" class="btn btn-outline-warning btn-sm me-1 me-sm-2 text-nowrap">
                        Admin Panel
                    </a>
                @endif

                <a href="{{ route('my-books.index') }}" class="btn btn-outline-warning btn-sm me-1 me-sm-2 text-nowrap">
                    My Books
                </a>

                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-warning btn-sm text-nowrap">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-warning btn-sm me-1 me-sm-2 text-nowrap">
                    <span class="d-none d-sm-inline">Sign In</span>
                    <span class="d-inline d-sm-none">Sign In</span>
                </a>
            @endauth
        </div>
    </div>
</div>
