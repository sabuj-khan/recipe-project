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
    <div class="row">
        <div class="col-md-7">
            <img src="{{ url($recipe->image) }}" style="width: 100%;" class="rounded-3" alt="{{ $recipe->recipe_name }}">
        </div>
        <div class="col-md-5">
            <h2 class=" text-uppercase text-warning">{{ $recipe->recipe_name }}</h2>
            <div id="rateYo" data-recipe-id="{{ $recipe->id }}" class="my-2"></div>
            <h5 class=" text-muted fs-5 fw-semibold">Author: {{ $recipe->user->fullName }}</h5>
            <h6 class=" text-muted">Recipe type: {{ $recipe->recipe_type->name }}</h6>
            <p class=" text-secondary fs-6 fw-normal text-capitalize">preparation time: {{ $recipe->prep_time }}</p>
            <p class=" text-secondary fs-6 fw-normal text-capitalize">cooking time: {{ $recipe->cooking_time }}</p>
            <p class=" text-secondary fs-6 fw-normal text-capitalize">difficulty level: {{ $recipe->difficulty_level }}
            </p>
            <p class=" text-secondary fs-6 fw-normal text-capitalize">cuisine type: {{ $recipe->cuisine_type }}</p>
            <p class=" text-secondary fs-6 fw-normal text-capitalize">dietary preferences:
                {{ $recipe->dietary_preferences }}</p>
        </div>
        <div class="col-md-12 py-2 px-3">
            <h3 class="text-muted"><b>Cooking instructions</b></h3>
            <p class=" text-secondary">{!! $recipe->cooking_instructions !!}</p>
            <h3 class="text-muted"><b>Ingradients</b></h3>
            <p class=" text-secondary">{!! $recipe->ingredients !!}</p>
        </div>
    </div>
</section>

<script>
    $(function() {
        let rateYo = $("#rateYo");

        rateYo.rateYo({
            spacing: "10px",
            starWidth: "20px",
            readOnly: false,
            rating: 0,
        });

        rateYo.on("click", async function() {
            var ratingValue = rateYo.rateYo("rating");
            var recipe_id = $(this).data("recipe-id");
            let response = await axios.post("/rating-request", {
                recipe_id: recipe_id,
                rating: ratingValue,
            });
            console.log(response);
        });
    });
</script>
