<?php
function current_file(){
    if(COUNT(explode("?",basename($_SERVER['REQUEST_URI']))))
        return explode("?",basename($_SERVER['REQUEST_URI']))[0];
    else
        return '/';
}

function set_success_msg($key = "", $value = ""){
    
}

function get_success_msg($key = ""){
    
}