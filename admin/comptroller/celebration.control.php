<?php
include_once('../../connection.php');

if(isset($_POST['create_celeb'])){
    if($_POST['header'] && $_POST['celeb_title'] && $_POST['message1'] && $_POST['status'] !=''){

        if($_FILES['celeb_image']['name'] !=''){

            date_default_timezone_set("Asia/Manila");

            $header = mysqli_real_escape_string($conn, $_POST['header']);
            $celeb_title = mysqli_real_escape_string($conn, $_POST['celeb_title']);
            $message1 = mysqli_real_escape_string($conn, $_POST['message1']);
            $message2 = mysqli_real_escape_string($conn, $_POST['message2']);
            $datestart = mysqli_real_escape_string($conn, $_POST['datestart']);
            $status = mysqli_real_escape_string($conn, $_POST['status']);

            $loginid = mysqli_real_escape_string($conn, $_POST['loginid']);
            $admin = mysqli_real_escape_string($conn, $_POST['admin']);
            $action = mysqli_real_escape_string($conn, $_POST['action']);

            $date = date("Y-m-d H:i:s");

            // print_r($_FILES['image']);

            $image_name = $_FILES['celeb_image']['name'];
            $img_size = $_FILES['celeb_image']['size'];
            $tmp_name = $_FILES['celeb_image']['tmp_name'];
            $error = $_FILES['celeb_image']['error'];

            $image_ex = pathinfo($image_name, PATHINFO_EXTENSION);
            $image_ex_loc = strtolower($image_ex );
            
            $allowed_ex = array("jpg", "jpeg", "png", "gif");

            if(in_array($image_ex_loc, $allowed_ex)){
                $new_image_name = uniqid("IMG-", true).'.'.$image_ex_loc;
                $image_upload_path = '../upload/'.$new_image_name ;
                move_uploaded_file($tmp_name, $image_upload_path);
                
                $create_celeb_query = "INSERT INTO `celebration`( `commemoration`, `header`,`image`, `message1`, `message2`, `date_start`, `status`, `loginId`, `action`, `uploaded`, `updated`) VALUES ('$celeb_title','$header','$new_image_name','$message1','$message2','$datestart','$status','$loginid','$action','$date','$date')";

                $create_celeb_query_result = mysqli_query($conn, $create_celeb_query);
                if(!$create_celeb_query_result){
                    header("Location: ../celebration?error=create_celebration_failed");
                    exit();
                }else{
                    $scheduler_query = "INSERT INTO `scheduler`(`title`, `start_event`, `end_event`) VALUES ('$celeb_title','$datestart','$datestart')";

                    $scheduler_query_result = mysqli_query($conn, $scheduler_query);

                    if(!$scheduler_query_result){
                        header("Location: ../celebration?error=scheduler_insertion_failed");
                        exit();
                    }else{

                        $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$loginid', '$action','$admin', '$date')";

                        $create_adminlog_result = mysqli_query($conn, $create_adminlog);
                        if(!$create_adminlog_result){
                            header("Location: ../celebration?error=adminlog_error");
                            exit(); 
                        }else{
                            header("Location: ../celebration?success=new_created_celebration_successfully");
                            exit();
                        }

                    }
                }

            }else{
                header("Location: ../celebration?error=ext_file_not_supported");
                exit();
            }    

        }else{
            header("Location: ../celebration?error=please_select_images");
            exit();
        }
        
    }else{
        header("Location: ../celebration?error=empty_fields");
        exit();
    }
}

