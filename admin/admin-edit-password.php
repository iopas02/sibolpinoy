<?php
    require "../connection.php";
    require "layout.part/admin.header.php";

    if(isset($_POST["editPassword"])){
        $id = $_POST["id"];
        $password = "SPMC123";
        $sql = "UPDATE login SET password= '$password' WHERE loginId = '$id'";
        //check username duplicate
        if($conn->query($sql)){   
            header( "refresh:3;url=admin.con.php" );
            echo "  <div class='loader_bg'>
                        <div class='welcome'>
                            <h2>Successfully reset password! Redirecting to dashboard...</h2>
                        </div>
                        <div class='loader mt-5'></div>
                    </div>
                ";   
        }
    }

?>