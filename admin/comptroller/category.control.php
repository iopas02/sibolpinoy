<?php

include_once('../../connection.php');

if(isset($_POST['create_category'])){
    
    if($_POST['service_uniID'] && $_POST['category_title']  !=''){
        date_default_timezone_set("Asia/Manila");

        $service_uniID = mysqli_real_escape_string($conn, $_POST['service_uniID']);
        $category_title = mysqli_real_escape_string($conn, $_POST['category_title']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);

        $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $user_level = mysqli_real_escape_string($conn, $_POST['user_level']);
        $create_cat_service = mysqli_real_escape_string($conn, $_POST['create_cat_service']);

        $date = date("Y-m-d H:i:s");

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        // Output: 54esmdr0qf
        $random_num = substr(str_shuffle($permitted_chars), 0, 6);
        
        $year = date("Y");
        $cat_uniID = $year."-".$random_num;

        $cat_uniID_query = "SELECT `category_uniID` FROM `services_category` WHERE `category_uniID`= ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $cat_uniID_query)) {
            header("Location: ../services.category?error=sql_error");
            exit();
        }else {
            mysqli_stmt_bind_param($stmt, "s", $cat_uniID);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);

            if($resultcheck > 0) {
                header("Location: ../services.category.php?error=category_uniID_is_already_been_exist");
                exit();
            }else {
                $insert_category = "INSERT INTO `services_category`(`category_uniID`, `service_uniID`, `category_title`, `status`, `loginId`, `action`, `date_upload`, `date_update`) VALUES ('$cat_uniID','$service_uniID', '$category_title','$status', '$user_id', '$create_cat_service', '$date', '$date')";

                $insert_category_result = mysqli_query($conn, $insert_category);

                if(!$insert_category_result){
                    header("Location: ../services.category?error=sql_error");
                    exit();
                }else{
                    
                    $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$user_id', '$create_cat_service','$username', '$date')";

                    $create_adminlog_result = mysqli_query($conn, $create_adminlog);
                    if(!$create_adminlog_result){
                        header("Location: ../services.tools?error=adminlog_error");
                        exit(); 
                    }else{
                        header("Location: ../services.category?success=new_services_category_upload");
                        exit();
                    }
                }
            }
        }

    }else{
        header("Location: ../services.category?error=empty_fields");
        exit();
    }  
}


if(isset($_POST['edit_category'])){

    if($_POST['category_uniID'] && $_POST['category_title']  !=''){  

        date_default_timezone_set("Asia/Manila");

        $category_uniID = mysqli_real_escape_string($conn, $_POST['category_uniID']);
        $category_title = mysqli_real_escape_string($conn, $_POST['category_title']);

        $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $user_level = mysqli_real_escape_string($conn, $_POST['user_level']);
        $update_cat_service = mysqli_real_escape_string($conn, $_POST['update_cat_service']);

        $update_date = date("Y-m-d H:i:s");

        $cat_uniID_query = "SELECT `category_uniID` FROM `services_category` WHERE `category_uniID`= ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $cat_uniID_query)) {
            header("Location: ../services.category?error=sql_error");
            exit();
        }else {
            mysqli_stmt_bind_param($stmt, "s", $category_uniID);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);

            if($resultcheck > 0) {

                $cat_update_query = "UPDATE `services_category` SET `category_title`='$category_title', `loginId`='$user_id',`action`='$update_cat_service', `date_update`='$update_date' WHERE `category_uniID`='$category_uniID' ";

                $cat_update_query_result = mysqli_query($conn, $cat_update_query);

                if(!$cat_update_query_result){
                    header("Location: ../services.category?error=sql_error");
                    exit();
                }else{
                    
                    $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$user_id', '$update_cat_service','$username', '$update_date')";

                    $create_adminlog_result = mysqli_query($conn, $create_adminlog);
                    if(!$create_adminlog_result){
                        header("Location: ../services.tools?error=adminlog_error");
                        exit(); 
                    }else{
                        header("Location: ../services.category?success=category_update_successfully");
                        exit();
                    }
                    
                }
                
            }else{
                header("Location: ../services.category.php?error=category_not_exist");
                exit();
            }
        }

    }else{
        header("Location: ../services.category.php?error=empty_fields");
        exit();
    }  
     
}

