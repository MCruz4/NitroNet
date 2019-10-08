<?php header("Content-type: Application/json");
session_start();
$data = null;
    if(isset($_SESSION['user'])){
        data["uname"] = $_SESSION['user'];
    }
    if(isset($_SESSION['userType'])){
        data["uType"] = $_SESSION['uType'];
    }
    if(isset($_SESSION['uid'])){
        data["userID"] = $_SESSION['uid'];
    }
    
    sleep(0.4);
    
    echo json_encode($data);