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
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form action="{{ route('profile.update') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Author Profile Update</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5 py-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class=" mb-3">
                            <input type="text" name="fullName" class=" form-control py-2 px-3" placeholder="Fullname" value="{{ $user->fullName }}" />
                        </div>
                        <div class=" mb-3">
                            <input type="text" name="userName" class=" form-control py-2 px-3" placeholder="Username" value="{{ $user->userName }}" />
                        </div>
                        <div class=" mb-3">
                            <input type="text" name="phone" class=" form-control py-2 px-3" placeholder="Phone Number" value="{{ $user->phone }}" />
                        </div>
                        <div class=" mb-3">
                            <input type="text" name="city" class=" form-control py-2 px-3" placeholder="City" value="{{ $user->city }}" />
                        </div>
                        <div class=" mb-3">
                            <input type="text" name="address" class=" form-control py-2 px-3" placeholder="Address" value="{{ $user->address }}" />
                        </div>
                        <div class=" mb-3">
                            <input type="text" name="facebook_page" class=" form-control py-2 px-3" placeholder="Facebook Page" value="{{ $user->facebook_page }}" />
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning">Update</button>
            </div>
        </form>
    </div>
</div>

{{-- <script>
   async function update()
   {
     let fullName = 
   }
</script> --}}
