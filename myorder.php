<?php 
    session_start(); 
    include_once('layouts/user/header.php'); 
    if(!auth_user()) redirect('/login.php');
?>
<?php include_once('layouts/user/navbar.php'); ?>
<div class="container main_middle_content">
    <div class="row">
       <div class="col-md-12">

       </div>
    </div>
</div>
<?php include_once('layouts/user/footer.php'); ?>