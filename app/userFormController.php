<?php
require_once('db.php');

if(isset($_POST['userreg'])){
    $data['firstname'] = $_POST['firstname'];
    $data['lastname'] = $_POST['lastname'];
    $data['email'] = $_POST['email'];
    $data['mobile'] = $_POST['mobile'];
    $data['password'] = $_POST['password'];
    
    $res = db_insert('users', $data);
    if($res){
        
    }
    else{

    }
}