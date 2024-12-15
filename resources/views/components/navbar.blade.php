<div
    class="py-2 col-12 px-3 z-3 w-100 position-fixed top-0 start-0 {{ request()->routeIs(['login', 'register']) ? 'bg-transparent' : 'bg-warning' }}">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <a href="/" class="fs-6 m-0 text-decoration-none text-dark">
                <img src="{{ asset('assets/bukulapak_home.png') }}" alt="Home" class="bukulapak-logo img-fluid">
            </a>
        </div>

        <div class="d-flex align-items-center">
            @include('components.locale.localization')

            <div class="text-nowrap welcome">
                @auth
                    <p class="text-white text-center mb-0 fw-semibold">@lang('component.welcome_user') {{ Auth::user()->name }}!</p>
                @else
                    <p class="text-white text-center mb-0 fw-semibold">@lang('component.welcome_guest')</p>
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
                                <span class="fw-semibold">@lang('component.span_adminPanel')</span>
                            </a>
                        @endif

                        <a href="{{ route('my-books.index') }}" class="dropdown-item">
                            <span class="fw-semibold">@lang('component.span_myBooks')</span>
                        </a>

                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="dropdown-item fw-semibold">@lang('component.span_logout')</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="dropdown-item">
                            <span class="fw-semibold">@lang('component.span_signin')</span>
                        </a>
                    @endauth
                </ul>
            </div>
        </div>

    </div>
</div>
