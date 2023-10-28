<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Add New Recipe Type</h6>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-12 p-3">
                            <label class="form-label">Recipe Type</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal"
                    aria-label="Close">Close</button>
                <button id="save-btn" onclick="create()" class="btn btn-sm  btn-success">Save Changes</button>
            </div>
        </div>
    </div>
</div>


<script>
    async function create()
    {
        let modalClose = document.getElementById('modal-close');
        let name = document.getElementById('name').value;
        if (name.length === 0) {
            requiredNotification('Recipe Type Required!');
        }else{
            let response = await axios.post("/admin/recipe-type-store", {
                name: name
            });
            if (response.data.status === "success") {
                successNotification(response.data.msg);
                modalClose.click();
                await getList();
            }else{
                errorNotification(response.data.msg);
            }
        }
    }
</script>