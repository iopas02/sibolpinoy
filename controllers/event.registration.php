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
                $get_uniID_query = "SELECT * FROM `client` WHERE `email_add`='$email_add'";
                $get_uniID_query_result = mysqli_query($conn, $get_uniID_query);
                if (mysqli_num_rows($get_uniID_query_result) > 0){
                    while($row=mysqli_fetch_assoc($get_uniID_query_result)){
                        $client_uniID = $row['client_uniID'];
                        $email_add = $row['email_add'];
                        
                        $event_reservation_query = "INSERT INTO `event_reservation`(`email_add`, `reservationID`, `eventID`, `ss_payment`, `payment_method`, `registered_by`, `date_registered`, `status`) VALUES ('$email_add ','$reservationID','$eventID','$ss_payment','$payment','$email_add','$registered_date','$status')";

                        $event_reservation_query_result = mysqli_query($conn, $event_reservation_query);
                        if(!$event_reservation_query_result){
                            header("Location: ../event.php?event_reservation_failed");
                            exit();
                        }else{

                            if($_POST['newname'] && $_POST['newlastname'] && $_POST['newmi']  && $_POST['newemail_add']  && $_POST['newcontact'] && $_POST['neworgs'] && $_POST['newposition'] && $_POST['payment1'] !=''){

                                $newname = $_POST['newname'];
                                $newlastname = $_POST['newlastname'];
                                $newmi = $_POST['newmi'];
                                $newemail_add = $_POST['newemail_add'];
                                $newcontact = $_POST['newcontact'];
                                $neworgs = $_POST['neworgs'];
                                $newposition = $_POST['newposition'];
                                $payment1 = $_POST['payment1'];
                                $newstatus = $_POST['newstatus'];

                                foreach($newname as $index => $member){
                                    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
                                    // Output: 54esmdr0qf
                                    $random_num1 = substr(str_shuffle($permitted_chars), 0, 5);
                                    
                                    $year = date("Y");
                                    $uniID = $year."-".$random_num1; 
                        
                                    $eventID;    
                                    $event_title;
                                    $reservationID;
                                    $s_name = $member;
                                    $s_lastname = $newlastname[$index];
                                    $s_mi = $newmi[$index];
                                    $s_emailadd = $newemail_add[$index];
                                    $s_contact = $newcontact[$index];
                                    $s_neworgs = $neworgs[$index];
                                    $s_neworgs = $neworgs[$index];
                                    $s_newposition = $newposition[$index];
                                    $s_payment = $payment1[$index];
                                    $s_newstatus = $newstatus[$index];

                                    $check_users_query = "SELECT * FROM `client` WHERE `email_add`=? ";
                                    $stmt = mysqli_stmt_init($conn);
                                    if(!mysqli_stmt_prepare($stmt, $check_users_query )){
                                        exit();
                                    }else{
                                        mysqli_stmt_bind_param($stmt, "s", $s_emailadd);
                                        mysqli_stmt_execute($stmt);
                                        mysqli_stmt_store_result($stmt);
                                        $resultcheck = mysqli_stmt_num_rows($stmt);
                            
                                        if($resultcheck > 0){

                                            $event_reservation_query = "INSERT INTO `event_reservation`(`email_add`, `reservationID`, `eventID`, `ss_payment`, `payment_method`, `registered_by`, `date_registered`, `status`) VALUES ('$s_emailadd','$reservationID','$eventID','$ss_payment','$s_payment','$email_add','$registered_date','$status')";

                                            $event_reservation_query_result = mysqli_query($conn, $event_reservation_query);
                                            if(!$event_reservation_query_result){
                                                header("Location: ../event.php?event_reservation_failed");
                                                exit();
                                            }else{
                                                // echo "Start for sending email for group";

                                                $payments1 = "GCash<br>Account Number: <span>0917 113 9078<br>SibolPINOY (Ceazar Valerie N.)<br>";
                                                $payments2 = "Bank Transfer<br>Account Number:2000 2941 9654<br>SibolPINOY (Ceazar Valerie N.)<br>Sibol-PINOY Management Consultancy<br>EastWest Bank, The Fort-PSE TOWER<br>";
                    
                                                // $sender_name = $firstname.' '.$mi.' '.$lastname;
                            
                                                $subject = "Thank You For Registration";
                                                $company_email = "sibolPINOY@gmail.com";
                                                $company = "Sibol-PINOY Management Consultancy";
                    
                                                $message = '';
                                                $message .= "<p>Thank You for your Registration, please refers to the following information below <br><br>".
                                                "Event Title: "."<b>".$event_title."</b><br>". 
                                                "Date and Time: ". "<b>".$date."</b><br>".
                                                "Resevation ID: ". "<b>".$reservationID."</b><br>".
                                                "Free/Reg Fee: ". "<b>".$payment."</b><br>".
                                                "Method of Payment: <br>". "<b>".$payments1."</b><br>"."<b>".$payments2."</b>".
                                                "<small>(Please ignore the following methods of payment if the Webinar is FREE.)</small>". 
                                                "</p>".
                                                "<p>Upload your Screen Shot Payment on the bellow link.(if the Webinar is FREE please ignore the link below), Thank you very much.</p>".
                                                "http://localhost/sibolpinoy/event.php";
                    
                                                // $body = '';
                    
                                                $body .="From: " .$company. "<br>";
                                                $body .="Email :" . $company_email. "<br>";
                                                $body .="Message :" .$message."";
                                                
                                                // Import PHPMailer classes into the global namespace
                                                // use PHPMailer\PHPMailer\PHPMailer;
                                                // use PHPMailer\PHPMailer\Exception;
                    
                                                require '../PHPMailer/src/Exception.php';
                                                require '../PHPMailer/src/PHPMailer.php';
                                                require '../PHPMailer/src/SMTP.php';
                    
                                                $mail = new PHPMailer\PHPMailer\PHPMailer();
                    
                                                $mail->isSMTP();                      // Set mailer to use SMTP
                                                $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers
                                                $mail->SMTPAuth = true;               // Enable SMTP authentication
                                                $mail->Username = 'treszeta28@gmail.com';   // SMTP username
                                                $mail->Password = 'xnhongbdpyodspfy';   // SMTP password
                                                $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted
                                                $mail->Port = 587;                    // TCP port to connect to
                                                $mail->setFrom($company_email, $company);
                                                $mail->addReplyTo($company_email, $company);
                    
                                                $email_selection_query = "SELECT `email_add` FROM `event_reservation` WHERE `reservationID`='$reservationID'";
                                                $result = $conn->query($email_selection_query);
                                                if ($result->num_rows > 0) {
                                                    foreach($result as $reg_email) {
      
                                                         // Add a recipient
                                                        $mail->addAddress($reg_email['email_add']);
                            
                                                    }
                                                }

                                                // $mail->addCC($carbon_copy);
                                                // //$mail->addBCC('bcc@example.com');
                    
                                                // Set email format to HTML
                                                $mail->isHTML(true);
                    
                                                // Mail subject
                                                $mail->Subject = $subject;
                    
                                                // Mail body content
                                                // $bodyContent = '<h1>How to Send Email from Localhost using PHP by InfoTech</h1>';
                                                // $bodyContent .= '<p>This HTML email is sent from the localhost server using PHP by <b>TechWAR</b></p>';
                                                $mail->Body = $body;
                    
                                                if(!$mail->send()) {
                                                    header("Location: ../event.php?error=Message_not_sent");
                                                } else {
                                                    header("Location: ../event.php?success=email_sent");
                                                }
                                            }


                                        }else{
                                            
                                            $member_registration_query = "INSERT INTO `client`(`client_uniID`, `firstName`, `m.i.`, `lastName`, `email_add`, `contact`, `organization`, `position`, `date_register`) VALUES ('$uniID','$s_name','$s_mi','$s_lastname','$s_emailadd','$s_contact','$s_neworgs','$s_newposition','$registered_date')";

                                            $member_registration_query_result = mysqli_query($conn, $member_registration_query);
                                            if(!$member_registration_query_result){
                                                header("Location: ../event.php?members_add_failed");
                                                exit();
                                            }else{
                                                 
                                                $event_reservation_query = "INSERT INTO `event_reservation`(`email_add`, `reservationID`, `eventID`, `ss_payment`, `payment_method`, `registered_by`, `date_registered`, `status`) VALUES ('$s_emailadd','$reservationID','$eventID','$ss_payment','$s_payment','$email_add','$registered_date','$status')";

                                                $event_reservation_query_result = mysqli_query($conn, $event_reservation_query);
                                                if(!$event_reservation_query_result){
                                                    header("Location: ../event.php?event_reservation_failed");
                                                    exit();
                                                }else{
                                                    // echo "Start for sending email for group";

                                                    $payments1 = "GCash<br>Account Number: <span>0917 113 9078<br>SibolPINOY (Ceazar Valerie N.)<br>";
                                                    $payments2 = "Bank Transfer<br>Account Number:2000 2941 9654<br>SibolPINOY (Ceazar Valerie N.)<br>Sibol-PINOY Management Consultancy<br>EastWest Bank, The Fort-PSE TOWER<br>";
                        
                                                    // $sender_name = $firstname.' '.$mi.' '.$lastname;
                                
                                                    $subject = "Thank You For Registration";
                                                    $company_email = "sibolPINOY@gmail.com";
                                                    $company = "Sibol-PINOY Management Consultancy";
                        
                                                    $message = '';
                                                    $message .= "<p>Thank You for your Registration, please refers to the following information below <br><br>".
                                                    "Event Title: "."<b>".$event_title."</b><br>". 
                                                    "Date and Time: ". "<b>".$date."</b><br>".
                                                    "Resevation ID: ". "<b>".$reservationID."</b><br>".
                                                    "Free/Reg Fee: ". "<b>".$payment."</b><br>".
                                                    "Method of Payment: <br>". "<b>".$payments1."</b><br>"."<b>".$payments2."</b>".
                                                    "<small>(Please ignore the following methods of payment if the Webinar is FREE.)</small>". 
                                                    "</p>".
                                                    "<p>Upload your Screen Shot Payment on the bellow link.(if the Webinar is FREE please ignore the link below), Thank you very much.</p>".
                                                    "http://localhost/sibolpinoy/event.php";
                        
                                                    // $body = '';
                        
                                                    $body .="From: " .$company. "<br>";
                                                    $body .="Email :" . $company_email. "<br>";
                                                    $body .="Message :" .$message."";
                                                    
                                                    // Import PHPMailer classes into the global namespace
                                                    // use PHPMailer\PHPMailer\PHPMailer;
                                                    // use PHPMailer\PHPMailer\Exception;
                        
                                                    require '../PHPMailer/src/Exception.php';
                                                    require '../PHPMailer/src/PHPMailer.php';
                                                    require '../PHPMailer/src/SMTP.php';
                        
                                                    $mail = new PHPMailer\PHPMailer\PHPMailer();
                        
                                                    $mail->isSMTP();                      // Set mailer to use SMTP
                                                    $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers
                                                    $mail->SMTPAuth = true;               // Enable SMTP authentication
                                                    $mail->Username = 'treszeta28@gmail.com';   // SMTP username
                                                    $mail->Password = 'xnhongbdpyodspfy';   // SMTP password
                                                    $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted
                                                    $mail->Port = 587;                    // TCP port to connect to
                                                    $mail->setFrom($company_email, $company);
                                                    $mail->addReplyTo($company_email, $company);
                        
                                                    $email_selection_query = "SELECT `email_add` FROM `event_reservation` WHERE `reservationID`='$reservationID'";
                                                    $result = $conn->query($email_selection_query);
                                                    if ($result->num_rows > 0) {
                                                        foreach($result as $reg_email) {
        
                                                             // Add a recipient
                                                            $mail->addAddress($reg_email['email_add']);
                                
                                                        }
                                                    }

                                                     // $mail->addCC($carbon_copy);
                                                    // //$mail->addBCC('bcc@example.com');
                        
                                                    // Set email format to HTML
                                                    $mail->isHTML(true);
                        
                                                    // Mail subject
                                                    $mail->Subject = $subject;
                        
                                                    // Mail body content
                                                    // $bodyContent = '<h1>How to Send Email from Localhost using PHP by InfoTech</h1>';
                                                    // $bodyContent .= '<p>This HTML email is sent from the localhost server using PHP by <b>TechWAR</b></p>';
                                                    $mail->Body = $body;
                        
                                                    if(!$mail->send()) {
                                                        header("Location: ../event.php?error=Message_not_sent");
                                                    } else {
                                                        header("Location: ../event.php?success=email_sent");
                                                    }
                                                }
                                            }
                                            
                                            
                                        }
                                    }
                                }
                            }else{
                                // sending email message start here for solo
                            
                                $payments1 = "GCash<br>Account Number: <span>0917 113 9078<br>SibolPINOY (Ceazar Valerie N.)<br>";
                                $payments2 = "Bank Transfer<br>Account Number:2000 2941 9654<br>SibolPINOY (Ceazar Valerie N.)<br>Sibol-PINOY Management Consultancy<br>EastWest Bank, The Fort-PSE TOWER<br>";
    
                                // $sender_name = $firstname.' '.$mi.' '.$lastname;
            
                                $subject = "Thank You For Registration";
                                $company_email = "sibolPINOY@gmail.com";
                                $company = "Sibol-PINOY Management Consultancy";
    
                                $message = '';
                                $message .= "<p>Thank You for your Registration, please refers to the following information below <br><br>".
                                "Event Title: "."<b>".$event_title."</b><br>". 
                                "Date and Time: ". "<b>".$date."</b><br>".
                                "Resevation ID: ". "<b>".$reservationID."</b><br>".
                                "Free/Reg Fee: ". "<b>".$payment."</b><br>".
                                "Method of Payment: <br>". "<b>".$payments1."</b><br>"."<b>".$payments2."</b>".
                                "<small>(Please ignore the following methods of payment if the Webinar is FREE.)</small>". 
                                "</p>".
                                "<p>Upload your Screen Shot Payment on the bellow link.(if the Webinar is FREE please ignore the link below), Thank you very much.</p>".
                                "http://localhost/sibolpinoy/event.php";

                                // $body = '';

                                $body .="From: " .$company. "<br>";
                                $body .="Email :" . $company_email. "<br>";
                                $body .="Message :" .$message. "<br>";
                                
                                // Import PHPMailer classes into the global namespace
                                // use PHPMailer\PHPMailer\PHPMailer;
                                // use PHPMailer\PHPMailer\Exception;

                                require '../PHPMailer/src/Exception.php';
                                require '../PHPMailer/src/PHPMailer.php';
                                require '../PHPMailer/src/SMTP.php';

                                $mail = new PHPMailer\PHPMailer\PHPMailer();

                                $mail->isSMTP();                      // Set mailer to use SMTP
                                $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers
                                $mail->SMTPAuth = true;               // Enable SMTP authentication
                                $mail->Username = 'treszeta28@gmail.com';   // SMTP username
                                $mail->Password = 'xnhongbdpyodspfy';   // SMTP password
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
                                // $bodyContent = '<h1>How to Send Email from Localhost using PHP by InfoTech</h1>';
                                // $bodyContent .= '<p>This HTML email is sent from the localhost server using PHP by <b>TechWAR</b></p>';
                                $mail->Body = $body;

                                if(!$mail->send()) {
                                    header("Location: ../event.php?error=Message_not_sent");
                                } else {
                                    header("Location: ../event.php?success=email_sent");
                                }
                                
                            }
                        }
                    }
                }

            }else{
                $client_registration_query = "INSERT INTO `client`(`client_uniID`, `firstName`, `m.i.`, `lastName`, `email_add`, `contact`, `organization`, `position`, `date_register`) VALUES ('$uniID','$firstname','$mi','$lastname','$email_add','$contact','$orgs','$position','$registered_date')";

                $client_registration_query_result = mysqli_query($conn, $client_registration_query);
                if(!$client_registration_query_result){
                    header("Location: ../event.php?user_info_is_invalid");
                    exit();
                }else{

                    $event_reservation_query = "INSERT INTO `event_reservation`(`email_add`, `reservationID`, `eventID`, `ss_payment`, `payment_method`, `registered_by`, `date_registered`, `status`) VALUES ('$email_add','$reservationID','$eventID','$ss_payment','$payment','$email_add','$registered_date','$status')";

                    $event_reservation_query_result = mysqli_query($conn, $event_reservation_query);
                    if(!$event_reservation_query_result){
                        header("Location: ../event.php?event_reservation_failed");
                        exit();
                    }else{
                        
                        if($_POST['newname'] && $_POST['newlastname'] && $_POST['newmi']  && $_POST['newemail_add']  && $_POST['newcontact'] && $_POST['neworgs'] && $_POST['newposition'] && $_POST['payment1'] !=''){

                            $newname = $_POST['newname'];
                            $newlastname = $_POST['newlastname'];
                            $newmi = $_POST['newmi'];
                            $newemail_add = $_POST['newemail_add'];
                            $newcontact = $_POST['newcontact'];
                            $neworgs = $_POST['neworgs'];
                            $newposition = $_POST['newposition'];
                            $payment1 = $_POST['payment1'];
                            $newstatus = $_POST['newstatus'];

                            foreach($newname as $index => $member){
                                $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
                                // Output: 54esmdr0qf
                                $random_num1 = substr(str_shuffle($permitted_chars), 0, 5);
                                
                                $year = date("Y");
                                $uniID = $year."-".$random_num1; 
                    
                                $eventID;    
                                $event_title;
                                $reservationID;
                                $s_name = $member;
                                $s_lastname = $newlastname[$index];
                                $s_mi = $newmi[$index];
                                $s_emailadd = $newemail_add[$index];
                                $s_contact = $newcontact[$index];
                                $s_neworgs = $neworgs[$index];
                                $s_neworgs = $neworgs[$index];
                                $s_newposition = $newposition[$index];
                                $s_payment = $payment1[$index];
                                $s_newstatus = $newstatus[$index];

                                $check_users_query = "SELECT * FROM `client` WHERE `email_add`=? ";
                                $stmt = mysqli_stmt_init($conn);
                                if(!mysqli_stmt_prepare($stmt, $check_users_query )){
                                    exit();
                                }else{
                                    mysqli_stmt_bind_param($stmt, "s", $s_emailadd);
                                    mysqli_stmt_execute($stmt);
                                    mysqli_stmt_store_result($stmt);
                                    $resultcheck = mysqli_stmt_num_rows($stmt);
                        
                                    if($resultcheck > 0){

                                        $event_reservation_query = "INSERT INTO `event_reservation`(`email_add`, `reservationID`, `eventID`, `ss_payment`, `payment_method`, `registered_by`, `date_registered`, `status`) VALUES ('$s_emailadd','$reservationID','$eventID','$ss_payment','$s_payment','$email_add','$registered_date','$status')";

                                        $event_reservation_query_result = mysqli_query($conn, $event_reservation_query);
                                        if(!$event_reservation_query_result){
                                            header("Location: ../event.php?event_reservation_failed");
                                            exit();
                                        }else{
                                            echo "Start for sending email for group";
                                        }


                                    }else{
                                        
                                        $member_registration_query = "INSERT INTO `client`(`client_uniID`, `firstName`, `m.i.`, `lastName`, `email_add`, `contact`, `organization`, `position`, `date_register`) VALUES ('$uniID','$s_name','$s_mi','$s_lastname','$s_emailadd','$s_contact','$s_neworgs','$s_newposition','$registered_date')";

                                        $member_registration_query_result = mysqli_query($conn, $member_registration_query);
                                        if(!$member_registration_query_result){
                                            header("Location: ../event.php?members_add_failed");
                                            exit();
                                        }else{
                                             
                                            $event_reservation_query = "INSERT INTO `event_reservation`(`email_add`, `reservationID`, `eventID`, `ss_payment`, `payment_method`, `registered_by`, `date_registered`, `status`) VALUES ('$s_emailadd','$reservationID','$eventID','$ss_payment','$s_payment','$email_add','$registered_date','$status')";

                                            $event_reservation_query_result = mysqli_query($conn, $event_reservation_query);
                                            if(!$event_reservation_query_result){
                                                header("Location: ../event.php?event_reservation_failed");
                                                exit();
                                            }else{
                                                // Start for sending email for group;

                                                $payments1 = "GCash<br>Account Number: <span>0917 113 9078<br>SibolPINOY (Ceazar Valerie N.)<br>";
                                                $payments2 = "Bank Transfer<br>Account Number:2000 2941 9654<br>SibolPINOY (Ceazar Valerie N.)<br>Sibol-PINOY Management Consultancy<br>EastWest Bank, The Fort-PSE TOWER<br>";
                    
                                                // $sender_name = $firstname.' '.$mi.' '.$lastname;
                            
                                                $subject = "Thank You For Registration";
                                                $company_email = "sibolPINOY@gmail.com";
                                                $company = "Sibol-PINOY Management Consultancy";
                    
                                                $message = '';
                                                $message .= "<p>Thank You for your Registration, please refers to the following information below <br><br>".
                                                "Event Title: "."<b>".$event_title."</b><br>". 
                                                "Date and Time: ". "<b>".$date."</b><br>".
                                                "Resevation ID: ". "<b>".$reservationID."</b><br>".
                                                "Free/Reg Fee: ". "<b>".$payment."</b><br>".
                                                "Method of Payment: <br>". "<b>".$payments1."</b><br>"."<b>".$payments2."</b>".
                                                "<small>(Please ignore the following methods of payment if the Webinar is FREE.)</small>". 
                                                "</p>".
                                                "<p>Upload your Screen Shot Payment on the bellow link.(if the Webinar is FREE please ignore the link below), Thank you very much.</p>".
                                                "http://localhost/sibolpinoy/event.php"; 
                    
                                                // $body = '';
                    
                                                $body .="From: " .$company. "<br>";
                                                $body .="Email :" . $company_email. "<br>";
                                                $body .="Message :" .$message."";
                                                
                                                // Import PHPMailer classes into the global namespace
                                                // use PHPMailer\PHPMailer\PHPMailer;
                                                // use PHPMailer\PHPMailer\Exception;
                    
                                                require '../PHPMailer/src/Exception.php';
                                                require '../PHPMailer/src/PHPMailer.php';
                                                require '../PHPMailer/src/SMTP.php';
                    
                                                $mail = new PHPMailer\PHPMailer\PHPMailer();
                    
                                                $mail->isSMTP();                      // Set mailer to use SMTP
                                                $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers
                                                $mail->SMTPAuth = true;               // Enable SMTP authentication
                                                $mail->Username = 'treszeta28@gmail.com';   // SMTP username
                                                $mail->Password = 'xnhongbdpyodspfy';   // SMTP password
                                                $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted
                                                $mail->Port = 587;                    // TCP port to connect to
                                                $mail->setFrom($company_email, $company);
                                                $mail->addReplyTo($company_email, $company);
                    
                                                $email_selection_query = "SELECT `email_add` FROM `event_reservation` WHERE `reservationID`='$reservationID'";
                                                $result = $conn->query($email_selection_query);
                                                if ($result->num_rows > 0) {
                                                    foreach($result as $reg_email) {

                                                         // Add a recipient
                                                        $mail->addAddress($reg_email['email_add']);
                                                        
                                                    }
                                                }

                                                // $mail->addCC($carbon_copy);
                                                // //$mail->addBCC('bcc@example.com');
                    
                                                // Set email format to HTML
                                                $mail->isHTML(true);
                    
                                                // Mail subject
                                                $mail->Subject = $subject;
                    
                                                // Mail body content
                                                // $bodyContent = '<h1>How to Send Email from Localhost using PHP by InfoTech</h1>';
                                                // $bodyContent .= '<p>This HTML email is sent from the localhost server using PHP by <b>TechWAR</b></p>';
                                                $mail->Body = $body;
                    
                                                if(!$mail->send()) {
                                                    header("Location: ../event.php?error=Message_not_sent");
                                                } else {
                                                    header("Location: ../event.php?success=email_sent");
                                                }
                                        
                                            }
                                        }
                                            
                                    }
                                }
                            }
                        }else{
                            // sending email message start here for solo
                            
                            // if($payment == "GCash"){
                            //     $payments = "<br>Account Number: <span>0917 113 9078</span><br>
                            //     Account Name: <span>SibolPINOY (Ceazar Valerie N.)</span>";
                            // }else if($payment == "Bank Transfer"){
                            //     $payments =  "<br>Account Number: <span>2000 2941 9654</span><br>
                            //     Account Name: <span>Sibol-PINOY Management Consultancy</span><br>
                            //     Bank: <span>EastWest Bank, The Fort-PSE TOWER</span>";
                            // }else{
                            //     $payments = "FREE WEBINAR";
                            // }

                            $payments1 = "GCash<br>Account Number: <span>0917 113 9078<br>SibolPINOY (Ceazar Valerie N.)<br>";
                            $payments2 = "Bank Transfer<br>Account Number:2000 2941 9654<br>SibolPINOY (Ceazar Valerie N.)<br>Sibol-PINOY Management Consultancy<br>EastWest Bank, The Fort-PSE TOWER<br>";

                            // $sender_name = $firstname.' '.$mi.' '.$lastname;
        
                            $subject = "Thank You For Registration";
                            $company_email = "sibolPINOY@gmail.com";
                            $company = "Sibol-PINOY Management Consultancy";

                            $message = '';
                            $message .= "<p>Thank You for your Registration, please refers to the following information below <br><br>".
                            "Event Title: "."<b>".$event_title."</b><br>". 
                            "Date and Time: ". "<b>".$date."</b><br>".
                            "Resevation ID: ". "<b>".$reservationID."</b><br>".
                            "Free/Reg Fee: ". "<b>".$payment."</b><br>".
                            "Method of Payment: <br>". "<b>".$payments1."</b><br>"."<b>".$payments2."</b>".
                            "<small>(Please ignore the following methods of payment if the Webinar is FREE.)</small>". 
                            "</p>".
                            "<p>Upload your Screen Shot Payment on the bellow link.(if the Webinar is FREE please ignore the link below), Thank you very much.</p>".
                            "http://localhost/sibolpinoy/event.php"; 

                            // $body = '';

                            $body .="From: " .$company. "<br>";
                            $body .="Email :" . $company_email. "<br>";
                            $body .="Message :" .$message."";
                            
                            // Import PHPMailer classes into the global namespace
                            // use PHPMailer\PHPMailer\PHPMailer;
                            // use PHPMailer\PHPMailer\Exception;

                            require '../PHPMailer/src/Exception.php';
                            require '../PHPMailer/src/PHPMailer.php';
                            require '../PHPMailer/src/SMTP.php';

                            $mail = new PHPMailer\PHPMailer\PHPMailer();

                            $mail->isSMTP();                      // Set mailer to use SMTP
                            $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers
                            $mail->SMTPAuth = true;               // Enable SMTP authentication
                            $mail->Username = 'treszeta28@gmail.com';   // SMTP username
                            $mail->Password = 'xnhongbdpyodspfy';   // SMTP password
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
                            // $bodyContent = '<h1>How to Send Email from Localhost using PHP by InfoTech</h1>';
                            // $bodyContent .= '<p>This HTML email is sent from the localhost server using PHP by <b>TechWAR</b></p>';
                            $mail->Body = $body;

                            if(!$mail->send()) {
                                header("Location: ../event.php?error=Message_not_sent");
                            } else {
                                header("Location: ../event.php?success=email_sent");
                            }
                        }
                    }
                }

            }
        }    

      

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