<div class="modal" id="edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Recipe Type</h5>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-12 p-3">
                            <input type="hidden" id="idEdit">
                            <label class="form-label">Recipe Type</label>
                            <input type="text" class="form-control" id="nameEdit">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal"
                    aria-label="Close">Close</button>
                <button id="update-btn" onclick="update()" class="btn btn-sm  btn-success">Update</button>
            </div>
        </div>
    </div>
</div>

<script>
    function getEditData(name) 
    {
        document.getElementById('nameEdit').value = name;
    }
    async function update()
    {
        let updateModalClose = document.getElementById('update-modal-close'),
        id = document.getElementById('idEdit').value,
        name = document.getElementById('nameEdit').value;
        if (id.length === 0) {
            requiredNotification('Please Try Again!');
        }else if (name.length === 0) {
            requiredNotification('Recipe Type Required!');
        }else{
            let response = await axios.post("/admin/recipe-type-update/"+id, {
                name: name
            });
            if (response.data.status === "success") {
                successNotification(response.data.msg);
                updateModalClose.click();
                await getList();
            }else{
                errorNotification(response.data.msg);
            }
        }
    }
</script>
