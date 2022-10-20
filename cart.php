<?php session_start();
 include_once('layouts/user/header.php');  
 if(!auth_user()) redirect('/login.php');
 include_once('layouts/user/navbar.php'); ?>
 <form action="/app/userFormController.php" method="post">
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
        $flag = false;
        foreach ($books as $key => $book) {
            $flag = true;
            ?>
            <div class="col-md-3 booklist_col">
                <?php include('components/booklist.php'); ?>
                <input type="hidden" name="book_id[]" value="<?= $book['id']?>">
            </div>
        <?php } ?>
    </div>
    <?php
    if(isset($key) && $key){
    ?>
    <div class="row">
        <div class="col-md-12">
            <input type="submit"  name="cartBuyAll" value="Buy All" class="btn btn-success">
        </div>
    </div>
    <?php } ?>
</div>
</form>
<?php include_once('layouts/user/footer.php'); ?>