<?php
require_once('db.php');
require_once('helper.php');
session_start();

if(isset($_POST['adminlogin'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $validation = true;

    if(!isset($email) || empty($email)){
        set_error('email', 'Email required!');
        $validation = false;
    }

    if(!isset($password) || empty($password)){
        set_error('password', 'Password required!');
        $validation = false;
    }

    if(!$validation){ redirect('/admin/login.php');}
     
    if(isset($email) && !empty($email) && (isset($password) && !empty($password))){
        $res = db_where("adminusers", ['email'=>$email, 'password'=>md5($password)]);
        var_dump(COUNT($res));
        if(COUNT($res)>0){
            set_admin_user($res[0]);
            redirect('/admin');
            exit;
        }
    }

    set_error('message', 'Invalid email or password.');
    redirect('/admin/login.php');
}

if(isset($_POST['addbookform'])){
    $isValidated = true;

    if(!isset($_POST['title']) || empty($_POST['title'])){
        set_error('title', 'Title required!');
        $isValidated = false;
    }

    if(!isset($_POST['categoryId']) || empty($_POST['categoryId'])){
        set_error('categoryId', 'Category required!');
        $isValidated = false;
    }

    if(!isset($_POST['price']) || empty($_POST['price'])){
        set_error('price', 'Price required!');
        $isValidated = false;
    }

    if(!isset($_POST['quantity']) || empty($_POST['quantity'])){
        set_error('quantity', 'Quantity required!');
        $isValidated = false;
    }

    if(empty($_FILES['image'])){
        set_error('image', 'Book Image required!');
        $isValidated = false;
    }

    if(!$isValidated){ set_formdata($_POST); redirect('/admin/addbook.php'); }

    // $filename = $_FILES['image']['name'];
    $image = $_FILES['image'];
    $filetype = explode('/', $_FILES['image']['type'])[1];
    $newfile_name = md5(date('YmdHis')).".$filetype";
	move_uploaded_file($image['tmp_name'], "../uploads/$newfile_name");
    $res = db_insert('books', ['title'=>$_POST['title'], 'category_id'=>$_POST['categoryId'], 'price'=>$_POST['price'], 'quantity'=>$_POST['quantity'], 'image'=>"uploads/".$newfile_name]);
    if($res){
        redirect('/admin/books.php');
    }
}