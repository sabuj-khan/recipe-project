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
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm  modal-dialog-centered">
        <form id="deleteForm" class="modal-content">
            <div class="modal-body text-center">
                <input type="hidden" id="deleteId">
                <h2 class=" text-warning"><i class="fa-regular fa-circle-question"></i></h2>
                {{-- <h2 class=" text-warning">delete !</h2> --}}
                <p class=" text-muted">Are you sure! You want to delete this recipe.</p>
            </div>
            <div class="modal-footer">
                <button type="button" id="delete-modal-close" class="btn btn-danger" onclick="cleanDeleteForm()"
                    data-bs-dismiss="modal">Cancel</button>
                <button type="button" onclick="recipeDelete()" class="btn btn-warning">Confirm</button>
            </div>
        </form>
    </div>
</div>

<script>
    let deleteModalClose = document.getElementById('delete-modal-close');
    deleteModalClose.click();
    async function recipeDelete()
    {
        let deleteId = document.getElementById('deleteId').value;
        let response = await axios.get("/recipe-delete/"+deleteId);
        if (response.data.status === "success") {
            successNotification(response.data.msg)
            await getAuthorRecipe();
        }
    }
    function cleanDeleteForm()
    {
        let deleteForm = document.getElementById('deleteForm');
        deleteForm.reset();
    }
</script>
