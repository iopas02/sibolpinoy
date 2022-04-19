<?php

include_once('../../connection.php');

if(isset($_POST['approved'])){
 
    date_default_timezone_set("Asia/Manila");

    $client_uniID = mysqli_real_escape_string($conn, $_POST['client_uniID']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $mi = mysqli_real_escape_string($conn, $_POST['mi']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $orgs = mysqli_real_escape_string($conn, $_POST['orgs']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);

    $service_uniID = mysqli_real_escape_string($conn, $_POST['service_uniID']);
    $service_title = mysqli_real_escape_string($conn, $_POST['service_title']);

    $consulID = mysqli_real_escape_string($conn, $_POST['consulID']);
    $setdate = mysqli_real_escape_string($conn, $_POST['setdate']);
    $settime = mysqli_real_escape_string($conn, $_POST['settime']);

    $status = "Approved";
    $adminID = mysqli_real_escape_string($conn, $_POST['adminID']);
    $admin = mysqli_real_escape_string($conn, $_POST['admin']);
    $action2 = mysqli_real_escape_string($conn, $_POST['action2']);

    $date = date("Y-m-d H:i:s");

    $title = "Consultation about: ".''.$service_title.''." Consultation ID: ".''.$consulID; 

    $check_subcat_id = 0;
    $subcat_id = $_POST['subcatid'];
    $check_subcat_id = count($subcat_id);
    if($check_subcat_id > 0 ){

        $verify_consulID_query = "SELECT * FROM `consultation_reports` WHERE `consultation_id`=? ";
        $id_stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($id_stmt,$verify_consulID_query)) {
            header("Location: ../consultation?error=sql_error");
            exit();
        }else{
            mysqli_stmt_bind_param($id_stmt, "s", $consulID);
            mysqli_stmt_execute($id_stmt);
            mysqli_stmt_store_result($id_stmt);
            $idresultcheck = mysqli_stmt_num_rows($id_stmt);
            if($idresultcheck > 0){
                header("Location: ../consultation?error=consultation_already_approved");
                exit();
            }else{

                $subcat_id = $_POST['subcatid'];    
                foreach($subcat_id as $subcats){
                    $insert_report_query = "INSERT INTO `consultation_reports`(`client_uniID`, `service_uniID`, `sub_cat_uniID`, `consultation_id`, `set_date`, `set_time`, `loginId`, `status`, `approved_date`) VALUES ('$client_uniID','$service_uniID ','$subcats','$consulID','$setdate','$settime','$adminID ','$status','$date')";
                    $insert_report_query_result = mysqli_query($conn, $insert_report_query); 
                }
        
                if($insert_report_query_result){
                    $update_consul_query = "UPDATE `consultation` SET `status`='$status' WHERE `email_add`='$email' AND `consultation_id`='$consulID'";
                    
                    if($conn->query($update_consul_query)===TRUE){

                        $date_time = ($setdate.' '.$settime);
                        
                       $scheduler_query = "INSERT INTO `scheduler`(`title`, `start_event`, `end_event`) VALUES ('$title','$date_time','$date_time')";

                       if($conn->query($scheduler_query )===TRUE){

                            $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$adminID', '$action2','$admin', '$date')";
            
                            if($conn->query($create_adminlog)===TRUE){
                                header("Location: ../consultation?success=consultation_report_successfully");
                                exit(); 
                            }else{
                                header("Location: ../consultation?error=adminlog_error");
                                exit();
                            }

                        }else{
                            header("Location: ../consultation?error=scheduler_failed_to_add");
                            exit();
                        }

        
                    }else{
                        header("Location: ../consultation?error=consultation_update_status_failed");
                        exit();
                    }
        
                }else{
                    header("Location: ../consultation?error=consultation_reports_insertion_failed");
                    exit();
                }
                
            } 
        }   

    }else{
        header("Location: ../consultation?error=please_select_sub_categories_title");
        exit();
    }
    
    
}

if(isset($_POST['declined'])){
    // echo "You Are Connected!";
    date_default_timezone_set("Asia/Manila");

    $consulID = mysqli_real_escape_string($conn, $_POST['consulID']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    $status = "Declined";
    $adminID = mysqli_real_escape_string($conn, $_POST['adminID']);
    $admin = mysqli_real_escape_string($conn, $_POST['admin']);
    $action1 = mysqli_real_escape_string($conn, $_POST['action1']);

    $date = date("Y-m-d H:i:s");

    $declined_cosul_query = "UPDATE `consultation` SET `status`='$status' WHERE `email_add`='$email' AND `consultation_id`='$consulID'";

    if($conn->query($declined_cosul_query)===TRUE){

        $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$adminID', '$action1','$admin', '$date')";
        
        if($conn->query($create_adminlog)===TRUE){
            header("Location: ../consultation?success=consultation_update_successfully");
            exit(); 
        }else{
            header("Location: ../consultation?error=adminlog_error");
            exit();
        }

    }else{
        header("Location: ../consultation?error=consultation_failed_to_update");
        exit();
    }

}

if(isset($_POST['send'])){
    if($_POST['message'] && $_POST['companymail'] !=''){
        date_default_timezone_set("Asia/Manila");

        $cuniID = mysqli_real_escape_string($conn, $_POST['cuniID']);
        $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
        $emailadd = mysqli_real_escape_string($conn, $_POST['emailadd']);
        $service = mysqli_real_escape_string($conn, $_POST['service']);
        $consulid = mysqli_real_escape_string($conn, $_POST['consulid']);
        $setdate = mysqli_real_escape_string($conn, $_POST['setdate']);
        $settime = mysqli_real_escape_string($conn, $_POST['settime']);
        $companymail = mysqli_real_escape_string($conn, $_POST['companymail']);
        $sentmessage = mysqli_real_escape_string($conn, $_POST['message']);

        $adminID = mysqli_real_escape_string($conn, $_POST['adminID']);
        $admin = mysqli_real_escape_string($conn, $_POST['admin']);
        $action = mysqli_real_escape_string($conn, $_POST['action']);

        $date = date("Y-m-d H:i:s");

        $subject = $service;
        $company_email = $companymail;
        $company = "Sibol-PINOY Management Consultancy";

        $message = '';
        $message .= "<p>".$sentmessage."<br>".
        "Services: "."<b>".$service."</b><br>". 
        "Date: ". "<b>".$setdate."</b><br>".
        "Time: ". "<b>".$settime."</b><br>".
        "Consultation ID: ". "<b>".$consulid."</b><br>".
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
            header("Location: ../consultation?error=email_is_invalid");
            exit();
        } else {

            $email_query = "INSERT INTO `sent_email`(`client_uniID`, `email_add`, `loginId`, `company_email`, `subject`, `reply`, `action`, `date_reply`) VALUES ('$cuniID','$emailadd','$adminID','$companymail','$service','$sentmessage','$action','$date')";

            if($conn->query($email_query)===TRUE){

                $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$adminID', '$action','$admin', '$date')";
                
                if($conn->query($create_adminlog)===TRUE){
                    header("Location: ../consultation?success=email_sent_successfully");
                    exit(); 
                }else{
                    header("Location: ../consultation?error=adminlog_error");
                    exit();
                }

            }else{
                header("Location: ../consultation?error=email_query_failed");
                exit();
            }
        }
        

    }else{
        header("Location: ../consultation?error=textarea_or_company_email_is_empty_field");
        exit();
    }
}

if(isset($_POST['btnedit'])){
    // echo "You are connected!";
    date_default_timezone_set("Asia/Manila");

    $adminID =  mysqli_real_escape_string($conn, $_POST['adminID']);
    $admin =  mysqli_real_escape_string($conn, $_POST['admin']);
    $action3 =  mysqli_real_escape_string($conn, $_POST['action3']);

    $emailadd =  mysqli_real_escape_string($conn, $_POST['email']);
    $consulID =  mysqli_real_escape_string($conn, $_POST['consulID']);
    $sub_cat_name = $_POST['subcatid'];
    
    $date = date("Y-m-d H:i:s");

    foreach($sub_cat_name as $subcat_id){
       $delete_query = "DELETE FROM `consul_list_category` WHERE `sub_cat_uniID`='$subcat_id' AND `email_add`='$emailadd'";
       $delete_query_result = mysqli_query($conn, $delete_query);
    }
    if($delete_query_result){

        $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$adminID', '$action3','$admin', '$date')";
        
        if($conn->query($create_adminlog)===TRUE){
            header("Location: ../consultation?success=consultation_sub_cat_update_successfully");
            exit(); 
        }else{
            header("Location: ../consultation?error=adminlog_error");
            exit();
        }

    }else{
        header("Location: ../consultation?error=sub_categoty_update_failed");
        exit();
    }
    
}

if(isset($_POST['dateedit'])){
    if($_POST['newdate'] !=''){
        date_default_timezone_set("Asia/Manila");

        $adminid =  mysqli_real_escape_string($conn, $_POST['adminid']);
        $useradmin =  mysqli_real_escape_string($conn, $_POST['useradmin']);
        $newaction =  mysqli_real_escape_string($conn, $_POST['newaction']);
    
        $cemailadd =  mysqli_real_escape_string($conn, $_POST['cemailadd']);
        $cconsulid =  mysqli_real_escape_string($conn, $_POST['cconsulid']);
        $newdate =  mysqli_real_escape_string($conn, $_POST['newdate']);

        $date = date("Y-m-d H:i:s");

        $update_date_query = "UPDATE `consultation` SET `set_date`='$newdate' WHERE `email_add`='$cemailadd' AND `consultation_id`='$cconsulid'";
        if($conn->query($update_date_query)===TRUE){

            $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$adminid', '$newaction','$useradmin', '$date')";
        
            if($conn->query($create_adminlog)===TRUE){
                header("Location: ../consultation?success=new_cosultation_date_update_successfully");
                exit(); 
            }else{
                header("Location: ../consultation?error=adminlog_error");
                exit();
            }

        }else{
            header("Location: ../consultation?error=new_cosultation_date_failed");
            exit();
        }

    }else{
        header("Location: ../consultation?error=please_set_new_cosultation_date");
        exit();
    }
}

if(isset($_POST['timeedit'])){
    if($_POST['newdtime'] !=''){
        date_default_timezone_set("Asia/Manila");

        $adminid =  mysqli_real_escape_string($conn, $_POST['id']);
        $useradmin =  mysqli_real_escape_string($conn, $_POST['user']);
        $newaction =  mysqli_real_escape_string($conn, $_POST['newaction']);
    
        $cemailadd =  mysqli_real_escape_string($conn, $_POST['cusemailadd']);
        $cconsulid =  mysqli_real_escape_string($conn, $_POST['cusconsulid']);
        $newdtime =  mysqli_real_escape_string($conn, $_POST['newdtime']);

        $date = date("Y-m-d H:i:s");

        $update_date_query = "UPDATE `consultation` SET `set_time`='$newdtime' WHERE `email_add`='$cemailadd' AND `consultation_id`='$cconsulid'";
        if($conn->query($update_date_query)===TRUE){

            $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$adminid', '$newaction','$useradmin', '$date')";
        
            if($conn->query($create_adminlog)===TRUE){
                header("Location: ../consultation?success=new_cosultation_time_update_successfully");
                exit(); 
            }else{
                header("Location: ../consultation?error=adminlog_error");
                exit();
            }

        }else{
            header("Location: ../consultation?error=new_cosultation_time_failed");
            exit();
        }

    }else{
        header("Location: ../consultation?error=please_set_new_cosultation_time");
        exit();
    }
}