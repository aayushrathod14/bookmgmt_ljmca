<?php
function current_file(){
    if(COUNT(explode("?",basename($_SERVER['REQUEST_URI']))))
        return explode("?",basename($_SERVER['REQUEST_URI']))[0];
    else
        return '/';
}