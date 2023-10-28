<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">@yield('title')</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-content-center">
                <span>
                    <i class="fas fa-table me-1"></i>
                    DataTable Example
                </span>
                <button data-bs-toggle="modal" data-bs-target="#create-modal"
                    class="btn btn-sm btn-primary bg-gradient-primary">Add</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatablesTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Recipe Type</th>
                                <th>slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="dataList"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    async function getList() {
        let datatablesTable = $("#datatablesTable");
        let dataList = $("#dataList");
        dataList.empty();
        let response = await axios.get("/admin/recipe-type-get");
        console.log(response);
        response.data.forEach((item, index) => {
            let row = `<tr>
                            <td>${index + 1}</td>
                            <td>${item.name}</td>
                            <td>${item.slug}</td>
                            <td>
                                <button data-bs-toggle="modal" onclick="openEditModel(${item.id})" data-bs-target="#edit-modal"
                                    class="btn editBtn btn-sm btn-primary">Edit</button>
                                <button data-bs-toggle="modal" onclick="openDeleteModel(${item.id})" data-bs-target="#delete-modal"
                                    class="btn deleteBtn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>`;
            dataList.append(row);
        });

        dataTable("datatablesTable");
    }
    getList();

    async function openEditModel(id) {
        let idEdit = $("#idEdit");
        idEdit.val(id);
        let response = await axios.get("/admin/recipe-type-edit/" + id);
        getEditData(response.data.name);
    }

    function openDeleteModel(id) {
        $("#id").val(id);
    }
</script>
