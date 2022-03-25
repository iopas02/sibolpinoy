<?php
include_once('../connection.php');

if(isset($_POST['uplaod'])){
    // echo "You are connected";

    if($_POST['email'] && $_POST['rev_id'] !=''){
        if($_FILES["sspayment"]["name"] !=''){

            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $rev_id = mysqli_real_escape_string($conn, $_POST['rev_id']);

            $targetDir = "../admin/upload/";
            $fileName = basename($_FILES["sspayment"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

            $allowTypes = array('jpg','png','jpeg','gif');
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["sspayment"]["tmp_name"], $targetFilePath)){
                    // Insert image file name into database
                    $insert = $conn->query("UPDATE `event_reservation` SET `ss_payment`='".$fileName."' WHERE `email_add`='$email' AND `reservationID`='$rev_id'");
                    if($insert){
                        header("Location: ../event.php?success=ss_payment_uploaded_successfully");
                        exit();
                    }else{
                        header("Location: ../ss_payment.link.php?error=uploaded_failed");
                        exit();
                    } 
                }else{
                    header("Location: ../ss_payment.link.php?error=uploading_interaption");
                    exit();
                }
            }else{
                header("Location: ../ss_payment.link.php?error=file_not_supported");
                exit();
            }

        }else{
            header("Location: ../ss_payment.link.php?error=please_uploaad_your_ss_payment");
            exit();
        }
    }else{
        header("Location: ../ss_payment.link.php?error=empty_field");
        exit();
    }
}