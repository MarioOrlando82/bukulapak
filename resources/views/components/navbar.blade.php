<div class="bg-warning text-white py-2 col-12 ps-3 pe-3">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <div class="">
                <a href="/" class="fs-6 m-0 text-decoration-none text-dark">
                    <img src="{{ asset('assets/bukulapak_home.png') }}" alt="Home" class="w-25">
                </a>
            </div>
        </div>

        <div class="d-flex align-items-center">
            {{-- select language --}}
            <div class="dropdown d-inline me-3">
                <button class="btn dropdown-toggle text-black" type="button" id="languageDropdown"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <span id="selectedLanguage" class="fw-semibold">English</span>
                    <img src="https://flagcdn.com/20x15/gb.png"
                        srcset="https://flagcdn.com/40x30/gb.png 2x,
    https://flagcdn.com/60x45/gb.png 3x"
                        width="20" height="15" alt="United Kingdom">
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                    <li>
                        <a class="dropdown-item" href="?lang=en" data-lang="en">
                            <span class="fw-semibold">English</span>
                            <img src="https://flagcdn.com/20x15/gb.png"
                                srcset="https://flagcdn.com/40x30/gb.png 2x, https://flagcdn.com/60x45/gb.png 3x"
                                width="20" height="15" alt="United Kingdom">
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="?lang=id" data-lang="id">
                            <span class="fw-semibold">Bahasa Indonesia</span>
                            <img src="https://flagcdn.com/20x15/id.png"
                                srcset="https://flagcdn.com/40x30/id.png 2x, https://flagcdn.com/60x45/id.png 3x"
                                width="20" height="15" alt="Indonesia">
                        </a>
                    </li>
                </ul>

            </div>

            {{-- welcome --}}
            <div class="me-3 text-nowrap">
                @auth
                    <p class="text-black text-center mb-0 fw-semibold">Welcome, {{ Auth::user()->name }}!</p>
                @else
                    <p class="text-black text-center mb-0 fw-semibold">Welcome, Guest!</p>
                @endauth
            </div>

            {{-- profile --}}
            <div class="dropdown">
                <a class="d-block position-relative rounded-circle bg-secondary overflow-hidden"
                    style="width: 40px; height: 40px; cursor: pointer;" id="profileDropdown" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <svg class="position-absolute" style="width: 48px; height: 48px; left: -4px; color: #adb5bd;"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                    @auth
                        @if (Auth::user()->role === 'admin')
                            <a href="{{ route('admin.panel') }}" class="dropdown-item">
                                <span class="fw-semibold">Admin Panel</span>
                            </a>
                        @endif

                        <a href="{{ route('my-books.index') }}" class="dropdown-item">
                            <span class="fw-semibold">My Books</span>
                        </a>

                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="dropdown-item fw-semibold">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="dropdown-item">
                            <span class="fw-semibold">Sign In</span>
                        </a>
                    @endauth
                </ul>
            </div>
        </div>

    </div>
</div>
