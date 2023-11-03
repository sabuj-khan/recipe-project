<style>
    body {
        color: #6F8BA4;
    }

    .section {
        padding: 100px 0;
        position: relative;
    }

    .gray-bg {
        background-color: #f5f5f5;
    }

    .about-avatar img {
        max-width: 100%;
        border-radius: 100%;
    }

    .about-avatar img {
        vertical-align: middle;
        border-style: none;
    }


    /* About Me
---------------------*/
    .about-text h3 {
        font-size: 45px;
        font-weight: 700;
        margin: 0 0 6px;
    }

    @media (max-width: 767px) {
        .about-text h3 {
            font-size: 35px;
        }
    }

    .about-text h6 {
        font-weight: 600;
        margin-bottom: 15px;
    }

    @media (max-width: 767px) {
        .about-text h6 {
            font-size: 18px;
        }
    }

    .about-text p {
        font-size: 18px;
        max-width: 450px;
    }

    .about-text p mark {
        font-weight: 600;
        color: #20247b;
    }

    .about-list {
        padding-top: 10px;
    }

    .about-list .media {
        padding: 5px 0;
    }

    .about-list label {
        color: #20247b;
        font-weight: 600;
        width: 88px;
        margin: 0;
        position: relative;
    }

    .about-list label:after {
        content: "";
        position: absolute;
        top: 0;
        bottom: 0;
        right: 11px;
        width: 1px;
        height: 12px;
        background: #20247b;
        -moz-transform: rotate(15deg);
        -o-transform: rotate(15deg);
        -ms-transform: rotate(15deg);
        -webkit-transform: rotate(15deg);
        transform: rotate(15deg);
        margin: auto;
        opacity: 0.5;
    }

    .about-list p {
        margin: 0;
        font-size: 15px;
    }

    @media (max-width: 991px) {
        .about-avatar {
            margin-top: 30px;
        }
    }

    .about-section .counter {
        padding: 22px 20px;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
    }

    .about-section .counter .count-data {
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .about-section .counter .count {
        font-weight: 700;
        color: #20247b;
        margin: 0 0 5px;
    }

    .about-section .counter p {
        font-weight: 600;
        margin: 0;
    }

    mark {
        background-image: linear-gradient(rgba(252, 83, 86, 0.6), rgba(252, 83, 86, 0.6));
        background-size: 100% 3px;
        background-repeat: no-repeat;
        background-position: 0 bottom;
        background-color: transparent;
        padding: 0;
        color: currentColor;
    }

    .theme-color {
        color: #fc5356;
    }

    .dark-color {
        color: #20247b;
    }
</style>
<section class="section about-section gray-bg" id="about">
    <div class="container">
        <div class="row align-items-center flex-row-reverse">
            <div class="col-lg-6">
                <div class="about-text go-to">
                    @if (Session::has('success'))
                        <div class="alert alert-success"><span class="border border-1 border-dark px-1 rounded-circle me-1">&check;</span> {{ Session::get('success') }}</div>
                    @endif
                    <div class=" d-flex">
                        <h3 class="dark-color">Profile</h3>
                        <div class=" position-relative">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#edit"
                                class=" btn bg-transparent position-absolute left-0 bottom-0 fs-4 text-muted btn-sm btn-sm"
                                style="--bs-focus-ring-color: rgba(var(--bs-success-rgb), 0)">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </div>
                    </div>

                    <div class="row about-list">
                        <div class="col-md-6">
                            <div class="media">
                                <label>Username</label>
                                <p>{{ $user->userName }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="media">
                                <label>Full Name</label>
                                <p>{{ $user->fullName }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="media">
                                <label>E-mail</label>
                                <p>{{ $user->email }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="media">
                                <label>Phone</label>
                                @if ($user->phone)
                                    <p>{{ $user->phone }}</p>
                                @else
                                    <p>---</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="media">
                                <label>City</label>
                                @if ($user->city)
                                    <p>{{ $user->city }}</p>
                                @else
                                    <p>---</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="media">
                                <label>Address</label>
                                @if ($user->address)
                                    <p>{{ $user->address }}</p>
                                @else
                                    <p>---</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="media">
                                <label>Fb Page</label>
                                @if ($user->facebook_page)
                                    <a href="{{ $user->facebook_page }}" target="_blank">Click</a>
                                @else
                                    <p>---</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-avatar text-md-start text-center pb-4">
                    <img src="{{ $user->profile_picture }}" style="width: 50%;" class="rounded-circle" title=""
                        alt="">
                    <input type="file" id="profileImg" class="d-none">
                </div>
            </div>
        </div>
        <div class="counter">
            {{-- @if ($user->id)
                
            @else
                
            @endif --}}
            <div class="row">
                <div class="col-6 col-lg-4">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="500" data-speed="500">{{ $user->followers->count() }}</h6>
                        <p class="m-0px font-w-600">Followers</p>
                    </div>
                </div>
                <div class="col-6 col-lg-4">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="150" data-speed="150">{{ $user->recipe->count() }}</h6>
                        <p class="m-0px font-w-600">Total Recipes</p>
                    </div>
                </div>
                <div class="col-6 col-lg-4">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="850" data-speed="850">0</h6>
                        <p class="m-0px font-w-600">Viewers</p>
                    </div>
                </div>
                {{-- <div class="col-6 col-lg-3 d-flex justify-content-center align-items-center">
                    <div class="count-data">
                        <button type="button" class=" btn btn-primary px-5 py-2 fs-6 fw-semibold">Follow</button>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</section>

<script>
    let loader = true;
    loaderShow()
    if (loader === true) {
        setTimeout(() => {
            loaderHide()
            loader = false;
            return;
        }, 1000);
    }

    $(".about-avatar img").on("click", function() {
        let profileImg = $("#profileImg");
        profileImg.click();
    });
</script>
