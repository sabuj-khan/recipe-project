<div class="modal" id="delete-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <input type="hidden" id="id">
                <h3 class=" mt-3 text-warning">Delete !</h3>
                <p class="mb-3">Once delete, you can't get it back.</p>
            </div>
            <div class="modal-footer justify-content-end">
                <div>
                    <button type="button" id="delete-modal-close" class="btn shadow-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" onclick="Delete()" id="confirmDelete" class="btn shadow-sm btn-danger" >Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    async function Delete()
    {
        let id = document.getElementById('id').value;
        let deleteModalClose = document.getElementById('delete-modal-close');
        let response = await axios.get("/admin/user-delete/"+id);
        if(response.data.status === "success"){
            deleteModalClose.click();
            await getList();
        }
    }
</script>