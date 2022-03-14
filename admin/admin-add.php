<?php
    require "../connection.php";
    require "layout.part/admin.header.php";

    if(isset($_POST["submit"])){
        $passw = "SPMC123";
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
        else if(!isset($_POST["status"]) || $_POST["status"] == null){
            header("location: admin.con.php?error=status_null");
        }
        
        else{
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $level = $_POST["level"];
            $status = $_POST["status"];
            date_default_timezone_set('Asia/Manila');
            $date = date("Y-m-d H:i:s");
            $by = $_SESSION["username"];
            $sql = "SELECT * FROM login WHERE username = '$username'";
            //check username duplicate
            if($result= $conn->query($sql)){
                if($result->num_rows == 0){     
                    $sql = "INSERT INTO login (username, password, level, status, dateAdded, createdBy ) VALUES ('$username', '$passw', '$level', '$status' , '$date', '$by')";
                    //adding login table
                    if($conn->query($sql)){
                        $sql = "SELECT loginId FROM login WHERE username = '$username'";
                        //selecting id of login
                        if($result = $conn->query($sql)){
                            if($result->num_rows == 1){
                                $row = $result->fetch_assoc();
                                $id = $row["loginId"];
                                $sql = "INSERT INTO profile (loginId, firstName, lastName, dateAdded) VALUES ($id, '$firstName', '$lastName', '$date')";
                                //adding profile table
                                if($conn->query($sql)){
                                    header( "refresh:3;url=admin.con.php" );
                                    echo "  <div class='loader_bg'>
                                                <div class='welcome'>
                                                    <h2>Successfully added! Redirecting to dashboard...</h2>
                                                </div>
                                                <div class='loader mt-5'></div>
                                            </div>
                                        ";
                                }
                                else{
                                    echo "error profile add";
                                }      
                            }
                            else{
                                echo "no id found";
                            }
                        }          
                    }
                    else{
                        echo "error sql";
                    }
                }
                else{
                    header("location: admin.con.php?error=username_exist");
                }
            }
        }

    }

?>