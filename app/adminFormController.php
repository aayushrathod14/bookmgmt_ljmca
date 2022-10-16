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
            set_user($res[0]);
            redirect('/admin');
            exit;
        }
    }

    set_error('message', 'Invalid email or password.');
    redirect('/admin/login.php');
}