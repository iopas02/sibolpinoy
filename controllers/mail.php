<?php
include_once('../connection.php');

if(isset($_POST['email_submit'])) {

    if($_POST['first_name'] && $_POST['last_name'] && $_POST['cemail'] && $_POST['subject'] && $_POST['message'] !=''){
        
        date_default_timezone_set("Asia/Manila");

        $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
        $mi = mysqli_real_escape_string($conn, $_POST['mi']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
        $cemail = mysqli_real_escape_string($conn, $_POST['cemail']);
        $contact = mysqli_real_escape_string($conn, $_POST['contact']);
        $orgs = mysqli_real_escape_string($conn, $_POST['orgs']);
        $position = mysqli_real_escape_string($conn, $_POST['position']);
        $subject = mysqli_real_escape_string($conn, $_POST['subject']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        // Output: 54esmdr0qf
        $random_num = substr(str_shuffle($permitted_chars), 0, 10);
        $year = date("Y");
        $client_uniID = $year."-".$random_num;

        $date = date("Y-m-d H:i:s");
        $to = "itdept.sibolpinoy@gmail.com";
        $status = "New";

        
        $check_cmail = "SELECT `email_add` FROM `client` WHERE `email_add`=? ";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $check_cmail)) {
            header("Location: ../contact.php?");
            exit();
        }else {
            mysqli_stmt_bind_param($stmt, "s", $cemail);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);

            if($resultcheck > 0) {
                $get_client_query = "SELECT * FROM `client` WHERE `email_add`='$cemail' ";
                $result = $conn->query($get_client_query);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $client_uniID = $row['client_uniID'];

                        $email_request = "INSERT INTO `email`(`client_uniID`, `subject`, `message`, `status`, `date_mailed`) VALUES ('$client_uniID', '$subject', '$message', '$status', '$date')";

                        $email_result = mysqli_query($conn, $email_request);
                        if(!$email_result){
                            header("Location: ../contact.php?error=message_failed");
                            exit();
                        }else{

                            $sender = $first_name.' '.$mi.' '.$last_name;
      
                            $body = "";

                            $body .="From: " .$sender. "<br>";
                            $body .="Email :" .$cemail. "<br>";
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
                            
                            // Sender info
                            $mail->setFrom($cemail, $sender);
                            $mail->addReplyTo($cemail, $sender);

                            // Add a recipient
                            $mail->addAddress($to);

                            //$mail->addCC('cc@example.com');
                            //$mail->addBCC('bcc@example.com');

                            // Set email format to HTML
                            $mail->isHTML(true);

                            // Mail subject
                            $mail->Subject = $subject;

                            // Mail body content
                            $mail->Body    = $body;

                            if(!$mail->send()) {
                                header("Location: ../contact.php?error=Message_not_sent");
                                exit();
                            } else {
                                header("Location: ../contact.php?success=message_sent");
                                exit(); 
                            }
                        }
                    }
                }

            }else{
                $new_client_query = "INSERT INTO `client`(`client_uniID`, `firstName`, `mi`, `lastName`, `email_add`, `contact`, `organization`, `position`, `date_register`) VALUES ('$client_uniID','$first_name','$mi','$last_name','$cemail','$contact','$orgs','$position','$date')" ;

                $new_client_query_result = mysqli_query($conn,  $new_client_query);
                if(!$new_client_query_result ){
                    header("Location: ../contact.php?error=client_info_invalid");
                    exit();
                }else{
                    $email_request_query = "INSERT INTO `email`(`client_uniID`, `subject`, `message`, `status`, `date_mailed`) VALUES ('$client_uniID', '$subject', '$message', '$status', '$date')";

                    $email_query_result = mysqli_query($conn, $email_request_query);
                    if(!$email_query_result){
                        header("Location: ../contact.php?error=message_failed");
                        exit();
                    }else{
                       
                        $sender = $first_name.' '.$mi.' '.$last_name;
      
                        $body = "";

                        $body .="From: " . $sender. "<br>";
                        $body .="Email :" . $cemail. "<br>";
                        $body .="Message :" . $message. "<br>";
                    
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
                        
                        // Sender info
                        $mail->setFrom($cemail, $sender);
                        $mail->addReplyTo($cemail, $sender);

                        // Add a recipient
                        $mail->addAddress($to);

                        //$mail->addCC('cc@example.com');
                        //$mail->addBCC('bcc@example.com');

                        // Set email format to HTML
                        $mail->isHTML(true);

                        // Mail subject
                        $mail->Subject = $subject;

                        // Mail body content
                        $mail->Body    = $body;

                        if(!$mail->send()) {
                            header("Location: ../contact.php?error=Message_not_sent");
                            exit();
                        } else {
                            header("Location: ../contact.php?success=message_sent");
                            exit(); 
                        }
                    }
                }

            }
        }

    }else{
        header("Location: ../contact.php?error=empty_fields");
        exit();
    }

   
}

