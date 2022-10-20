<?php 
session_start();
include_once('../layouts/admin/header.php'); 
if(!auth_admin()){
  redirect('/admin/login.php');
  exit;
}

$orders = db_query('select orders.id, orders.order_no, books.id as book_id, books.title, books.price, orderdetails.quantity, users.firstname, users.lastname, orders.payment_status, orders.created_at from orders inner join orderdetails on orderdetails.order_id = orders.id inner join books on books.id = orderdetails.book_id inner join users on users.id = orders.user_id');

?>
<div class="container-fluid">
  <div class="row">
  <?php include_once('../layouts/admin/sidebar.php'); ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Orders</h1>
      </div>
      <div class="table-responsive">
     <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Order No.</th>
                <th>Book Name & No.</th>
                <th>Sell Price</th>
                <th>Quantity</th>
                <th>Customer Name</th>
                <th>Payment Status</th>
                <th>Order Date</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($orders as $key => $order) { ?>
              <tr>
                <td><?=$order['id']?></td>
                <td><?=$order['order_no']?></td>
                <td>(<?=$order['book_id']?>) <?=$order['title']?></td>
                <td>₹ <?=$order['price']?></td>
                <td><?=$order['quantity']?></td>
                <td><?=$order['firstname'].' '.$order['lastname']?></td>
                <td><?=$order['payment_status']?></td>
                <td><?=$order['created_at']?></td>
              </tr>
            <?php }  ?>
            </tbody>
        </table>
     </div>
    </main>
  </div>
</div>
<?php include_once('../layouts/admin/footer.php'); ?>