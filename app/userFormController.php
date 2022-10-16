<?php
require_once('db.php');
require_once('helper.php');
session_start();

if(isset($_POST['userreg'])){
    $data['firstname'] = $_POST['firstname'];
    $data['lastname'] = $_POST['lastname'];
    $data['email'] = $_POST['email'];
    $data['mobile'] = $_POST['mobile'];
    $data['password'] = $_POST['password'];
    $isValidate = true;

    if(!isset($_POST['firstname']) || empty($_POST['firstname'])){
        set_error('firstname', 'Firstname required!');
        $isValidate = false;
    }

    if(!isset($_POST['lastname']) || empty($_POST['lastname'])){
        set_error('lastname', 'Lastname required!');
        $isValidate = false;
    }

    if(!isset($_POST['email']) || empty($_POST['firstname'])){
        set_error('email', 'Email required!');
        $isValidate = false;
    }
    else{
        $res = db_where("users", ['email'=>$data['email']]);
        if(COUNT($res)>0){
            set_error('email', 'Email already registered!');
            $isValidate = false;
        }
    }

    if(!isset($_POST['mobile']) || empty($_POST['mobile'])){
        set_error('mobile', 'Mobile no. required!');
        $isValidate = false;
    }
    else{
        $res = db_where("users", ['mobile'=>$data['mobile']]);
        if(COUNT($res)>0){
            set_error('mobile', 'Mobile no. already registered!');
            $isValidate = false;
        }
    }
    
    if(!isset($_POST['password']) || empty($_POST['password'])){
        set_error('password', 'Password required!');
        $isValidate = false;
    }

    if(!isset($_POST['cpassword']) || empty($_POST['cpassword'])){
        set_error('cpassword', 'Confirm password required!');
        $isValidate = false;
    }

    if((isset($_POST['password']) && isset($_POST['cpassword'])) && ($_POST['password'] != $_POST['cpassword'])){
        set_error('cpassword', 'Confirm password should match with password!');
        $isValidate = false;
    }

    if(!$isValidate){
        set_formdata($_POST);
        redirect('/signup.php');
    }
    else{
        $data['password'] = md5($data['password']);
        $res = db_insert('users', $data);
        if($res){
            set_success('message', 'Sign up successfully done. Please login');
            redirect('/login.php');
        }
    }
}

if(isset($_POST['userlogin'])){
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

    if(!$validation){ redirect('/login.php');}
     
    $res = db_where("users", ['email'=>$email, 'password'=>md5($password)]);
    if(COUNT($res)==0){
        set_error('message', 'Invalid email or password.');
        redirect('/login.php');
    }
    else{
        set_user($res[0]);
        redirect('/');
    }
}

if(isset($_POST['addtocart'])){
    if(auth_user()){
        $book_id = $_POST['addtocart'];
        $user_id = auth_user()['id'];
        db_insert('cart', ['book_id'=>$book_id, 'user_id'=>$user_id, 'quantity'=>1]);
        redirect('/'); 
    }
}


if(isset($_POST['removefcart'])){
    if(auth_user()){
        $cart_id = $_POST['removefcart'];
        db_delete('cart', $cart_id);
        redirect('/'); 
    }
}