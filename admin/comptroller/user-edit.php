<?php
    require "../../connection.php";
    require "../layout.part/admin.header.php";


    if(isset($_POST["update"])){
        $username = $_POST["username"];
        if(!isset($_POST["firstName"]) || $_POST["firstName"] == null){
            header("location: admin.con.php?error=firstName_empty");
        }
        else if(!isset($_POST["lastName"]) || $_POST["lastName"] == null){
            header("location: admin.con.php?error=lastName_empty");
        }
        else if(!isset($_POST["username"]) || $_POST["username"] == null){
            header("location: admin.con.php?error=username_empty");
        }
        else{
            date_default_timezone_set('Asia/Manila');
            $date = date("Y-m-d H:i:s");

            $loginid = $_SESSION["id"];
           
            $firstName = mysqli_real_escape_string($conn, $_POST["firstName"]);
            $lastName = mysqli_real_escape_string($conn, $_POST["lastName"]);
            $username = mysqli_real_escape_string($conn, $_POST["username"]);
            $action = mysqli_real_escape_string($conn, $_POST["action"]);

            $verify_user_query = "SELECT * FROM `login` WHERE `username`=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $verify_user_query)) {
                header("Location: ../admin.con?error=sql_error");
                exit();
            }else{
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultcheck = mysqli_stmt_num_rows($stmt);
                if($resultcheck > 0){
                    
                    $update_profile_query = "UPDATE `profile` SET `firstName`='$firstName',`lastName`='$lastName' WHERE `loginId`='$loginid'";
                    if($conn->query($update_profile_query)===TRUE){

                        $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$loginid', '$action','$username', '$date')";
            
                        if($conn->query($create_adminlog)===TRUE){
                            header("Location: ../landing?success=user_update_successfully");
                            exit(); 
                        }else{
                            header("Location: ../landing?error=adminlog_error");    
                            exit();
                        }

                    }else{
                        header("Location: ../landing?error=profile_details_failed");
                        exit();
                    }

                }else{
                    header("Location: ../landing?error=username_not_exist");
                    exit();
                }
            }     
            
        }    
           
    }else{
        header("Location: ../landing");
        exit();
    }

?>