<!-- Vertically centered modal -->
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Reply</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="replyForm" class="row">
                    <input type="text" id="p_id">
                    <input type="text" id="recipeId">
                    <div class="col-md-12">
                        <input type="text" id="replyName" class=" form-control mb-2" placeholder=" Enter your name">
                        <textarea id="replyComment" rows="4" class=" form-control" placeholder="Comments"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-warning" onclick="commentReply()" data-bs-target="#exampleModalToggle2"
                    data-bs-toggle="modal">Reply</button>
            </div>
        </div>
    </div>
</div>

<script>
    function Edit(recipe_id)
    {
        let recipeId = document.getElementById("recipeId").value = recipe_id; 
    }
    async function commentReply()
    {
        let replyForm = document.getElementById('replyForm'),
        p_id = document.getElementById('p_id').value,
        recipe_id = document.getElementById('recipeId').value,
        name = document.getElementById('replyName').value,
        comment = document.getElementById('replyComment').value;
        if (p_id.length === 0) {
            requiredNotification("Please Try Again!");
        }else if (recipe_id.length === 0) {
            requiredNotification("Please Try Again!");
        }else if (name.length === 0) {
            requiredNotification("Enter Your Name!");
        }else if (comment.length === 0) {
            requiredNotification("Enter Your Msg!");
        }else{
            let response = await axios.post("/comment-reply", {
                p_id: p_id,
                recipe_id: recipe_id,
                name: name,
                comment_text: comment
            });
            if(response.data.status === "success"){
                replyForm.reset();
                await getComment();
            }
        }
    }
</script>