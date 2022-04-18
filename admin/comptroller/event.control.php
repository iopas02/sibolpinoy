<?php
include_once('../../connection.php');

if(isset($_POST['event_published'])){

    if($_POST['header'] && $_POST['event_title'] && $_POST['event_date'] && $_POST['start_date'] && $_POST['reg_fee'] && $_POST['status'] !=''){
        date_default_timezone_set("Asia/Manila");

        $header = mysqli_real_escape_string($conn, $_POST['header']);
        $event_title = mysqli_real_escape_string($conn, $_POST['event_title']);
        $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
        $event_date = mysqli_real_escape_string($conn, $_POST['event_date']);
        $reg_fee = mysqli_real_escape_string($conn, $_POST['reg_fee']);
        $desc_one = mysqli_real_escape_string($conn, $_POST['desc_one']);
        $desc_two = mysqli_real_escape_string($conn, $_POST['desc_two']);

        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $admin = mysqli_real_escape_string($conn, $_POST['admin']);
        $loginid = mysqli_real_escape_string($conn, $_POST['loginid']);
        $action = mysqli_real_escape_string($conn, $_POST['action']);
    
        $date = date("Y-m-d H:i:s");

        $image_name = $_FILES['event_image']['name'];
        $img_size = $_FILES['event_image']['size'];
        $tmp_name = $_FILES['event_image']['tmp_name'];
        $error = $_FILES['event_image']['error'];

        $image_ex = pathinfo($image_name, PATHINFO_EXTENSION);
        $image_ex_loc = strtolower($image_ex );
        
        $allowed_ex = array("jpg", "jpeg", "png", "gif", "pdf");

        if(in_array($image_ex_loc, $allowed_ex)){
            $new_image_name = uniqid("IMG-", true).'.'.$image_ex_loc;
            $image_upload_path = '../upload/'.$new_image_name ;
            move_uploaded_file($tmp_name, $image_upload_path);

            $event_pub_query = "INSERT INTO `events`(`event_img`, `header`, `event_title`, `date_start`, `date_and_time`, `reg_fee`, `desc_1`, `desc_2`, `loginId`, `status`, `date_published`, `action`, `date_update`) VALUES ('$new_image_name','$header','$event_title',' $start_date','$event_date','$reg_fee','$desc_one','$desc_two','$loginid','$status','$date','$action','$date')";

            $event_pub_query_result = mysqli_query($conn, $event_pub_query);
            if(!$event_pub_query_result){
                
                header("Location: ../events?error=event_sql_error");
                exit();

            }else {

               $scheduler_query = "INSERT INTO `scheduler`(`title`, `start_event`, `end_event`) VALUES ('$event_title','$start_date','$start_date')";

               $scheduler_query_result = mysqli_query($conn, $scheduler_query);
               if(!$scheduler_query_result){
                    header("Location: ../events?error=failed_to_insert_in calendar");
                    exit();     
                }else {

                    $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$loginid', '$action','$admin', '$date')";

                    $create_adminlog_result = mysqli_query($conn, $create_adminlog);
                    if(!$create_adminlog_result){
                        header("Location: ../events.php?error=adminlog_error");
                        exit(); 
                    }else{
                        header("Location: ../events.php?success=new_event_created_successfully");
                        exit();
                    }
                }

            }

        }else{
            header("Location: ../events.php?error=ext_file_not_supported");
            exit();
        }

    } else {
        header("Location: ../events.php?error=empty_fields");
        exit();
    }
}

if(isset($_POST['edit_event'])){
    if($_POST['eventID'] && $_POST['header'] && $_POST['event_title'] && $_POST['event_date'] !=''){

        if($_POST['start_date'] !='') {
            date_default_timezone_set("Asia/Manila");
            
            $eventID = mysqli_real_escape_string($conn, $_POST['eventID']);
            $header = mysqli_real_escape_string($conn, $_POST['header']);
            $event_title = mysqli_real_escape_string($conn, $_POST['event_title']);
            $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
            $event_date = mysqli_real_escape_string($conn, $_POST['event_date']);
            $reg_fee = mysqli_real_escape_string($conn, $_POST['reg_fee']);
            $desc_one = mysqli_real_escape_string($conn, $_POST['desc_one']);
            $desc_two = mysqli_real_escape_string($conn, $_POST['desc_two']);

            $status = mysqli_real_escape_string($conn, $_POST['status']);
            $admin = mysqli_real_escape_string($conn, $_POST['admin']);
            $loginid = mysqli_real_escape_string($conn, $_POST['loginid']);
            $action1 = mysqli_real_escape_string($conn, $_POST['action1']);
        
            $date_update = date("Y-m-d H:i:s");

            $update_event_query = "UPDATE `events` SET `header`='$header',`event_title`='$event_title',`date_start`='$start_date',`date_and_time`='$event_date',`reg_fee`='$reg_fee',`desc_1`='$desc_one',`desc_2`='$desc_two',`loginId`='$loginid',`action`='$action1',`date_update`='$date_update' WHERE `eventID`='$eventID' ";

            $update_event_query_result = mysqli_query($conn, $update_event_query);
            if(!$update_event_query_result){
                header("Location: ../events.php?error=event_update_failed");
                exit(); 
            }else {
                $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$loginid','$action1','$admin', '$date_update')";

                $create_adminlog_result = mysqli_query($conn, $create_adminlog);
                if(!$create_adminlog_result){
                    header("Location: ../events.php?error=adminlog_error");
                    exit(); 
                }else{
                    header("Location: ../events.php?success=event_updated_successfully");
                    exit();
                }
            } 

        }else{
            header("Location: ../events.php?error=please_re_enter_event_start_date");
            exit(); 
        }

    }else {
        header("Location: ../events.php?error=empty_fields");
        exit();
    }

}

