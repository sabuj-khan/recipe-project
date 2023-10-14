<header>
    <div id="seperator"></div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="{{ asset('assets/images/logo.svg') }}" alt="" width="250"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('home') ? 'active' : '' }} fw-bold" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('recipe') ? 'active' : '' }} fw-bold" href="{{ route('recipe') }}">Recipes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold  {{ Route::is('about') ? 'active' : '' }}" href="{{ route('about') }}">About us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
