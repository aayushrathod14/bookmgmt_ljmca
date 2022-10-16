<?php session_start(); include_once('layouts/user/header.php'); 
     include_once('layouts/user/navbar.php'); 
    $books = db_query('SELECT books.*, (select id from cart where user_id='.auth_user()['id'].' and book_id = books.id limit 1) as cart_id FROM `books`');
?>
<div class="container main_middle_content">
    <div class="row">
        <div class="col-md-12">
            <h2>Books Store</h2>
        </div>
    </div>
    <div class="row">
        <?php
        foreach ($books as $key => $book) { ?>
            <div class="col-md-3 booklist_col">
                <?php include('components/booklist.php'); ?>
            </div>
        <?php } ?>
    </div>
</div>
<?php include_once('layouts/user/footer.php'); ?>