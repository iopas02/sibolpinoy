<?php
    require "../../connection.php";
    require "../layout.part/admin.header.php";  
    $status = "";
    if(isset($_POST["active"])){
        $status = "active";
    }
    else if(isset($_POST["inactive"])){
        $status = "inactive";
    }

    if(isset($status) || $status != null){
        $username = $_POST["username"];
        $currentUser = $_SESSION["username"];

        if($username != $currentUser){
            $sql = "UPDATE login SET status = '$status' WHERE username = '$username'";

            if($conn->query($sql)){
                $id = $_SESSION["id"];
                $by = $_SESSION["username"];
                date_default_timezone_set('Asia/Manila');
                $date = date("Y-m-d H:i:s");
                $sql = "INSERT INTO adminlog (loginId, action, actionBy, date) VALUES($id, 'updated status', '$by', '$date')";
                if($conn->query($sql)){
                    header("location: ../admin.con?success=user_status_change_successfully");
                    exit();
                }
            }
            else{
                header("location: ../admin.con?error=user_status_change_failed");
                exit();
            }
        }
        else{
            header("location: ../admin.con?error=error_self_status");
            exit();
        }
    }else{
        header("location: ../admin.con");
        exit();
    }
?>