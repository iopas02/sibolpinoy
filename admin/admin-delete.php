<?php
    require "../connection.php";
    require "layout.part/admin.header.php";

    if(isset($_POST["deleteUser"])){
        $loginId = $_POST["loginId"];
        $profileId = $_POST["profileId"];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $username = $_POST["username"];
        $level = $_POST["level"];
        $reason = $_POST["reason"];
        $dateAdded = $_POST["dateAdded"];
        $dateDeleted = date("Y-m-d H:i:s");
        $sessionUsername = $_SESSION["username"];
        if(!isset($_POST["reason"]) || $_POST["reason"] == null){
            header("location: admin.con.php?error=reason_null");
        }
        else if($sessionUsername == $username){
            header("location: admin.con.php?error=error_self_delete");
        }
        else{
            $sql = "INSERT INTO archiveuser (loginId, profileId, firstName, lastName, username, level, reason, dateAdded, dateDeleted)
                    VALUES($loginId, $profileId, '$firstName', '$lastName', '$username', '$level', '$reason', '$dateAdded', '$dateDeleted')";
            if($conn->query($sql)){ 
                $sql ="DELETE profile, login FROM login INNER JOIN profile ON login.loginId = profile.loginId WHERE profile.loginId = $loginId" ;
                if($conn->query($sql)){
                    $by = $_SESSION["username"];
                    date_default_timezone_set('Asia/Manila');
                    $date = date("Y-m-d H:i:s");
                    $sql = "INSERT INTO adminlog (loginId, action, actionBy, date) VALUES($loginId, 'delete', '$by', '$date')";
                    if($conn->query($sql)){
                        header( "refresh:3;url=admin.con.php" );
                        echo "  <div class='loader_bg'>
                                    <div class='welcome'>
                                        <h2>Successfully Deleted User! Redirecting to dashboard...</h2>
                                    </div>
                                    <div class='loader mt-5'></div>
                                </div>
                            ";  
                    }
                } 
                else{
                    echo "bawal";
                }
            }
        }

    }

?>