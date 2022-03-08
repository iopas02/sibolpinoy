<?php
    require "../connection.php";

    if(isset($_POST["submit"])){
        $passw = trim($_POST["password"]);
        $passw2 = trim($_POST["cpassword"]);
        if(!isset($_POST["firstName"]) || $_POST["firstName"] == null){
            header("location: admin.con.php?error=firstName_null");
        }
        else if(!isset($_POST["lastName"]) || $_POST["lastName"] == null){
            header("location: admin.con.php?error=lastName_null");
        }
        else if(!isset($_POST["username"]) || $_POST["username"] == null){
            header("location: admin.con.php?error=username_null");
        }
        else if(!isset($_POST["password"]) || $_POST["password"] == null){
            header("location: admin.con.php?error=password_null");
        }
        else if(!isset($_POST["level"]) || $_POST["level"] == null){
            header("location: admin.con.php?error=level_null");
        }
        else if(!isset($_POST["status"]) || $_POST["status"] == null){
            header("location: admin.con.php?error=status_null");
        }
        else if($passw != $passw2){
            header("location: admin.con.php?error=passwordNotEqual");
        }
        else{
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            $level = $_POST["level"];
            $status = $_POST["status"];
            $sql = "INSERT INTO profile (firstName, lastName) VALUES('$firstName', '$lastName'";
            if($conn->query($sql)){
                $sql = "INSERT INTO login (username, password, level, status) VALUES ('$username', '$passw', '$level', '$status')";
                if($conn->query($sql)){

                }
                else{

                }                
            }
            else{

            }
        }

    }

?>