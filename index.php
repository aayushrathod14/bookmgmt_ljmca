<?php session_start(); include_once('layouts/user/header.php'); ?>
<?php include_once('layouts/user/navbar.php'); ?>
<?php
    $variable = [
        "", "", "", "", "", "", "", "", "" ,""
    ]
?>
<div class="container main_middle_content">
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