<style>
    .pagination  .page-item.active>.page-link,
    .page-link.active {
        background-color: #FFCA2C;
        border-color: #cbcbcc;
        color: #fff;
    }
    .pagination  .page-item.disabled>.page-link,
    .page-link.disabled {
        background-color: #FFDB63;
        color: #8d8d8d;
    }

    .pagination .page-item .page-link {
        border-color: #FFDB63;
        color: #FFDB63;
    }
</style>
<section class="recent-recipe">
    <h2 class="text-center py-4">Receitas recentes</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3 rounded-start">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('assets/images/recent-recipe1.jpg') }}" style="height: 100%; width: 100%;" class="img-fluid rounded-md-start rounded-start-0 rounded-md-top-0 rounded-top"
                            alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Donut</h5>
                            <p class="card-text">Donuts caseiros irresistíveis com massa macia e coberturas deliciosas.
                            </p>
                            <div class="d-flex my-3">
                                <a href="#" class="btn btn-warning border-0">More Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('assets/images/recent-recipe2.jpg') }}" class="img-fluid rounded-start"
                            alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body" style="max-width: 540px;">
                            <h5 class="card-title">Cereal</h5>
                            <p class="card-text">Donuts caseiros irresistíveis com massa macia e coberturas deliciosas.
                            </p>
                            <div class="d-flex my-3">
                                <a href="#" class="btn btn-warning border-0">More Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('assets/images/recent-recipe3.jpg') }}" class="img-fluid rounded-start"
                            alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body" style="max-width: 540px;">
                            <h5 class="card-title">Cookies</h5>
                            <p class="card-text">Cookies caseiros irresistíveis com massa macia e pedaços generosos de
                                chocolate.</p>
                            <div class="d-flex my-3">
                                <a href="#" class="btn btn-warning border-0">More Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 d-flex justify-content-between">
            <div class=" text-muted pt-2">
                per page 5 show 1
            </div>
            <nav aria-label="...">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active" aria-current="page">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</section>
