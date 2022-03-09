<?php
    require "../connection.php";
    require "layout.part/admin.header.php";  
    $status = "";
    if(isset($_POST["active"])){
        $status = "active";
    }
    else if(isset($_POST["inactive"])){
        $status = "inactive";
    }
    if(isset($status) || $status != null){
        $username = $_POST["username"];
        $currentUser = $_SESSION["username"];
        if($username != $currentUser){
            $sql = "UPDATE login SET status = '$status' WHERE username = '$username'";
            if($conn->query($sql)){
                header( "refresh:3;url=admin.con.php" );
                                        echo "  <div class='loader_bg'>
                                                    <div class='welcome'>
                                                        <h2>Successfully changed status! Redirecting to dashboard...</h2>
                                                    </div>
                                                    <div class='loader mt-5'></div>
                                                </div>
                                            ";
            }
            else{
                echo "error sql";
            }
        }
        else{
            header("location: admin.con.php?error=error_self_status");
        }
    }
?>