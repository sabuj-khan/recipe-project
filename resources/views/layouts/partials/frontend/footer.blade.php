<style>
    @media only screen and (max-width: 405px) {
        footer .logo
        {
            width: 250px;
        }
    }
    @media only screen and (max-width: 375px) {
        footer .logo
        {
            width: 200px;
        }
    }
</style>
<footer class="{{ Route::is('account') ? '' : 'mt-4' }}">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a class="" href="#"><img src="{{ asset('assets/frontend/images/logo.svg') }}" class="logo" alt=""
                        width="280"></a>
            </div>
            <div class="col-md-6 social-icon">
                <h3>Redes sociais:</h3>
                <a href="#" class="bg_danger">
                    <i class="fa-brands fa-youtube"></i>
                </a>
                <a href="#" class="bg_danger">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="#" class="bg_danger">
                    <i class="fa-brands fa-twitter"></i>
                </a>
                <a href="#" class="bg_danger">
                    <i class="fa-brands fa-pinterest-p"></i>
                </a>
            </div>
        </div>
    </div>
</footer>
