<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Full Name *</label>
                                <input type="text" class="form-control" id="userNameUpdate">

                                <label class="form-label">Position *</label>
                                <input type="text" class="form-control" id="userPositionUpdate">

                                <label class="form-label">Office Address *</label>
                                <input type="text" class="form-control" id="userOfficeUpdate">

                                <label class="form-label">Age *</label>
                                <input type="text" class="form-control" id="userAgeUpdate">

                                <label class="form-label">Start Date *</label>
                                <input type="date" class="form-control" id="userStartDateUpdate">

                                <label class="form-label">Salary *</label>
                                <input type="text" class="form-control" id="userSalaryUpdate">

                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button id="update-btn" class="btn btn-sm  btn-success" >Update</button>
            </div>
        </div>
    </div>
</div>
