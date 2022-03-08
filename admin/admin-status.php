<?php
    require "../connection.php";
    require "layout.part/admin.header.php";  
    if(isset($_POST["active"])){
        $id = $_POST["id"];
        $sql = "UPDATE login SET status = 'active' WHERE loginId = $id";
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
    }
    else if(isset($_POST["inactive"])){
        $id = $_POST["id"];
        $sql = "UPDATE login SET status = 'inactive' WHERE loginId = $id";
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
    }
?>