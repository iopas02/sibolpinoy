<?php
    require "../../connection.php";
    require "../layout.part/admin.header.php";

    if(isset($_POST["editPassword"])){
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        $cpassword = mysqli_real_escape_string($conn, $_POST["cpassword"]);

        if(!isset($_POST["password"]) || $_POST["password"] == null){
            header("location: ../landing?error=password_null");
        }
        else if($password != $cpassword){
            header("location: ../landing?error=passwordNotEqual");
        }
        else if (strlen($password) > 7 ){

            $id = $_SESSION["id"];
            $by = $_SESSION["username"];

            date_default_timezone_set('Asia/Manila');
            $date = date("Y-m-d H:i:s");

            $verify_user_query =  $sql = "SELECT * FROM `login` WHERE `username`=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../landing?error=sql_error");
                exit();
            }else{
                mysqli_stmt_bind_param($stmt, "s", $by);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultcheck = mysqli_stmt_num_rows($stmt);

                if($resultcheck > 0){
                    $hashpassword = password_hash($password, PASSWORD_DEFAULT);

                    $sql = "UPDATE `login` SET `password`='$hashpassword' WHERE `loginId`= $id AND `username`='$by' ";
                    //check username duplicate
                    if($conn->query($sql)){   
                        $action = "Update Password";

                        $sql = "INSERT INTO adminlog (`loginId`,`action`,`actionBy`,`date`) VALUES($id, '$action', '$by', '$date')";
                        if($conn->query($sql)){
                            header( "Location: ../index?success=update_password_successfully");
                            exit();  
                        }else{
                            header( "Location: ../landing?error=adminlog_failed");
                            exit();
                        }
                    }
                    else{
                        header( "Location: ../landing?error=update_password_failed");
                        exit();
                    }

                }else{
                    header( "Location: ../index?error=user_not_exist" );
                    exit();
                }
            }

        }
        else{
            header( "Location: ../landing?error=password_should_have_8_character_and_above" );
            exit();
        }

    }
    else{
        header( "Location: ../landing" );
        exit();
    }

?>