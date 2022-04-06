<?php
session_start();
    include_once('../../connection.php');

    if(isset($_POST["submit"])){

        if(!isset($_POST["username"]) || $_POST["username"] == null){
            header("location: ../index?error=username_null");
            exit();
        }
        else if(!isset($_POST["password"]) || $_POST["password"] == null){
            header("location: ../index?error=password_null");
            exit();
        }
        else{
            $username = mysqli_real_escape_string($conn, $_POST["username"]);
            $password = mysqli_real_escape_string($conn, $_POST["password"]);
            $sql = "SELECT * FROM login where username = '$username' AND password = '$password'";
            if($result = $conn->query($sql)){
                if($result->num_rows == 1){
                    if($row = $result->fetch_assoc()){
                        if($row["status"] == "active"){
                            $_SESSION["id"] = $row["loginId"];
                            $_SESSION["username"] = $row["username"];
                            $_SESSION["level"] = $row["level"];
                            $_SESSION["status"] = $row["status"];
                            $id = $row["loginId"];
                            $sql ="SELECT firstName, lastName FROM profile WHERE loginId = $id";
                            if($result = $conn->query($sql)){
                                if($result->num_rows == 1){
                                    if($row = $result->fetch_assoc()){
                                        $_SESSION["firstName"] = $row["firstName"];
                                        $_SESSION["lastName"] = $row["lastName"];
                                        date_default_timezone_set('Asia/Manila');
                                        $date = date("Y-m-d H:i:s");;
                                        $by = $_SESSION["username"];
                                        $sql = "UPDATE login SET lastLoginDate = '$date' WHERE loginId = $id";
                                        if($conn->query($sql)){
                                            $sql = "INSERT INTO adminlog (loginId, action, actionBy, date) VALUES($id, 'logged in', '$by', '$date')";
                                            if($conn->query($sql)){
                                                //Set Refresh header using PHP.
                                                //header( "refresh:3;url=landing.php" );
                                                header("location: ../landing?success=login_success");
                                                //Print out some content for example purposes.
                                                //echo 'Successful Login';
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        else if($row["status"] == "inactive"){
                            header("location: ../index?error=inactive");
                        }
                    }
                }
                else if($result->num_rows == 0){
                    header("location: ../index?error=no_account");
                }
            }
            else{
                echo "error sa sql";
            }
        }

    }else{
        header("location: ../index");
        exit();
    }

?>