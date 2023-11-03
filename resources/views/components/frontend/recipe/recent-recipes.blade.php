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
    var Url = window.location.href;
    var queryString = Url.split("?")[1];
    var params = new URLSearchParams(queryString);
    var recipeTypeId,
        authorId;

    if (params.has("recipe_type")) {
        var recipeType = params.get("recipe_type");
        recipeTypeId = recipeType;
    } else if (params.has("author")) {
        var Author = params.get("author");
        authorId = Author;
    } else {
        recipeTypeId = null;
        authorId = null;
        console.log("Parameter 'recipe_type' not found.");
    }
    async function getRecipe(url) {
        let recipe = $("#recipe");
        recipe.empty()
        loaderShow();
        let response = await axios.get(url);
        loaderHide();
        // console.log(response.data);
        if (response.data.recipes.length > 0) {

            response.data.recipes.forEach((item, index) => {
                let objectDate = new Date(item.created_at);
                let day = objectDate.getDate();
                let month = objectDate.toLocaleString('en-US', {
                    month: 'short'
                });
                let year = objectDate.getFullYear();

                function limitWordsWithEllipsis(inputString, wordLimit) {
                    var words = inputString.split(/\s+/);
                    if (words.length > wordLimit) {
                        var limitedWords = words.slice(0, wordLimit);
                        var limitedString = limitedWords.join(' ');
                        limitedString += '...';

                        return limitedString;
                    } else {
                        return inputString;
                    }
                }
                var originalString = item.short_des;
                var wordLimit = 5;
                var limitedString = limitWordsWithEllipsis(originalString, wordLimit);

                // console.log(limitedString);
                let row =
                    `<div class="col-md-11">
            <div class="card mb-3 borderleftRadius borderRightRadius">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ url('${item.image}') }}" style="height: 100%; width: 100%;"
                            class="img-fluid borderleftRadius borderRightRadius" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body ps-5">
                            <span class="h5 card-title">${item.recipe_name}</span><br>
                            <span class=" text-secondary fs-6 fw-normal">${item.author.userName} | ${day} ${month}, ${year} | commets(${item.comment.length})</span>`;
                row += `<div id="rateYo${item.id}" class="mt-2 rating"></div>`;
                getRating(item.id)
                row += `<p class="card-text pt-2">${limitedString}</p>
                            <div class="my-3">
                                <a href="/recipes-by-id/${item.id}"
                                    class="btn btn-warning btn-sm border-0 me-4 text-light rounded-5 px-3 py-2">More
                                    Details</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>`;
                recipe.append(row);

            });

        } else {
            let row = `<div class="col-md-11">
            <div class="card card-body text-center mb-3 borderleftRadius borderRightRadius">
                Recipe Not Found
            </div>
        </div>`;
            recipe.append(row);
        }
    }

    if (recipeTypeId !== null || authorId !== null) {
        if (recipeTypeId) {
            let url = "/get-recipe?recipe_type_id=" + recipeTypeId;
            getRecipe(url);
        } else {
            let url = "/get-recipe?author=" + authorId;
            getRecipe(url);
        }
    } else {
        let url = "/get-recipe";
        getRecipe(url);
    }

    async function getRating(recipe_id) {
        let rating = $(".rating");
        let ratingResponse = await axios.get("/rating-get/" + recipe_id);
        $(function() {
            $("#rateYo" + recipe_id).rateYo({
                spacing: "5px",
                starWidth: "15px",
                readOnly: true,
                rating: ratingResponse.data,
            });
        });
    }
</script>
