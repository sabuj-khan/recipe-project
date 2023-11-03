@foreach ($recipes as $recipe)
    <div class="col-md-11" data-recipe-id="{{ $recipe->id }}" data-recipe-rating="{{ $recipe->recipeRating->count() }}">
        <div class="card mb-3 borderleftRadius borderRightRadius">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ url($recipe->image) }}" style="height: 100%; width: 100%;"
                        class="img-fluid borderleftRadius borderRightRadius" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body ps-5">
                        <span class="h5 card-title">{{ $recipe->recipe_name }}</span><br>
                        @php
                            $recipe_id = $recipe->id;
                            $comments = \App\Models\Comment::where('recipe_id', $recipe_id)
                                ->where('p_id', 0)
                                ->get();
                        @endphp
                        <span class=" text-secondary fs-6 fw-normal">{{ $recipe->author->fullName }} |
                            {{ date('d F, Y', strtotime($recipe->created_at)) }} |
                            commets({{ $comments->count() }})</span>
                        <div id="rateYo{{ $recipe->id }}" class="mt-2 rating"></div>
                        <p class="card-text pt-2">{{ Str::words($recipe->short_des, '5') }}</p>
                        <div class="my-3">
                            <div class="dropdown">
                                <button class="btn " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action <span style="font-size: 14px;" class=" text-dark">&#11206;</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><button type="button" class="dropdown-item text-primary"
                                            onclick="Edit({{ $recipe->id }})" data-bs-toggle="modal"
                                            data-bs-target="#edit">edit</button></li>
                                    <li><button type="button" class="dropdown-item text-danger"
                                            onclick="Delete({{ $recipe->id }})" data-bs-toggle="modal"
                                            data-bs-target="#delete">Delete</button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(".col-md-11").each(function() {
                var recipeId = $(this).data("recipe-id");
                var rating = $(this).data("recipe-rating");

                $("#rateYo" + recipeId).rateYo({
                    spacing: "5px",
                    starWidth: "15px",
                    readOnly: true,
                    rating: rating,
                });
            });
        });

        async function Edit(id) {
            $('#id').val(id);
            let resopnse = await axios.get("/author-recipe-edit/" + id);
            console.log(resopnse.data.short_des);
            getRecipeInfo(resopnse.data.recipe_name, resopnse.data.recipe_type_id, resopnse.data.prep_time, resopnse
                .data.cooking_time, resopnse.data.cuisine_type, resopnse.data.image, resopnse.data
                .cooking_instructions, resopnse.data.ingredients, resopnse.data.difficulty_level, resopnse.data
                .dietary_preferences, resopnse.data.short_des)
        }

        function Delete(id) {
            $("#deleteId").val(id)
        }
    </script>
@endforeach
