<?php 
session_start();
include_once('../layouts/admin/header.php'); 
if(!auth_admin()){
  redirect('/admin/login');
  exit;
}
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
                <th>Profile</th>
                <th>First Name</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Customer Address</th>
                <th>Signup On</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011-04-25</td>
                <td>$320,800</td>
                <td>2011-04-25</td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011-07-25</td>
                <td>$170,750</td>
                <td>$320,800</td>
            </tr>
            </tbody>
        </table>
     </div>
    </main>
  </div>
</div>
<?php include_once('../layouts/admin/footer.php'); ?>