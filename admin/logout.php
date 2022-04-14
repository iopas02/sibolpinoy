<?php
require "layout.part/admin.header.php";
include_once('../connection.php');
date_default_timezone_set("Asia/Manila");

$loginid = $_SESSION["id"];
$username = $_SESSION["username"];
$monitor = 'Out';
$action = 'Log out';

$date = date("Y-m-d H:i:s");

$logout_query = "UPDATE `login` SET `monitor`='$monitor' WHERE `loginId`='$loginid' OR `username`='$username'";
if($conn->query($logout_query)===TRUE){

    $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$loginid', '$action','$username', '$date')";
                
    if($conn->query($create_adminlog)===TRUE){
        session_destroy();
        unset($_SESSION['id']);
        unset($_SESSION['firstName']);
        unset($_SESSION['lastName']);
        unset($_SESSION['username']);
        unset($_SESSION['level']);
        header("Location: index?success=log_out_success");
        exit(); 
    }else{
        header("Location: ../landing?error=adminlog_error");
        exit();
    }

}else{
    header("Location: ../landing?error=update_stats_failed");
    exit();
}
?>