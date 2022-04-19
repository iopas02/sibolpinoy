<?php
include_once('../../connection.php');

if(isset($_POST['eventapproved'])){
    // echo "you are connected!";
    date_default_timezone_set("Asia/Manila");

    $clientuniID = mysqli_real_escape_string($conn, $_POST['clientuniID']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $mi = mysqli_real_escape_string($conn, $_POST['mi']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $emailadd = mysqli_real_escape_string($conn, $_POST['emailadd']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $orgs = mysqli_real_escape_string($conn, $_POST['orgs']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);

    $eventid = mysqli_real_escape_string($conn, $_POST['eventid']);
    $eventname = mysqli_real_escape_string($conn, $_POST['eventname']);
    $dateandtime = mysqli_real_escape_string($conn, $_POST['dateandtime']);
    $status1 = mysqli_real_escape_string($conn, $_POST['status1']);


    $reservationid = mysqli_real_escape_string($conn, $_POST['reservationid']);
    $payment = mysqli_real_escape_string($conn, $_POST['payment']);
    $datergistered = mysqli_real_escape_string($conn, $_POST['datergistered']);

    $adminID = mysqli_real_escape_string($conn, $_POST['adminID']);
    $admin = mysqli_real_escape_string($conn, $_POST['admin']);
    $action2 = mysqli_real_escape_string($conn, $_POST['action2']);

    $date_approved =  date("Y-m-d H:i:s");

    $event_report_query = "INSERT INTO `event_reservation_reports`(`client_uniID`, `eventID`, `reservationID`, `date_and_time`, `payment_method`, `loginid`, `status`, `approved_date`) VALUES (?,?,?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $event_report_query)) {
        header("Location: ../event.reservation?error=sql_error");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "sissssss", $clientuniID, $eventid, $reservationid, $dateandtime, $payment, $adminID, $status1, $date_approved);
        if($stmt->execute()){

            $update_status_query = "UPDATE `event_reservation` SET `status`='$status1' WHERE `email_add`='$emailadd' AND `reservationID`='$reservationid'";
            if ($conn->query($update_status_query) === TRUE){

                $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$adminID', '$action2','$admin', '$date_approved')";
        
                if($conn->query($create_adminlog)===TRUE){
                    header("Location: ../event.reservation?success=event_reservation_reports_successfully");
                    exit(); 
                }else{
                    header("Location: ../event.reservation?error=adminlog_error");
                    exit();
                }

            }else{
                header("Location: ../event.reservation?error=update_event_reservation_status_failed");
                exit();
            }
            
        }else{
            header("Location: ../event.reservation?error=event_reservation_reports_failed");
            exit();
        }
    }    
}

if(isset($_POST['eventdeclined'])){
    date_default_timezone_set("Asia/Manila");

    $emailadd = mysqli_real_escape_string($conn, $_POST['emailadd']);
    $reservationid = mysqli_real_escape_string($conn, $_POST['reservationid']);
    $status2 = mysqli_real_escape_string($conn, $_POST['status2']);

    $adminID = mysqli_real_escape_string($conn, $_POST['adminID']);
    $admin = mysqli_real_escape_string($conn, $_POST['admin']);
    $action1 = mysqli_real_escape_string($conn, $_POST['action1']);

    $date =  date("Y-m-d H:i:s");

    $declined_er_queyry = "UPDATE `event_reservation` SET `status`='$status2' WHERE `email_add`='$emailadd' AND `reservationID`='$reservationid'";
    if($conn->query($declined_er_queyry) === TRUE) {

        $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$adminID', '$action1','$admin', '$date')";
        
        if($conn->query($create_adminlog)===TRUE){
            header("Location: ../event.reservation?success=event_reservation_update_successfully");
            exit(); 
        }else{
            header("Location: ../event.reservation?error=adminlog_error");
            exit();
        }        

    }else{
        header("Location: ../event.reservation?error=update_event_reservation_failed");
        exit();
    }
    
}

if(isset($_POST['sendmessage'])){
    if($_POST['message'] && $_POST['companymail'] !=''){
        date_default_timezone_set("Asia/Manila");

        $cuniID = mysqli_real_escape_string($conn, $_POST['cuniID']);
        $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
        $emailadd = mysqli_real_escape_string($conn, $_POST['emailadd']);
        $eventname = mysqli_real_escape_string($conn, $_POST['eventname']);
        $reservationid = mysqli_real_escape_string($conn, $_POST['reservationid']);
        $datetime = mysqli_real_escape_string($conn, $_POST['datetime']);

        $companymail = mysqli_real_escape_string($conn, $_POST['companymail']);
        $sentmessage = mysqli_real_escape_string($conn, $_POST['message']);

        $adminID = mysqli_real_escape_string($conn, $_POST['adminID']);
        $admin = mysqli_real_escape_string($conn, $_POST['admin']);
        $action = mysqli_real_escape_string($conn, $_POST['action']);

        $date = date("Y-m-d H:i:s");

        $subject = $eventname;
        $company_email = $companymail;
        $company = "Sibol-PINOY Management Consultancy";

        $message = '';
        $message .= "<p>".$sentmessage."<br>".
        "Services: "."<b>".$eventname."</b><br>". 
        "Date and Time: ". "<b>".$datetime."</b><br>".
        "Reservation ID: ". "<b>".$reservationid."</b><br>".
        "</p>".

        $body = '';

        $body .="From: " .$company. "<br>";
        $body .="Email :" . $company_email. "<br>";
        $body .="Message :" .$message. "<br>";

        require '../../PHPMailer/src/Exception.php';
        require '../../PHPMailer/src/PHPMailer.php';
        require '../../PHPMailer/src/SMTP.php';

        $mail = new PHPMailer\PHPMailer\PHPMailer();

        $mail->isSMTP();                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;               // Enable SMTP authentication
        $mail->Username = 'itdept.sibolpinoy@gmail.com';   // SMTP username
        $mail->Password = 'gsmprrixmbecdpzc';   // SMTP password
        $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                    // TCP port to connect to
        $mail->setFrom($company_email, $company);
        $mail->addReplyTo($company_email, $company);

        // Add a recipient
        $mail->addAddress($emailadd);

        // $mail->addCC($carbon_copy);
        // //$mail->addBCC('bcc@example.com');

        // Set email format to HTML
        $mail->isHTML(true);

        // Mail subject
        $mail->Subject = $subject;

        // Mail body content
        $mail->Body = $body;

        if(!$mail->send()) {
            header("Location: ../event.reservation?error=email_is_invalid");
            exit();
        } else {

            $email_query = "INSERT INTO `sent_email`(`client_uniID`, `email_add`, `loginId`, `company_email`, `subject`, `reply`, `action`, `date_reply`) VALUES ('$cuniID','$emailadd','$adminID','$companymail','$eventname','$sentmessage','$action','$date')";

            if($conn->query($email_query)===TRUE){

                $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$adminID', '$action','$admin', '$date')";
                
                if($conn->query($create_adminlog)===TRUE){
                    header("Location: ../event.reservation?success=email_sent_successfully");
                    exit(); 
                }else{
                    header("Location: ../event.reservation?error=adminlog_error");
                    exit();
                }

            }else{
                header("Location: ../event.reservation?error=email_query_failed");
                exit();
            }
        }
        

    }else{
        header("Location: ../event.reservation?error=empty_fields");
        exit();
    }

}else{
    header("Location: ../event.reservation");
    exit();
}