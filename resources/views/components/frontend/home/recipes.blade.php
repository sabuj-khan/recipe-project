<section class="recipes">
    <div class="container py-4">
        <h2 class="text-center py-4">Receitas mais procuradas</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4" id="recentRecipe">
            
        </div>
    </div>
</section>

{{-- <p class="card-text">Receita bacana pra comer com os amigos de manhã.</p> --}}
<script>
    getRecipe()
    async function getRecipe()
    {
        let recentRecipe = $("#recentRecipe");
        loaderShow();
        let response = await axios.get("/get-recipe-in-home");
        loaderHide();
        response.data.forEach((item, index) => {
            let row = `<div class="col">
                <div class="card h-100 shadow rounded-3 border-0">
                    <img src="{{ url('${item.image}') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">${item.recipe_name}</h5>
                    </div>
                    <div class="d-flex justify-content-center my-3">
                        <a href="#" class="btn btn-warning border-0">More Details</a>
                    </div>
                </div>
            </div>`;
            recentRecipe.append(row);
        });
    }
</script>
