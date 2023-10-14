<!-- Breadcrumb area -->
<section class="breadcrumb-area py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <h2 class="text-uppercase text-dark">Login</h2>
            <ol class="breadcrumb align-center ">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Login</li>
            </ol>
        </nav>
    </div>
</section>

<section class="my-form">
    <form class="form-signin">
        <h3 class="h3 mb-3 font-weight-normal text-center">Login</h3>
        <input type="email" id="inputEmail" class="form-control mb-2" placeholder="Email address" required autofocus>
        <input type="password" id="inputPassword" class="form-control mb-2" placeholder="Password" required>
        <input type="submit" value="Sign In" name="signin" class="btn btn-primary">
    </form>
</section>
