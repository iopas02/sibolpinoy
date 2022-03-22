<?php
include_once('../../connection.php');

if(isset($_POST["close_btn"])){

    $emailID = $_POST['emailID']; 
    $newStat = "Read";
    
    $change_stats = "UPDATE email SET status='$newStat' WHERE emailID='$emailID' ";
    $change_stats_results = mysqli_query($conn, $change_stats);
    if(!$change_stats_results){
        header("Location: ../inbox.php");
        exit();
    }else{
        header("Location: ../inbox.php");
        exit();
    }
}

if(isset($_POST['send_reply'])) {

    if($_POST['sender'] && $_POST['sender_email'] && $_POST['message'] !=''){
        
        date_default_timezone_set("Asia/Manila");

        $emailID = $_POST['emailID'];
        $client_id = $_POST['client_uniID'];

        $recipient_name = mysqli_real_escape_string($conn, $_POST['recipient_name']);
        $recipient_email = mysqli_real_escape_string($conn, $_POST['recipient_email']);
        $subject = mysqli_real_escape_string($conn, $_POST['subject']);

        $adminid = mysqli_real_escape_string($conn, $_POST['adminid']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $sender_name = mysqli_real_escape_string($conn, $_POST['sender']);
        $company_email = mysqli_real_escape_string($conn, $_POST['sender_email']);
        $carbon_copy = mysqli_real_escape_string($conn, $_POST['cc']); 
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        $reply_email = mysqli_real_escape_string($conn, $_POST['reply_email']);

        $date = date("Y-m-d H:i:s");

        $errors = array();
        $attachment_name = $_FILES['attach_file']['name'];
        $attachment_size = $_FILES['attach_file']['size'];
        $attachments_tmp = $_FILES['attach_file']['tmp_name'];
        $attachment_type = $_FILES['attach_file']['type'];
        // $file_ext=strtolower(end(explode('.',$_FILES['attach_file']['name'])));

        // $expensions= array("jpeg","jpg","png","pdf", "gif", "doc", "docx", "ppt", "pptx")

        // move_uploaded_file($attachments_tmp,"../upload/".$attachment_name); //The folder where you would like your file to be saved

        if(!$attachment_name){

            $body = "";

            $body .="From: " .$sender_name. "<br>";
            $body .="Email :" . $company_email. "<br>";
            $body .="Message :" .$message. "<br>";
            
            // Import PHPMailer classes into the global namespace
            // use PHPMailer\PHPMailer\PHPMailer;
            // use PHPMailer\PHPMailer\Exception;
    
            require '../../PHPMailer/src/Exception.php';
            require '../../PHPMailer/src/PHPMailer.php';
            require '../../PHPMailer/src/SMTP.php';
    
            $mail = new PHPMailer\PHPMailer\PHPMailer();
    
            $mail->isSMTP();                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;               // Enable SMTP authentication
            $mail->Username = 'treszeta28@gmail.com';   // SMTP username
            $mail->Password = 'xnhongbdpyodspfy';   // SMTP password
            $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                    // TCP port to connect to
            $mail->setFrom($company_email, '');
            $mail->addReplyTo($company_email, $sender_name);
    
            // Add a recipient
            $mail->addAddress($recipient_email);
    
            $mail->addCC($carbon_copy);
            //$mail->addBCC('bcc@example.com');
    
            // Set email format to HTML
            $mail->isHTML(true);
    
            // Mail subject
            $mail->Subject = $subject;
    
            // Mail body content
            // $bodyContent = '<h1>How to Send Email from Localhost using PHP by InfoTech</h1>';
            // $bodyContent .= '<p>This HTML email is sent from the localhost server using PHP by <b>TechWAR</b></p>';
            $mail->Body = $body;
    
            if(!$mail->send()) {
                header("Location: ../inbox.php?error=Message_not_sent");
                exit();
            } else {
               $email_record_query = "INSERT INTO `sent_email`(`client_uniID`, `emailID`, `loginId`, `company_email`, `cc`, `subject`, `reply`, `action`, `date_reply`) VALUES ('$client_id','$emailID','$adminid','$company_email','$carbon_copy','$subject','$message','$reply_email','$date')";
               
                $email_record_query_result = mysqli_query($conn, $email_record_query);
                if(!$email_record_query_result){
                    header("Location: ../inbox.php?error=email_query_error");
                    exit(); 
                }else{
                    $insert_log_query = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$adminid','$reply_email','$username','$date')";
    
                    $insert_log_query_result = mysqli_query($conn, $insert_log_query);
                    if(!$insert_log_query_result){
                        header("Location: ../inbox.php?error=log_query_error");
                        exit();
                    }else{
                        header("Location: ../inbox.php?success=email_sent");
                        exit();
                    }
                }
            }
              
        }else {
            $errors = array();
            $attachment_name = $_FILES['attach_file']['name'];
            $attachment_size = $_FILES['attach_file']['size'];
            $attachments_tmp = $_FILES['attach_file']['tmp_name'];
            $attachment_type = $_FILES['attach_file']['type'];

            $file_ex = pathinfo($attachment_name, PATHINFO_EXTENSION);
            $file_ex_loc = strtolower($file_ex );

            $new_file_name = $attachment_name.'.'.$file_ex_loc;
            $file_upload_path = '../upload/'.$new_file_name;
            move_uploaded_file($attachments_tmp, $file_upload_path);

            $body = "";

            $body .="From: " .$sender_name. "<br>";
            $body .="Email :" . $company_email. "<br>";
            $body .="Message :" .$message. "<br>";
            
            // Import PHPMailer classes into the global namespace
            // use PHPMailer\PHPMailer\PHPMailer;
            // use PHPMailer\PHPMailer\Exception;

            require '../../PHPMailer/src/Exception.php';
            require '../../PHPMailer/src/PHPMailer.php';
            require '../../PHPMailer/src/SMTP.php';

            $mail = new PHPMailer\PHPMailer\PHPMailer();

            $mail->isSMTP();                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;               // Enable SMTP authentication
            $mail->Username = 'treszeta28@gmail.com';   // SMTP username
            $mail->Password = 'xnhongbdpyodspfy';   // SMTP password
            $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                    // TCP port to connect to
            $mail->addAttachment("../upload/".$new_file_name);
            // Sender info
            $mail->setFrom($company_email, '');
            $mail->addReplyTo($company_email, $sender_name);

            // Add a recipient
            $mail->addAddress($recipient_email);

            $mail->addCC($carbon_copy);
            //$mail->addBCC('bcc@example.com');

            // Set email format to HTML
            $mail->isHTML(true);

            // Mail subject
            $mail->Subject = $subject;

            // Mail body content
            // $bodyContent = '<h1>How to Send Email from Localhost using PHP by InfoTech</h1>';
            // $bodyContent .= '<p>This HTML email is sent from the localhost server using PHP by <b>TechWAR</b></p>';
            $mail->Body = $body;

            if(!$mail->send()) {
                header("Location: ../inbox.php?error=Message_not_sent");
                exit();
            } else {
            $email_record_query = "INSERT INTO `sent_email`(`client_uniID`, `emailID`, `loginId`, `company_email`, `cc`, `subject`, `reply`, `attachment`, `action`, `date_reply`) VALUES ('$client_id','$emailID','$adminid','$company_email','$carbon_copy','$subject','$message','$new_file_name','$reply_email','$date')";
            
                $email_record_query_result = mysqli_query($conn, $email_record_query);
                if(!$email_record_query_result){
                    header("Location: ../inbox.php?error=email_query_error");
                    exit(); 
                }else{
                    $insert_log_query = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$adminid','$reply_email','$username','$date')";

                    $insert_log_query_result = mysqli_query($conn, $insert_log_query);
                    if(!$insert_log_query_result){
                        header("Location: ../inbox.php?error=log_query_error");
                        exit();
                    }else{
                        header("Location: ../inbox.php?success=email_sent");
                        exit();
                    }
                }
            }

        }

    }else{
        header("Location: ../inbox.php?error=empty_fields");
        exit();
    }

   
}

?>