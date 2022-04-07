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
                    $update_consul_query = "UPDATE `consultation` SET `set_date`='$setdate',`set_time`='$settime',`status`='$status' WHERE `email_add`='$email' AND `consultation_id`='$consulID'";
                    
                    if($conn->query($update_consul_query)===TRUE){
                        
                        $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$adminID', '$action2','$admin', '$date')";
        
                        if($conn->query($create_adminlog)===TRUE){
                            header("Location: ../consultation?success=consultation_report_successfully");
                            exit(); 
                        }else{
                            header("Location: ../consultation?error=adminlog_error");
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