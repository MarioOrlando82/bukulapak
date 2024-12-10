<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Bukulapak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="
        https://cdn.jsdelivr.net/npm/flag-icon-css@4.1.7/css/flag-icons.min.css
        "
        rel="stylesheet">

    <link rel="icon" type="image/png" href="{{ asset('assets/bukulapak_logo.png') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>

<body>
    @include('components.navbar')
    @if (session('error'))
        @include('components.toaster', ['type' => 'error', 'message' => session('error')])
        {{-- <div class="alert alert-danger mt-3">{{ session('error') }}</div> --}}
    @endif
    @if (session('success'))
        @include('components.toaster', ['type' => 'success', 'message' => session('success')])
        {{-- <div class="alert alert-success mt-3">{{ session('success') }}</div> --}}
    @endif
    <main class="flex-grow-1 d-flex flex-column {{ request()->routeIs(['login', 'register']) ? '' : 'mt-5' }}">
        @yield('content')
    </main>
    @if (!request()->routeIs(['login', 'register']))
        @include('components.footer')
    @endif
    @yield('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/navbar.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toastElList = [].slice.call(document.querySelectorAll('.toast'));
            toastElList.forEach(function(toastEl) {
                const toast = new bootstrap.Toast(toastEl);
                toast.show();
            });
        });
    </script>

</body>

</html>
