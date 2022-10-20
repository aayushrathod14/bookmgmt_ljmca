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
    else redirect('/login.php');
}


if(isset($_POST['removefcart'])){
    if(auth_user()){
        $cart_id = $_POST['removefcart'];
        db_delete('cart', $cart_id);
        redirect('/cart.php'); 
    }
    else redirect('/login.php');
}

if(isset($_POST['butnowForm'])){
    if(auth_user()){
       $book_id = $_POST['butnowForm'];
       $quantity =  $_POST['total_quantity'];
       $book = db_find('books', $book_id);
       $orderdata = ['order_no'=>'W'.date('isYmd'), 'user_id'=>auth_user()['id'], 'payment_status'=>'success', 'total_amt'=>($book->price * $quantity)];
       $order = db_insert('orders', $orderdata);
       if($order)
       db_insert('orderdetails', ['order_id'=>$order->id, 'book_id'=>$book_id, 'quantity'=>$quantity, 'created_at'=>date('Y-m-d H:i:s')]);
       db_update('books', ['available'=>0], $book_id);
       redirect('/ordersuccess.php?order_id='.$order->order_no);
    }
    else redirect('/login.php');
}

if(isset($_POST['cartBuyAll'])){
    if(auth_user()){
        $bookIds = $_POST['book_id'];
        $quantities = $_POST['quantity'];
        $orderDetailsData = [];
        $orderdata = ['order_no'=>'W'.date('isYmd'), 'user_id'=>auth_user()['id'], 'payment_status'=>'success', 'total_amt'=>0];
        foreach ($bookIds as $key => $bookId) {
            $book = db_find('books', $bookId);
            $orderdata['total_amt'] = $orderdata['total_amt'] + ($book->price *  $quantities[$key]);
        }
        $order = db_insert('orders', $orderdata);
        if($order)
        foreach ($bookIds as $key => $bookId) {
            $res = db_insert('orderdetails', ['order_id'=>$order->id, 'book_id'=>$bookId, 'quantity'=>$quantities[$key], 'created_at'=>date('Y-m-d H:i:s')]);
            db_update('books', ['available'=>0], $bookId);
        }
        if($res){
            db_query('delete from cart where user_id = '.auth_user()['id']);
            redirect('/ordersuccess.php?order_id='.$order->order_no);
        }
     }
     else redirect('/login.php');
}