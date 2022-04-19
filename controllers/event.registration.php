<?php
include_once('../connection.php');

if(isset($_POST['register'])){
    // echo "You are connected!";
    if($_POST['firstname'] && $_POST['lastname'] && $_POST['mi'] && $_POST['email_add'] && $_POST['contact'] && $_POST['orgs'] && $_POST['position'] && $_POST['payment'] != ''){
        date_default_timezone_set("Asia/Manila");

        $eventID = mysqli_real_escape_string($conn, $_POST['eventID']);
        $event_title = mysqli_real_escape_string($conn, $_POST['event_title']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $reg_fee = mysqli_real_escape_string($conn, $_POST['reg_fee']);

        $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $mi = mysqli_real_escape_string($conn, $_POST['mi']);
        $email_add = mysqli_real_escape_string($conn, $_POST['email_add']);
        $contact = mysqli_real_escape_string($conn, $_POST['contact']);
        $orgs = mysqli_real_escape_string($conn, $_POST['orgs']);
        $position = mysqli_real_escape_string($conn, $_POST['position']);
        $reservationid = mysqli_real_escape_string($conn, $_POST['reservationid']);
        $payment = mysqli_real_escape_string($conn, $_POST['payment']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $action = mysqli_real_escape_string($conn, $_POST['action']);
        $ss_payment = '';

        $registered_date = date("Y-m-d H:i:s");

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        // Output: 54esmdr0qf
        $random_num1 = substr(str_shuffle($permitted_chars), 0, 10);
        $random_num2 = substr(str_shuffle($permitted_chars), 0, 20);
        
        $year = date("Y");
        $uniID = $year."-".$random_num1;
        $reservation_ID = $year."-".$random_num2;

        if($reservationid != ''){
            $reservationID = $reservationid;
        }else {
            $reservationID = $reservation_ID;
        }
        
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
                $get_uniID_query = "SELECT * FROM `client` WHERE `email_add`='$email_add'";
                $get_uniID_query_result = mysqli_query($conn, $get_uniID_query);
                if (mysqli_num_rows($get_uniID_query_result) > 0){
                    while($row=mysqli_fetch_assoc($get_uniID_query_result)){
                        $client_uniID = $row['client_uniID'];
                        $email_add = $row['email_add'];
                        
                        $event_reservation_query = "INSERT INTO `event_reservation`(`email_add`, `reservationID`, `eventID`, `ss_payment`, `payment_method`, `date_registered`, `status`, `action`) VALUES ('$email_add ','$reservationID','$eventID','$ss_payment','$payment','$registered_date','$status','$action')";

                        $event_reservation_query_result = mysqli_query($conn, $event_reservation_query);
                        if(!$event_reservation_query_result){
                            header("Location: ../event?error=event_reservation_failed");
                            exit();
                        }else{

                            // sending email message start here for solo
                        
                            $payments1 = "GCash<br>Account Number: <span>0917 113 9078<br>SibolPINOY (Ceazar Valerie N.)<br>";
                            $payments2 = "Bank Transfer<br>Account Number:2000 2941 9654<br>Sibol-PINOY Management Consultancy<br>EastWest Bank, The Fort-PSE TOWER<br>";

                            // $sender_name = $firstname.' '.$mi.' '.$lastname;
        
                            $subject = "Thank You For Registration";
                            $company_email = "sibolPINOY@gmail.com";
                            $company = "Sibol-PINOY Management Consultancy";

                            $message = '';
                            $message .= "<p>Thank You for your Registration, please refers to the following information below <br><br>".
                            "Event Title: "."<b>".$event_title."</b><br>". 
                            "Date and Time: ". "<b>".$date."</b><br>".
                            "Resevation ID: ". "<b>".$reservationID."</b><br>".
                            "Free/Reg Fee: ". "<b>".$reg_fee."</b><br>".
                            "Method of Payment: <br>". "<b>".$payments1."</b><br>"."<b>".$payments2."</b>".
                            "<small>(Please ignore the following methods of payment if the Webinar is FREE.)</small>". 
                            "</p>".
                            "<p>Upload your Screen Shot Payment on the bellow link.(if the Webinar is FREE please ignore the link below), Thank you very much.</p>".
                            "http://localhost/sibolpinoy/ss_payment.link.php";

                            $body = '';

                            $body .="From: " .$company. "<br>";
                            $body .="Email :" . $company_email. "<br>";
                            $body .="Message :" .$message. "<br>";

                            require '../PHPMailer/src/Exception.php';
                            require '../PHPMailer/src/PHPMailer.php';
                            require '../PHPMailer/src/SMTP.php';

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
                            $mail->addAddress($email_add);

                            // $mail->addCC($carbon_copy);
                            // //$mail->addBCC('bcc@example.com');

                            // Set email format to HTML
                            $mail->isHTML(true);

                            // Mail subject
                            $mail->Subject = $subject;

                            // Mail body content
                            $mail->Body = $body;

                            if(!$mail->send()) {
                                header("Location: ../event?error=Message_not_sent");
                                exit();
                            } else {
                                header("Location: ../event?success=event_registration_sent");
                                exit();
                            }
                                   
                        }
                    }
                }

            }else{

                $client_registration_query = "INSERT INTO `client`(`client_uniID`, `firstName`, `mi`, `lastName`, `email_add`, `contact`, `organization`, `position`, `date_register`) VALUES ('$uniID','$firstname','$mi','$lastname','$email_add','$contact','$orgs','$position','$registered_date')";

                $client_registration_query_result = mysqli_query($conn, $client_registration_query);
                if(!$client_registration_query_result){
                    header("Location: ../event.php?user_info_is_invalid");
                    exit();
                }else{

                    $event_reservation_query = "INSERT INTO `event_reservation`(`email_add`, `reservationID`, `eventID`, `ss_payment`, `payment_method`, `date_registered`, `status`, `action`) VALUES ('$email_add','$reservationID','$eventID','$ss_payment','$payment','$registered_date','$status','$action')";

                    $event_reservation_query_result = mysqli_query($conn, $event_reservation_query);
                    if(!$event_reservation_query_result){
                        header("Location: ../event.php?event_reservation_failed");
                        exit();
                    }else{  

                        $payments1 = "GCash<br>Account Number: <span>0917 113 9078<br>SibolPINOY (Ceazar Valerie N.)<br>";
                        $payments2 = "Bank Transfer<br>Account Number:2000 2941 9654<br>
                        Sibol-PINOY Management Consultancy<br>EastWest Bank, The Fort-PSE TOWER<br>";

                        // $sender_name = $firstname.' '.$mi.' '.$lastname;
    
                        $subject = "Thank You For Registration";
                        $company_email = "sibolPINOY@gmail.com";
                        $company = "Sibol-PINOY Management Consultancy";

                        $message = '';
                        $message .= "<p>Thank You for your Registration, please refers to the following information below <br><br>".
                        "Event Title: "."<b>".$event_title."</b><br>". 
                        "Date and Time: ". "<b>".$date."</b><br>".
                        "Resevation ID: ". "<b>".$reservationID."</b><br>".
                        "Free/Reg Fee: ". "<b>".$reg_fee."</b><br>".
                        "Method of Payment: <br>". "<b>".$payments1."</b><br>"."<b>".$payments2."</b>".
                        "<small>(Please ignore the following methods of payment if the Webinar is FREE.)</small>". 
                        "</p>".
                        "<p>Upload your Screen Shot Payment on the bellow link.(if the Webinar is FREE please ignore the link below), Thank you very much.</p>".
                        "http://localhost/sibolpinoy/ss_payment.link.php"; 

                        $body = '';

                        $body .="From: " .$company. "<br>";
                        $body .="Email :" . $company_email. "<br>";
                        $body .="Message :" .$message."";
                        
                        
                        require '../PHPMailer/src/Exception.php';
                        require '../PHPMailer/src/PHPMailer.php';
                        require '../PHPMailer/src/SMTP.php';

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
                        $mail->addAddress($email_add);

                        // $mail->addCC($carbon_copy);
                        // //$mail->addBCC('bcc@example.com');

                        // Set email format to HTML
                        $mail->isHTML(true);

                        // Mail subject
                        $mail->Subject = $subject;

                        // Mail body content
                        $mail->Body = $body;

                        if(!$mail->send()) {
                            header("Location: ../event?error=Message_not_sent");
                        } else {
                            header("Location: ../event?success=event_registration_sent");
                        }
                        
                    }
                }

            }
        }    

    }else{
        header("Location: ../event?error=empty_fields");
        exit();
    }
}else{
    header("Location: ../event");
    exit();
}

