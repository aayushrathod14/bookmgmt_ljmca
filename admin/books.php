<?php 
session_start();
include_once('../layouts/admin/header.php'); 
if(!auth_admin()){
  redirect('/admin/login.php');
  exit;
}

$books = db_where('books');
?>
<div class="container-fluid">
  <div class="row">
  <?php include_once('../layouts/admin/sidebar.php'); ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Books</h1>
        <a class="btn btn-primary" href="/admin/addbook.php"><i class="fa fa-plus"></i> Add</a>
      </div>
     <div class="table-responsive">
     <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($books as $book) { ?>
              <tr>
                  <td><?=$book['id']?></td>
                  <td>
                    <img height=50 width=50 src="<?=BASE_URL.$book['image']?>" alt="" srcset="">
                  </td>
                  <td><?=$book['title']?></td>
                  <td><?=db_find('categories', $book['category_id'])->name?></td>
                  <td>₹<?=$book['price']?></td>
                  <td><?=$book['quantity']?></td>
                  <td class="d-flex gap-2 pt-4 pb-4">
                    <a href="/admin/editbook.php?id=<?=$book['id']?>" class="btn btn-sm btn-warning"><fa class="fa fa-pencil"></fa></a>
                    <form action="../app/adminFormController.php" method="post">
                      <button type="submit" name="deleteBook" value="<?=$book['id']?>" class="btn btn-sm btn-danger"><fa class="fa fa-trash"></fa></button>
                    </form>
                  </td>
              </tr>
            <?php }  ?> 
            </tbody>
        </table>
     </div>
    </main>
  </div>
</div>
<?php include_once('../layouts/admin/footer.php'); ?>