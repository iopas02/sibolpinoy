<?php
    require "../../connection.php";
    require "../layout.part/admin.header.php";

    if(isset($_POST["deleteUser"])){
        $loginId = mysqli_real_escape_string($conn, $_POST["loginId"]);
        $profileId = mysqli_real_escape_string($conn, $_POST["profileId"]);
        $firstName = mysqli_real_escape_string($conn, $_POST["firstName"]);
        $lastName = mysqli_real_escape_string($conn, $_POST["lastName"]);
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $level = mysqli_real_escape_string($conn, $_POST["level"]);
        $reason = mysqli_real_escape_string($conn, $_POST["reason"]);
        $status = mysqli_real_escape_string($conn, $_POST["status"]);
        $dateAdded = mysqli_real_escape_string($conn, $_POST["dateAdded"]);

        $dateDeleted = date("Y-m-d H:i:s");
        $sessionUsername = $_SESSION["username"];

        if(!isset($_POST["reason"]) || $_POST["reason"] == null){
            header("location: admin.con?error=reason_empty");
            exit();
        }
        else if($sessionUsername == $username){
            header("location: admin.con?error=error_self_delete");
            exit();
        }
        else{
            $sql = "INSERT INTO `archiveuser`(`loginId`, `profileId`, `firstName`, `lastName`, `username`, `level`, `reason`, `status`, `dateAdded`, `dateDeleted`) VALUES($loginId, $profileId, '$firstName', '$lastName', '$username', '$level', '$reason', '$status', '$dateAdded', '$dateDeleted')";

            if($conn->query($sql)){ 
                $sql ="UPDATE `login` SET `status`='$status' WHERE `loginId`='$loginId' AND `username`='$username' " ;

                if($conn->query($sql)){
                    date_default_timezone_set('Asia/Manila');

                    $by = $_SESSION["username"];
                    $date = date("Y-m-d H:i:s");
                    $action = "Archiving user";
                    $sql = "INSERT INTO `adminlog` (`loginId`,`action`,`actionBy`,`date`) VALUES($loginId,'$action','$by','$date')";
                    if($conn->query($sql)){
                        header("Location: ../admin.con?success=archiving_user_successfully");
                        exit();

                    }else{
                        header("Location: ../admin.con?error=adminlog_error");
                        exit();
                    }
                } 
                else{
                    header("Location: ../admin.con?error=user_archiving_failed");
                    exit();
                }
            }else{
                header("Location: ../admin.con?error=archive_user_error");
                exit();
            }
        }

    }else{
        header("Location: ../admin.con");
        exit();
    }

?>