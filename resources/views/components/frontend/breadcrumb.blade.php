<!-- Breadcrumb area -->
<section class="breadcrumb-area py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <h2 class="text-uppercase text-dark">@yield('title')</h2>
            <ol class="breadcrumb align-center ">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
            </ol>
        </nav>
    </div>
</section>