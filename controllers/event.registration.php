<?php
include_once('../connection.php');

if(isset($_POST['register'])){
    // echo "You are connected!";
    if($_POST['firstname'] && $_POST['lastname'] && $_POST['mi'] && $_POST['email_add'] && $_POST['contact'] && $_POST['orgs'] && $_POST['position'] && $_POST['payment'] != ''){
        date_default_timezone_set("Asia/Manila");

        $eventID = mysqli_real_escape_string($conn, $_POST['eventID']);
        $event_title = mysqli_real_escape_string($conn, $_POST['event_title']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);

        $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $mi = mysqli_real_escape_string($conn, $_POST['mi']);
        $email_add = mysqli_real_escape_string($conn, $_POST['email_add']);
        $contact = mysqli_real_escape_string($conn, $_POST['contact']);
        $orgs = mysqli_real_escape_string($conn, $_POST['orgs']);
        $position = mysqli_real_escape_string($conn, $_POST['position']);
        $payment = mysqli_real_escape_string($conn, $_POST['payment']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $ss_payment = '';

        $registered_date = date("Y-m-d H:i:s");

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        // Output: 54esmdr0qf
        $random_num1 = substr(str_shuffle($permitted_chars), 0, 10);
        $random_num2 = substr(str_shuffle($permitted_chars), 0, 8);
        
        $year = date("Y");
        $uniID = $year."-".$random_num1;
        $reservationID = $year."-".$random_num2;
        
        $check_user_query = "SELECT `email_add` FROM `client` WHERE `email_add`=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $check_user_query)) {
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "s", $email_add);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);

            if($resultcheck > 0){
                $event_reservation_query = "INSER INTO `event_reservation`(`client_uniID`,`reservationID`,`eventID`,`ss_payment`,`payment_method`,`registered_by`,`date_registered`,`status`) VALUES ('$uniID',$reservationID','$eventID','$ss_payment','$payment','$uniID','$registered_date','$status'";

                $event_reservation_query_result = mysqli_query($conn, $event_reservation_query);
                if(!$event_reservation_query_result){
                    header("Location: ../event.php?event_reservation_failed");
                    exit();
                }else{
                    echo "addition member registration start here";
                }
            }else{
                $client_registration_query = "INSERT INTO `client`(`client_uniID`, `firstName`, `m.i.`, `lastName`, `email_add`, `contact`, `organization`, `position`, `date_register`) VALUES ('$uniID','$firstname','$mi','$lastname','$email_add','$contact','$orgs','$position','$registered_date')";

                $client_registration_query_result = mysqli_query($conn, $client_registration_query);
                if(!$client_registration_query_result){
                    header("Location: ../event.php?user_info_is_invalid");
                    exit();
                }else{

                    $event_reservation_query = "INSER INTO `event_reservation`(`client_uniID`,`reservationID`,`eventID`,`ss_payment`,`payment_method`,`registered_by`,`date_registered`,`status`) VALUES ('$uniID',$reservationID','$eventID','$ss_payment','$payment','$uniID','$registered_date','$status'";

                    $event_reservation_query_result = mysqli_query($conn, $event_reservation_query);
                    if(!$event_reservation_query_result){
                        header("Location: ../event.php?event_reservation_failed");
                        exit();
                    }else{
                        echo "addition member registration start here";
                    }
                }

            }
        }    

        // $newname = $_POST['newname'];
        // $newlastname =$_POST['newlastname'];
        // $newmi = $_POST['newmi'];
        // $newemail_add = $_POST['newemail_add'];
        // $newcontact = $_POST['newcontact'];
        // $payment1 = $_POST['payment1'];
        

        // foreach($newname as $index => $member){
        //     $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        //     // Output: 54esmdr0qf
        //     $random_num1 = substr(str_shuffle($permitted_chars), 0, 5);
            
        //     $year = date("Y");
        //     $uniID = $year."-".$random_num1; 

        //     $eventID;
        //     $event_title;
        //     $s_name = $member;
        //     $s_lastname = $newlastname[$index];
        //     $s_mi = $newmi[$index];
        //     $s_emailadd = $newemail_add[$index];
        //     $s_contact = $newcontact[$index];
        //     $s_payment = $payment1[$index];
        //     $reservationID;

        //     $members = $uniID.' '.$s_name.' '.$s_mi.'. '.$s_lastname.' '.$s_payment.'<br>';

        //      echo $members;
        // }
        // if($payment == "GCash"){
        //     $payments = "<br>Account Number: <span>0917 113 9078</span><br>
        //     Account Name: <span>SibolPINOY (Ceazar Valerie N.)</span>";
        // }else if($payments == "Bank Transfer"){
        //     $payments =  "<br>Account Number: <span>2000 2941 9654</span><br>
        //     Account Name: <span>Sibol-PINOY Management Consultancy</span><br>
        //     Bank: <span>EastWest Bank, The Fort-PSE TOWER</span>";
        // }else{
        //     $payments = "FREE WEBINAR";
        // }

        // $sender_name = $firstname.' '.$mi.' '.$lastname;
        
        // $subject = "Thank you for registration";
        // $company_email = "treszeta28@gmail.com";

        // $message = '';
        // $message .= "Thank You for your registration on ".$event_title. " that will start on " .$date.".<br>";
        // $message .= "Please Settle your payment to your selected methods of payment whisch is ".$payment. " With the Following Details ". $payments .".<br>" ;
        // $message .="With the Following member " ."'<br> <br>";
        // $message .="Please Upload your Screen Shot Payment on the bellow link. Thank you very much.<br>";
        // $message .="http://localhost/sibolpinoy/event.php"; 

        // $body = '';

        // $body .="From: " .$sender_name. "<br>";
        // $body .="Email :" . $company_email. "<br>";
        // $body .="Message :" .$message. "<br>";
        
        // Import PHPMailer classes into the global namespace
        // use PHPMailer\PHPMailer\PHPMailer;
        // use PHPMailer\PHPMailer\Exception;

        // require '../PHPMailer/src/Exception.php';
        // require '../PHPMailer/src/PHPMailer.php';
        // require '../PHPMailer/src/SMTP.php';

        // $mail = new PHPMailer\PHPMailer\PHPMailer();

        // $mail->isSMTP();                      // Set mailer to use SMTP
        // $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers
        // $mail->SMTPAuth = true;               // Enable SMTP authentication
        // $mail->Username = 'treszeta28@gmail.com';   // SMTP username
        // $mail->Password = 'xnhongbdpyodspfy';   // SMTP password
        // $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted
        // $mail->Port = 587;                    // TCP port to connect to
        // $mail->setFrom($company_email, '');
        // $mail->addReplyTo($company_email, $sender_name);

        // // Add a recipient
        // $mail->addAddress($email_add);

        // $mail->addCC($carbon_copy);
        // //$mail->addBCC('bcc@example.com');

        // // Set email format to HTML
        // $mail->isHTML(true);

        // // Mail subject
        // $mail->Subject = $subject;

        // // Mail body content
        // // $bodyContent = '<h1>How to Send Email from Localhost using PHP by InfoTech</h1>';
        // // $bodyContent .= '<p>This HTML email is sent from the localhost server using PHP by <b>TechWAR</b></p>';
        // $mail->Body = $body;

        // if(!$mail->send()) {
        //     header("Location: ../event.php?error=Message_not_sent");
        // } else {
        //     header("Location: ../event.php?success=email_sent");
        // }

    }else{
        header("Location: ../event.php?error=empty_fields");
        exit();
    }
}