<?php
    require "../../connection.php";
    require "../layout.part/admin.header.php";

    if(isset($_POST["editPassword"])){
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $password = mysqli_real_escape_string($conn, $_POST['resetpass']);
        
        $sql = "SELECT * FROM `login` WHERE `loginId`=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../admin.con?error=sql_error");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);

            if($resultcheck > 0){
                $hashpassword = password_hash($password, PASSWORD_DEFAULT);

                $sql = "UPDATE `login` SET `password`='$hashpassword' WHERE loginId = '$id'";
                
                if($conn->query($sql)){   
                    $username_query = "SELECT `username` FROM `login` WHERE loginId = '$id'";
                    $username_query_result = $conn->query($username_query);
                    if($username_query_result > 0){
                        while($row = $username_query_result->fetch_assoc()){
                            $username = $row['username'];
                        }
                    } 

                    $by = $_SESSION["username"];
                    $action = "Reset Password of: ".' '.$username;
                    date_default_timezone_set('Asia/Manila');
                    $date = date("Y-m-d H:i:s");
                    $sql = "INSERT INTO adminlog (loginId, action, actionBy, date) VALUES($id,'$action','$by','$date')";
                    if($conn->query($sql)){
                        header( "Location: ../admin.con?success=password_reset_successfully" );
                        exit(); 
                    }else{
                        header( "Location: ../admin.con?error=adminlog_error" );
                        exit(); 
                    }

                }else{
                    header( "Location: ../admin.con?error=password_reset_failed" );
                    exit(); 
                }

            }else{
                header( "Location: ../admin.con?error=username_not_exist" );
                exit();
            }

        }
        
    }else{
        header( "Location: ../admin.con" );
        exit();
    }

?>