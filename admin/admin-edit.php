<?php
    require "../connection.php";
    require "layout.part/admin.header.php";

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
        else if(!isset($_POST["level"]) || $_POST["level"] == null){
            header("location: admin.con.php?error=level_null");
        }
        else{
            $id = $_POST["id"];
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $level = $_POST["level"];
            $username = $_POST["username"];
            $sql = "UPDATE login SET username= '$username' ,level='$level' WHERE loginId = '$id'";
            //check username duplicate
            if($conn->query($sql)){   
                $sql = "UPDATE profile SET firstName = '$firstName', lastName = '$lastName' WHERE loginId = '$id'";
                //adding login table
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
                else{
                    echo "error sql";
                }
            }
        }

    }

?>