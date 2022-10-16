<?php include_once('layouts/user/header.php'); ?>
<?php include_once('layouts/user/navbar.php'); ?>
<div class="container main_middle_content">
    <div class="row">
        <div class="col-md-12">
            <h2>My Cart</h2>
        </div>
    </div>
<?php
    $variable = [
        "", "", "", "", "", "", "", "", "" ,""
    ]
?>
    <div class="row">
        <?php
        foreach ($variable as $key => $value) { ?>
            <div class="col-md-3 booklist_col">
                <?php include('components/booklist.php'); ?>
            </div>
        <?php } ?>
    </div>
</div>
<?php include_once('layouts/user/footer.php'); ?>