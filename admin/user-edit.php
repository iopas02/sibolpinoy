<?php
    require "../connection.php";
    require "layout.part/admin.header.php";
    date_default_timezone_set('Asia/Manila');
    $date = date("Y-m-d H:i:s");
    if(isset($_POST["update"])){
        $username = $_POST["username"];
        if(!isset($_POST["firstName"]) || $_POST["firstName"] == null){
            header("location: admin.con.php?error=firstName_null");
        }
        else if(!isset($_POST["lastName"]) || $_POST["lastName"] == null){
            header("location: admin.con.php?error=lastName_null");
        }
        else if(!isset($_POST["username"]) || $_POST["username"] == null){
            header("location: admin.con.php?error=username_null");
        }
        else{
            $id = $_SESSION["id"];
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $username = $_POST["username"];
            $sql = "SELECT * FROM login WHERE username = '$username' AND loginId = $id";
            if($result = $conn->query($sql)){
                if($result->num_rows == 1){
                    $sql = "UPDATE profile SET firstName = '$firstName', lastName = '$lastName' WHERE loginId = '$id'";
                    //updating profile table
                    if($conn->query($sql)){
                        $_SESSION["firstName"] = $firstName;
                        $_SESSION["lastName"] = $lastName;
                        
                        $by = $_SESSION["username"];
                        $sql = "UPDATE profile SET firstName = '$firstName', lastName = '$lastName' WHERE loginId = '$id'";
                        //adding login table
                        if($conn->query($sql)){
                            $sql = "INSERT INTO adminlog (loginId, action, actionBy, date) VALUES($id, 'update', '$by', '$date')";
                            if($conn->query($sql)){
                                header("location:index.php");   
                            }
                        }
                        else{
                            echo "error sql";
                        } 
                    }
                    else{
                        echo "error sql";
                    }
                }
                else if($result->num_rows == 0){
                    $sql = "SELECT * FROM login WHERE username = '$username'";
                    if($result = $conn->query($sql)){
                        if($result->num_rows == 0){
                            $sql = "UPDATE profile INNER JOIN login ON login.loginId = profile.loginId  SET profile.firstName = '$firstName', profile.lastName = '$lastName' ,login.username = '$username'
                                    WHERE profile.loginId= $id";
                            if($conn->query($sql)){
                                $_SESSION["firstName"] = $firstName;
                                $_SESSION["lastName"] = $lastName;
                                $_SESSION["username"] = $username;
                                $by = $_SESSION["username"];
                                $sql = "UPDATE profile SET firstName = '$firstName', lastName = '$lastName' WHERE loginId = '$id'";
                                //adding login table
                                if($conn->query($sql)){
                                    $sql = "INSERT INTO adminlog (loginId, action, actionBy, date) VALUES($id, 'updated account', '$by', '$date')";
                                    if($conn->query($sql)){
                                        hheader("location:index.php");      
                                    }
                                }
                                else{
                                    echo "error sql";
                                }
                            }
                            else{
                                echo "sql error";
                            }
                        }
                        else{
                            header("location: admin.con.php?error=username_exist");
                        }
                    }
                }
            }
            else{
                echo "sql error";
            }
        }

    }

?>