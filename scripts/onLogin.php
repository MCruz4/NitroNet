<?php header("Content-type: Application/json");
session_start();
    $_SESSION['user'] = $_POST['uname'];
    $_SESSION['userID'] = $_POST['uid'];
    $_SESSION['userType'] = $_POST['utype'];
    sleep(0.4);
    echo json_encode(true);