<?php
session_start();
    require "../connection.php";

    if(isset($_POST["submit"])){
        if(!isset($_POST["username"]) || $_POST["username"] == null){
            header("location: index.php?error=username_null");
        }
        else if(!isset($_POST["password"]) || $_POST["password"] == null){
            header("location: index.php?error=password_null");
        }
        else{
            $username = $_POST["username"];
            $password = $_POST["password"];
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
                                            $sql = "INSERT INTO adminlog (loginId, action, actionBy, date) VALUES($id, 'login', '$by', '$date')";
                                            if($conn->query($sql)){
                                                //Set Refresh header using PHP.
                                                //header( "refresh:3;url=landing.php" );
                                                header("location:landing.php");
                                                //Print out some content for example purposes.
                                                //echo 'Successful Login';
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        else if($row["status"] == "inactive"){
                            header("location: index.php?error=inactive");
                        }
                    }
                }
                else if($result->num_rows == 0){
                    header("location: index.php?error=no_account");
                }
            }
        }

    }

?>