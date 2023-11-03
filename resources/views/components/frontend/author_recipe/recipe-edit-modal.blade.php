<style>
    .select-box {
        border: 1px solid #ccc;
        height: 40vh;
        font-size: 30px;
        font-weight: 600;
        cursor: pointer;
    }

    .select-box span {
        cursor: pointer;
    }

    @media only screen and (max-width: 576px) {
        .select-box {
            font-size: 15px;
        }
    }

    @media only screen and (max-width: 340px) {
        .select-box {
            font-size: 13px;
        }
    }

    video {
        border: 1px solid black;
        display: block;
        width: 100%;
        height: 35vh;
        /* position: absolute; */
    }

    .select_video {
        width: 100%;
        height: 35vh;
        border: 1px solid #ccc;
        cursor: pointer;
        position: relative;
    }

    .select_video span {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    #changeBtn span {
        cursor: pointer;
    }
</style>
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form id="updateForm" class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Recipe Update</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" id="id">
                        <div class="px-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class=" d-sm-flex">
                                        <label for=""
                                            class="mb-sm-0 mb-1 d-sm-flex align-items-center text-muted"
                                            style="width: 200px;">Recipe
                                            Name</label>
                                        <input type="text" id="recipe_name" class=" form-control  focus-ring"
                                            style="--bs-focus-ring-color: rgba(var(--bs-warning-rgb), .25)">
                                    </div>
                                    <div class=" d-sm-flex mt-3">
                                        <label for=""
                                            class="mb-sm-0 mb-1 d-sm-flex align-items-center text-muted"
                                            style="width: 200px;">Recipe
                                            Type</label>
                                        <select id="recipe_type_id" class=" form-control focus-ring"
                                            style="--bs-focus-ring-color: rgba(var(--bs-warning-rgb), .25)">
                                            <option value="">(Select)</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class=" col-md-6 mt-3">
                                            <label for="prep_time"
                                                class="mb-sm-0 mb-1 d-sm-flex align-items-center text-muted"
                                                style="width: 200px;">Preparation Time</label>
                                            <input type="text" id="prep_time" class=" form-control  focus-ring"
                                                style="--bs-focus-ring-color: rgba(var(--bs-warning-rgb), .25)">
                                        </div>
                                        <div class=" col-md-6 mt-3">
                                            <label for="cooking_time"
                                                class="mb-sm-0 mb-1 d-sm-flex align-items-center text-muted"
                                                style="width: 200px;">Cooking
                                                Time</label>
                                            <input type="text" id="cooking_time" class=" form-control  focus-ring"
                                                style="--bs-focus-ring-color: rgba(var(--bs-warning-rgb), .25)">
                                        </div>
                                    </div>

                                    <div class=" d-sm-flex mt-sm-3 mt-0">
                                        <label for="cuisine_type"
                                            class="mb-sm-0 mb-1 d-sm-flex align-items-center text-muted"
                                            style="width: 200px;">Cuisine
                                            Type</label>
                                        <input type="text" id="cuisine_type" class=" form-control  focus-ring"
                                            style="--bs-focus-ring-color: rgba(var(--bs-warning-rgb), .25)">
                                    </div>
                                </div>

                                <div class="col-md-6 pt-sm-0 pt-4">
                                    <div class="select-box position-relative" onclick="selctImage()">
                                        <div class=" text-secondary position-absolute top-50 start-50 translate-middle">
                                            <span class="fs-5">Select Recipe Image</span>
                                        </div>
                                        <img src="{{ asset('assets/images/author.jpg') }}" id="imageShow"
                                            class="d-none position-absolute top-50 start-50 translate-middle"
                                            style="width: 100%; height: 100%;" alt="">
                                    </div>
                                    <input type="file" id="image" onchange="imageUpload(event)" class="d-none">
                                </div>

                                <div class="col-md-12  pt-sm-3 pt-4">
                                    {{-- <label for="cooking_instructions" class="mb-2 text-muted">Cooking Instructions</label> --}}
                                    <textarea type="text" id="cooking_instructions" class="form-control focus-ring"
                                        style="--bs-focus-ring-color: rgba(var(--bs-warning-rgb), .25)" placeholder="Cooking Instructions..."></textarea>
                                </div>
                                <div class="col-md-12 pt-sm-3 pt-4">
                                    <textarea type="text" id="ingredients" class="form-control focus-ring"
                                        style="--bs-focus-ring-color: rgba(var(--bs-warning-rgb), .25)" placeholder="Ingredients..."></textarea>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <div class=" d-sm-flex mt-3">
                                        <label for="difficulty_level" class="mb-sm-0 mb-1 d-sm-flex align-items-center text-muted"
                                            style="width: 200px;">Difficulty Level</label>
                                        <input type="text" id="difficulty_level" class=" form-control  focus-ring"
                                            style="--bs-focus-ring-color: rgba(var(--bs-warning-rgb), .25)">
                                    </div>
                                    <div class=" d-sm-flex mt-sm-3 mt-0">
                                        <label for="dietary_preferences" class="mb-sm-0 mb-1 d-sm-flex align-items-center text-muted"
                                            style="width: 200px;">Dietary Preferences</label>
                                        <input type="text" id="dietary_preferences" class=" form-control  focus-ring"
                                            style="--bs-focus-ring-color: rgba(var(--bs-warning-rgb), .25)">
                                    </div>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <div class=" d-sm-flex mt-sm-3 mt-0">
                                        <textarea id="short_des" class=" form-control" rows="4" placeholder="Short deescription..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" id="modal_close" class="btn btn-danger" onclick="cleanForm()"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" onclick="update()" class="btn btn-warning">Update</button>
            </div>
        </form>
    </div>
