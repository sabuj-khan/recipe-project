<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Add New User</h6>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-3">
                                <label class="form-label">Full Name *</label>
                                <input type="text" class="form-control" id="userName">

                                <label class="form-label">Position *</label>
                                <input type="text" class="form-control" id="userPosition">

                                <label class="form-label">Office Address *</label>
                                <input type="text" class="form-control" id="userOffice">

                                <label class="form-label">Age *</label>
                                <input type="text" class="form-control" id="userAge">

                                <label class="form-label">Start Date *</label>
                                <input type="date" class="form-control" id="userStartDate">
                                
                                <label class="form-label">Salary *</label>
                                <input type="text" class="form-control" id="userSalary">

                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button id="save-btn" class="btn btn-sm  btn-success" >Add User</button>
                </div>
            </div>
    </div>
</div>
