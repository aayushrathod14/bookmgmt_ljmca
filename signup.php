<?php session_start(); include_once('layouts/user/header.php'); ?>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="assets/images/books.jpg" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <p class="small fw-bold mt-2 pt-1 mb-3">Registration Form</p>
                <form method="post" action="/app/userFormController.php">
                    <div class="row">
                        <div class="col-md-6">
                        <!-- First Name input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="firstnameInp">First Name</label>
                                <input type="text" id="firstnameInp" name="firstname" value="<?=form_value('firstname')?>" class="form-control form-control-lg"
                                placeholder="Enter first name" />
                                <div class="invalid-feedback"><?=show_error('firstname')?></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Last Name input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="lastnameInp">Last Name</label>
                                <input type="text" id="lastnameInp"  value="<?=form_value('lastname')?>"  name="lastname" class="form-control form-control-lg"
                                placeholder="Enter last name" />
                                <div class="invalid-feedback"><?=show_error('lastname')?></div>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="mobileInput">Mobile</label>
                        <input type="number" id="mobileInput mobileInputValidation"  value="<?=form_value('mobile')?>"  name="mobile" class="form-control form-control-lg"
                        placeholder="Enter Mobile" />
                        <div class="invalid-feedback"><?=show_error('mobile')?></div>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="emailInp">Email address</label>
                        <input type="email" id="emailInp emailValidation" value="<?=form_value('email')?>"  name="email" class="form-control form-control-lg"
                        placeholder="Enter a valid email address" />
                        <div class="invalid-feedback"><?=show_error('email')?></div>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="passwordInp">Password</label>
                        <input type="password" id="passwordInp"  name="password" class="form-control form-control-lg"
                        placeholder="Enter password" />
                        <div class="invalid-feedback"><?=show_error('password')?></div>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="passwordInp">Confirm Password</label>
                        <input type="password" id="passwordInp"  name="cpassword" class="form-control form-control-lg"
                        placeholder="Enter password" />
                        <div class="invalid-feedback"><?=show_error('cpassword')?></div>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <input name="userreg" type="submit" class="btn btn-primary btn-lg"
                        style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</input>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Have an account? <a href="login.php"
                            class="link-danger">Login</a></p>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </section>
<?php include_once('layouts/user/footer.php'); ?>