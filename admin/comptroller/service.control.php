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
            header("Location: ../services.tools?error=sql_error");
            exit();
        }else {
            mysqli_stmt_bind_param($stmt, "s", $uniID);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);
            
            if($resultcheck > 0) {
                header("Location: ../services.tools?error=service_uniID_is_already_been_exist");
                exit();
            }else {
                if(in_array($image_ex_loc, $allowed_ex)){
                    $new_image_name = uniqid("IMG-", true).'.'.$image_ex_loc;
                    $image_upload_path = '../upload/'.$new_image_name ;
                    move_uploaded_file($tmp_name, $image_upload_path);

                    $limit = 5;
                    $random_num =  random_int(10 ** ($limit - 1), (10 ** $limit) - 1);
                    $year = date("Y");
                    $uniID = $year."-".$random_num;

                    $insert_services = "INSERT INTO `services`(`service_uniID`, `service_title`, `image`, `service_desc`, `status`, `loginId`, `action`, `date_upload`, `date_update`) VALUES ('$uniID', '$service_title', '$new_image_name', '$service_desc', '$status', '$user_id', '$create_services', '$date', '$date')";

                    $insert_services_result = mysqli_query($conn, $insert_services );
                    if(!$insert_services_result){
                        header("Location: ../services.tools?error=sql_error");
                        exit();
                    }else{
                        $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$user_id', '$create_services','$username', '$date')";

                        $create_adminlog_result = mysqli_query($conn, $create_adminlog);
                        if(!$create_adminlog_result){
                            header("Location: ../services.tools?error=adminlog_error");
                            exit(); 
                        }else{
                            header("Location: ../services.tools?success=new_created_services_successfully");
                            exit();
                        }
                        
                    }

                }else{
                    header("Location: ../services.tools?error=ext_file_not_supported");
                    exit();
                }    
            }
        }       

    }else{
        header("Location: ../services.tools?error=empty_fields");
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
            header("Location: ../services.tools?error=sql_error");
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
                        header("Location: ../services.tools?error=adminlog_error");
                        exit(); 
                    }else{
                        header("Location: ../services.tools?success=services_update_successfully");
                        exit();
                    }

                }else{
                    header("Location: ../services.tools?error=sql_error");
                    exit();
                }

            }else{
                header("Location: ../services.tools?error=services_not_exist");
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
        header("Location: ../services.tools?error=sql_error");
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
                            header("Location: ../services.tools?error=adminlog_error");
                            exit(); 
                        }else{
                            header("Location: ../services.tools?success=status_update_successfully");
                            exit();
                        }

                    }else{
                        header("Location: ../services.tools?error=sub_category_error");
                        exit();
                    }

                }else{
                    header("Location: ../services.tools?error=category_error");
                    exit();
                }

            }else{
                header("Location: ../services.tools?error=sql_error");
                exit();
            }

        }else{
            header("Location: ../services.tools?services_not_exist");
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
        header("Location: ../services.tools?error=sql_error");
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
                        header("Location: ../services.tools?error=adminlog_error");
                        exit(); 
                    }else{
                        header("Location: ../services.tools?success=service_image_update_successfully");
                        exit();
                    }

                }else{
                    header("Location: ../services.tools?error=sql_error");
                    exit();
                }
            }else{
                header("Location: ../services.tools?error=file_not_supported");
                exit();
            }

        }else{
            header("Location: ../services.tools?error=services_not_exist");
            exit();
        }
    }
}

