<?php include_once('layouts/user/header.php'); ?>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="assets/images/books.jpg" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <p class="small fw-bold mt-2 pt-1 mb-3">Registration Form</p>
                <form>
                <div class="row">
                    <div class="col-md-6">
                       <!-- First Name input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="firstnameInp">First Name</label>
                            <input type="text" id="firstnameInp" class="form-control form-control-lg"
                            placeholder="Enter first name" />
                        </div>
                    </div>
                    <div class="col-md-6">
                         <!-- Last Name input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="lastnameInp">Last Name</label>
                            <input type="text" id="lastnameInp" class="form-control form-control-lg"
                            placeholder="Enter last name" />
                        </div>
                    </div>
                </div>
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="emailInp">Email address</label>
                    <input type="email" id="emailInp" class="form-control form-control-lg"
                    placeholder="Enter a valid email address" />
                </div>

                <!-- Password input -->
                <div class="form-outline mb-3">
                     <label class="form-label" for="passwordInp">Password</label>
                    <input type="password" id="passwordInp" class="form-control form-control-lg"
                    placeholder="Enter password" />
                </div>

                <!-- Mobile input -->
                <div class="form-outline mb-3">
                     <label class="form-label" for="mobileInput">Mobile</label>
                    <input type="phone" id="mobileInput" class="form-control form-control-lg"
                    placeholder="Enter Mobile" />
                </div>

                <div class="text-center text-lg-start mt-4 pt-2">
                    <button type="button" class="btn btn-primary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                    <p class="small fw-bold mt-2 pt-1 mb-0">Have an account? <a href="login.php"
                        class="link-danger">Login</a></p>
                </div>

                </form>
            </div>
            </div>
        </div>
    </section>
<?php include_once('layouts/user/footer.php'); ?>