if(isset($_POST['edit_celeb'])){
    // echo "you are connected!";
    if($_POST['eventID'] && $_POST['datestart'] != ''){

        date_default_timezone_set("Asia/Manila");

        $eventID = mysqli_real_escape_string($conn, $_POST['eventID']);
        $header = mysqli_real_escape_string($conn, $_POST['header']);
        $celeb_title = mysqli_real_escape_string($conn, $_POST['celeb_title']);
        $message1 = mysqli_real_escape_string($conn, $_POST['message1']);
        $message2 = mysqli_real_escape_string($conn, $_POST['message2']);
        $datestart = mysqli_real_escape_string($conn, $_POST['datestart']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);

        $loginid = mysqli_real_escape_string($conn, $_POST['loginid']);
        $admin = mysqli_real_escape_string($conn, $_POST['admin']);
        $action1 = mysqli_real_escape_string($conn, $_POST['action1']);

        $update_date = date("Y-m-d H:i:s");

        $update_celeb_query = "UPDATE `celebration` SET `commemoration`='$celeb_title', `header`='$header', `message1`='$message1', `message2`='$message2', `date_start`='$datestart', `loginId`='$loginid', `action`='$action1', `updated`='$update_date' WHERE `keepingID`='$eventID' ";

        $update_celeb_query_result = mysqli_query($conn, $update_celeb_query);
        if(!$update_celeb_query_result){
            header("Location: ../celebration?error=celebration_updated_failed");
            exit();
        }else{

            $scheduler_query = "INSERT INTO `scheduler`(`title`, `start_event`, `end_event`) VALUES ('$celeb_title','$datestart','$datestart')";

            $scheduler_query_result = mysqli_query($conn, $scheduler_query);

            if(!$scheduler_query_result){
                header("Location: ../celebration?error=failed_to_insert_in calendar");
                exit();
            }else{

                $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$loginid', '$action1','$admin', '$update_date')";

                $create_adminlog_result = mysqli_query($conn, $create_adminlog);
                if(!$create_adminlog_result){
                    header("Location: ../celebration?error=adminlog_error");
                    exit(); 
                }else{
                    header("Location: ../celebration?success=celebration_updated_successfully");
                    exit();
                }

            }
          
        }

    }else{
        header("Location: ../celebration?error=empty_fields");
        exit();
    }
}

if(isset($_POST['update_celeb_stats'])){
    // echo "you are connected!";

    if($_POST['celeID'] && $_POST['stats'] != ''){

        date_default_timezone_set("Asia/Manila");

        $celeID = mysqli_real_escape_string($conn, $_POST['celeID']);
        $stats = mysqli_real_escape_string($conn, $_POST['stats']);

        $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $status_update = mysqli_real_escape_string($conn, $_POST['status_update']);

        $update_date = date("Y-m-d H:i:s");

        $count_celeb_active_query = "SELECT * FROM `celebration` WHERE `status`='published' ";
        if ($result=mysqli_query($conn, $count_celeb_active_query)) {
            $rowcount=mysqli_num_rows($result);
            // echo "The total number of rows are: ".$rowcount;
            
            if($rowcount>0){
                
                $auto_update_query = "UPDATE `celebration` SET `status`='unpublished' WHERE `status`='published'";
                $auto_update_query_result = mysqli_query($conn, $auto_update_query);
                if(!$auto_update_query_result){
                    header("Location: ../celebration?error=sql_error");
                    exit(); 
                }else{
                    
                    $celeb_update_stats_query = "UPDATE `celebration` SET `status`='$stats',`loginId`='$user_id',`action`='$status_update',`updated`='$update_date' WHERE `keepingID`='$celeID'";

                    $celeb_update_stats_query_result = mysqli_query($conn, $celeb_update_stats_query);
                    if(!$celeb_update_stats_query_result){
                        header("Location: ../celebration?error=celebretion_status_update_failed");
                        exit();
                    }else{
                        $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$user_id ','$status_update','$username','$update_date')";

                        $create_adminlog_result = mysqli_query($conn, $create_adminlog);
                        if(!$create_adminlog_result){
                            header("Location: ../celebration?error=adminlog_error");
                            exit(); 
                        }else{
                            header("Location: ../celebration?success=celebretion_status_update_successfully");
                            exit();
                        }
                    }
                }

            }else{

                $celeb_update_stats_query = "UPDATE `celebration` SET `status`='$stats',`loginId`='$user_id',`action`='$status_update',`updated`='$update_date' WHERE `keepingID`='$celeID'";

                $celeb_update_stats_query_result = mysqli_query($conn, $celeb_update_stats_query);
                if(!$celeb_update_stats_query_result){
                    header("Location: ../celebration?error=celebretion_status_update_failed");
                    exit();
                }else{
                    $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$user_id ','$status_update','$username','$update_date')";

                    $create_adminlog_result = mysqli_query($conn, $create_adminlog);
                    if(!$create_adminlog_result){
                        header("Location: ../celebration?error=adminlog_error");
                        exit(); 
                    }else{
                        header("Location: ../celebration?success=celebretion_status_update_successfully");
                        exit();
                    }
                }
            }
        }
     

    }else{
        header("Location: ../celebration?error=empty_fields");
        exit();
    }
}

