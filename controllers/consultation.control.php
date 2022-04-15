<?php

include_once('../connection.php');

if(isset($_POST['book_me'])){

    if($_POST['firstName'] && $_POST['mi'] && $_POST['lastName'] && $_POST['email'] && $_POST['orgs'] && $_POST['position'] && $_POST['date'] && $_POST['time']){

        if($_POST['sub_cat'] !=''){
            date_default_timezone_set("Asia/Manila");

            $servicesID = mysqli_real_escape_string($conn, $_POST['services']);
            $services_name = mysqli_real_escape_string($conn, $_POST['services_name']);

            $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
            $mi = mysqli_real_escape_string($conn, $_POST['mi']);
            $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $contact = mysqli_real_escape_string($conn, $_POST['contact']);
            $orgs = mysqli_real_escape_string($conn, $_POST['orgs']);
            $position = mysqli_real_escape_string($conn, $_POST['position']);
            $date = mysqli_real_escape_string($conn, $_POST['date']);
            $time = mysqli_real_escape_string($conn, $_POST['time']);
            $message = mysqli_real_escape_string($conn, $_POST['message']);

    
            $status = mysqli_real_escape_string($conn, $_POST['status']);
            $action = mysqli_real_escape_string($conn, $_POST['action']);

            $book_date = date("Y-m-d H:i:s");

            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
            // Output: 54esmdr0qf
            $random_num1 = substr(str_shuffle($permitted_chars), 0, 10);
            $random_num2 = substr(str_shuffle($permitted_chars), 0, 15);
            
            $year = date("Y");
            $uniID = $year."-".$random_num1;
            $bookingID = $year."-".$random_num2;

            $check_user_query = "SELECT `email_add` FROM `client` WHERE `email_add`=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $check_user_query)) {
                $conn->close();
            }else{
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultcheck = mysqli_stmt_num_rows($stmt);
    
                if($resultcheck > 0){
                    $consul_query = "INSERT INTO `consultation`(`email_add`, `consultation_id`, `service_uniID`, `memo`,`set_date`, `set_time`, `status`, `action`, `registered_date`) VALUES (?,?,?,?,?,?,?,?,?)";
                    $stmttwo = $conn->prepare($consul_query);
                    mysqli_stmt_bind_param($stmttwo, "sssssssss", $email, $bookingID, $servicesID, $message, $date, $time, $status, $action, $book_date);

                    if($stmttwo->execute()){
                        $sub_cat = $_POST['sub_cat'];
                        foreach($sub_cat as $serv_sub_cat) {                     
                            // echo $skill. $studId . "<br>";
                            $serv_query = "INSERT INTO `consul_list_category`(`email_add`, `consultation_id`, `sub_cat_uniID`) VALUES ('$email','$bookingID','$serv_sub_cat')";
                            $serv_query_result = mysqli_query($conn, $serv_query); 
                        }

                        if($serv_query){

                            $subject = "Thank You For Booking Consultation";
                            $company_email = "sibolPINOY@gmail.com";
                            $company = "Sibol-PINOY Management Consultancy";

                            $message = '';
                            $message .= "<p>Thank You for your  Booking Consultation, please refers to the following information below <br><br>".
                            "Services: "."<b>".$services_name."</b><br>". 
                            "Date: ". "<b>".date('M d Y',  strtotime($date))."</b><br>".
                            "Time: ". "<b>".date('g:i a',  strtotime($time))."</b><br>".
                            "Consultation ID: ". "<b>".$bookingID ."</b><br>".
                            "</p>".
                            "<p>Please Wait for email confirmation on your request.</p>".
        
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
                            $mail->addAddress($email);

                            // $mail->addCC($carbon_copy);
                            // //$mail->addBCC('bcc@example.com');

                            // Set email format to HTML
                            $mail->isHTML(true);

                            // Mail subject
                            $mail->Subject = $subject;

                            // Mail body content
                            $mail->Body = $body;

                            if(!$mail->send()) {
                                header("Location: ../consultation?error=email_is_invalid");
                                exit();
                            } else {
                                header("Location: ../consultation?success=consultation_successfully_send");
                                exit();
                            }

                        }else{
                            header("Location: ../consultation?error=consultation_list_error");
                            exit();
                        }

                    }else{
                        header("Location: ../consultation?error=consultation_request_failed");
                        exit();
                    }
                  
                  
                }else{
                    $client_reg_query = "INSERT INTO `client`(`client_uniID`, `firstName`, `mi`, `lastName`, `email_add`, `contact`, `organization`, `position`, `date_register`) VALUES (?,?,?,?,?,?,?,?,?)";
                    $stmtthree = $conn->prepare($client_reg_query);
                    mysqli_stmt_bind_param($stmtthree, "sssssssss", $uniID, $firstName, $mi, $lastName, $email, $contact, $orgs, $position, $book_date);
                   
                    if($stmtthree->execute()){

                        $consul_query = "INSERT INTO `consultation`(`email_add`, `consultation_id`, `service_uniID`, `memo`,`set_date`, `set_time`, `status`, `action`, `registered_date`) VALUES (?,?,?,?,?,?,?,?,?)";
                        $stmttwo = $conn->prepare($consul_query);
                        mysqli_stmt_bind_param($stmttwo, "sssssssss", $email, $bookingID, $servicesID, $message, $date, $time, $status, $action, $book_date);

                        if($stmttwo->execute()){
                            $sub_cat = $_POST['sub_cat'];
                            foreach($sub_cat as $serv_sub_cat) {                     
                                // echo $skill. $studId . "<br>";
                                $serv_query = "INSERT INTO `consul_list_category`(`email_add`, `consultation_id`, `sub_cat_uniID`) VALUES ('$email','$bookingID','$serv_sub_cat')";
                                $serv_query_result = mysqli_query($conn, $serv_query); 
                            }

                            if($serv_query){

                                $subject = "Thank You For Booking Consultation";
                                $company_email = "sibolPINOY@gmail.com";
                                $company = "Sibol-PINOY Management Consultancy";

                                $message = '';
                                $message .= "<p>Thank You for your  Booking Consultation, please refers to the following information below <br><br>".
                                "Services: "."<b>".$services_name."</b><br>". 
                                "Date: ". "<b>".date('M d Y',  strtotime($date))."</b><br>".
                                "Time: ". "<b>".date('g:i a',  strtotime($time))."</b><br>".
                                "Consultation ID: ". "<b>".$bookingID ."</b><br>".
                                "</p>".
                                "<p>Please Wait for email confirmation on your request.</p>".
            
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
                                $mail->addAddress($email);

                                // $mail->addCC($carbon_copy);
                                // //$mail->addBCC('bcc@example.com');

                                // Set email format to HTML
                                $mail->isHTML(true);

                                // Mail subject
                                $mail->Subject = $subject;

                                // Mail body content
                                $mail->Body = $body;

                                if(!$mail->send()) {
                                    header("Location: ../consultation?error=email_is_invalid");
                                    exit();
                                } else {
                                    header("Location: ../consultation?success=consultation_successfully_send");
                                    exit();
                                }

                            }else{
                                header("Location: ../consultation?error=consultation_list_error");
                                exit();
                            }

                        }else{
                            header("Location: ../consultation?error=consultation_request_failed");
                            exit();
                        }
                      

                    }else{
                        header("Location: ../consultation?error=user_info_invalid");
                        exit();
                    }
                   
                }
            }


        }else{
            header("Location: ../consultation?error=please_select_atleast_one_agenda");
            exit();
        }

    }else{
        header("Location: ../consultation?error=empty_field");
        exit();
    }
}