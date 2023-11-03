<div class="row py-4">
    <div class="col-md-10 d-flex">
        <h2 class="fs-4 fw-bold text-muted">Comments</h2><span class="fs-5 ms-2" id="commentCount">(0)</span>
    </div>
    <div class="col-md-12 pt-3 pb-4">
        <div class="row" id="commentList">
            {{-- @foreach ($comments as $comment)
                @if ($comment->child->count() > 0)
                    <div class="col-md-12 d-flex mb-4">
                        <img src="{{ asset('assets/frontend/images/user1.png') }}" style="width: 50px; height: 50px;"
                            alt="">
                        <div class="px-3">
                            <h5>{{ $comment->name }}</h5>
                            <p>{{ $comment->comment_text }}</p>
                            <div class="d-flex">
                                <button type="button" onclick="OpenReplyModal(${item.id}, ${item.recipe_id})"
                                    class=" bg-transparent border-0" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalToggle">reply(0)</button>
                            </div>
                        </div>
                    </div>
                    @foreach ($comment->child as $reply)
                        
                    <div class="col-md-12 pt-2">
                        <div class="row justify-content-end">
                            <div class="col-md-11 d-flex">
                                <img src="{{ asset('assets/frontend/images/user1.png') }}"
                                    style="width: 50px; height: 50px;" alt="">
                                <div class="px-3">
                                    <h5>{{ $reply->name }}</h5>
                                     <p>{{ $reply->comment_text }}</p>
                                    <div class="d-flex">
                                        <button type="button" class=" bg-transparent border-0" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalToggle">reply(0)</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @endforeach
                @else
                    <div class="col-md-12 d-flex mb-4">
                        <img src="{{ asset('assets/frontend/images/user1.png') }}" style="width: 50px; height: 50px;"
                            alt="">
                        <div class="px-3">
                            <h5>{{ $comment->name }}</h5>
                            <p>{{ $comment->comment_text }}</p>
                            <div class="d-flex">
                                <button type="button" onclick="OpenReplyModal(${item.id}, ${item.recipe_id})"
                                    class=" bg-transparent border-0" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalToggle">reply(0)</button>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach --}}


        </div>
    </div>
    <form id="commentForm" class="col-md-12">
        <input type="hidden" id="recipe_id" value="{{ $recipe->id }}">
        <input type="text" id="name" class=" form-control mb-2" placeholder=" Enter your name">
        <textarea name="comment" id="comment" rows="4" class=" form-control" placeholder="Comments"></textarea>
        <div class=" text-end">
            <button type="button" onclick="commentSend()"
                class="btn btn-sm btn-warning px-5 text-light">Comment</button>
        </div>
    </form>
</div>

{{-- <button type="button" class=" bg-transparent border-0 text-warning">unlike 0</button>
                <button type="button" class=" bg-transparent border-0">like 0</button> --}}
{{-- <button type="button" class=" bg-transparent border-0 text-warning">unlike 0</button>
                <button type="button" class=" bg-transparent border-0">like 0</button> --}}


{{-- <div class="d-flex">
    <button type="button" class=" bg-transparent border-0" data-bs-toggle="modal"
        data-bs-target="#exampleModalToggle">reply(0)</button>
</div> --}}
<script>
    async function getComment() {
        let recipe_id = @json($recipe->id);
        let commentList = $("#commentList");
        var p_id;
        let commentCount = $("#commentCount");
        commentList.empty();
        let response = await axios.get('/comment-get/' + recipe_id);
        commentCount.text("(" + response.data.length + ")");
        response.data.forEach((item, index) => {
            if (item.child.length > 0) {
                let row = `<div class="col-md-12 d-flex mb-4">
                        <img src="{{ asset('assets/frontend/images/user1.png') }}" style="width: 50px; height: 50px;"
                            alt="">
                        <div class="px-3">
                            <h5>${item.name}</h5>
                            <p>${item.comment_text}</p>
                            <div class="d-flex">
                                <button type="button" onclick="OpenReplyModal(${item.id}, ${item.recipe_id})" class=" bg-transparent border-0" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalToggle">reply(${item.child.length})</button>
                            </div>
                        </div>
                    </div>
                </div>`;
                item.child.forEach((item, index) => {
                    row += `<div class="col-md-12 pt-2 my-2">
                        <div class="row justify-content-end">
                            <div class="col-md-11 d-flex">
                                <img src="{{ url('assets/frontend/images/user1.png') }}"
                                    style="width: 50px; height: 50px;" alt="">
                                <div class="px-3">
                                    <h5>${item.name}</h5>
                                     <p>${item.comment_text }</p>
                                </div>
                            </div>
                        </div>
                    </div>`;
                })

                commentList.append(row);
            } else {
                let row = `<div class="col-md-12 d-flex mb-4">
                        <img src="{{ asset('assets/frontend/images/user1.png') }}" style="width: 50px; height: 50px;"
                            alt="">
                        <div class="px-3">
                            <h5>${item.name}</h5>
                            <p>${item.comment_text}</p>
                            <div class="d-flex">
                                <button type="button" onclick="OpenReplyModal(${item.id}, ${item.recipe_id})" class=" bg-transparent border-0" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalToggle">reply(0)</button>
                            </div>
                        </div>
                    </div>
                </div>`;
                commentList.append(row);
            }
        });
    }
    getComment();

    async function getReply(p_id) {
        return "repleysdf324234";
    }

    async function commentSend() {
        let comment_form = document.getElementById('commentForm');
        let recipe_id = document.getElementById('recipe_id').value;
        let name = document.getElementById('name').value;
        let comment = document.getElementById('comment').value;
        if (recipe_id.length === 0) {
            requiredNotification("Please Try Again!")
        } else if (name.length === 0) {
            requiredNotification("Please Enter Your Name!")
        } else if (comment.length === 0) {
            requiredNotification("Enter Comment!")
        } else {
            let response = await axios.post("/comment", {
                recipe_id: recipe_id,
                name: name,
                comment_text: comment
            });
            console.log(response);
            if (response.data.status === "success") {
                comment_form.reset();
                await getComment();
            }
        }
    }

    async function OpenReplyModal(id, recipe_id) {
        $("#p_id").val(id);
        Edit(recipe_id);
    }
</script>
