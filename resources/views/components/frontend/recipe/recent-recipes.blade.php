<style>
    .pagination
    {
        padding: 0 5rem 0 0;
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
        <div id="recipe">

        </div>
        <div class="col-md-11 d-flex justify-content-between pagination pt-3 pb-5">
            <div id="PreviousItem" class="page-item">
                <button type="button" class="page-link px-5 py-2 Previous">Previous</button>
            </div>

            <div id="NextItem" class="page-item">
                <button type="button" data-url="" class="page-link px-5 py-2 nextPage" href="#">Next</button>
            </div>
        </div>
</section>

<script>
    async function getRecipe(url) {
        let recipe = $("#recipe");
        recipe.empty()
        loaderShow();
        let response = await axios.get(url);
        loaderHide();
        console.log(response.data);
        response.data.data.forEach((item, index) => {
            let objectDate = new Date(item.created_at);
            let day = objectDate.getDate();
            let month = objectDate.toLocaleString('en-US', {
                month: 'short'
            });
            let year = objectDate.getFullYear();

            let row = `<div class="col-md-11">
            <div class="card mb-3 borderleftRadius borderRightRadius">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ url('${item.image}') }}" style="height: 100%; width: 100%;"
                            class="img-fluid borderleftRadius borderRightRadius" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body ps-5">
                            <span class="h5 card-title">${item.recipe_name}</span><br>
                            <span class=" text-secondary fs-6 fw-normal">${item.author.userName} | ${day} ${month}, ${year} | commets(3)</span>
                            <div id="rateYo${item.id}" class="mt-2"></div>
                            <p class="card-text pt-2">${item.cooking_instructions}</p>
                            <div class="my-3">
                                <a href="#"
                                    class="btn btn-warning btn-sm border-0 me-4 text-light rounded-5 px-3 py-2">More
                                    Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>`;
            recipe.append(row);
            $(function() {

                $("#rateYo" + item.id).rateYo({
                    spacing: "5px",
                    starWidth: "15px",
                    readOnly: true,
                    rating: 3.2,
                });
            });
        });
        let nextPage = $(".nextPage");
        let Previous = $(".Previous");
        // nextPage.attr("data-url", response.data.next_page_url)
        if (response.data.next_page_url === null) {
            $("#NextItem").addClass("disabled");
        }else
        {
            $("#NextItem").removeClass("disabled");
            nextPage.attr("data-url", response.data.next_page_url)
        }
        
        if (response.data.prev_page_url === null) {
            $("#PreviousItem").addClass("disabled");
        }else
        {
            $("#PreviousItem").removeClass("disabled");
            Previous.attr("data-url", response.data.prev_page_url)
        }
    }
    let url = "/get-recipe";
    getRecipe(url);

    $(document).ready(function(){
        $(".nextPage").on("click", async function(){
            let url = $(this).data("url");
            await getRecipe(url);
        });
        $(".Previous").on("click", async function(){
            let url = $(this).data("url");
            await getRecipe(url);
        });
    });
</script>