if(isset($_POST['consult_submit'])) {

    if($_POST['first_name'] && $_POST['last_name'] && $_POST['cemail'] && $_POST['subject'] && $_POST['message'] !=''){
        
        date_default_timezone_set("Asia/Manila");

        $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
        $mi = mysqli_real_escape_string($conn, $_POST['mi']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
        $cemail = mysqli_real_escape_string($conn, $_POST['cemail']);
        $contact = mysqli_real_escape_string($conn, $_POST['contact']);
        $orgs = mysqli_real_escape_string($conn, $_POST['orgs']);
        $position = mysqli_real_escape_string($conn, $_POST['position']);
        $subject = mysqli_real_escape_string($conn, $_POST['subject']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        // Output: 54esmdr0qf
        $random_num = substr(str_shuffle($permitted_chars), 0, 10);
        $year = date("Y");
        $client_uniID = $year."-".$random_num;

        $date = date("Y-m-d H:i:s");
        $to = "itdept.sibolpinoy@gmail.com";
        $status = "New";

        
        $check_cmail = "SELECT `email_add` FROM `client` WHERE `email_add`=? ";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $check_cmail)) {
            header("Location: ../contact.php?");
            exit();
        }else {
            mysqli_stmt_bind_param($stmt, "s", $cemail);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);

            if($resultcheck > 0) {
                $get_client_query = "SELECT * FROM `client` WHERE `email_add`='$cemail' ";
                $result = $conn->query($get_client_query);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $client_uniID = $row['client_uniID'];

                        $email_request = "INSERT INTO `email`(`client_uniID`, `subject`, `message`, `status`, `date_mailed`) VALUES ('$client_uniID', '$subject', '$message', '$status', '$date')";

                        $email_result = mysqli_query($conn, $email_request);
                        if(!$email_result){
                            header("Location: ../consultation.php?error=message_failed");
                            exit();
                        }else{

                            $sender = $first_name.' '.$mi.' '.$last_name;
      
                            $body = "";

                            $body .="From: " .$sender. "<br>";
                            $body .="Email :" .$cemail. "<br>";
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
                            
                            // Sender info
                            $mail->setFrom($cemail, $sender);
                            $mail->addReplyTo($cemail, $sender);

                            // Add a recipient
                            $mail->addAddress($to);

                            //$mail->addCC('cc@example.com');
                            //$mail->addBCC('bcc@example.com');

                            // Set email format to HTML
                            $mail->isHTML(true);

                            // Mail subject
                            $mail->Subject = $subject;

                            // Mail body content
                            $mail->Body = $body;

                            if(!$mail->send()) {
                                header("Location: ../consultation.php?error=Message_not_sent");
                                exit();
                            } else {
                                header("Location: ../consultation.php?success=message_sent");
                                exit(); 
                            }
                        }
                    }
                }

            }else{
                $new_client_query = "INSERT INTO `client`(`client_uniID`, `firstName`, `mi`, `lastName`, `email_add`, `contact`, `organization`, `position`, `date_register`) VALUES ('$client_uniID','$first_name','$mi','$last_name','$cemail','$contact','$orgs','$position','$date')" ;

                $new_client_query_result = mysqli_query($conn,  $new_client_query);
                if(!$new_client_query_result ){
                    header("Location: ../contact.php?error=client_info_invalid");
                    exit();
                }else{
                    $email_request_query = "INSERT INTO `email`(`client_uniID`, `subject`, `message`, `status`, `date_mailed`) VALUES ('$client_uniID', '$subject', '$message', '$status', '$date')";

                    $email_query_result = mysqli_query($conn, $email_request_query);
                    if(!$email_query_result){
                        header("Location: ../contact.php?error=message_failed");
                        exit();
                    }else{
                       
                        $sender = $first_name.' '.$mi.' '.$last_name;
      
                        $body = "";

                        $body .="From: " . $sender. "<br>";
                        $body .="Email :" . $cemail. "<br>";
                        $body .="Message :" . $message. "<br>";
                    
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
                        
                        // Sender info
                        $mail->setFrom($cemail, $sender);
                        $mail->addReplyTo($cemail, $sender);

                        // Add a recipient
                        $mail->addAddress($to);

                        //$mail->addCC('cc@example.com');
                        //$mail->addBCC('bcc@example.com');

                        // Set email format to HTML
                        $mail->isHTML(true);

                        // Mail subject
                        $mail->Subject = $subject;

                        // Mail body content
                        $mail->Body    = $body;

                        if(!$mail->send()) {
                            header("Location: ../consultation.php?error=Message_not_sent");
                            exit();
                        } else {
                            header("Location: ../consultation.php?success=message_sent");
                            exit(); 
                        }
                    }
                }

            }
        }

    }else{
        header("Location: ../consultation.php?error=empty_fields");
        exit();
    }

   
}

?>