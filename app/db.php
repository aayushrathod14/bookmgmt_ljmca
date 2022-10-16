<?php
require_once('define.php');
global $conn;
try{
    $GLOBALS['conn'] = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DTBS);
    
    function db_query($str = ""){
        return mysqli_query($GLOBALS['conn'], $str);
    }

    function db_find($tablename="", $id = 0){
        $res = mysqli_query($GLOBALS['conn'], "SELECT * FROM $tablename WHERE id = $id");
        return $res->fetch_object();
    }

    function db_where($table="", $data=[]){
        $whereStr = "where ";
        $keys = array_keys($data);
        foreach ($keys as $index => $key) {
            $whereStr =  $whereStr." $key";
            
            if(gettype($data[$key]) == 'string') 
                $whereStr = $whereStr."='".$data[$key]."'";
            else $whereStr = $whereStr."=".$data[$key];
            
            if(COUNT($keys) != ( $index + 1)){
                $whereStr =  $whereStr.",";
            }
        }
        if(!COUNT($keys)) $whereStr = "";
        $query = "SELECT * FROM $table $whereStr";
        $conn = $GLOBALS['conn'];
        try {
            $res = db_query($query);
            if(!$res){
                echo 'mysql error : ';
                print_r(mysqli_error($conn));
                die();
            }
            $result = [];
            while($obj = $res->fetch_assoc()){
                $result[] = $obj;
            }
            return $result;
        } catch (\Throwable $th) {
            return false;
        }
    }

    function db_get($tablename=""){
        $res = mysqli_query($GLOBALS['conn'], "SELECT * FROM $tablename");
        $result = [];
        while($obj = $res->fetch_assoc()){
            $result[] = $obj;
        }
        return $result;
    }

    function db_insert($table="", $data=[]){
        $key_str = "";
        $values_str = "";
        $keys = array_keys($data);
        foreach ($keys as $index => $key) {
            $key_str =  $key_str." $key";
            if(gettype($data[$key]) == 'string') 
                $values_str = $values_str." '".$data[$key]."'";
            else
                $values_str = $values_str." ".$data[$key];
            if(COUNT($keys) != ( $index + 1)){
                $key_str =  $key_str.",";
                $values_str = $values_str.",";
            }
        }
        $query = "INSERT INTO $table ($key_str) VALUES ($values_str)";
        $conn = $GLOBALS['conn'];
        try {
            $res = db_query($query);
            if(!$res){
                echo 'mysql error : ';
                print_r(mysqli_error($conn));
                die();
            }
            return db_find($table, mysqli_insert_id($GLOBALS['conn']));
        } catch (\Throwable $th) {
            return false;
        }
    }
}
catch(Exception $e){
    var_dump($e);
    die();
}