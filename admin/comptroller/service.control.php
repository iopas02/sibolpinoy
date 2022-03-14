<?php
 include_once('../../connection.php');

if(isset($_POST['create_services'])){

    if($_POST['service_title'] && $_POST['service_desc'] && $_FILES['image'] !=''){

        date_default_timezone_set("Asia/Manila");

        $uniID = mysqli_real_escape_string($conn, $_POST['service_uniID']);
        $service_title = mysqli_real_escape_string($conn, $_POST['service_title']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $service_desc = mysqli_real_escape_string($conn, $_POST['service_desc']);

        $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $user_level = mysqli_real_escape_string($conn, $_POST['user_level']);
        $create_services = mysqli_real_escape_string($conn, $_POST['create_service']);

        $date = date("Y-m-d H:i:s");

        // print_r($_FILES['image']);

        $image_name = $_FILES['image']['name'];
        $img_size = $_FILES['image']['size'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $error = $_FILES['image']['error'];

        $image_ex = pathinfo($image_name, PATHINFO_EXTENSION);
        $image_ex_loc = strtolower($image_ex );
        
        $allowed_ex = array("jpg", "jpeg", "png", "gif");

        $uniID_query = "SELECT `service_uniID` FROM `services` WHERE `service_uniID`= ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $uniID_query )) {
            header("Location: ../services.tools.php?error=sql_error");
            exit();
        }else {
            mysqli_stmt_bind_param($stmt, "s", $uniID);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);
            
            if($resultcheck > 0) {
                header("Location: ../services.tools.php?error=service_uniID_is_already_been_exist");
                exit();
            }else {
                if(in_array($image_ex_loc, $allowed_ex)){
                    $new_image_name = uniqid("IMG-", true).'.'.$image_ex_loc;
                    $image_upload_path = '../upload/'.$new_image_name ;
                    move_uploaded_file($tmp_name, $image_upload_path );

                    $limit = 5;
                    $random_num =  random_int(10 ** ($limit - 1), (10 ** $limit) - 1);
                    $year = date("Y");
                    $uniID = $year."-".$random_num;

                    $insert_services = "INSERT INTO `services`(`service_uniID`, `service_title`, `image`, `service_desc`, `status`, `loginId`, `action`, `date_upload`, `date_update`) VALUES ('$uniID', '$service_title', '$new_image_name', '$service_desc', '$status', '$user_id', '$create_services', '$date', '$date')";

                    $insert_services_result = mysqli_query($conn, $insert_services );
                    if(!$insert_services_result){
                        header("Location: ../services.tools.php?error=sql_error");
                        exit();
                    }else{
                        $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$user_id', '$create_services','$username', '$date')";

                        $create_adminlog_result = mysqli_query($conn, $create_adminlog);
                        if(!$create_adminlog_result){
                            header("Location: ../services.tools.php?error=adminlog_error");
                            exit(); 
                        }else{
                            header("Location: ../services.tools.php?success=new_created_services_successfully");
                            exit();
                        }
                        
                    }

                }else{
                    header("Location: ../services.tools.php?error=ext_file_not_supported");
                    exit();
                }    
            }
        }       

    }else{
        header("Location: ../services.tools.php?error=empty_fields");
        exit();
    }  

}

if(isset($_POST['edit_services'])){

    if($_POST['service_title'] && $_POST['service_desc'] !=''){

        date_default_timezone_set("Asia/Manila");

        $uniID = mysqli_real_escape_string($conn, $_POST['service_uniID']);
        $update_title = mysqli_real_escape_string($conn, $_POST['service_title']);
        $update_desc = mysqli_real_escape_string($conn, $_POST['service_desc']);

        $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $user_level = mysqli_real_escape_string($conn, $_POST['user_level']);
        $update_service = mysqli_real_escape_string($conn, $_POST['update_service']);

        $update_date = date("Y-m-d H:i:s");

        $service_query = "SELECT `service_uniID` FROM `services` WHERE `service_uniID`=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $service_query)) {
            header("Location: ../services.tools.php?error=sql_error");
            exit();
        }else {
            mysqli_stmt_bind_param($stmt, "s", $uniID);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);
            if($resultcheck > 0) {
                
                $update_query = "UPDATE `services` SET `service_title`='$update_title', `service_desc`='$update_desc', `loginId`='$user_id',`action`='$update_service', `date_update`='$update_date' WHERE `service_uniID`='$uniID' ";

                $update_query_result = mysqli_query($conn, $update_query);

                if($update_query_result){

                    $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$user_id', '$update_service','$username', '$update_date')";

                    $create_adminlog_result = mysqli_query($conn, $create_adminlog);
                    if(!$create_adminlog_result){
                        header("Location: ../services.tools.php?error=adminlog_error");
                        exit(); 
                    }else{
                        header("Location: ../services.tools.php?success=services_update_successfully");
                        exit();
                    }

                }else{
                    header("Location: ../services.tools.php?error=sql_error");
                    exit();
                }

            }else{
                header("Location: ../services.tools.php?services_not_exist");
                exit();
            }
        }
    }else{
        header("Location: ../services.tools.php?error=empty_fields");
        exit();
    }  
        
    
}