if(isset($_POST['image_update'])){
    if($_FILES['comme_img']['name'] !='' ){
        date_default_timezone_set("Asia/Manila");

        $keepingID = mysqli_real_escape_string($conn, $_POST['kID']);

        $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $user_level = mysqli_real_escape_string($conn, $_POST['user_level']);
        $image_update = mysqli_real_escape_string($conn, $_POST['image_update']);

        $update_date = date("Y-m-d H:i:s");

        $image_name = $_FILES['comme_img']['name'];
        $img_size = $_FILES['comme_img']['size'];
        $tmp_name = $_FILES['comme_img']['tmp_name'];
        $error = $_FILES['comme_img']['error'];

        $image_ex = pathinfo($image_name, PATHINFO_EXTENSION);
        $image_ex_loc = strtolower($image_ex );
        
        $allowed_ex = array("jpg", "jpeg", "png", "gif");

        if(in_array($image_ex_loc, $allowed_ex)){

            $new_image_name = uniqid("IMG-", true).'.'.$image_ex_loc;
            $image_upload_path = '../upload/'.$new_image_name ;
            move_uploaded_file($tmp_name, $image_upload_path );

            $update_event_image = "UPDATE `celebration` SET `image`='$new_image_name',`loginId`='$user_id',`action`='$image_update',`updated`='$update_date' WHERE `keepingID`='$keepingID' ";
            
            $update_query_result = mysqli_query($conn, $update_event_image);

            if($update_query_result){

                $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$user_id', '$image_update','$username', '$update_date')";

                $create_adminlog_result = mysqli_query($conn, $create_adminlog);
                if(!$create_adminlog_result){
                    header("Location: ../celebration?error=adminlog_error");
                    exit(); 
                }else{
                    header("Location: ../celebration?success=celebration_image_update_successfully");
                    exit();
                }

            }else{
                header("Location: ../celebration?error=image_update_failed");
                exit();
            }
        }else{
            header("Location: ../celebration?error=ext_file_not_supported");
            exit();
        }

    }
    else{
        header("Location: ../celebration?error=please_select_images");
        exit();
    }

}

if(isset($_POST['delete_celeb'])){
   if($_POST['eventID'] !=''){
    date_default_timezone_set("Asia/Manila");

    $eventID = mysqli_real_escape_string($conn, $_POST['eventID']);

    $loginid = mysqli_real_escape_string($conn, $_POST['loginid']);
    $admin = mysqli_real_escape_string($conn, $_POST['admin']);
    $action2 = mysqli_real_escape_string($conn, $_POST['action2']);
    $newstats = 'archive';

    $date = date("Y-m-d H:i:s");

    $celebration_query = "SELECT * FROM `celebration` WHERE `keepingID`='$eventID' ";
    $celebration_query_result = $conn->query($celebration_query);
    if($celebration_query_result > 0){
        while($row = mysqli_fetch_assoc($celebration_query_result)){
            $commemoration = $row['commemoration'];
            $header = $row['header'];
            $image = $row['image'];
            $message1 = $row['message1'];
            $message2 = $row['message2'];
            $date_start = $row['date_start'];
            $uploaded = $row['uploaded'];
        }

        $celeb_archive_query = "INSERT INTO `celebration_archive`(`keepingID`, `commemoration`, `header`, `image`, `message1`, `message2`, `date_start`, `status`, `uploaded`, `loginId`, `action`) VALUES ('$eventID','$commemoration','$header','$image','$message1','$message2','$date_start','$newstats','$uploaded','$loginid','$action2')";
        
        if($conn->query($celeb_archive_query)===TRUE){

            $delete_celeb_query = "DELETE FROM `celebration` WHERE `keepingID`='$eventID' ";
            if($conn->query($delete_celeb_query)===TRUE){

                $delete_scheduler_query = "DELETE FROM `scheduler` WHERE `title`='$commemoration'";
                if($conn->query($delete_scheduler_query)===TRUE){

                    $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$loginid', '$action2','$admin', '$date')";

                    $create_adminlog_result = mysqli_query($conn, $create_adminlog);
                    if(!$create_adminlog_result){
                        header("Location: ../celebration?error=adminlog_error");
                        exit(); 
                    }else{
                        header("Location: ../celebration?success=celebration_delete_successfully");
                        exit();
                    }

                }else{
                    header("Location: ../celebration?error=celebration_delete_in_scheduler_failed");
                    exit();
                }

            }else{
                header("Location: ../celebration?error=celebration_delete_failed");
                exit();
            }

        }else{
            header("Location: ../celebration?error=celebration_archive_failed");
            exit();
        }

    }else{
        header("Location: ../celebration?error=celebration_not_exist");
        exit();
    }

    }else{
        header("Location: ../celebration?error=empty_fields");
        exit();
    }
}
else{
    header("Location: ../celebration");
        exit();
}