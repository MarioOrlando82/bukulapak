<div
    class="py-2 col-12 px-3 z-3 w-100 position-fixed top-0 start-0 {{ request()->routeIs(['login', 'register']) ? 'bg-transparent' : 'bg-warning' }}">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <a href="/" class="fs-6 m-0 text-decoration-none text-dark">
                <img src="{{ asset('assets/bukulapak_home.png') }}" alt="Home" class="w-25">
            </a>
        </div>

        <div class="d-flex align-items-center">
            <div class="dropdown d-inline me-3">
                <button class="btn dropdown-toggle text-white" type="button" id="languageDropdown"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <span id="selectedLanguage" class="fw-semibold lang-text">English</span>
                    <img src="https://flagcdn.com/20x15/gb.png" width="20" height="15">
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                    <li>
                        <a class="dropdown-item" href="?lang=en" data-lang="en">
                            <span class="fw-semibold">English</span>
                            <img src="https://flagcdn.com/20x15/gb.png" width="20" height="15"
                                alt="United Kingdom">
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="?lang=id" data-lang="id">
                            <span class="fw-semibold">Bahasa Indonesia</span>
                            <img src="https://flagcdn.com/20x15/id.png" width="20" height="15" alt="Indonesia">
                        </a>
                    </li>
                </ul>

            </div>

            <div class="me-3 text-nowrap">
                @auth
                    <p class="text-white text-center mb-0 fw-semibold">Welcome, {{ Auth::user()->name }}!</p>
                @else
                    <p class="text-white text-center mb-0 fw-semibold">Welcome, Guest!</p>
                @endauth
            </div>

            <div class="dropdown">
                <a class="d-block position-relative rounded-circle overflow-hidden"
                    style="width: 40px; height: 40px; cursor: pointer;" id="profileDropdown" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    @auth
                        @php
                            $randomNumber = rand(1, 3);
                        @endphp
                        <img src="{{ asset('assets/profile' . $randomNumber . '.jpg') }}" alt="profile"
                            style="width: 100%; height: 100%; object-fit: cover;">
                    @else
                        <img src="{{ asset('assets/profile_guest.png') }}" alt="profile"
                            style="width: 100%; height: 100%; object-fit: cover;">
                    @endauth
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