if(isset($_POST['cat_update_stats'])){

    date_default_timezone_set("Asia/Manila");

    $cat_uniID = mysqli_real_escape_string($conn, $_POST['cat_uniID']);
    $stats = mysqli_real_escape_string($conn, $_POST['stats']);

    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $user_level = mysqli_real_escape_string($conn, $_POST['user_level']);
    $update_status = mysqli_real_escape_string($conn, $_POST['update_stats']);
    
    $update_date = date("Y-m-d H:i:s");

    $cat_uniID_query = "SELECT `category_uniID` FROM `services_category` WHERE `category_uniID`= ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $cat_uniID_query)) {
        header("Location: ../services.category?error=sql_error");
        exit();
    }else {
        mysqli_stmt_bind_param($stmt, "s", $cat_uniID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultcheck = mysqli_stmt_num_rows($stmt);

        if($resultcheck > 0) {

            $update_stats = "UPDATE `services_category` SET `status`='$stats', `loginId`='$user_id',`action`='$update_status', `date_update`='$update_date' WHERE `category_uniID`='$cat_uniID' ";
            $update_query_result = mysqli_query($conn,$update_stats);

            if($update_query_result){

                $update_sub_catstats = "UPDATE `services_sub_category` SET `status`='$stats', `loginId`='$user_id', `action`='$update_status', `date_update`='$update_date' WHERE `category_uniID`='$cat_uniID' ";
                $update_sub_catquery_result = mysqli_query($conn, $update_sub_catstats);

                if($update_sub_catquery_result){
                    
                    $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$user_id', '$update_status','$username', '$update_date')";

                    $create_adminlog_result = mysqli_query($conn, $create_adminlog);
                    if(!$create_adminlog_result){
                        header("Location: ../services.tools?error=adminlog_error");
                        exit(); 
                    }else{
                        header("Location: ../services.category?success=status_update_successfully");
                        exit();
                    }

                }else{
                    header("Location: ../services.category.php?error=sub_category_error");
                    exit();
                }    


            }else{
                header("Location: ../services.category.php?error=sql_error");
                exit();
            }

        }else{
            header("Location: ../services.category.php?error=category_not_exist");
            exit();
        }
    }
}


if(isset($_POST['create_sub_cat'])){
    if($_POST['service_uniID'] && $_POST['category_uniID'] && $_POST['sub_cat_title']  !=''){
        date_default_timezone_set("Asia/Manila");

        $service_uniID = mysqli_real_escape_string($conn, $_POST['service_uniID']);
        $category_uniID = mysqli_real_escape_string($conn, $_POST['category_uniID']);
        $sub_cat_title = mysqli_real_escape_string($conn, $_POST['sub_cat_title']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);

        $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $user_level = mysqli_real_escape_string($conn, $_POST['user_level']);
        $create_sub_cat_service = mysqli_real_escape_string($conn, $_POST['create_sub_cat_service']);

        $date = date("Y-m-d H:i:s");

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        // Output: 54esmdr0qfg
        $random_num = substr(str_shuffle($permitted_chars), 0, 7);
        
        $year = date("Y");
        $sub_cat_uniID = $year."-".$random_num;

        $sub_cat_uniID_query = "SELECT `sub_cat_uniID` FROM `services_sub_category` WHERE `sub_cat_uniID`=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sub_cat_uniID_query)) {
            header("Location: ../services.sub.cat?error=sql_error");
            exit();
        }else {
            mysqli_stmt_bind_param($stmt, "s", $sub_cat_uniID);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);
    
            if($resultcheck > 0) {
                header("Location: ../services.sub.cat?error=sub_category_uniID_is_already_been_exist");
                exit();
            }else{
                
                $insert_sub_cat = "INSERT INTO `services_sub_category`(`sub_cat_uniID`, `service_uniID`, `category_uniID`, `sub_cat_title`, `status`, `loginId`, `action`, `date_upload`, `date_update`) VALUES ('$sub_cat_uniID', '$service_uniID', '$category_uniID', '$sub_cat_title', '$status', '$user_id', '$create_sub_cat_service', '$date', '$date')";

                $insert_sub_cat_result = mysqli_query($conn, $insert_sub_cat);

                if(!$insert_sub_cat_result){
                    header("Location: ../services.sub.cat?error=sql_error");
                    exit();
                }else{
                   
                    $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$user_id', '$create_sub_cat_service', '$username', '$date')";

                    $create_adminlog_result = mysqli_query($conn, $create_adminlog);
                    if(!$create_adminlog_result){
                        header("Location: ../services.sub.cat?error=adminlog_error");
                        exit(); 
                    }else{
                        header("Location: ../services.sub.cat?success=new_services_sub_category_upload");
                        exit();
                    }

                }
            }
        } 

    }else{
        header("Location: ../services.sub.cat.php?error=empty_fields");
        exit();
    }  
}

