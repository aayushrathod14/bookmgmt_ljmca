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
            <h1 class="h2">Add Order</h1>
        </div>
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <form enctype="form-data/multipart" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Book Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Book Title">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Category</label>
                    <select name="categoryId" id="categoryId" class="form-control">
                        <option value="ABS">ABS</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inpPrice">Price</label>
                    <input type="number" class="form-control" id="inpPrice" aria-describedby="price" placeholder="Price">
                </div>
                <div class="form-group">
                    <label for="inputQuantity">Quantity</label>
                    <input type="text" class="form-control" id="inputQuantity" aria-describedby="Quantity" placeholder="Quantity">
                </div>
                <div class="form-group">
                    <label for="inputImage">Image</label>
                    <input type="file" class="form-control" id="inputImage" aria-describedby="inputImage" placeholder="Select File">
                </div>
                <div class="form-group submit-btns">
                    <button type="submit" class="btn btn-primary addEditBtn">Add</button>
                </div>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>
<?php include_once('../layouts/admin/footer.php'); ?>