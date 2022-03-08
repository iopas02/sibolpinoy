<?php
    require "../connection.php";
    if(isset($_POST["active"])){
        $id = $_POST["id"];
        $sql = "UPDATE login SET status = 'active' WHERE loginId = $id";
        if($conn->query($sql)){
            header("location: admin.con.php");
        }
    }
    else if(isset($_POST["inactive"])){
        $id = $_POST["id"];
        $sql = "UPDATE login SET status = 'inactive' WHERE loginId = $id";
        if($conn->query($sql)){
            header("location: admin.con.php");
        }
    }
?>