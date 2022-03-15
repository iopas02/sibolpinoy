<?php
// include_once('../connection.php');

if(isset($_POST['send_reply'])) {

    if($_POST['sender'] && $_POST['sender_email'] && $_POST['message'] !=''){
        
        date_default_timezone_set("Asia/Manila");

        // $cname = mysqli_real_escape_string($conn, $_POST['cname']);
        // $cemail = mysqli_real_escape_string($conn, $_POST['cemail']);
        // $subject = mysqli_real_escape_string($conn, $_POST['subject']);
        // $message = mysqli_real_escape_string($conn, $_POST['message']);

        $recipient_name = $_POST['recipient_name'];
        $recipient_email = $_POST['recipient_email'];
        $subject = $_POST['subject'];


        $sender_name = $_POST['sender'];
        $company_email = $_POST['sender_email'];
        $carbon_copy = $_POST['cc']; 
        $message = $_POST['message'];

        $date = date("Y-m-d H:i:s");
        $to = "irecommend.ahis.als@gmail.com";
        $status = "New";
      

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
        $mail->Body    = $body;



        if(!$mail->send()) {
            header("Location: ../inbox.php?error=Message_not_sent");
            exit();
        } else {
            header("Location: ../inbox.php?succes=message_senr");
            exit();
        }    
        //     $email_request = "INSERT INTO `email`(`sender_name`, `sender_email`, `subject`, `message`, `status`, `date_mailed`) VALUES ('$cname','$cemail','$subject','$message','$status','$date')";
        //     $email_result = mysqli_query($conn, $email_request);
        //     if(!$email_result){
        //         header("Location: ../contact.php?error=message_error");
        //         exit();
        //     }else{
        //         header("Location: ../contact.php?success=message_sent");
        //         exit();
        //     }
        // }
    
    }else{
        header("Location: ../inbox.php?error=empty_fields");
        exit();
    }

   
}

?>