if(isset($_POST['update_event_stats'])){
    if($_POST['stats'] !='' ){
        date_default_timezone_set("Asia/Manila");

        $eventid = mysqli_real_escape_string($conn, $_POST['eventid']);
        $status = mysqli_real_escape_string($conn, $_POST['stats']);
        $admin = mysqli_real_escape_string($conn, $_POST['username']);
        $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
        $status_update = mysqli_real_escape_string($conn, $_POST['status_update']);
    
        $date_update = date("Y-m-d H:i:s");

        $update_event_status = "UPDATE `events` SET `loginId`='$user_id',`status`='$status', `action`='$status_update',`date_update`='$date_update' WHERE `eventID`='$eventid' ";

        $update_event_status_result = mysqli_query($conn, $update_event_status);
        if(!$update_event_status_result){
            header("Location: ../events.php?error=update_event_status_failed");
            exit();
        }else{
            $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$user_id','$status_update','$admin', '$date_update')";

            $create_adminlog_result = mysqli_query($conn, $create_adminlog);
            if(!$create_adminlog_result){
                header("Location: ../events.php?error=adminlog_error");
                exit(); 
            }else{
                header("Location: ../events.php?success=event_status_updated_successfully");
                exit();
            }
        }

    }else{
        header("Location: ../events.php?error=empty_field");
        exit();
    }
}

if(isset($_POST['update_event_img'])){
    if($_FILES['event_img'] !='' ){
        date_default_timezone_set("Asia/Manila");

        $eid = mysqli_real_escape_string($conn, $_POST['eid']);

        $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $user_level = mysqli_real_escape_string($conn, $_POST['user_level']);
        $image_update = mysqli_real_escape_string($conn, $_POST['image_update']);

        $update_date = date("Y-m-d H:i:s");

        $image_name = $_FILES['event_img']['name'];
        $img_size = $_FILES['event_img']['size'];
        $tmp_name = $_FILES['event_img']['tmp_name'];
        $error = $_FILES['event_img']['error'];

        $image_ex = pathinfo($image_name, PATHINFO_EXTENSION);
        $image_ex_loc = strtolower($image_ex );
        
        $allowed_ex = array("jpg", "jpeg", "png", "gif");

        if(in_array($image_ex_loc, $allowed_ex)){

            $new_image_name = uniqid("IMG-", true).'.'.$image_ex_loc;
            $image_upload_path = '../upload/'.$new_image_name ;
            move_uploaded_file($tmp_name, $image_upload_path );

            $update_event_image = "UPDATE `events` SET `event_img`='$new_image_name',`loginId`='$user_id',`action`='$image_update',`date_update`='$update_date' WHERE `eventID`='$eid' ";
            
            $update_query_result = mysqli_query($conn, $update_event_image);

            if($update_query_result){

                $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$user_id', '$image_update','$username', '$update_date')";

                $create_adminlog_result = mysqli_query($conn, $create_adminlog);
                if(!$create_adminlog_result){
                    header("Location: ../events.php?error=adminlog_error");
                    exit(); 
                }else{
                    header("Location: ../events.php?success=event_image_update_successfully");
                    exit();
                }

            }else{
                header("Location: ../events.php?error=image_update_failed");
                exit();
            }
        }else{
            header("Location: ../events.php?error=ext_file_not_supported");
            exit();
        }

    }
    else{
        header("Location: ../events.php?error=empty_fields");
        exit();
    }
}else{
    header("Location: ../events.php");
    exit();
}