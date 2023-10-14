<section class="breadcrumb-area py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <h2 class="text-uppercase text-dark">Registration</h2>
            <ol class="breadcrumb align-center ">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registration</li>
            </ol>
        </nav>
    </div>
</section>

<section class="my-form">
    <form class="form-signin">
        <h3 class="h3 mb-3 font-weight-normal text-center">Registration</h3>
        <label for="firstname ">First Name</label>
        <input type="text" id="firstname" class="form-control mb-2" placeholder="Enter First Name" name="firstname"
            required>
        <label for="lastname ">Last Name</label>
        <input type="text" id="lastname" class="form-control mb-2" placeholder="Enter Last Name" name="lastname"
            required>
        <label for="username ">User Name</label>
        <input type="text" id="username" class="form-control mb-2" placeholder="Enter User Name" name="username"
            required>
        <label for="email ">Email Address</label>
        <input type="email" id="email" class="form-control mb-2" placeholder="Email address" required>
        <label for="ppassword ">Profile Picture </label>
        <input type="password" id="ppassword" class="form-control mb-2" placeholder="Enter Password" required>
        <label for="profile_picture ">Profile Picture </label>
        <input type="file" id="profile_picture " class="form-control mb-2" name="profile_picture ">
        <input type="submit" value="Sign Up" name="signup" class="btn btn-primary">
    </form>
</section>