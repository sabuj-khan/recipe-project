@if (Route::is('recipe.share'))
    <style>
        .recipe_share_sidebar_col {
            position: absolute;
            right: 0;
        }

        @media only screen and (max-width: 768px) {
            .recipe_share_sidebar_col {
                position: static;
                right: auto;
            }
        }
    </style>
@endif
<div class="col-md-3 recipe_share_sidebar_col mb-md-0 mb-4">
    <div class="card">
        <h3 class="fs-4 fw-bold text-capitalize card-header text-center">Recipe Type</h3>
        <div class="card-body">
            <ul id="RecipeTypeList"></ul>
        </div>
    </div>
</div>

<script>
    async function getSidebarRecipeType() {
        let RecipeTypeList = $("#RecipeTypeList");
        loaderShow();
        let resopnse = await axios.get("/admin/recipe-type-get");
        loaderHide();
        resopnse.data.forEach((item, index) => {
            let row = `<li class=" list-unstyled">
                    <a href="" class=" text-decoration-none">&Rightarrow; ${item.name}</a>
                </li>`;
            RecipeTypeList.append(row);
        });
    }
    getSidebarRecipeType();
</script>
