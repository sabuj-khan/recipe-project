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
        /* background-color: #000; */
        /* opacity: 0.5; */
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
<div class="col-md-9">
    <div class="card card-body">
        <h2 class=" text-center pb-4 fs-3 fw-semibold text-muted">Recipe Share</h2>
        <div class="row">
            <div class="col-md-6">
                <div class=" d-sm-flex">
                    <label for="" class="mb-sm-0 mb-1 d-sm-flex align-items-center text-muted"
                        style="width: 200px;">Recipe
                        Name</label>
                    <input type="text" id="recipe_name" class=" form-control  focus-ring"
                        style="--bs-focus-ring-color: rgba(var(--bs-warning-rgb), .25)">
                </div>
                <div class=" d-sm-flex mt-3">
                    <label for="" class="mb-sm-0 mb-1 d-sm-flex align-items-center text-muted"
                        style="width: 200px;">Recipe
                        Type</label>
                    <select id="recipe_type_id" class=" form-control focus-ring"
                        style="--bs-focus-ring-color: rgba(var(--bs-warning-rgb), .25)">
                        <option value="">(Select)</option>
                    </select>
                </div>

                <div class=" d-sm-flex mt-3">
                    <label for="prep_time" class="mb-sm-0 mb-1 d-sm-flex align-items-center text-muted"
                        style="width: 200px;">Preparation Time</label>
                    <input type="text" id="prep_time" class=" form-control  focus-ring"
                        style="--bs-focus-ring-color: rgba(var(--bs-warning-rgb), .25)">
                </div>
                <div class=" d-sm-flex mt-3">
                    <label for="cooking_time" class="mb-sm-0 mb-1 d-sm-flex align-items-center text-muted"
                        style="width: 200px;">Cooking
                        Time</label>
                    <input type="text" id="cooking_time" class=" form-control  focus-ring"
                        style="--bs-focus-ring-color: rgba(var(--bs-warning-rgb), .25)">
                </div>
            </div>
            <div class="col-md-6 pt-sm-0 pt-4">
                <div id="select_video" onclick="selectVideo()" class="border border-2 border-muted select_video">
                    <span class=" h4 fw-semibold text-secondary">Select Videos</span>
                </div>
                <input id="file-input" class="d-none" type="file" accept="video/*">
                <video id="video" class="d-none" controls></video>
                <div id="changeBtn" class=" text-end d-none">
                    <span class=" badge bg-danger" onclick="changeVideo()">change</span>
                </div>
            </div>

            <div class="col-md-12  pt-sm-3 pt-4">
                {{-- <label for="cooking_instructions" class="mb-2 text-muted">Cooking Instructions</label> --}}
                <textarea type="text" id="cooking_instructions" class="form-control focus-ring"
                    style="--bs-focus-ring-color: rgba(var(--bs-warning-rgb), .25)" placeholder="Cooking Instructions..."></textarea>
            </div>
            <div class="col-md-12 pt-sm-3 pt-4">
                <textarea type="text" id="ingredients" class="form-control focus-ring"
                    style="--bs-focus-ring-color: rgba(var(--bs-warning-rgb), .25)" placeholder="Ingredients..."></textarea>
            </div>
            <div class="col-md-6 pt-3">
                <div class=" d-sm-flex mt-sm-3 mt-0">
                    <label for="cuisine_type" class="mb-sm-0 mb-1 d-sm-flex align-items-center text-muted"
                        style="width: 200px;">Cuisine
                        Type</label>
                    <input type="text" id="cuisine_type" class=" form-control  focus-ring"
                        style="--bs-focus-ring-color: rgba(var(--bs-warning-rgb), .25)">
                </div>

                <div class=" d-sm-flex mt-3">
                    <label for="difficulty_level" class="mb-sm-0 mb-1 d-sm-flex align-items-center text-muted"
                        style="width: 200px;">Difficulty Level</label>
                    <input type="text" id="difficulty_level" class=" form-control  focus-ring"
                        style="--bs-focus-ring-color: rgba(var(--bs-warning-rgb), .25)">
                </div>
            </div>
            <div class="col-md-6 pt-3">
                <div class=" d-sm-flex mt-sm-3 mt-0">
                    <label for="dietary_preferences" class="mb-sm-0 mb-1 d-sm-flex align-items-center text-muted"
                        style="width: 200px;">Dietary Preferences</label>
                    <input type="text" id="dietary_preferences" class=" form-control  focus-ring"
                        style="--bs-focus-ring-color: rgba(var(--bs-warning-rgb), .25)">
                </div>
            </div>
            <div class="col-md-12 pt-3">
                {{-- <label for="image" class=" text-muted">Image</label> --}}
                <div class="select-box position-relative" onclick="selctImage()">
                    <div class=" text-secondary position-absolute top-50 start-50 translate-middle">
                        <span class="">Select Recipe Image</span>
                    </div>
                    <img src="{{ asset('assets/images/author.jpg') }}" id="imageShow"
                        class="d-none position-absolute top-50 start-50 translate-middle"
                        style="width: 60%; height: 100%;" alt="">
                </div>
                <input type="file" id="image" onchange="imageUpload(event)" class="d-none">
            </div>
            <div class="col-md-12 text-end pt-3">
                <button type="button" class=" btn btn-outline-warning">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        height: 400,
    });

    function selctImage() {
        let image = document.getElementById("image");
        image.click();
    }

    function selectVideo() {
        let fileInput = document.getElementById("file-input");
        fileInput.click();
    }


    const input = document.getElementById('file-input');
    const formFile = document.getElementById('formFile');
    const video = document.getElementById('video');
    const videoSource = document.createElement('source');
    const select_video = document.getElementById("select_video");
    const changeBtn = document.getElementById("changeBtn");

    input.addEventListener('change', function() {
        const files = this.files || [];

        if (!files.length) return;

        const reader = new FileReader();

        reader.onload = function(e) {
            videoSource.setAttribute('src', e.target.result);
            video.appendChild(videoSource);
            video.load();
            video.play();
        };

        reader.onprogress = function(e) {
            console.log('progress: ', Math.round((e.loaded * 100) / e.total));
            video.classList.remove("d-none");
            changeBtn.classList.remove("d-none");
            select_video.classList.add("d-none");
        };

        reader.readAsDataURL(files[0]);
    });

    function changeVideo() {
        let fileInput = document.getElementById("file-input");
        fileInput.click();
    }

    function imageUpload(event) {
        let imageShow = document.getElementById("imageShow");
        let Image = event.target.files[0];
        imageShow.classList.remove("d-none");
        imageShow.src = URL.createObjectURL(Image);
    }
</script>
