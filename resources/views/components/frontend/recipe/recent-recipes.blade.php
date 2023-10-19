<style>
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

    .borderleftRadius {
        border-top-left-radius: 50px;
        border-bottom-left-radius: 50px;
    }

    .borderRightRadius {
        border-top-right-radius: 50px;
        border-bottom-right-radius: 50px;
    }

</style>
<section class="recent-recipe col-md-9">
    {{-- <h2 class="text-center pb-4">Receitas recentes</h2> --}}
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card mb-3 borderleftRadius borderRightRadius">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('assets/frontend/images/recent-recipe1.jpg') }}" style="height: 100%; width: 100%;"
                            class="img-fluid borderleftRadius borderRightRadius" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <span class="h5 card-title">Donut</span><br>
                            <span class=" text-secondary fs-6 fw-normal">author name | 17 may, 2023 | commets(3)</span>
                            <div id="rateYo" class="mt-2"></div>
                            <p class="card-text pt-2">Donuts caseiros irresistíveis com massa macia e coberturas
                                deliciosas.
                            </p>
                            <div class="my-3">
                                <a href="#"
                                    class="btn btn-warning btn-sm border-0 me-4 text-light rounded-5 px-3 py-2">More
                                    Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-11">
            <div class="card mb-3 borderleftRadius borderRightRadius">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('assets/frontend/images/recent-recipe2.jpg') }}" style="height: 100%; width: 100%;"
                            class="img-fluid borderleftRadius borderRightRadius" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <span class="h5 card-title">Cereal</span><br>
                            <span class=" text-secondary fs-6 fw-normal">author name | 17 may, 2023 | commets(3)</span>
                            <div id="rateYo" class="mt-2"></div>
                            <p class="card-text">Donuts caseiros irresistíveis com massa macia e coberturas deliciosas.
                            </p>
                            <div class="my-3">
                                <a href="#"
                                    class="btn btn-warning btn-sm border-0 me-4 text-light rounded-5 px-3 py-2">More
                                    Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-11">
            <div class="card mb-3 borderleftRadius borderRightRadius">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('assets/frontend/images/recent-recipe3.jpg') }}" style="height: 100%; width: 100%;"
                            class="img-fluid borderleftRadius borderRightRadius" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <span class="h5 card-title">Cookies</span><br>
                            <span class=" text-secondary fs-6 fw-normal">author name | 17 may, 2023 | commets(3)</span>
                            <div id="rateYo" class="mt-2"></div>
                            <p class="card-text">Cookies caseiros irresistíveis com massa macia e pedaços generosos de
                                chocolate.</p>
                            <div class="my-3">
                                <a href="#"
                                    class="btn btn-warning btn-sm border-0 me-4 text-light rounded-5 px-3 py-2">More
                                    Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-11 d-flex justify-content-between">
            <div class=" text-muted pt-2">
                per page 5 page 1 total page 10
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
</section>

<script>
    $(function() {

        $("#rateYo").rateYo({
            spacing: "5px",
            starWidth: "15px",
            readOnly: true,
            rating: 3.2,
            // onChange: function(rating, rateYoInstance) {
            //     $(this).next().text(rating);
            // },
        });

    });
</script>
