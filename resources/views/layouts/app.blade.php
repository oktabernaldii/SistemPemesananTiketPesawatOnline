<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Travel App</title>

    <!-- CSS UTAMA -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@400;500&display=swap"
        rel="stylesheet">

    <!-- FLATPICKR -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body>

    <!-- ================= NAVBAR ================= -->
    <header class="navbar">
        <!-- BRAND -->
        <div class="brand">
            <span class="plane">✈️</span>
            <a href="{{ route('dashboard.index') }}" class="logo-text">
                TravelOkta
            </a>
        </div>

        <!-- AUTH AREA -->
        @guest
            <div class="nav-user">
                <a href="{{ url('login') }}" class="nav-btn login">
                    Login
                </a>
                <a href="{{ url('register') }}" class="nav-btn register">
                    Register
                </a>
            </div>
        @endguest

        @auth
            <div class="nav-user">
                <span class="user-badge">
                    {{ Auth::user()->name }}
                </span>

                <form method="POST" action="{{ url('logout') }}">
                    @csrf
                    <button type="submit" class="nav-btn logout">
                        Logout
                    </button>
                </form>
            </div>
        @endauth
    </header>
    <!-- =============== END NAVBAR =============== -->


    <!-- =============== GLOBAL CONTENT WRAPPER =============== -->
    <main class="app-content">
        @yield('content')
    </main>
    <!-- ============= END CONTENT WRAPPER ============= -->


    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('scripts')

    <!-- SWEETALERT DELETE -->
    <script>
        document.querySelectorAll('.btn-delete').forEach(btn => {
            btn.addEventListener('click', function () {
                const form = this.closest('.delete-form');

                Swal.fire({
                    title: 'Hapus Penerbangan?',
                    text: 'Data ini tidak bisa dikembalikan.',
                    icon: 'warning',
                    background: '#0f172a',
                    color: '#ffffff',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus',
                    cancelButtonText: 'Batal',
                    reverseButtons: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>

</body>

</html>