@props(['nama', 'username'])

<nav class="navbar">

    <div class="navbar-logo">
        <a href="{{ url('/dashboard') }}?nama={{ urlencode($nama) }}&username={{ urlencode($username) }}">
            PeaKeep
        </a>
    </div>

    <!-- Tombol Hamburger -->
    <button
        type="button"
        class="navbar-toggle"
        id="navbar-toggle"
        aria-label="Buka menu navigasi"
        aria-expanded="false"
        aria-controls="navbar-menu"
    >
        <span></span>
        <span></span>
        <span></span>
    </button>

    <!-- Menu Navigasi -->
    <div class="navbar-menu" id="navbar-menu">

        <a href="{{ url('/dashboard') }}?nama={{ urlencode($nama) }}&username={{ urlencode($username) }}">
            Beranda
        </a>

        <a href="{{ url('/pengelolaan') }}?nama={{ urlencode($nama) }}&username={{ urlencode($username) }}">
            My Pantry
        </a>

        <a href="{{ url('/profile') }}?nama={{ urlencode($nama) }}&username={{ urlencode($username) }}">
            Profil
        </a>

    </div>

</nav>