if(isset($_POST['edit_sub_cat'])){
    date_default_timezone_set("Asia/Manila");

    $sub_cat_uniID = mysqli_real_escape_string($conn, $_POST['sub_cat_uniID']);
    $sub_cat_title = mysqli_real_escape_string($conn, $_POST['sub_cat_title']);

    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $user_level = mysqli_real_escape_string($conn, $_POST['user_level']);
    $update_sub_cat_service = mysqli_real_escape_string($conn, $_POST['update_sub_cat_service']);

    $update_date = date("Y-m-d H:i:s");
    
    if($_POST['sub_cat_uniID'] && $_POST['sub_cat_title']  !=''){
        
        $sub_cat_uniID_query = "SELECT `sub_cat_uniID` FROM `services_sub_category` WHERE `sub_cat_uniID`=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sub_cat_uniID_query)) {
            header("Location: ../services.sub.cat?error=sql_error");
            exit();
        }else {
            mysqli_stmt_bind_param($stmt, "s", $sub_cat_uniID);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);
    
            if($resultcheck > 0) {
                
                $sub_cat_update_query = "UPDATE `services_sub_category` SET `sub_cat_title`='$sub_cat_title', `loginId`='$user_id',`action`='$update_sub_cat_service', `date_update`='$update_date' WHERE `sub_cat_uniID`='$sub_cat_uniID' ";

                $sub_cat_update_query_result = mysqli_query($conn, $sub_cat_update_query);

                if(!$sub_cat_update_query_result){
                    header("Location: ../services.sub.catp?error=sql_error");
                    exit();
                }else{
                 
                    $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$user_id', '$update_sub_cat_service', '$username', '$update_date')";

                    $create_adminlog_result = mysqli_query($conn, $create_adminlog);
                    if(!$create_adminlog_result){
                        header("Location: ../services.sub.cat?error=adminlog_error");
                        exit(); 
                    }else{
                        header("Location: ../services.sub.cat?success=sub_category_update_successfully");
                        exit();
                    }

                }

            }else{
                header("Location: ../services.sub.cat?error=sub_categoty_is_not_exist");
                exit();
            }
        }

    }else{
        header("Location: ../services.sub.cat.php?error=empty_fields");
        exit();
    }
}

if(isset($_POST['sub_cat_update_stats'])){
    date_default_timezone_set("Asia/Manila");

    $subcat_uniID = mysqli_real_escape_string($conn, $_POST['subcat_uniID']);
    $stats = mysqli_real_escape_string($conn, $_POST['stats']);

    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $user_level = mysqli_real_escape_string($conn, $_POST['user_level']);
    $update_sub_cat_stats = mysqli_real_escape_string($conn, $_POST['update_sub_cat_stats']);
    
    $update_date = date("Y-m-d H:i:s");

    $sub_cat_uniID_query = "SELECT `sub_cat_uniID` FROM `services_sub_category` WHERE `sub_cat_uniID`=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sub_cat_uniID_query)) {
        header("Location: ../services.sub.cat?error=sql_error");
        exit();
    }else {
        mysqli_stmt_bind_param($stmt, "s", $subcat_uniID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultcheck = mysqli_stmt_num_rows($stmt);

        if($resultcheck > 0){

            $update_stats = "UPDATE `services_sub_category` SET `status`='$stats', `loginId`='$user_id', `action`='$update_sub_cat_stats', `date_update`='$update_date' WHERE `sub_cat_uniID`='$subcat_uniID' ";
            $update_query_result = mysqli_query($conn,$update_stats);

            if($update_query_result){

                $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$user_id', '$update_sub_cat_stats', '$username', '$update_date')";

                $create_adminlog_result = mysqli_query($conn, $create_adminlog);
                if(!$create_adminlog_result){
                    header("Location: ../services.sub.cat?error=adminlog_error");
                    exit(); 
                }else{
                    header("Location: ../services.sub.cat?success=status_update_successfully");
                    exit();
                }
                
            }else{
                header("Location: ../services.sub.cat?error=sql_error");
                exit();
            }

        }else{
            header("Location: ../services.sub.cat?error=sub_categoty_is_not_exist");
            exit();
        } 
    }    
}

