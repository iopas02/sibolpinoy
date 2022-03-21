<?php
include_once('../../connection.php');

if(isset($_POST['create_celeb'])){
    if($_POST['header'] && $_POST['celeb_title'] && $_POST['message1'] && $_POST['status'] !=''){

        if($_FILES['celeb_image'] !=''){

            date_default_timezone_set("Asia/Manila");

            $header = mysqli_real_escape_string($conn, $_POST['header']);
            $celeb_title = mysqli_real_escape_string($conn, $_POST['celeb_title']);
            $message1 = mysqli_real_escape_string($conn, $_POST['message1']);
            $message2 = mysqli_real_escape_string($conn, $_POST['message2']);
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
                
                $create_celeb_query = "INSERT INTO `celebration`( `commemoration`, `header`,`image`, `message1`, `message2`, `status`, `loginId`, `action`, `uploaded`, `updated`) VALUES ('$celeb_title','$header','$new_image_name','$message1','$message2','$status','$loginid','$action','$date','$date')";

                $create_celeb_query_result = mysqli_query($conn, $create_celeb_query);
                if(!$create_celeb_query_result){
                    header("Location: ../celebration.php?error=create_celebration_failed");
                    exit();
                }else{
                    $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$loginid', '$action','$admin', '$date')";

                    $create_adminlog_result = mysqli_query($conn, $create_adminlog);
                    if(!$create_adminlog_result){
                        header("Location: ../celebration.php?error=adminlog_error");
                        exit(); 
                    }else{
                        header("Location: ../celebration.php?success=new_created_celebration_successfully");
                        exit();
                    }

                }

            }else{
                header("Location: ../celebration.php?error=image_not_supported");
                exit();
            }    

            

        }else{
            header("Location: ../celebration.php?error=please_select_images");
            exit();
        }
        
    }else{
        header("Location: ../celebration.php?error=empty_fields");
        exit();
    }
}

if(isset($_POST['edit_celeb'])){
    // echo "you are connected!";
    if($_POST['eventID'] != ''){

        date_default_timezone_set("Asia/Manila");

        $eventID = mysqli_real_escape_string($conn, $_POST['eventID']);
        $header = mysqli_real_escape_string($conn, $_POST['header']);
        $celeb_title = mysqli_real_escape_string($conn, $_POST['celeb_title']);
        $message1 = mysqli_real_escape_string($conn, $_POST['message1']);
        $message2 = mysqli_real_escape_string($conn, $_POST['message2']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);

        $loginid = mysqli_real_escape_string($conn, $_POST['loginid']);
        $admin = mysqli_real_escape_string($conn, $_POST['admin']);
        $action1 = mysqli_real_escape_string($conn, $_POST['action1']);

        $update_date = date("Y-m-d H:i:s");

        $update_celeb_query = "UPDATE `celebration` SET `commemoration`='$celeb_title', `header`='$header', `message1`='$message1', `message2`='$message2', `loginId`='$loginid', `action`='$action1', `updated`='$update_date' WHERE `keepingID`='$eventID' ";

        $update_celeb_query_result = mysqli_query($conn, $update_celeb_query);
        if(!$update_celeb_query_result){
            header("Location: ../celebration.php?error=celebration_updated_failed");
            exit();
        }else{

            $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$loginid', '$action1','$admin', '$update_date')";

            $create_adminlog_result = mysqli_query($conn, $create_adminlog);
            if(!$create_adminlog_result){
                header("Location: ../celebration.php?error=adminlog_error");
                exit(); 
            }else{
                header("Location: ../celebration.php?success=celebration_updated_successfully");
                exit();
            }

        }

    }else{
        header("Location: ../celebration.php?error=id_empty_field");
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
                header("Location: ../celebration.php?error=one_celebretion_is_still_published");
                exit();
            }else{

                $celeb_update_stats_query = "UPDATE `celebration` SET `status`='$stats',`loginId`='$user_id',`action`='$status_update',`updated`='$update_date' WHERE `keepingID`='$celeID'";

                $celeb_update_stats_query_result = mysqli_query($conn, $celeb_update_stats_query);
                if(!$celeb_update_stats_query_result){
                    header("Location: ../celebration.php?error=celebretion_status_update_failed");
                    exit();
                }else{
                    $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$user_id , '$status_update','$username', '$update_date')";

                    $create_adminlog_result = mysqli_query($conn, $create_adminlog);
                    if(!$create_adminlog_result){
                        header("Location: ../celebration.php?error=adminlog_error");
                        exit(); 
                    }else{
                        header("Location: ../celebration.php?success=celebretion_status_update_successfully");
                        exit();
                    }
                }
            }
        }
     

    }else{
        header("Location: ../celebration.php?error=empty_field");
        exit();
    }
}