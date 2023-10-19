<style>
    .author_img {
        padding: 2.5rem 3rem;
        border-radius: 100%;
    }

    @media only screen and (max-width: 1200px) {
        .author_img {
            padding: 2.5rem 2.5rem;
        }
    }

    @media only screen and (max-width: 992px) {
        .author_img {
            padding: 2rem 1rem;
        }
    }

    @media only screen and (max-width: 768px) {
        .author_img {
            padding: 1rem 10rem;
        }
    }

    @media only screen and (max-width: 576px) {
        .author_img {
            padding: 1rem 11rem;
        }
    }

    @media only screen and (max-width: 520px) {
        .author_img {
            padding: .5rem 9rem;
        }
    }

    @media only screen and (max-width: 475px) {
        .author_img {
            padding: 1.5rem 8rem;
        }
    }

    @media only screen and (max-width: 425px) {
        .author_img {
            padding: 1.5rem 7rem;
        }
    }

    @media only screen and (max-width: 375px) {
        .author_img {
            padding: 1.5rem 5rem;
        }
    }

    @media only screen and (max-width: 320px) {
        .author_img {
            padding: 1rem 3rem;
        }
    }

    .pagination .page-item.active>.page-link,
    .page-link.active {
        background-color: #FFCA2C;
        border-color: #cbcbcc;
        color: #fff;
    }

    .pagination .page-item.disabled>.page-link,
    .page-link.disabled {
        background-color: #FFDB63;
        color: #8d8d8d;
    }

    .pagination .page-item .page-link {
        border-color: #FFDB63;
        color: #FFDB63;
    }
</style>
<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-lg-5 col-md-6">
                        <img src="{{ asset('assets/frontend/images/author.jpg') }}" class="img-fluid author_img"
                            style="width: 100%; height: 40vh;" alt="...">
                    </div>
                    <div class="col-lg-7 col-md-6 d-flex align-items-center ps-3">
                        <div class="card-body text-md-start text-center">
                            <h5 class="card-title">Author Name</h5>
                            <p class="card-text"><small class="text-body-secondary">Recipes (10)</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-lg-5 col-md-6">
                        <img src="{{ asset('assets/frontend/images/author.jpg') }}" class="img-fluid author_img"
                            style="width: 100%; height: 40vh;" alt="...">
                    </div>
                    <div class="col-lg-7 col-md-6 d-flex align-items-center ps-3">
                        <div class="card-body text-md-start text-center">
                            <h5 class="card-title">Author Name</h5>
                            <p class="card-text"><small class="text-body-secondary">Recipes (10)</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-lg-5 col-md-6">
                        <img src="{{ asset('assets/frontend/images/author.jpg') }}" class="img-fluid author_img"
                            style="width: 100%; height: 40vh;" alt="...">
                    </div>
                    <div class="col-lg-7 col-md-6 d-flex align-items-center ps-3">
                        <div class="card-body text-md-start text-center">
                            <h5 class="card-title">Author Name</h5>
                            <p class="card-text"><small class="text-body-secondary">Recipes (10)</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 d-flex justify-content-between">
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
</div>