if(isset($_POST['delete_ssc'])){

    if($_POST['sub_cat_uniID'] !=''){
        date_default_timezone_set("Asia/Manila");

        $sub_cat_uniID = mysqli_real_escape_string($conn, $_POST['sub_cat_uniID']);
        $newstats = 'archive';

        $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $user_level = mysqli_real_escape_string($conn, $_POST['user_level']);
        $delete_sub_cat_service = mysqli_real_escape_string($conn, $_POST['delete_sub_cat_service']);
        
        $date = date("Y-m-d H:i:s");

        $ssc_query = "SELECT * FROM `services_sub_category` WHERE `sub_cat_uniID`='$sub_cat_uniID'";
        $ssc_query_result = $conn->query($ssc_query);
        if($ssc_query_result->num_rows > 0) {
            while($row = $ssc_query_result->fetch_assoc()) {
                $service_uniID = $row['service_uniID'];
                $category_uniID = $row['category_uniID'];
                $sub_cat_title = $row['sub_cat_title'];
                $date_upload = $row['date_upload'];
            }

            $ssc_archive_query = "INSERT INTO `ssc_archive`(`sub_cat_uniID`, `service_uniID`, `category_uniID`, `sub_cat_title`, `status`, `date_upload`, `loginId`, `action`) VALUES ('$sub_cat_uniID','$service_uniID','$category_uniID','$sub_cat_title','$newstats','$date_upload','$user_id','$delete_sub_cat_service')";
            
            if($conn->query($ssc_archive_query) === TRUE) { 
                $ssc_update_query = "UPDATE `services_sub_category` SET `status`='$newstats',`loginId`='$user_id',`action`='$delete_sub_cat_service',`date_update`='$date' WHERE `sub_cat_uniID`='$sub_cat_uniID'";
                if($conn->query($ssc_update_query) === TRUE) {

                    $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$user_id', '$delete_sub_cat_service', '$username', '$date')";

                    $create_adminlog_result = mysqli_query($conn, $create_adminlog);
                    if(!$create_adminlog_result){
                        header("Location: ../services.sub.cat?error=adminlog_error");
                        exit(); 
                    }else{
                        header("Location: ../services.sub.cat?success=sub_cat_archive_successfully");
                        exit();
                    }

                }else{
                    header("Location: ../services.sub.cat?error=sub_category_update_failed");
                    exit();
                }

            }else{
                header("Location: ../services.sub.cat?error=sub_category_archive_failed");
                exit();
            }

        }else{
            header("Location: ../services.sub.cat?error=sub_category_is_not_exist");
            exit();
        }
    
    }else{
        header("Location: ../services.sub.cat?error=empty_fields");
        exit();
    }    

}

