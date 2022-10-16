<?php
function current_file(){
    if(COUNT(explode("?",basename($_SERVER['REQUEST_URI']))))
        return explode("?",basename($_SERVER['REQUEST_URI']))[0];
    else return '/';
}

function set_success($key = "", $value = ""){
    $_SESSION['success'][$key] = $value;
}

function show_success($key = ""){
    if(isset($_SESSION['success'][$key])){
        $msg = $_SESSION['success'][$key];
        unset( $_SESSION['success'][$key]);
        return $msg;
    }
    else return "";
}

function set_error($key = "", $value = ""){
    $_SESSION['errors'][$key] = $value;
}

function show_error($key = ""){
    if(isset($_SESSION['errors'][$key])){
        $msg = $_SESSION['errors'][$key];
        unset( $_SESSION['errors'][$key]);
        return $msg;
    }
    else return "";
}

function redirect($location = ""){
    header("Location: $location");
}

function set_formdata($formdata){
    $_SESSION['formdata'] = $formdata;
}

function form_value($key = ""){
    if(isset($_SESSION['formdata'][$key]))
        return $_SESSION['formdata'][$key];
    else return "";
}