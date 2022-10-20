<?php 
    session_start(); 
    include_once('layouts/user/header.php'); 
    if(!auth_user()) redirect('/login.php');
    $books = db_query("SELECT books.*, null as 'cart_id',  true as is_purchased, orders.order_no, orderdetails.quantity  FROM orders inner join orderdetails on orderdetails.order_id = orders.id inner join books on orderdetails.book_id = books.id where user_id = ".auth_user()['id']);
?>
<?php include_once('layouts/user/navbar.php'); ?>
<div class="container main_middle_content">
    <div class="row">
    <div class="col-md-12">
            <h2>My Orders</h2>
        </div>
    </div>
    <div class="row">
        <?php
        foreach ($books as $key => $book) {
            ?>
            <div class="col-md-3 booklist_col">
                <?php include('components/booklist.php'); ?>
            </div>
        <?php } ?>
    </div>
</div>
<?php include_once('layouts/user/footer.php'); ?>