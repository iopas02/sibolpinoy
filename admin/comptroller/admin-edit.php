<?php
    require "../../connection.php";
    require "../layout.part/admin.header.php";

    if(isset($_POST["update"])){
       
        if(!isset($_POST["firstName"]) || $_POST["firstName"] == null){
            header("location: admin.con.php?error=firstName_empty");
        }
        else if(!isset($_POST["lastName"]) || $_POST["lastName"] == null){
            header("location: admin.con.php?error=lastName_empty");
        }
        else if(!isset($_POST["username"]) || $_POST["username"] == null){
            header("location: admin.con.php?error=username_empty");
        }
        else if(!isset($_POST["level"]) || $_POST["level"] == null){
            header("location: admin.con.php?error=level_empty");
        }
        
        else{
            date_default_timezone_set('Asia/Manila'); 

            $id = mysqli_real_escape_string($conn, $_POST["id"]);
            $firstName = mysqli_real_escape_string($conn, $_POST["firstName"]);
            $lastName = mysqli_real_escape_string($conn, $_POST["lastName"]);
            $level = mysqli_real_escape_string($conn, $_POST["level"]);
            $username = mysqli_real_escape_string($conn, $_POST["username"]);
            $action = mysqli_real_escape_string($conn, $_POST["action"]);
            $actions = $action.' '.$username;

            $by = $_SESSION["username"];
            $loginid = $_SESSION["id"];

            $date = date("Y-m-d H:i:s");

            $verifyid_query = "SELECT * FROM `profile` WHERE `loginId`=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $verifyid_query)) {
                header("Location: ../admin.con?error=sql_error");
                exit();
            }else{
                mysqli_stmt_bind_param($stmt, "i", $id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultcheck = mysqli_stmt_num_rows($stmt);
                if($resultcheck > 0){

                    $update_login_query = "UPDATE `login` SET `username`='$username',`level`='$level' WHERE `loginId`='$id'";
                    if($conn->query($update_login_query)===TRUE){

                        $update_profile_query = "UPDATE `profile` SET `firstName`='$firstName',`lastName`='$lastName' WHERE `loginId`='[value-2]' ";

                        if($conn->query($update_profile_query)===TRUE){

                            $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$loginid', '$actions','$by', '$date')";
            
                            if($conn->query($create_adminlog)===TRUE){
                                header("Location: ../admin.con?success=user_update_successfully");
                                exit(); 
                            }else{
                                header("Location: ../admin.con?error=adminlog_error");
                                exit();
                            }


                        }else{
                            header("Location: ../admin.con?error=profile_details_failed");
                            exit();
                        }

                    }else{
                        header("Location: ../admin.con?error=login_details_failed");
                        exit();
                    }

                }else{
                    header("Location: ../admin.con?error=username_not_exist");
                    exit();
                }
            }  

    
        }

    }else{
        header("Location: ../admin.con?");
        exit();
    }

?>