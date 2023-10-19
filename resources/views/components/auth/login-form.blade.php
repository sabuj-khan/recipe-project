<style>
    @import url("https://fonts.googleapis.com/css?family=Fira+Sans");

    html,
    body {
        position: relative;
        min-height: 100vh;
        background-color: #e3c973;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: "Fira Sans", Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .form-structor {
        background-color: #222;
        border-radius: 15px;
        height: 550px;
        width: 350px;
        position: relative;
        overflow: hidden;

        &::after {
            content: '';
            opacity: .8;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-repeat: no-repeat;
            background-position: left bottom;
            background-size: 500px;
            background-image: url('https://images.unsplash.com/photo-1503602642458-232111445657?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=bf884ad570b50659c5fa2dc2cfb20ecf&auto=format&fit=crop&w=1000&q=100');
        }

        .signup {
            position: absolute;
            top: 44%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            width: 65%;
            z-index: 5;
            -webkit-transition: all .3s ease;


            &.slide-up {
                top: 5%;
                -webkit-transform: translate(-50%, 0%);
                -webkit-transition: all .3s ease;
            }

            &.slide-up .form-holder,
            &.slide-up .submit-btn {
                opacity: 0;
                visibility: hidden;
            }

            &.slide-up .form-title {
                font-size: 1em;
                cursor: pointer;
            }

            &.slide-up .form-title span {
                margin-right: 5px;
                opacity: 1;
                visibility: visible;
                -webkit-transition: all .3s ease;
            }

            .form-title {
                color: #fff;
                font-size: 1.7em;
                text-align: center;

                span {
                    color: rgba(0, 0, 0, 0.4);
                    opacity: 0;
                    visibility: hidden;
                    -webkit-transition: all .3s ease;
                }
            }

            .form-holder {
                border-radius: 15px;
                background-color: #fff;
                overflow: hidden;
                margin-top: 20px;
                opacity: 1;
                visibility: visible;
                -webkit-transition: all .3s ease;

                .input {
                    border: 0;
                    outline: none;
                    box-shadow: none;
                    display: block;
                    height: 45px;
                    line-height: 30px;
                    padding: 8px 15px;
                    border-bottom: 1px solid #eee;
                    width: 100%;
                    font-size: 12px;

                    &:last-child {
                        border-bottom: 0;
                    }

                    &::-webkit-input-placeholder {
                        color: rgba(0, 0, 0, 0.4);
                    }
                }
            }

            .submit-btn {
                background-color: rgb(255, 219, 99, .4);
                color: rgba(256, 256, 256, 0.7);
                border: 0;
                border-radius: 15px;
                display: block;
                margin: 15px auto;
                padding: 15px 45px;
                width: 100%;
                font-size: 13px;
                font-weight: bold;
                cursor: pointer;
                opacity: 1;
                visibility: visible;
                -webkit-transition: all .3s ease;

                &:hover {
                    transition: all .3s ease;
                    background-color: rgb(255, 219, 99, .8);
                }
            }
        }

        .login {
            position: absolute;
            top: 20%;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #fff;
            z-index: 5;
            -webkit-transition: all .3s ease;

            &::before {
                content: '';
                position: absolute;
                left: 50%;
                top: -20px;
                -webkit-transform: translate(-50%, 0);
                background-color: #fff;
                width: 200%;
                height: 250px;
                border-radius: 50%;
                z-index: 4;
                -webkit-transition: all .3s ease;
            }

            .center {
                position: absolute;
                top: calc(50% - 10%);
                left: 50%;
                -webkit-transform: translate(-50%, -50%);
                width: 65%;
                z-index: 5;
                -webkit-transition: all .3s ease;

                .form-title {
                    color: #000;
                    font-size: 1.7em;
                    text-align: center;

                    span {
                        color: rgba(0, 0, 0, 0.4);
                        opacity: 0;
                        visibility: hidden;
                        -webkit-transition: all .3s ease;
                    }
                }

                .form-holder {
                    border-radius: 15px;
                    background-color: #fff;
                    border: 1px solid #eee;
                    overflow: hidden;
                    margin-top: 50px;
                    opacity: 1;
                    visibility: visible;
                    -webkit-transition: all .3s ease;

                    .input {
                        border: 0;
                        outline: none;
                        box-shadow: none;
                        display: block;
                        height: 45px;
                        line-height: 30px;
                        padding: 8px 15px;
                        border-bottom: 1px solid #eee;
                        width: 100%;
                        font-size: 12px;

                        &:last-child {
                            border-bottom: 0;
                        }

                        &::-webkit-input-placeholder {
                            color: rgba(0, 0, 0, 0.4);
                        }
                    }
                }

                .submit-btn {
                    background-color: rgb(255, 219, 99);
                    color: rgba(256, 256, 256, 0.7);
                    border: 0;
                    border-radius: 15px;
                    display: block;
                    margin: 15px auto;
                    padding: 15px 45px;
                    width: 100%;
                    font-size: 13px;
                    font-weight: bold;
                    cursor: pointer;
                    opacity: 1;
                    visibility: visible;
                    -webkit-transition: all .3s ease;

                    &:hover {
                        transition: all .3s ease;
                        background-color: rgb(255, 219, 99, .8);
                    }
                }
            }

            &.slide-up {
                top: 90%;
                -webkit-transition: all .3s ease;
            }

            &.slide-up .center {
                top: 10%;
                -webkit-transform: translate(-50%, 0%);
                -webkit-transition: all .3s ease;
            }

            &.slide-up .form-holder,
            &.slide-up .submit-btn {
                opacity: 0;
                visibility: hidden;
                -webkit-transition: all .3s ease;
            }

            &.slide-up .form-title {
                font-size: 1em;
                margin: 0;
                padding: 0;
                cursor: pointer;
                -webkit-transition: all .3s ease;
            }

            &.slide-up .form-title span {
                margin-right: 5px;
                opacity: 1;
                visibility: visible;
                -webkit-transition: all .3s ease;
            }
        }
    }

    .avater-image {
        background-color: #fff;
        padding: 1rem 0;
        border-radius: 20px;
    }

    .avater-image img {
        border-radius: 100%;
    }

    .avater-image .avater-borer-color {
        border: 2px solid gray;
    }

    .row {
        --bs-gutter-x: 0;
    }
