<?php
include_once('../connection.php');

if(isset($_POST['register'])){
    // echo "You are connected!";
    if($_POST['firstname'] && $_POST['lastname'] && $_POST['mi'] && $_POST['email_add'] && $_POST['contact'] && $_POST['orgs'] && $_POST['position'] && $_POST['payment'] != ''){
        date_default_timezone_set("Asia/Manila");

        $eventID = mysqli_real_escape_string($conn, $_POST['eventID']);
        $event_title = mysqli_real_escape_string($conn, $_POST['event_title']);

        $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $mi = mysqli_real_escape_string($conn, $_POST['mi']);
        $contact = mysqli_real_escape_string($conn, $_POST['contact']);
        $orgs = mysqli_real_escape_string($conn, $_POST['orgs']);
        $position = mysqli_real_escape_string($conn, $_POST['position']);
        $payment = mysqli_real_escape_string($conn, $_POST['payment']);

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        // Output: 54esmdr0qf
        $random_num = substr(str_shuffle($permitted_chars), 0, 10);
        
        $year = date("Y");
        $uniID = $year."-".$random_num;

        $newname = $_POST['newname'];
        $newlastname =$_POST['newlastname'];
        $newmi = $_POST['newmi'];
        $newemail_add = $_POST['newemail_add'];
        $newcontact = $_POST['newcontact'];
        $payment1 = $_POST['payment1'];
        
        echo $uniID."<br>";
        echo $eventID."<br>";
        echo $event_title."<br>";
        echo $firstname."<br>";
        echo $lastname."<br>";
        echo $mi."<br>";
        echo $contact."<br>";
        echo $orgs."<br>";
        echo $position."<br>";
        echo $payment."<br><br>";

        foreach($newname as $index => $member){
            
            echo $eventID."<br>";
            echo $event_title."<br>";
            echo $member."<br>";
            echo $newlastname[$index]."<br>";
            echo $newmi[$index]."<br>";
            echo $newemail_add[$index]."<br>";
            echo $newcontact[$index]."<br>";
            echo $payment1[$index]."<br>";
            echo $uniID."<br><br>";
        }

    }else{
        header("Location: ../event.php?error=empty_fields");
        exit();
    }
}