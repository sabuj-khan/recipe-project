<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <!-- Favicon Icon -->
    @if (!request()->is('admin*'))
        <title>Recipe Sharing Platform - @yield('title')</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/frontend/images/favicon.png') }}">
        <!-- Latest Bootstrap min CSS -->
        <link href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Option 1: Include in HTML -->
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"> --}}
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/jquery.rateyo.min.css') }}">
        <!-- Google Font -->
        <link
            href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
            rel="stylesheet">
        <!-- FontAwesome CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
            integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Custom styles for this template -->
        <link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet">

        <script src="{{ asset('assets/frontend/js/jquery-3.7.1.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    @else
        <title>Admin Panel - @yield('title')</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/backend/img/logo.svg') }}">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{ asset('assets/backend/css/styles.css') }}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    @endif

</head>

@if (!request()->is('admin*'))
    <body>
@else
    <body class="sb-nav-fixed">
@endif


{{-- header start --}}
@if (!Route::is('login') && !Route::is('forget.password') && !Route::is('reset.password') && !request()->is('admin*'))
    @include('layouts.partials.frontend.header')
@endif

@if (request()->is('admin*'))
    @include('layouts.partials.backend.navbar')
@endif
{{-- header end --}}

{{-- main content --}}
@if (!request()->is('admin*'))
    @yield('content')
@else
    <div id="layoutSidenav">
        @include('layouts.partials.backend.sidebar')
        <div id="layoutSidenav_content">
            @yield('content')
            @include('layouts.partials.backend.footer')
        </div>
    </div>
@endif
{{-- main content --}}

{{-- footer start --}}

@if (!Route::is('login') && !Route::is('forget.password') && !Route::is('reset.password') && !request()->is('admin*'))
    @include('layouts.partials.frontend.footer')
@endif
{{-- footer end --}}

@if (!request()->is('admin*'))
    <script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.rateyo.min.js') }}"></script>
@else
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/backend/js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/backend/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/backend/js/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/backend/js/datatables-simple-demo.js') }}"></script>
@endif
</body>

</html>
