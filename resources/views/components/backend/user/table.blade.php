<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">@yield('title')</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <span>
                    <i class="fas fa-table me-1"></i>
                    DataTable Example
                </span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatablesTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Avater</th>
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
        let response = await axios.get("/admin/user-get");
        console.log(response);
        response.data.forEach((item, index) => {
            let row = `<tr>
                            <td>${index + 1}</td>
                            <td>${item.fullName}</td>
                            <td>${item.userName}</td>
                            <td>${item.email}</td>
                            <td>
                                ${item.profile_picture !== null ? `<img src="${item.profile_picture}" class="rounded-circle" style="width: 60px; height: 60px;" alt="...">` : '...'}
                            </td>
                            <td>
                                <button data-bs-toggle="modal" onclick="openInfoModel(${item.id})" data-bs-target="#info-modal"
                                    class="btn editBtn btn-sm btn-primary">View</button>
                                <button data-bs-toggle="modal" onclick="openDeleteModel(${item.id})" data-bs-target="#delete-modal"
                                    class="btn deleteBtn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>`;
            dataList.append(row);
        });

        dataTable("datatablesTable");
    }
    getList();

    async function openInfoModel(id) {
        let avater = document.getElementById("avater"),
            name = document.getElementById("name"),
            username = document.getElementById("username"),
            email = document.getElementById("email"),
            infoCard = document.getElementById("infoCard");
        let response = await axios.get("/admin/user-info/" + id);
        avater.src = response.data.profile_picture;
        name.innerText = response.data.fullName;
        username.innerText = response.data.userName;
        email.innerText = response.data.email;
        infoCard.classList.remove("d-none");
    }

    function openDeleteModel(id) {
        $("#id").val(id);
    }
</script>
