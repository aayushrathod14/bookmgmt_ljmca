<?php 
session_start();
include_once('../layouts/admin/header.php'); 
if(!auth_admin()){
  redirect('/admin/login.php');
  exit;
}

$users = db_get('users');
?>
<div class="container-fluid">
  <div class="row">
  <?php include_once('../layouts/admin/sidebar.php'); ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Users</h1>
      </div>
      <div class="table-responsive">
     <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>First Name</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Signup On</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($users as $user) { ?>
              <tr>
                <td><?=$user['id']?></td>
                <td><?=$user['firstname']?></td>
                <td><?=$user['lastname']?></td>
                <td><?=$user['email']?></td>
                <td><?=date('d M, Y', strtotime($user['created_at']))?></td>
              </tr>
            <?php } ?>
            </tbody>
        </table>
     </div>
    </main>
  </div>
</div>
<?php include_once('../layouts/admin/footer.php'); ?>