</div>

<script>
    let recipe_form = document.getElementById("updateForm");
    recipe_form.reset();

    tinymce.init({
        selector: '#cooking_instructions',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        height: 400,
    });
    tinymce.init({
        selector: '#ingredients',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        height: 400,
    });

    async function getRecipeInfo(recipe_name, recipe_type_id, prep_time, cooking_time, cuisine_type, image,
        cooking_instructions, ingredients, difficulty_level, dietary_preferences, short_des) {
        let recipeType = $("#recipe_type_id");
        let resopnse = await axios.get("/get-recipe-type");
        resopnse.data.forEach((item, index) => {
            let row =
                `<option ${recipe_type_id === item.id ? 'selected' : ''} value="${item.id}">${item.name}</option>`;
            recipeType.append(row);
        });
        document.getElementById("recipe_name").value = recipe_name,
            document.getElementById("prep_time").value = prep_time,
            document.getElementById("cooking_time").value = cooking_time,
            document.getElementById("cuisine_type").value = cuisine_type,
            document.getElementById("difficulty_level").value = difficulty_level,
            document.getElementById("dietary_preferences").value = dietary_preferences,
            document.getElementById("short_des").value = short_des;
        let imageShow = document.getElementById("imageShow");
        imageShow.classList.remove("d-none");
        imageShow.src = image;
        tinymce.get('cooking_instructions').setContent(cooking_instructions, {
            format: 'raw'
        });
        tinymce.get('ingredients').setContent(ingredients, {
            format: 'raw'
        });

    }

    function selctImage() {
        let image = document.getElementById("image");
        image.click();
    }

    function imageUpload(event) {
        let imageShow = document.getElementById("imageShow");
        let Image = event.target.files[0];
        imageShow.classList.remove("d-none");
        imageShow.src = URL.createObjectURL(Image);
    }

    function cleanForm() {
        let recipe_form = document.getElementById("updateForm");
        recipe_form.reset();
    }
    async function update() {
        let imageShow = document.getElementById("imageShow");
        let recipe_form = document.getElementById("updateForm");
        let modal_close = document.getElementById("modal_close");
        let id = document.getElementById("id").value,
            recipe_name = document.getElementById("recipe_name").value,
            recipe_type_id = document.getElementById("recipe_type_id").value,
            prep_time = document.getElementById("prep_time").value,
            cooking_time = document.getElementById("cooking_time").value,
            image = document.getElementById("image").files[0],
            cuisine_type = document.getElementById("cuisine_type").value,
            editorCookingInstructions = tinymce.get("cooking_instructions"),
            cooking_instructions = editorCookingInstructions.getContent(),
            editorIngredients = tinymce.get("ingredients"),
            ingredients = editorIngredients.getContent(),
            difficulty_level = document.getElementById("difficulty_level").value,
            dietary_preferences = document.getElementById("dietary_preferences").value,
            short_des = document.getElementById("short_des").value;

        if (id.length === 0) {
            requiredNotification("Please Again Try!");
        } else if (recipe_name.length === 0) {
            requiredNotification("Recipe Name Required!");
        } else if (recipe_type_id.length === 0) {
            requiredNotification("Recipe Type Required!");
        } else if (prep_time.length === 0) {
            requiredNotification("Preperation Time Required!");
        } else if (cooking_time.length === 0) {
            requiredNotification("Cooking Time Required!");
        } else if (cuisine_type.length === 0) {
            requiredNotification("Cuisine Type Required!");
        } else if (cooking_instructions.trim() === "") {
            requiredNotification("Cooking Instructions Required!");
        } else if (ingredients.trim() === "") {
            requiredNotification("Ingredients Required!");
        } else if (difficulty_level.length === 0) {
            requiredNotification("Difficulty Level Required!");
        } else if (dietary_preferences.length === 0) {
            requiredNotification("Dietary Preferences Required!");
        } else if (short_des.length === 0) {
            requiredNotification("Short Description Required!");
        } else {
            let formData = new FormData();
            formData.append("recipe_name", recipe_name);
            formData.append("recipe_type_id", recipe_type_id);
            formData.append("prep_time", prep_time);
            formData.append("cooking_time", cooking_time);
            formData.append("cuisine_type", cuisine_type);
            formData.append("image", image);
            formData.append("cooking_instructions", cooking_instructions);
            formData.append("ingredients", ingredients);
            formData.append("difficulty_level", difficulty_level);
            formData.append("dietary_preferences", dietary_preferences);
            formData.append("short_des", short_des);
            let response = await axios.post("/recipe-update/" + id, formData);
            console.log(response);
            if (response.data.status === "success") {
                successNotification(response.data.msg);
                recipe_form.reset();
                imageShow.src = "";
                imageShow.classList.add("d-none");
                modal_close.click();
                await getAuthorRecipe();
            } else {
                errorNotification(response.data.msg);
            }
        }
    }
</script>
