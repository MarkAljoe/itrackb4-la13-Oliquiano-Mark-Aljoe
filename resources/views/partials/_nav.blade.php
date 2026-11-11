<nav class="navbar navbar-expand-lg navbar-dark bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="{{ route('home') }}">🎬 My Movies</a>

        <button class="navbar-toggler border-white" type="button"
                data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                       href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('movies.*') ? 'active' : '' }}"
                       href="{{ route('movies.index') }}">Movies</a>
                </li>
            </ul>
        </div>
    </div>
</nav>