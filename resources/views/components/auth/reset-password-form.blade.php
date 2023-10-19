<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

    * {
        box-sizing: border-box;
    }

    html,
    body {
        background-color: #e3c973;
    }

    h1 {
        font-weight: bold;
        margin: 0;
    }

    h2 {
        text-align: center;
    }

    span {
        font-size: 12px;
    }

    a {
        color: #333;
        font-size: 14px;
        text-decoration: none;
        margin: 15px 0;
    }

    button {
        border-radius: 20px;
        border: 1px solid  rgb(255, 219, 99);
        background-color:  rgb(255, 219, 99);
        color: #FFFFFF;
        font-size: 12px;
        font-weight: bold;
        padding: 12px 45px;
        letter-spacing: 1px;
        text-transform: uppercase;
    }
    
    button:hover {
        border: 1px solid rgb(255, 219, 99, .8);
        background-color: rgb(255, 219, 99, .8);
    }

    button:focus {
        outline: none;
    }

    form {
        background-color: #FFFFFF;
        padding: 0 50px;
        text-align: center;
    }

    input {
        background-color: #eee;
        border: none;
        padding: 12px 15px;
        margin: 8px 0;
        width: 100%;
    }

    form {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
            0 10px 10px rgba(0, 0, 0, 0.22);
    }
</style>

<div class="container">
    <div class="row justify-content-center pt-5">
        <div class="col-md-5">
            <form action="#" class="py-4">
                <h1 class="pb-3">Forget Password</h1>
                <input type="email" placeholder="Email" class="" />
                <input type="password" placeholder="Current Password" class="" />
                <input type="password" placeholder="New Password" class="" />
                <input type="password" placeholder="Confirm Password" class="" />
                <button>RESET</button>
            </form>
        </div>
    </div>
</div>