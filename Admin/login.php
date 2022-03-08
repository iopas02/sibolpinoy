<?php
session_start();
    require "../connection.php";

    if(isset($_POST["submit"])){
        if(!isset($_POST["username"]) || $_POST["username"] == null){
            header("location: index.php?error=username_null");
        }
        else if(!isset($_POST["username"]) || $_POST["username"] == null){
            header("location: index.php?error=password_null");
        }
        else{
            $username = $_POST["username"];
            $password = $_POST["password"];
            $level = $_POST["level"];
            $sql = "SELECT * FROM login where username = '$username' AND password = '$password' AND level = '$level'";
            if($result = $conn->query($sql)){
                if($result->num_rows == 1){
                    if($row = $result->fetch_assoc()){
                        $_SESSION["username"] = $row["username"];
                        $_SESSION["level"] = $row["level"];
                        $_SESSION["status"] = $row["status"];
                        header("location: landing.php?success=login");
                    }
                }
                else if($result->num_rows == 0){
                    header("location: index.php?error=no_account");
                }
            }
        }

    }

?>