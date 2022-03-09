<?php
    require "../connection.php";
    require "layout.part/admin.header.php";

    if(isset($_POST["editPassword"])){
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        if(!isset($_POST["password"]) || $_POST["password"] == null){
            header("location: landing.php?error=password_null");
        }
        else if($password != $cpassword){
            header("location: landing.php?error=passwordNotEqual");
        }
        else{
            $id = $_SESSION["id"];
            $sql = "UPDATE login SET password= '$password' WHERE loginId = $id";
            //check username duplicate
            if($conn->query($sql)){   
                header( "refresh:3;url=landing.php" );
                echo "  <div class='loader_bg'>
                            <div class='welcome'>
                                <h2>Successfully Updated Password! Redirecting to dashboard...</h2>
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
    else{
        echo "wala lang";
    }

?>