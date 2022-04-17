<?php
include_once('../../connection.php');

if(isset($_POST['deleteallinfo'])){
    date_default_timezone_set("Asia/Manila");
    $c_id = mysqli_real_escape_string($conn, $_POST['c_id']);
    $e_add = mysqli_real_escape_string($conn, $_POST['e_add']);

    $adminID = mysqli_real_escape_string($conn, $_POST['adminID']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $newaction = mysqli_real_escape_string($conn, $_POST['newaction']);
   
    $date = date("Y-m-d H:i:s");

    $consul_query = "SELECT tb1.entryID, tb1.email_add, tb1.consultation_id, tb1.service_uniID, tb2.service_title, tb3.sub_cat_uniID, tb1.memo, tb4.sub_cat_title, tb1.set_date, tb1.set_time, tb1.status, tb1.registered_date FROM (((consultation tb1 INNER JOIN services tb2 ON tb1.service_uniID = tb2.service_uniID)INNER JOIN consul_list_category tb3 ON tb1.consultation_id = tb3.consultation_id)INNER JOIN services_sub_category tb4 ON tb3.sub_cat_uniID = tb4.sub_cat_uniID) WHERE tb1.email_add='$e_add'";

    $consul_query_result = $conn->query($consul_query);
    if(mysqli_num_rows($consul_query_result) > 0) {
        foreach($consul_query_result as $consul_query){
            $entryID = $consul_query['entryID'];
            $email_add = $consul_query['email_add'];
            $consultation_id = $consul_query['consultation_id'];
            $service_uniID = $consul_query['service_uniID'];
            $sub_cat_uniID = $consul_query['sub_cat_uniID'];
            $memo = $consul_query['memo'];
            $set_date = $consul_query['set_date'];
            $set_time = $consul_query['set_time'];
            $status = $consul_query['status'];
            $registered_date = $consul_query['registered_date'];

            $archive_consul_query = "INSERT INTO `consultation_archive`(`entryID`, `email_add`, `consultation_id`, `service_uniID`, `sub_cat_uniID`, `memo`, `set_date`, `set_time`, `status`, `date_registered`) VALUES ('$entryID','$email_add','$consultation_id','$service_uniID','$sub_cat_uniID','$memo','$set_date','$set_time','$status','$registered_date')";

            $archive_consul_query_result = mysqli_query($conn, $archive_consul_query);
        }
        if($archive_consul_query_result){
            $delete_consul_list_query = "DELETE FROM `consul_list_category` WHERE `email_add`='$e_add'";
            if($conn->query($delete_consul_list_query)===TRUE){

                $delete_consul_query = "DELETE FROM `consultation` WHERE `email_add`='$e_add'";
                if($conn->query($delete_consul_query)===TRUE){
                    
                    $client_er_query = "SELECT tb1.entryID, tb1.email_add, tb1.reservationID, tb1.ss_payment, tb1.payment_method, tb2.eventID, tb2.event_title, tb1.status, tb1.date_registered FROM event_reservation tb1 INNER JOIN events tb2 ON tb1.eventID = tb2.eventID WHERE tb1.email_add='$e_add'";

                    $client_er_query_result = $conn->query($client_er_query);
                    if(mysqli_num_rows($client_er_query_result) > 0) {
                        foreach($client_er_query_result as $client_er){
                            $entryIDS = $client_er['entryID'];
                            $email_addS = $client_er['email_add'];
                            $reservationID = $client_er['reservationID'];
                            $eventID = $client_er['eventID'];
                            $ss_payment = $client_er['ss_payment'];
                            $payment_method = $client_er['payment_method'];
                            $stats = $client_er['status'];
                            $registered = $client_er['date_registered'];

                            $er_archive_query = "INSERT INTO `er_archive`(`entryID`, `email_add`, `reservationID`, `event_id`, `ss_payment`, `payment_method`, `status`, `date_regiestered`) VALUES ('$entryIDS','$email_addS','$reservationID','$eventID','$ss_payment','$payment_method','$stats','$registered')";
                            
                            $er_archive_query_result = mysqli_query($conn, $er_archive_query);
                        }
                        if($er_archive_query_result){

                            $delate_er_query = "DELETE FROM `event_reservation` WHERE `email_add`='$e_add'";
                            if($conn->query($delate_er_query)===TRUE){

                                $client_email_query = "SELECT `emailID`, `client_uniID`, `subject`, `message`, `status`, `date_mailed` FROM `email` WHERE `client_uniID`='$c_id'";
                                $client_email_query_result = $conn->query($client_email_query);
                                if(mysqli_num_rows($client_email_query_result) > 0) {
                                    foreach($client_email_query_result as $client_email){
                                        $emailID = $client_email['emailID'];
                                        $client_uniID = $client_email['client_uniID'];
                                        $subject = $client_email['subject'];
                                        $message = $client_email['message'];
                                        $status = $client_email['status'];
                                        $date_mailed = $client_email['date_mailed'];

                                        $email_archive_query = "INSERT INTO `email_archive`(`emailID`, `client_uniID`, `subject`, `message`, `status`, `date_mailed`) VALUES ('$emailID','$client_uniID','$subject','$message','$status','$date_mailed')";

                                        $email_archive_query_result = mysqli_query($conn, $email_archive_query);
                                    }
                                    if($email_archive_query_result){

                                        $delate_email_query = "DELETE FROM `email` WHERE `client_uniID`='$c_id'";
                                        if($conn->query($delate_email_query)===TRUE){ 

                                            $client_query = "SELECT `c_count`, `client_uniID`, `firstName`, `mi`, `lastName`, `email_add`, `contact`, `organization`, `position`, `date_register` FROM `client` WHERE `email_add`='$e_add'";
                                            $client_query_result = $conn->query($client_query);
                                            if(mysqli_num_rows($client_query_result) > 0) {
                                                foreach($client_query_result as $client){
                                                    $client_uniIDs = $client['client_uniID'];
                                                    $firstName = $client['firstName'];
                                                    $mi = $client['mi'];
                                                    $lastName = $client['lastName'];
                                                    $emailadd = $client['email_add'];
                                                    $con = $client['contact'];
                                                    $orgn = $client['organization'];
                                                    $post= $client['position'];
                                                    $date_reg = $client['date_register'];

                                                    $client_archive_query = "INSERT INTO `client_archive`(`client_uniID`, `first_name`, `mi`, `last_name`, `email`, `contact`, `orgs`, `position`, `date_registered`) VALUES ('$client_uniIDs','$firstName','$mi','$lastName','$emailadd','$con','$orgn','$post','$date_reg')";

                                                    $client_archive_query_result = mysqli_query($conn, $client_archive_query);
                                                }
                                                if($client_archive_query_result){

                                                    $delete_client_query = "DELETE FROM `client` WHERE `email_add`='$e_add' AND `client_uniID`='$c_id'";
                                                    if($conn->query($delete_client_query)===TRUE){

                                                        $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$adminID', '$newaction','$username', '$date')";
            
                                                        if($conn->query($create_adminlog)===TRUE){
                                                            header("Location: ../admin.con?success=client_delete_successfully");
                                                            exit(); 
                                                        }else{
                                                            header("Location: ../admin.con?error=adminlog_error");
                                                            exit();
                                                        }

                                                    }else{
                                                        header("Location: ../clients.record?error=client_deletion_failed");
                                                        exit();
                                                    }


                                                }else{
                                                    header("Location: ../clients.record?error=client_archived_failed");
                                                    exit();
                                                }

                                            }else{
                                                header("Location: ../clients.record?error=client_not_exist");
                                                exit();
                                            }

                                        }else{
                                            header("Location: ../clients.record?error=client_email_deletion_failed");
                                            exit();
                                        }

                                    }else{
                                        header("Location: ../clients.record?error=email_archived_failed");
                                        exit();
                                    }

            
                                }else{
                                    
                                    $client_query = "SELECT `c_count`, `client_uniID`, `firstName`, `mi`, `lastName`, `email_add`, `contact`, `organization`, `position`, `date_register` FROM `client` WHERE `email_add`='$e_add'";
                                    $client_query_result = $conn->query($client_query);
                                    if(mysqli_num_rows($client_query_result) > 0) {
                                        foreach($client_query_result as $client){
                                            $client_uniIDs = $client['client_uniID'];
                                            $firstName = $client['firstName'];
                                            $mi = $client['mi'];
                                            $lastName = $client['lastName'];
                                            $emailadd = $client['email_add'];
                                            $con = $client['contact'];
                                            $orgn = $client['organization'];
                                            $post= $client['position'];
                                            $date_reg = $client['date_register'];

                                            $client_archive_query = "INSERT INTO `client_archive`(`client_uniID`, `first_name`, `mi`, `last_name`, `email`, `contact`, `orgs`, `position`, `date_registered`) VALUES ('$client_uniIDs','$firstName','$mi','$lastName','$emailadd','$con','$orgn','$post','$date_reg')";

                                            $client_archive_query_result = mysqli_query($conn, $client_archive_query);
                                        }
                                        if($client_archive_query_result){

                                            $delete_client_query = "DELETE FROM `client` WHERE `email_add`='$e_add' AND `client_uniID`='$c_id'";
                                            if($conn->query($delete_client_query)===TRUE){

                                                $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$adminID', '$newaction','$username', '$date')";
    
                                                if($conn->query($create_adminlog)===TRUE){
                                                    header("Location: ../admin.con?success=client_delete_successfully");
                                                    exit(); 
                                                }else{
                                                    header("Location: ../admin.con?error=adminlog_error");
                                                    exit();
                                                }

                                            }else{
                                                header("Location: ../clients.record?error=client_deletion_failed");
                                                exit();
                                            }


                                        }else{
                                            header("Location: ../clients.record?error=client_archived_failed");
                                            exit();
                                        }

                                    }else{
                                        header("Location: ../clients.record?error=client_not_exist");
                                        exit();
                                    }
                                }
                            }

                        }else{
                            header("Location: ../clients.record?error=er_archived_failed");
                            exit();
                        }

                    }else{
                         
                        $client_email_query = "SELECT `emailID`, `client_uniID`, `subject`, `message`, `status`, `date_mailed` FROM `email` WHERE `client_uniID`='$c_id'";
                        $client_email_query_result = $conn->query($client_email_query);
                        if(mysqli_num_rows($client_email_query_result) > 0) {
                            foreach($client_email_query_result as $client_email){
                                $emailID = $client_email['emailID'];
                                $client_uniID = $client_email['client_uniID'];
                                $subject = $client_email['subject'];
                                $message = $client_email['message'];
                                $status = $client_email['status'];
                                $date_mailed = $client_email['date_mailed'];

                                $email_archive_query = "INSERT INTO `email_archive`(`emailID`, `client_uniID`, `subject`, `message`, `status`, `date_mailed`) VALUES ('$emailID','$client_uniID','$subject','$message','$status','$date_mailed')";

                                $email_archive_query_result = mysqli_query($conn, $email_archive_query);
                            }
                            if($email_archive_query_result){

                                $delate_email_query = "DELETE FROM `email` WHERE `client_uniID`='$c_id'";
                                if($conn->query($delate_email_query)===TRUE){ 

                                    $client_query = "SELECT `c_count`, `client_uniID`, `firstName`, `mi`, `lastName`, `email_add`, `contact`, `organization`, `position`, `date_register` FROM `client` WHERE `email_add`='$e_add'";
                                    $client_query_result = $conn->query($client_query);
                                    if(mysqli_num_rows($client_query_result) > 0) {
                                        foreach($client_query_result as $client){
                                            $client_uniIDs = $client['client_uniID'];
                                            $firstName = $client['firstName'];
                                            $mi = $client['mi'];
                                            $lastName = $client['lastName'];
                                            $emailadd = $client['email_add'];
                                            $con = $client['contact'];
                                            $orgn = $client['organization'];
                                            $post= $client['position'];
                                            $date_reg = $client['date_register'];

                                            $client_archive_query = "INSERT INTO `client_archive`(`client_uniID`, `first_name`, `mi`, `last_name`, `email`, `contact`, `orgs`, `position`, `date_registered`) VALUES ('$client_uniIDs','$firstName','$mi','$lastName','$emailadd','$con','$orgn','$post','$date_reg')";

                                            $client_archive_query_result = mysqli_query($conn, $client_archive_query);
                                        }
                                        if($client_archive_query_result){

                                            $delete_client_query = "DELETE FROM `client` WHERE `email_add`='$e_add' AND `client_uniID`='$c_id'";
                                            if($conn->query($delete_client_query)===TRUE){

                                                $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$adminID', '$newaction','$username', '$date')";
    
                                                if($conn->query($create_adminlog)===TRUE){
                                                    header("Location: ../admin.con?success=client_delete_successfully");
                                                    exit(); 
                                                }else{
                                                    header("Location: ../admin.con?error=adminlog_error");
                                                    exit();
                                                }

                                            }else{
                                                header("Location: ../clients.record?error=client_deletion_failed");
                                                exit();
                                            }


                                        }else{
                                            header("Location: ../clients.record?error=client_archived_failed");
                                            exit();
                                        }

                                    }else{
                                        header("Location: ../clients.record?error=client_not_exist");
                                        exit();
                                    }

                                }else{
                                    header("Location: ../clients.record?error=client_email_deletion_failed");
                                    exit();
                                }

                            }else{
                                header("Location: ../clients.record?error=email_archived_failed");
                                exit();
                            }

    
                        }else{
                            
                            $client_query = "SELECT `c_count`, `client_uniID`, `firstName`, `mi`, `lastName`, `email_add`, `contact`, `organization`, `position`, `date_register` FROM `client` WHERE `email_add`='$e_add'";
                            $client_query_result = $conn->query($client_query);
                            if(mysqli_num_rows($client_query_result) > 0) {
                                foreach($client_query_result as $client){
                                    $client_uniIDs = $client['client_uniID'];
                                    $firstName = $client['firstName'];
                                    $mi = $client['mi'];
                                    $lastName = $client['lastName'];
                                    $emailadd = $client['email_add'];
                                    $con = $client['contact'];
                                    $orgn = $client['organization'];
                                    $post= $client['position'];
                                    $date_reg = $client['date_register'];

                                    $client_archive_query = "INSERT INTO `client_archive`(`client_uniID`, `first_name`, `mi`, `last_name`, `email`, `contact`, `orgs`, `position`, `date_registered`) VALUES ('$client_uniIDs','$firstName','$mi','$lastName','$emailadd','$con','$orgn','$post','$date_reg')";

                                    $client_archive_query_result = mysqli_query($conn, $client_archive_query);
                                }
                                if($client_archive_query_result){

                                    $delete_client_query = "DELETE FROM `client` WHERE `email_add`='$e_add' AND `client_uniID`='$c_id'";
                                    if($conn->query($delete_client_query)===TRUE){

                                        $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$adminID', '$newaction','$username', '$date')";

                                        if($conn->query($create_adminlog)===TRUE){
                                            header("Location: ../admin.con?success=client_delete_successfully");
                                            exit(); 
                                        }else{
                                            header("Location: ../admin.con?error=adminlog_error");
                                            exit();
                                        }

                                    }else{
                                        header("Location: ../clients.record?error=client_deletion_failed");
                                        exit();
                                    }


                                }else{
                                    header("Location: ../clients.record?error=client_archived_failed");
                                    exit();
                                }

                            }else{
                                header("Location: ../clients.record?error=client_not_exist");
                                exit();
                            }
                        }
                    }


                }else{
                    header("Location: ../clients.record?error=deletion_of_consul_failed");
                    exit();
                }
            

            }else{
                header("Location: ../clients.record?error=deletion_of_consul_list_failed");
                exit();
            }

        }else{
            header("Location: ../clients.record?error=consultation_archived_failed");
            exit();
        }

    }else{

        $client_er_query = "SELECT tb1.entryID, tb1.email_add, tb1.reservationID, tb1.ss_payment, tb1.payment_method, tb2.eventID, tb2.event_title, tb1.status, tb1.date_registered FROM event_reservation tb1 INNER JOIN events tb2 ON tb1.eventID = tb2.eventID WHERE tb1.email_add='$e_add'";

        $client_er_query_result = $conn->query($client_er_query);
        if(mysqli_num_rows($client_er_query_result) > 0) {
            foreach($client_er_query_result as $client_er){
                $entryIDS = $client_er['entryID'];
                $email_addS = $client_er['email_add'];
                $reservationID = $client_er['reservationID'];
                $eventID = $client_er['eventID'];
                $ss_payment = $client_er['ss_payment'];
                $payment_method = $client_er['payment_method'];
                $stats = $client_er['status'];
                $registered = $client_er['date_registered'];

                $er_archive_query = "INSERT INTO `er_archive`(`entryID`, `email_add`, `reservationID`, `event_id`, `ss_payment`, `payment_method`, `status`, `date_regiestered`) VALUES ('$entryIDS','$email_addS','$reservationID','$eventID','$ss_payment','$payment_method','$stats','$registered')";
                
                $er_archive_query_result = mysqli_query($conn, $er_archive_query);
            }
            if($er_archive_query_result){

                $delate_er_query = "DELETE FROM `event_reservation` WHERE `email_add`='$e_add'";
                if($conn->query($delate_er_query)===TRUE){

                    $client_email_query = "SELECT `emailID`, `client_uniID`, `subject`, `message`, `status`, `date_mailed` FROM `email` WHERE `client_uniID`='$c_id'";
                    $client_email_query_result = $conn->query($client_email_query);
                    if(mysqli_num_rows($client_email_query_result) > 0) {
                        foreach($client_email_query_result as $client_email){
                            $emailID = $client_email['emailID'];
                            $client_uniID = $client_email['client_uniID'];
                            $subject = $client_email['subject'];
                            $message = $client_email['message'];
                            $status = $client_email['status'];
                            $date_mailed = $client_email['date_mailed'];

                            $email_archive_query = "INSERT INTO `email_archive`(`emailID`, `client_uniID`, `subject`, `message`, `status`, `date_mailed`) VALUES ('$emailID','$client_uniID','$subject','$message','$status','$date_mailed')";

                            $email_archive_query_result = mysqli_query($conn, $email_archive_query);
                        }
                        if($email_archive_query_result){

                            $delate_email_query = "DELETE FROM `email` WHERE `client_uniID`='$c_id'";
                            if($conn->query($delate_email_query)===TRUE){ 

                                $client_query = "SELECT `c_count`, `client_uniID`, `firstName`, `mi`, `lastName`, `email_add`, `contact`, `organization`, `position`, `date_register` FROM `client` WHERE `email_add`='$e_add'";
                                $client_query_result = $conn->query($client_query);
                                if(mysqli_num_rows($client_query_result) > 0) {
                                    foreach($client_query_result as $client){
                                        $client_uniIDs = $client['client_uniID'];
                                        $firstName = $client['firstName'];
                                        $mi = $client['mi'];
                                        $lastName = $client['lastName'];
                                        $emailadd = $client['email_add'];
                                        $con = $client['contact'];
                                        $orgn = $client['organization'];
                                        $post= $client['position'];
                                        $date_reg = $client['date_register'];

                                        $client_archive_query = "INSERT INTO `client_archive`(`client_uniID`, `first_name`, `mi`, `last_name`, `email`, `contact`, `orgs`, `position`, `date_registered`) VALUES ('$client_uniIDs','$firstName','$mi','$lastName','$emailadd','$con','$orgn','$post','$date_reg')";

                                        $client_archive_query_result = mysqli_query($conn, $client_archive_query);
                                    }
                                    if($client_archive_query_result){

                                        $delete_client_query = "DELETE FROM `client` WHERE `email_add`='$e_add'  AND `client_uniID`='$c_id'";
                                        if($conn->query($delete_client_query)===TRUE){

                                            $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$adminID', '$newaction','$username', '$date')";

                                            if($conn->query($create_adminlog)===TRUE){
                                                header("Location: ../admin.con?success=client_delete_successfully");
                                                exit(); 
                                            }else{
                                                header("Location: ../admin.con?error=adminlog_error");
                                                exit();
                                            }

                                        }else{
                                            header("Location: ../clients.record?error=client_deletion_failed");
                                            exit();
                                        }


                                    }else{
                                        header("Location: ../clients.record?error=client_archived_failed");
                                        exit();
                                    }

                                }else{
                                    header("Location: ../clients.record?error=client_not_exist");
                                    exit();
                                }

                            }else{
                                header("Location: ../clients.record?error=client_email_deletion_failed");
                                exit();
                            }

                        }else{
                            header("Location: ../clients.record?error=email_archived_failed");
                            exit();
                        }


                    }else{
                        
                        $client_query = "SELECT `c_count`, `client_uniID`, `firstName`, `mi`, `lastName`, `email_add`, `contact`, `organization`, `position`, `date_register` FROM `client` WHERE `email_add`='$e_add'";
                        $client_query_result = $conn->query($client_query);
                        if(mysqli_num_rows($client_query_result) > 0) {
                            foreach($client_query_result as $client){
                                $client_uniIDs = $client['client_uniID'];
                                $firstName = $client['firstName'];
                                $mi = $client['mi'];
                                $lastName = $client['lastName'];
                                $emailadd = $client['email_add'];
                                $con = $client['contact'];
                                $orgn = $client['organization'];
                                $post= $client['position'];
                                $date_reg = $client['date_register'];

                                $client_archive_query = "INSERT INTO `client_archive`(`client_uniID`, `first_name`, `mi`, `last_name`, `email`, `contact`, `orgs`, `position`, `date_registered`) VALUES ('$client_uniIDs','$firstName','$mi','$lastName','$emailadd','$con','$orgn','$post','$date_reg')";

                                $client_archive_query_result = mysqli_query($conn, $client_archive_query);
                            }
                            if($client_archive_query_result){

                                $delete_client_query = "DELETE FROM `client` WHERE `email_add`='$e_add'  AND `client_uniID`='$c_id' ";
                                if($conn->query($delete_client_query)===TRUE){

                                    $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$adminID', '$newaction','$username', '$date')";

                                    if($conn->query($create_adminlog)===TRUE){
                                        header("Location: ../admin.con?success=client_delete_successfully");
                                        exit(); 
                                    }else{
                                        header("Location: ../admin.con?error=adminlog_error");
                                        exit();
                                    }

                                }else{
                                    header("Location: ../clients.record?error=client_deletion_failed");
                                    exit();
                                }


                            }else{
                                header("Location: ../clients.record?error=client_archived_failed");
                                exit();
                            }

                        }else{
                            header("Location: ../clients.record?error=client_not_exist");
                            exit();
                        }
                    }
                }

            }else{
                header("Location: ../clients.record?error=er_archived_failed");
                exit();
            }

        }else{
             
            $client_email_query = "SELECT `emailID`, `client_uniID`, `subject`, `message`, `status`, `date_mailed` FROM `email` WHERE `client_uniID`='$c_id'";
            $client_email_query_result = $conn->query($client_email_query);
            if(mysqli_num_rows($client_email_query_result) > 0) {
                foreach($client_email_query_result as $client_email){
                    $emailID = $client_email['emailID'];
                    $client_uniID = $client_email['client_uniID'];
                    $subject = $client_email['subject'];
                    $message = $client_email['message'];
                    $status = $client_email['status'];
                    $date_mailed = $client_email['date_mailed'];

                    $email_archive_query = "INSERT INTO `email_archive`(`emailID`, `client_uniID`, `subject`, `message`, `status`, `date_mailed`) VALUES ('$emailID','$client_uniID','$subject','$message','$status','$date_mailed')";

                    $email_archive_query_result = mysqli_query($conn, $email_archive_query);
                }
                if($email_archive_query_result){

                    $delate_email_query = "DELETE FROM `email` WHERE `client_uniID`='$c_id'";
                    if($conn->query($delate_email_query)===TRUE){ 

                        $client_query = "SELECT `c_count`, `client_uniID`, `firstName`, `mi`, `lastName`, `email_add`, `contact`, `organization`, `position`, `date_register` FROM `client` WHERE `email_add`='$e_add'";
                        $client_query_result = $conn->query($client_query);
                        if(mysqli_num_rows($client_query_result) > 0) {
                            foreach($client_query_result as $client){
                                $client_uniIDs = $client['client_uniID'];
                                $firstName = $client['firstName'];
                                $mi = $client['mi'];
                                $lastName = $client['lastName'];
                                $emailadd = $client['email_add'];
                                $con = $client['contact'];
                                $orgn = $client['organization'];
                                $post= $client['position'];
                                $date_reg = $client['date_register'];

                                $client_archive_query = "INSERT INTO `client_archive`(`client_uniID`, `first_name`, `mi`, `last_name`, `email`, `contact`, `orgs`, `position`, `date_registered`) VALUES ('$client_uniIDs','$firstName','$mi','$lastName','$emailadd','$con','$orgn','$post','$date_reg')";

                                $client_archive_query_result = mysqli_query($conn, $client_archive_query);
                            }
                            if($client_archive_query_result){

                                $delete_client_query = "DELETE FROM `client` WHERE `email_add`='$e_add'  AND `client_uniID`='$c_id' ";
                                if($conn->query($delete_client_query)===TRUE){

                                    $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$adminID', '$newaction','$username', '$date')";

                                    if($conn->query($create_adminlog)===TRUE){
                                        header("Location: ../admin.con?success=client_delete_successfully");
                                        exit(); 
                                    }else{
                                        header("Location: ../admin.con?error=adminlog_error");
                                        exit();
                                    }

                                }else{
                                    header("Location: ../clients.record?error=client_deletion_failed");
                                    exit();
                                }


                            }else{
                                header("Location: ../clients.record?error=client_archived_failed");
                                exit();
                            }

                        }else{
                            header("Location: ../clients.record?error=client_not_exist");
                            exit();
                        }

                    }else{
                        header("Location: ../clients.record?error=client_email_deletion_failed");
                        exit();
                    }

                }else{
                    header("Location: ../clients.record?error=email_archived_failed");
                    exit();
                }


            }else{
                
                $client_query = "SELECT `c_count`, `client_uniID`, `firstName`, `mi`, `lastName`, `email_add`, `contact`, `organization`, `position`, `date_register` FROM `client` WHERE `email_add`='$e_add'";
                $client_query_result = $conn->query($client_query);
                if(mysqli_num_rows($client_query_result) > 0) {
                    foreach($client_query_result as $client){
                        $client_uniIDs = $client['client_uniID'];
                        $firstName = $client['firstName'];
                        $mi = $client['mi'];
                        $lastName = $client['lastName'];
                        $emailadd = $client['email_add'];
                        $con = $client['contact'];
                        $orgn = $client['organization'];
                        $post= $client['position'];
                        $date_reg = $client['date_register'];

                        $client_archive_query = "INSERT INTO `client_archive`(`client_uniID`, `first_name`, `mi`, `last_name`, `email`, `contact`, `orgs`, `position`, `date_registered`) VALUES ('$client_uniIDs','$firstName','$mi','$lastName','$emailadd','$con','$orgn','$post','$date_reg')";

                        $client_archive_query_result = mysqli_query($conn, $client_archive_query);
                    }
                    if($client_archive_query_result){

                        $delete_client_query = "DELETE FROM `client` WHERE `email_add`='$e_add' AND `client_uniID`='$c_id'";
                        if($conn->query($delete_client_query)===TRUE){

                            $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$adminID', '$newaction','$username', '$date')";

                            if($conn->query($create_adminlog)===TRUE){
                                header("Location: ../admin.con?success=client_delete_successfully");
                                exit(); 
                            }else{
                                header("Location: ../admin.con?error=adminlog_error");
                                exit();
                            }

                        }else{
                            header("Location: ../clients.record?error=client_deletion_failed");
                            exit();
                        }


                    }else{
                        header("Location: ../clients.record?error=client_archived_failed");
                        exit();
                    }

                }else{
                    header("Location: ../clients.record?error=client_not_exist");
                    exit();
                }
            }
        }
        
    }
    
}

if(isset($_POST['cancel'])){
    header("Location: ../clients.record?success=cancellation_success");
    exit();
}