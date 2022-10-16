<?php session_start();
 include_once('layouts/user/header.php');  
 if(!auth_user()) redirect('/login.php');
 include_once('layouts/user/navbar.php'); ?>
<div class="container main_middle_content">
    <div class="row">
        <div class="col-md-12">
            <h2>My Cart</h2>
        </div>
    </div>
<?php
    $books = db_query('SELECT cart.id as cart_id, books.* FROM `cart` inner join books on books.id = cart.book_id where user_id='.auth_user()['id']);
?>
    <div class="row">
        <?php
        foreach ($books as $book) { ?>
            <div class="col-md-3 booklist_col">
                <?php include('components/booklist.php'); ?>
            </div>
        <?php } ?>
    </div>
</div>
<?php include_once('layouts/user/footer.php'); ?>