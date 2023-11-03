<style>
    .nav-item .dropdown .dropdown-menu .dropdown-item.active {
        background-color: #FFDB63;
        color: #fff;
    }
</style>
<header id="header">
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
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('recipe') ? 'active' : '' }} fw-bold"
                            href="{{ route('recipe') }}">Recipes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold  {{ Route::is('author') ? 'active' : '' }}"
                            href="{{ route('author') }}">Authors</a>
                    </li>
                    @if ($user)
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class=" bg-transparent border-0 my-1" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="{{ $user->profile_picture }}"
                                        class=" border border-1 border-warning rounded-circle"
                                        style="width: 30px; height: 30px;" alt="">
                                </button>
                                <ul class="dropdown-menu  dropdown-menu-end">
                                    <li><a class="dropdown-item {{ Route::is('account') ? 'active' : '' }}"
                                            href="{{ route('account') }}">Account</a></li>
                                    <li><a href="{{ route('author.recipes') }}"
                                            class="dropdown-item {{ Route::is('author.recipes') ? 'active' : '' }}">My
                                            Recipes</a></li>
                                    <li><button type="button"
                                            class="dropdown-item border border-bottom-0 border-end-0 border-start-0 border-top-1"
                                            onclick="logout()">Logout</button>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @else
                        <li class="nav-item ps-3">
                            <a class="nav-link fw-bold border border-1 rounded " href="{{ route('login') }}"><i
                                    class="fa-solid fa-user"></i> Login / Join</a>
                        </li>
                    @endif
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

<script>
    async function logout() {
        await axios.get('/logout');
        window.location.href = '/login';
    }
</script>
