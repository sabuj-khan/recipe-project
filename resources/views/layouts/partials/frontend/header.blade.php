<style>
    .dropdown .dropdown-menu .dropdown-item.active{
        background-color: #FFDB63;
        color: #fff;
    }
</style>
<header>
    <div id="seperator"></div>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="{{ asset('assets/frontend/images/logo.svg') }}" alt=""
                    width="250"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('home') ? 'active' : '' }} fw-bold" aria-current="page"
                            href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold  {{ Route::is('recipe.share') ? 'active' : '' }}"
                            href="{{ route('recipe.share') }}">Recipe Share</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link {{ Route::is('recipe') ? 'active' : '' }} fw-bold" href="{{ route('recipe') }}">Recipes</a>
                        {{-- <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item border border-top-0 border-bottom-1 {{ Route::is('recipe') ? 'active' : '' }}" href="">All</a></li>
                            <li><hr></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul> --}}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold  {{ Route::is('author') ? 'active' : '' }}"
                            href="{{ route('author') }}">Authors</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link fw-bold  {{ Route::is('about') ? 'active' : '' }}"
                            href="{{ route('about') }}">About us</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link fw-bold  {{ Route::is('account') ? 'active' : '' }}"
                            href="{{ route('account') }}">Account</a>
                    </li>
                </ul>
                <div class=" position-relative">
                    <div class="d-flex" style="">
                        <button type="button"
                            class=" rounded-start-5 bg-light border border-0 ps-3 pe-0 fs-6 text-secondary fw-semibold cursor"
                            style="cursor: auto;">
                            <i class="fa-solid fa-magnifying-glass text-secondary"></i>
                        </button>
                        <input type="text"
                            class=" border border-0 rounded-end-5 bg-light focus-ring text-muted py-1 ps-1"
                            placeholder="Search..." style="--bs-focus-ring-color: rgba(var(--bs-secondary-rgb), .0)">
                    </div>
                    <ul class="card card-body p-0 py-2 m-0 position-absolute mt-2 d-none">
                        <li class=" list-unstyled px-3"><a href=""
                                class="text-decoration-none text-muted">sdfsdf</a></li>
                        <li class=" list-unstyled px-3"><a href=""
                                class=" text-decoration-none text-muted">sdfsdfdfdfg</a></li>
                        <li class=" list-unstyled px-3"><a href=""
                                class=" text-decoration-none text-muted">Recipe Not Found</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