if(isset($_POST['delete_services'])){
    if($_POST['service_uniID'] !=''){
        date_default_timezone_set("Asia/Manila");

        $service_uniID = mysqli_real_escape_string($conn, $_POST['service_uniID']);
        $newstats = 'archive';

        $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $user_level = mysqli_real_escape_string($conn, $_POST['user_level']);
        $archive_cat_service = mysqli_real_escape_string($conn, $_POST['archive_cat_service']);
        $archive_sub_cat_service = mysqli_real_escape_string($conn, $_POST['archive_sub_cat_service']);
        $archive_service = mysqli_real_escape_string($conn, $_POST['archive_service']);
        
        $date = date("Y-m-d H:i:s");

        $service_query = "SELECT * FROM `services` WHERE `service_uniID`='$service_uniID'";
        $service_query_result = $conn->query($service_query);
        if($service_query_result->num_rows > 0) {
            while($row = $service_query_result->fetch_assoc()){
                $service_title = $row['service_title'];
                $image = $row['image'];
                $service_desc = $row['service_desc'];
                $date_upload = $row['date_upload'];   
            }
            
            $service_archive_query = "INSERT INTO `services_archive`(`service_uniID`, `service_title`, `image`, `service_desc`, `status`, `date_upload`, `loginId`, `action`) VALUES ('$service_uniID','$service_title','$image','$service_desc','$newstats','$date_upload','$user_id','$archive_service')";

            if($conn->query($service_archive_query) === TRUE){

                $service_update_query = "UPDATE `services` SET `status`='$newstats',`loginId`='$user_id',`action`='$archive_service',`date_update`='$date' WHERE `service_uniID`='$service_uniID'";

                if($conn->query($service_update_query) === TRUE){

                    $cat_query = "SELECT * FROM `services_category` WHERE `service_uniID`='$service_uniID'";
                    $cat_query_result = $conn->query($cat_query);
                    if(mysqli_num_rows($cat_query_result) > 0) {
                        foreach($cat_query_result as $cat) {
                            $category_uniID = $cat['category_uniID'];
                            $category_title = $cat['category_title'];
                            $date_upload = $cat['date_upload'];

                            $cat_archive_query = "INSERT INTO `sc_archive`(`category_uniID`, `service_uniID`, `category_title`, `status`, `date_upload`, `loginId`, `action`) VALUES ('$category_uniID','$service_uniID','$category_title','$newstats','$date_upload','$user_id','$archive_cat_service')";

                            $cat_archive_query_result = mysqli_query($conn, $cat_archive_query);
                        }
                        if($cat_archive_query_result){

                            $cat_update_query ="UPDATE `services_category` SET `status`='$newstats',`loginId`='$user_id',`action`='$archive_cat_service',`date_update`='$date' WHERE `service_uniID`='$service_uniID' ";

                            if($conn->query($cat_update_query) === TRUE){

                                $sub_cat_query = "SELECT * FROM `services_sub_category` WHERE `service_uniID`='$service_uniID'";
                                $sub_cat_query_result = $conn->query($sub_cat_query);
                                if(mysqli_num_rows($sub_cat_query_result) > 0) {
                                    foreach($sub_cat_query_result as $sub_cat) {
                                        $sub_cat_uniID = $sub_cat['sub_cat_uniID'];
                                        $category_uniID = $sub_cat['category_uniID'];
                                        $sub_cat_title = $sub_cat['sub_cat_title'];
                                        $date_upload = $sub_cat['date_upload'];

                                        $ssc_archive_query = "INSERT INTO `ssc_archive`(`sub_cat_uniID`, `service_uniID`, `category_uniID`, `sub_cat_title`, `status`,`date_upload`, `loginId`, `action`) VALUES ('$sub_cat_uniID','$service_uniID','$category_uniID','$sub_cat_title','$newstats','$date_upload','$user_id','$archive_sub_cat_service')";

                                        $ssc_archive_query_result = mysqli_query($conn, $ssc_archive_query);
                                    }
                                    if($ssc_archive_query_result){

                                        $ssc_update_query = "UPDATE `services_sub_category` SET `status`='$newstats',`loginId`='$user_id',`action`='$archive_sub_cat_service',`date_update`='$date' WHERE `service_uniID`='$service_uniID' " ;
            
                                        if($conn->query($ssc_update_query) === TRUE){
            
                                            $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$user_id', '$archive_service', '$username', '$date')";
            
                                            $create_adminlog_result = mysqli_query($conn, $create_adminlog);
                                            if(!$create_adminlog_result){
                                                header("Location: ../services.tools?error=adminlog_error");
                                                exit(); 
                                            }else{
                                                header("Location: ../services.tools?success=service_archive_successfully");
                                                exit();
                                            }
            
                                        }else{
                                            header("Location: ../services.tools?error=sub_category_update_failed");
                                            exit();
                                        }
            
                                    }else{
                                        header("Location: ../services.tools?error=sub_category_archive_failed");
                                        exit();
                                    }


                                }else{
                                    $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$user_id', '$archive_service', '$username', '$date')";

                                    $create_adminlog_result = mysqli_query($conn, $create_adminlog);
                                    if(!$create_adminlog_result){
                                        header("Location: ../services.tools?error=adminlog_error");
                                        exit(); 
                                    }else{
                                        header("Location: ../services.tools?success=service_archive_successfully");
                                        exit();
                                    }
                                }

                            }else{
                                header("Location: ../services.tools?error=category_update_failed");
                                exit();
                            }

                        }else{
                            header("Location: ../services.tools?error=category_archive_failed");
                            exit();
                        }

                    }else{
                        $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$user_id', '$archive_service', '$username', '$date')";

                        $create_adminlog_result = mysqli_query($conn, $create_adminlog);
                        if(!$create_adminlog_result){
                            header("Location: ../services.tools?error=adminlog_error");
                            exit(); 
                        }else{
                            header("Location: ../services.tools?success=service_archive_successfully");
                            exit();
                        }
                    }

                }else{
                    header("Location: ../services.tools?error=service_update_failed");
                    exit();
                }

            }else{
                header("Location: ../services.tools?error=service_archive_failed");
                exit();
            }

        }else{
            header("Location: ../services.tools?error=service_not_exist");
            exit();
        }

    }else{
        header("Location: ../services.tools?error=empty_fields");
        exit();
    }
}else{
    header("Location: ../services.tools");
    exit();
}