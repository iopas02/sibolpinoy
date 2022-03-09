<?php
    require "../connection.php";
    require "layout.part/admin.header.php";

    if(isset($_POST["deleteUser"])){
        $loginId = $_POST["loginId"];
        $profileId = $_POST["profileId"];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $level = $_POST["level"];
        $reason = $_POST["reason"];
        $dateAdded = $_POST["dateAdded"];
        if(!isset($_POST["password"]) || $_POST["password"] == null){
            header("location: admin.con.php?error=password_null");
        }
        else if($password != $cpassword){
            header("location: admin.con.php?error=passwordNotEqual");
        }
        else{
            $id = $_POST["id"];
            $sql = "UPDATE login SET password= '$password' WHERE loginId = '$id'";
            //check username duplicate
            if($conn->query($sql)){   
                header( "refresh:3;url=admin.con.php" );
                echo "  <div class='loader_bg'>
                            <div class='welcome'>
                                <h2>Successfully Updated User! Redirecting to dashboard...</h2>
                            </div>
                            <div class='loader mt-5'></div>
                        </div>
                    ";   
            }
        }

    }

?>