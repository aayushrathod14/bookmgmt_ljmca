<?php 
session_start(); 
include_once('../app/helper.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login : Book Management</title>
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link href="/assets/css/style.css" rel="stylesheet">
</head>
<body>
<div class="row">
  <div class="col-md-4 offset-md-4">
      <h2 class="adminlogintitle">Admin Login</h2>
      <?php $success_msg = show_success('message'); if($success_msg != ""){ ?>
          <div class="alert alert-success" role="alert"><?=$success_msg?></div>
      <?php } ?>
      <?php $error_msg = show_error('message'); if($error_msg != ""){ ?>
          <div class="alert alert-danger" role="alert"><?=$error_msg?></div>
      <?php } ?>
      <form action="../app/adminFormController.php" method="post">
      <!-- Email input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="form2Example1">Email address</label>
        <input type="email" id="form2Example1" name="email" class="form-control" autocomplete="off" />
        <div class="invalid-feedback"><?=show_error('email')?></div>
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="form2Example2">Password</label>
        <input type="password" id="form2Example2" name="password" class="form-control" autocomplete="off" />
        <div class="invalid-feedback"><?=show_error('password')?></div>
      </div>

      <!-- Submit button -->
      <input type="submit" name="adminlogin" value="Log in" class="btn btn-primary btn-block mb-4">
    </form>
  </div>
</div>

<script src="/assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>