if(isset($_POST['delete_category'])){
    if($_POST['category_uniID'] !=''){
        date_default_timezone_set("Asia/Manila");

        $category_uniID = mysqli_real_escape_string($conn, $_POST['category_uniID']);
        $newstats = 'archive';

        $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $user_level = mysqli_real_escape_string($conn, $_POST['user_level']);
        $archive_cat_service = mysqli_real_escape_string($conn, $_POST['archive_cat_service']);
        $archive_sub_cat_service = mysqli_real_escape_string($conn, $_POST['archive_sub_cat_service']);
        
        $date = date("Y-m-d H:i:s");

        $cat_query = "SELECT * FROM `services_category` WHERE `category_uniID`='$category_uniID'";
        $cat_query_result = $conn->query($cat_query);
        if($cat_query_result->num_rows > 0) {
            while($row = $cat_query_result->fetch_assoc()) {
                $service_uniID = $row['service_uniID'];
                $category_title = $row['category_title'];
                $date_upload = $row['date_upload'];
            }

            $cat_archive_query = "INSERT INTO `sc_archive`(`category_uniID`, `service_uniID`, `category_title`, `status`, `date_upload`, `loginId`, `action`) VALUES ('$category_uniID','$service_uniID','$category_title','$newstats','$date_upload','$user_id','$archive_cat_service')";

            if($conn->query($cat_archive_query) === TRUE){

                $cat_update_query = "UPDATE `services_category` SET `status`='$newstats',`loginId`='$user_id',`action`='$archive_cat_service',`date_update`='$date' WHERE `category_uniID`='$category_uniID'";

                if ($conn->query($cat_update_query) === TRUE){

                    $ssc_query = "SELECT * FROM `services_sub_category` WHERE `category_uniID`='$category_uniID'";
                    $ssc_query_result = $conn->query($ssc_query);
                    if(mysqli_num_rows($ssc_query_result) > 0) {
                        foreach($ssc_query_result as $ssc) {
                            $service_uniID = $ssc['service_uniID'];
                            $sub_cat_uniID = $ssc['sub_cat_uniID'];
                            $sub_cat_title = $ssc['sub_cat_title'];
                            $date_upload = $ssc['date_upload'];

                            $ssc_archive_query = "INSERT INTO `ssc_archive`(`sub_cat_uniID`, `service_uniID`, `category_uniID`, `sub_cat_title`, `status`,`date_upload`, `loginId`, `action`) VALUES ('$sub_cat_uniID','$service_uniID','$category_uniID','$sub_cat_title','$newstats','$date_upload','$user_id','$archive_sub_cat_service')";

                            $ssc_archive_query_result = mysqli_query($conn, $ssc_archive_query);
                        }
                        if($ssc_archive_query_result){

                            $ssc_update_query = "UPDATE `services_sub_category` SET `status`='$newstats',`loginId`='$user_id',`action`='$archive_sub_cat_service',`date_update`='$date' WHERE `category_uniID`='$category_uniID' " ;

                            if($conn->query($ssc_update_query) === TRUE){

                                $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$user_id', '$archive_cat_service', '$username', '$date')";

                                $create_adminlog_result = mysqli_query($conn, $create_adminlog);
                                if(!$create_adminlog_result){
                                    header("Location: ../services.category?error=adminlog_error");
                                    exit(); 
                                }else{
                                    header("Location: ../services.category?success=category_archive_successfully");
                                    exit();
                                }

                            }else{
                                header("Location: ../services.sub.cat?error=sub_category_update_failed");
                                exit();
                            }

                        }else{
                            header("Location: ../services.category?error=sub_category_archive_failed");
                            exit();
                        }

                    }else{

                        $create_adminlog = "INSERT INTO `adminlog`(`loginId`, `action`, `actionBy`, `date`) VALUES ('$user_id', '$archive_cat_service', '$username', '$date')";

                        $create_adminlog_result = mysqli_query($conn, $create_adminlog);
                        if(!$create_adminlog_result){
                            header("Location: ../services.category?error=adminlog_error");
                            exit(); 
                        }else{
                            header("Location: ../services.category?success=category_archive_successfully");
                            exit();
                        }
                    }    


                }else{
                    header("Location: ../services.category?error=category_update_failed");
                    exit(); 
                }

            }else{
                header("Location: ../services.category?error=category_archive_failed");
                exit();
            }

        }else{
            header("Location: ../services.category?error=category_not_exist");
            exit();
        }
        
    }else{
        header("Location: ../services.category?error=empty_fields");
        exit();
    }
}else{
    header("Location: ../services.category");
    exit();
}