if(isset($_POST['update_stats'])){

    date_default_timezone_set("Asia/Manila");
    
    $uniID = mysqli_real_escape_string($conn, $_POST['uniID']);
    $status = mysqli_real_escape_string($conn, $_POST['stats']);

    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $user_level = mysqli_real_escape_string($conn, $_POST['user_level']);
    $status_update = mysqli_real_escape_string($conn, $_POST['status_update']);

    $update_date = date("Y-m-d H:i:s");

    $service_query = "SELECT `service_uniID` FROM `services` WHERE `service_uniID`=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $service_query)) {
        header("Location: ../services.tools.php?error=sql_error");
        exit();
    }else {
        mysqli_stmt_bind_param($stmt, "s", $uniID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultcheck = mysqli_stmt_num_rows($stmt);
        if($resultcheck > 0) {
            
            $update_stats = "UPDATE `services` SET `status`='$status', `loginId`='$user_id', `action`='$status_update',  `date_update`='$update_date' WHERE `service_uniID`='$uniID' ";
            $update_query_result = mysqli_query($conn,$update_stats);

            if($update_query_result){
                
                $update_cat_query = "UPDATE `services_category` SET `status`='$status', `loginId`='$user_id', `action`='$status_update', `date_update`='$update_date' WHERE `service_uniID`='$uniID' ";
                $update_cat_query_result = mysqli_query($conn, $update_cat_query);
                
                if($update_cat_query_result){
                    
                    $update_sub_cat_query = "UPDATE `services_sub_category` SET `status`='$status', `loginId`='$user_id', `action`='$status_update', `date_update`='$update_date' WHERE `service_uniID`='$uniID' ";
                    $update_sub_cat_query_result = mysqli_query($conn, $update_sub_cat_query);

                    if($update_sub_cat_query_result){

                        $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$user_id', '$status_update','$username', '$update_date')";

                        $create_adminlog_result = mysqli_query($conn, $create_adminlog);
                        if(!$create_adminlog_result){
                            header("Location: ../services.tools.php?error=adminlog_error");
                            exit(); 
                        }else{
                            header("Location: ../services.tools.php?success=status_update_successfully");
                            exit();
                        }

                    }else{
                        header("Location: ../services.tools.php?error=sub_category_error");
                        exit();
                    }

                }else{
                    header("Location: ../services.tools.php?error=category_error");
                    exit();
                }

            }else{
                header("Location: ../services.tools.php?error=sql_error");
                exit();
            }

        }else{
            header("Location: ../services.tools.php?services_not_exist");
            exit();
        }
    }    
}

if(isset($_POST['update_image'])){
    date_default_timezone_set("Asia/Manila");
    
    $uniID = mysqli_real_escape_string($conn, $_POST['sunid']);

    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $user_level = mysqli_real_escape_string($conn, $_POST['user_level']);
    $image_update = mysqli_real_escape_string($conn, $_POST['image_update']);

    $update_date = date("Y-m-d H:i:s");

    $image_name = $_FILES['uimg']['name'];
    $img_size = $_FILES['uimg']['size'];
    $tmp_name = $_FILES['uimg']['tmp_name'];
    $error = $_FILES['uimg']['error'];

    $image_ex = pathinfo($image_name, PATHINFO_EXTENSION);
    $image_ex_loc = strtolower($image_ex );
    
    $allowed_ex = array("jpg", "jpeg", "png", "gif");

    $image_query = "SELECT `service_uniID` FROM `services` WHERE `service_uniID`=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $image_query)) {
        header("Location: ../services.tools.php?error=sql_error");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "s", $uniID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultcheck = mysqli_stmt_num_rows($stmt);
        if($resultcheck > 0) { 

            if(in_array($image_ex_loc, $allowed_ex)){

                $new_image_name = uniqid("IMG-", true).'.'.$image_ex_loc;
                $image_upload_path = '../upload/'.$new_image_name ;
                move_uploaded_file($tmp_name, $image_upload_path );
 
                $update_image = "UPDATE `services` SET `image`='$new_image_name', `loginId`='$user_id', `action`='$image_update', `date_update`='$update_date' WHERE `service_uniID`='$uniID' ";
                
                $update_query_result = mysqli_query($conn, $update_image);

                if($update_query_result){

                    $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$user_id', '$image_update','$username', '$update_date')";

                    $create_adminlog_result = mysqli_query($conn, $create_adminlog);
                    if(!$create_adminlog_result){
                        header("Location: ../services.tools.php?error=adminlog_error");
                        exit(); 
                    }else{
                        header("Location: ../services.tools.php?success=service_image_update_successfully");
                        exit();
                    }

                }else{
                    header("Location: ../services.tools.php?error=sql_error");
                    exit();
                }
            }else{
                header("Location: ../services.tools.php?error=file_not_supported");
                exit();
            }

        }else{
            header("Location: ../services.tools.php?services_not_exist");
            exit();
        }
    }
}