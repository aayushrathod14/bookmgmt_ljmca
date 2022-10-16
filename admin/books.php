<?php include_once('../layouts/admin/header.php'); ?>
<div class="container-fluid">
  <div class="row">
  <?php include_once('../layouts/admin/sidebar.php'); ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Books</h1>
        <a class="btn btn-primary" href="/admin/addorder.php"><i class="fa fa-plus"></i> Add</a>
      </div>
     <div class="table-responsive">
     <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Title</th>
                <th>Category</th>
                <th>Image</th>
                <th>Price</th>
                <th>Quantity</th>
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
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011-07-25</td>
                <td>$170,750</td>
            </tr>
            </tbody>
        </table>
     </div>
    </main>
  </div>
</div>
<?php include_once('../layouts/admin/footer.php'); ?>