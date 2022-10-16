<?php 
session_start();
include_once('../layouts/admin/header.php'); 
if(!auth_admin()){
  redirect('/admin/login.php');
  exit;
}

$categories = db_get('categories');

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
                <form enctype="multipart/form-data" action="../app/adminFormController.php" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Book Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="<?=form_value('title')?>" aria-describedby="emailHelp" placeholder="Book Title">
                    <div class="invalid-feedback"><?=show_error('title')?></div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Category</label>
                    <select name="categoryId" id="categoryId" class="form-control">
                        <?php
                            $selected_cat = form_value('categoryId');
                            foreach ($categories as $key => $category) { ?>
                             <option value="<?=$category['id']?>" <?=$selected_cat==$category['id']?'Selected':''?>><?=$category['name']?></option>
                        <?php } ?>
                    </select>
                    <div class="invalid-feedback"><?=show_error('categoryId')?></div>
                </div>
                <div class="form-group">
                    <label for="inpPrice">Price</label>
                    <input type="number" name="price"  value="<?=form_value('price')?>" class="form-control" id="inpPrice" aria-describedby="price" placeholder="Price">
                    <div class="invalid-feedback"><?=show_error('price')?></div>
                </div>
                <div class="form-group">
                    <label for="inputQuantity">Quantity</label>
                    <input type="number" name="quantity"  value="<?=form_value('quantity')?>" class="form-control" id="inputQuantity" aria-describedby="Quantity" placeholder="Quantity">
                    <div class="invalid-feedback"><?=show_error('quantity')?></div>
                </div>
                <div class="form-group">
                    <label for="inputImage">Image</label>
                    <input type="file" name="image" class="form-control" id="inputImage" aria-describedby="inputImage" placeholder="Select File">
                    <div class="invalid-feedback"><?=show_error('image')?></div>
                </div>
                <div class="form-group submit-btns">
                    <input type="submit" name="addbookform" value="Add" class="btn btn-primary addEditBtn">
                </div>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>
<?php include_once('../layouts/admin/footer.php'); ?>