</style>

<div class="form-structor">
    <div class="signup">
        <h2 class="form-title" id="signup"><span>or</span>Sign up</h2>
        <div class="avater-image row" id="avater-image">
            <div class="col-md-12">
                <div class="row justify-content-center mb-2">
                    <div class="col-md-2">
                        <img src="{{ asset('assets/frontend/images/user1.png') }}" onclick="selectImage('profileImg1')"
                            id="profileImg1" style="width: 35px; height: 35px;" alt="">
                    </div>
                    <div class="col-md-2">
                        <img src="{{ asset('assets/frontend/images/user2.png') }}" onclick="selectImage('profileImg2')"
                            id="profileImg2" style="width: 35px; height: 35px;" alt="">
                    </div>
                    <div class="col-md-2">
                        <img src="{{ asset('assets/frontend/images/user3.png') }}" onclick="selectImage('profileImg3')"
                            id="profileImg3" style="width: 35px; height: 35px;" alt="">
                    </div>
                    <div class="col-md-2">
                        <img src="{{ asset('assets/frontend/images/user4.png') }}" onclick="selectImage('profileImg4')"
                            id="profileImg4" style="width: 35px; height: 35px;" alt="">
                    </div>
                    <div class="col-md-2">
                        <img src="{{ asset('assets/frontend/images/user5.png') }}" onclick="selectImage('profileImg5')"
                            id="profileImg5" style="width: 35px; height: 35px;" alt="">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-2">
                        <img src="{{ asset('assets/frontend/images/user6.png') }}" onclick="selectImage('profileImg6')"
                            id="profileImg6" style="width: 35px; height: 35px;" alt="">
                    </div>
                    <div class="col-md-2">
                        <img src="{{ asset('assets/frontend/images/user7.png') }}" onclick="selectImage('profileImg7')"
                            id="profileImg7" style="width: 35px; height: 35px;" alt="">
                    </div>
                    <div class="col-md-2">
                        <img src="{{ asset('assets/frontend/images/user8.png') }}" onclick="selectImage('profileImg8')"
                            id="profileImg8" style="width: 35px; height: 35px;" alt="">
                    </div>
                    <div class="col-md-2">
                        <img src="{{ asset('assets/frontend/images/user11.png') }}" onclick="selectImage('profileImg9')"
                            id="profileImg9" style="width: 35px; height: 35px;" alt="">
                    </div>
                    <div class="col-md-2">
                        <img src="{{ asset('assets/frontend/images/user10.png') }}" onclick="selectImage('profileImg10')"
                            id="profileImg10" style="width: 35px; height: 35px;" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-holder">
            <input type="name" class="input" placeholder="Full Name" />
            <input type="text" class="input" placeholder="Username" />
            <input type="email" class="input" placeholder="Email" />
            <input type="password" class="input" placeholder="Password" />
        </div>
        <button class="submit-btn">Sign up</button>
        
        <div class="text-center cursor-pointer"><small><a href="{{ route('home') }}">back to home</a></small></div>
    </div>
    <div class="login slide-up">
        <div class="center">
            <h2 class="form-title" id="login"><span>or</span>Log in</h2>
            <div class="form-holder">
                <input type="email" class="input" placeholder="Email" />
                <input type="password" class="input" placeholder="Password" />
            </div>
            <div class=" text-end">
                <small><a href="{{ route('forget.password') }}">forget password</a></small>
            </div>
            <button class="submit-btn">Log in</button>
            <div class="text-center cursor-pointer"><small><a href="{{ route('home') }}">back to home</a></small></div>
        </div>
    </div>
