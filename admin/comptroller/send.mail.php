<?php
include_once('../../connection.php');

if(isset($_POST["cstatus"])){
    
    $emailID = $_POST['emailID']; 
    $newStat = "Read";
    
    $change_stats = "UPDATE email SET status='$newStat' WHERE emailID='$emailID' ";
    $change_stats_results = mysqli_query($conn, $change_stats);
    if(!$change_stats_results){
        header("Location: ../inbox.php");
        exit();
    }else{
        header("Location: ../inbox.php");
        exit();;
    }
}

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

    if($_POST['companyEmail'] && $_POST['message'] !=''){
        
        date_default_timezone_set("Asia/Manila");

        $client_id = $_POST['client_uniID'];
        $recipient_name = mysqli_real_escape_string($conn, $_POST['recipient_name']);
        $recipient_email = mysqli_real_escape_string($conn, $_POST['recipient_email']);
        $subject = mysqli_real_escape_string($conn, $_POST['subject']);

        $adminid = mysqli_real_escape_string($conn, $_POST['adminid']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $comp_email = mysqli_real_escape_string($conn, $_POST['companyEmail']);
        $reply = mysqli_real_escape_string($conn, $_POST['message']);
        $action = mysqli_real_escape_string($conn, $_POST['action']);

        $date = date("Y-m-d H:i:s");

            $subjects = $subject;
            $company_email = $comp_email;
            $company = "Sibol-PINOY Management Consultancy";

            $message = '';
            $message .= "<p>".$reply."</p>";

            $body = "";

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
               $email_record_query = "INSERT INTO `sent_email`( `client_uniID`, `email_add`, `loginId`, `company_email`, `subject`, `reply`, `action`, `date_reply`) VALUES ('$client_id','$recipient_email','$adminid','$comp_email','$subject','$reply','$action','$date')";
               
               if($conn->query($email_record_query)===TRUE){

                    $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$adminid', '$action','$username', '$date')";
                        
                    if($conn->query($create_adminlog)===TRUE){
                        header("Location: ../consultation?success=reply_email_successfully");
                        exit(); 
                    }else{
                        header("Location: ../consultation?error=adminlog_error");
                        exit();
                    }

                }else{   
                    header("Location: ../inbox.php?error=email_query_error");
                    exit(); 
                }
            }
              
       
    }else{
        header("Location: ../inbox.php?error=empty_fields");
        exit();
    }

   
}

?>