<?php

if(isset($_POST['email_submit'])) {

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
    
    // Sender info
    $mail->setFrom('irecommend.ahis.als@gmail.com', 'iRecommend Admin');
    $mail->addReplyTo('iRecommend.ahis.als@gmail.com', 'iRecommend Admin');

    // Add a recipient
    $mail->addAddress('treszeta28@gmail.com');

    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Set email format to HTML
    $mail->isHTML(true);

    // Mail subject
    $mail->Subject = 'Email from local host to test';

    // Mail body content
    $bodyContent = '<h1>How to Send Email from Localhost using PHP by InfoTech</h1>';
    $bodyContent .= '<p>This HTML email is sent from the localhost server using PHP by <b>TechWAR</b></p>';
    $mail->Body    = $bodyContent;



    if(!$mail->send()) {
        header("Location: ../contact.php?error=Message_not_sent");
        exit();
    } else {
        header("Location: ../contact.php?success=email_sent");
        exit();
    }
    
}

?>