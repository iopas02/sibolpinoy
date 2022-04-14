<?php
    require "../../connection.php";
    require "../layout.part/admin.header.php";

    if(isset($_POST["submit"])){
        
        if(!isset($_POST["firstName"]) || $_POST["firstName"] == null){
            header("location: ../admin.con?error=firstName_null");
        }
        else if(!isset($_POST["lastName"]) || $_POST["lastName"] == null){
            header("location: ../admin.con?error=lastName_null");
        }
        else if(!isset($_POST["username"]) || $_POST["username"] == null){
            header("location: ../admin.con?error=username_null");
        }
        else if(!isset($_POST["level"]) || $_POST["level"] == null){
            header("location: ../admin.con?error=level_null");
        }
        else if(!isset($_POST["status"]) || $_POST["status"] == null){
            header("location: ../admin.con?error=status_null");
        }
        
        else{
            date_default_timezone_set('Asia/Manila');

            $username = mysqli_real_escape_string($conn, $_POST["username"]);
            $passw = mysqli_real_escape_string($conn, $_POST["password"]);

            $firstName = mysqli_real_escape_string($conn, $_POST["firstName"]);
            $lastName = mysqli_real_escape_string($conn, $_POST["lastName"]);
            $level = mysqli_real_escape_string($conn, $_POST["level"]);
            $status = mysqli_real_escape_string($conn, $_POST["status"]);

            if($level == 0){
                $adlevel = "Admin";
            }else{
                $adlevel = "Super Admin";
            }
            
            $date = date("Y-m-d H:i:s");
            $loginid = $_SESSION["id"];
            $by = $_SESSION["username"];
            $action = "Create New ".$adlevel;

            $sql = "SELECT * FROM `login` WHERE `username`=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../admin.con?error=sql_error");
                exit();
            }else{
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultcheck = mysqli_stmt_num_rows($stmt);

                if($resultcheck > 0){
                    header("Location: ../admin.con?username_already_exist");
                    exit();
                }else{
                    //check username duplicate
                    $hashpassword = password_hash($passw, PASSWORD_DEFAULT);
                    $reg_query = "INSERT INTO login (`username`, `password`, `level`, `status`, `dateAdded`,`createdBy`) VALUE (?,?,?,?,?,?)";
                    $stmt2 = $conn->prepare($reg_query);
                    mysqli_stmt_bind_param($stmt2, "ssssss", $username,$hashpassword, $level, $status, $date, $by);
                    //adding login table
                    if($stmt2->execute()){
                        $logid = $conn->insert_id;

                        $admin_profile_query = "INSERT INTO profile (loginId, firstName, lastName, dateAdded) VALUES (?,?,?,?)";
                        $stmt3 = $conn->prepare($admin_profile_query);
                        mysqli_stmt_bind_param($stmt3, "isss", $logid,$firstName,$lastName,$date);
                        //adding profile table
                        if($stmt3->execute()){

                            $admin_log_query = "INSERT INTO adminlog (loginId, action, actionBy, date) VALUES(?,?,?,?)";
                            $stmt4 = $conn->prepare($admin_log_query);
                            mysqli_stmt_bind_param($stmt4, "isss", $loginid,$action,$by,$date);

                            if($stmt4->execute()){
                                header( "Location: ../admin.con?success=new_admin_created_successfully" );
                                exit();
                        
                            }else{
                                header("Location: ../admin.con?admin_log_failed");
                                exit();
                            }

                        }else{
                            header("Location: ../admin.con?admin_profile_failed");
                            exit();
                        }      
                                 
                    }else{
                        header("Location: ../admin.con?create_new_admin_failed");
                        exit();
                    }
                
                }
            }
            
           
        }

    }

    if(isset($_POST['activate'])){
        // echo "You are connected!";
        date_default_timezone_set('Asia/Manila');

        $archiveid = mysqli_real_escape_string($conn, $_POST['archiveid']);
        $loginid = mysqli_real_escape_string($conn, $_POST['loginid']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $active = mysqli_real_escape_string($conn, $_POST['active']);

        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $user = mysqli_real_escape_string($conn, $_POST['user']);
        $newaction = mysqli_real_escape_string($conn, $_POST['newaction']);

        $action = $newaction.' '.$username;

        $date = date("Y-m-d H:i:s");

        $verifyid_query = "SELECT * FROM `login` WHERE `username`=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $verifyid_query)) {
            header("Location: ../user.archive?error=sql_error");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);
            if($resultcheck > 0){

                $update_admin_query ="UPDATE `login` SET `status`='$active' WHERE `loginId`='$loginId' OR `username`='$username' " ;
                if($conn->query($update_admin_query)===TRUE) {

                    $delete_archive_query = "DELETE FROM `archiveuser` WHERE `id`='$archiveid' AND `username`='$username' ";

                    if($conn->query($delete_archive_query)===TRUE){

                        $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$id', '$action','$user', '$date')";
            
                            if($conn->query($create_adminlog)===TRUE){
                                header("Location: ../admin.con?success=activate_user_successfully");
                                exit(); 
                            }else{
                                header("Location: ../user.archive?error=adminlog_error");
                                exit();
                            }

                    }else{
                        header("Location: ../user.archive?error=delete_archive_failed");
                        exit();
                    }

                }else{
                    header("Location: ../user.archive?error=update_user_failed");
                    exit();
                }               

            }else{
                header("Location: ../user.archive?error=username_not_exist");
                exit();
            }
        }
    }

?>
