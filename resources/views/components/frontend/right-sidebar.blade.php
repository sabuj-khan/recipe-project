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
    @if (Route::is('recipe.by.id'))
        @if ($user->id != $recipe->user_id)
            <div class="card  mb-2" id="followBtnCard"></div>
        @endif
    @endif
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
        let resopnse = await axios.get("/get-recipe-type");
        loaderHide();
        // console.log(resopnse);
        resopnse.data.forEach((item, index) => {
            let row = `<li class=" list-unstyled">
                    <a href="/recipes?recipe_type=${item.id}" class=" text-decoration-none">&Rightarrow; ${item.name}</a>
                </li>`;
            RecipeTypeList.append(row);
        });
    }
    getSidebarRecipeType();
</script>
@if (Route::is('recipe.by.id'))
    
<script>
    async function checkFollow() {
        let followBtnCard = $("#followBtnCard");
        followBtnCard.empty();
        let user_id = @json($user->id);
        let author_id = @json($recipe->user_id);
        // alert(author_id)
        let response = await axios.get(`/check-follow?user_id=${user_id}&&author_id=${author_id}`);
        // console.log(response);
        if (response.data.follow_id === 0 || response.data === "") {
            let row = `<div class="card-body text-center">
            <button type="button" onclick="followThisAuthor(${user_id}, ${author_id})" class="btn btn-primary px-5 py-2 text-capitalize">follow</button>
        </div>`;
            followBtnCard.append(row);
        } else {
            let row = `<div class="card-body text-center">
                <button type="button"  onclick="followThisAuthor(${user_id}, ${author_id})"
                    class="btn border border-2 border-primary text-primary px-5 py-2 text-capitalize">unfollow</button>
        </div>`;
            followBtnCard.append(row);
        }
    }
    checkFollow();

    async function followThisAuthor(user_id, author_id) {
        let response = await axios.post("/follow-author", {
            user_id: user_id,
            author_id: author_id
        });
        if (response.data.status === "success") {
            await checkFollow();
        }
    }
</script>


@endif