</div>


<script>
    console.clear();

    const loginBtn = document.getElementById('login');
    const signupBtn = document.getElementById('signup');
    const avaterImage = document.getElementById('avater-image');

    loginBtn.addEventListener('click', (e) => {
        let parent = e.target.parentNode.parentNode;
        Array.from(e.target.parentNode.parentNode.classList).find((element) => {
            if (element === "slide-up") {
                signupBtn.parentNode.classList.add('slide-up')
                parent.classList.remove('slide-up')
                avaterImage.classList.add("d-none")
            }
        });
    });

    signupBtn.addEventListener('click', (e) => {
        let parent = e.target.parentNode;
        Array.from(e.target.parentNode.classList).find((element) => {
            if (element === "slide-up") {
                loginBtn.parentNode.parentNode.classList.add('slide-up')
                parent.classList.remove('slide-up')
                avaterImage.classList.remove("d-none")
            }
        });
    });

    function selectImage(profileImg) {
        let profileImg1 = 'profileImg1';
        let profileImg2 = 'profileImg2';
        let profileImg3 = 'profileImg3';
        let profileImg4 = 'profileImg4';
        let profileImg5 = 'profileImg5';
        let profileImg6 = 'profileImg6';
        let profileImg7 = 'profileImg7';
        let profileImg8 = 'profileImg8';
        let profileImg9 = 'profileImg9';
        let profileImg10 = 'profileImg10';
        // if(profileImg === profileImg1 || profileImg === profileImg2 || profileImg === profileImg3 || profileImg === profileImg4)
        // {
        // alert(profileImg)
        $("#" + profileImg1).removeClass("avater-borer-color");
        $("#" + profileImg2).removeClass("avater-borer-color");
        $("#" + profileImg3).removeClass("avater-borer-color");
        $("#" + profileImg4).removeClass("avater-borer-color");
        $("#" + profileImg5).removeClass("avater-borer-color");
        $("#" + profileImg6).removeClass("avater-borer-color");
        $("#" + profileImg7).removeClass("avater-borer-color");
        $("#" + profileImg8).removeClass("avater-borer-color");
        $("#" + profileImg9).removeClass("avater-borer-color");
        $("#" + profileImg10).removeClass("avater-borer-color");
        $("#" + profileImg).toggleClass("avater-borer-color");
        // }
    }
</script>
