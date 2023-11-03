<style>
    .pagination {
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
    <div class="row justify-content-center">
        <div id="recipe">
            
        </div>
    </div>
</section>

<script>
    async function getAuthorRecipe()
    {
        let recipe = $("#recipe");
        recipe.empty();
        loaderShow();
        let response = await axios.get("/author-recipes-get");
        console.log(response);
        loaderHide();
        recipe.html(response.data);
    }
    getAuthorRecipe()
</script>
