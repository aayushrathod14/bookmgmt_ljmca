<?php  session_start(); include_once('layouts/user/header.php'); ?>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="assets/images/books.jpg" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <p class="small fw-bold mt-2 pt-1 mb-3">Login Form</p>
                <?php $success_msg = show_success('message'); if($success_msg != ""){ ?>
                    <div class="alert alert-success" role="alert"><?=$success_msg?></div>
                <?php } ?>
                <?php $error_msg = show_error('message'); if($error_msg != ""){ ?>
                    <div class="alert alert-danger" role="alert"><?=$error_msg?></div>
                <?php } ?>
                <form  method="post" action="/app/userFormController.php">
                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3">Email address</label>
                    <input type="email" id="form3Example3" name="email" class="form-control form-control-lg"
                    placeholder="Enter a valid email address" />
                    <div class="invalid-feedback"><?=show_error('email')?></div>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-3">
                     <label class="form-label" for="form3Example4">Password</label>
                    <input type="password" id="form3Example4" name="password" class="form-control form-control-lg"
                    placeholder="Enter password" />
                    <div class="invalid-feedback"><?=show_error('password')?></div>
                </div>

                <div class="text-center text-lg-start mt-4 pt-2">
                    <input type="submit" name="userlogin" value="Login" class="btn btn-primary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="signup.php"
                        class="link-danger">Register</a></p>
                </div>
                </form>
            </div>
            </div>
        </div>
    </section>
<?php include_once('layouts/user/footer.php'); ?>