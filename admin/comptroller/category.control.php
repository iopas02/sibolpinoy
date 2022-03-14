<?php

include_once('../../connection.php');

if(isset($_POST['create_category'])){
    
    if($_POST['service_uniID'] && $_POST['category_title']  !=''){
        date_default_timezone_set("Asia/Manila");

        $service_uniID = mysqli_real_escape_string($conn, $_POST['service_uniID']);
        $category_title = mysqli_real_escape_string($conn, $_POST['category_title']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $date = date("Y-m-d H:i:s");

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        // Output: 54esmdr0qf
        $random_num = substr(str_shuffle($permitted_chars), 0, 6);
        
        $year = date("Y");
        $cat_uniID = $year."-".$random_num;

        $cat_uniID_query = "SELECT `category_uniID` FROM `services_category` WHERE `category_uniID`= ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $cat_uniID_query)) {
            header("Location: ../services.category.php?error=sql_error");
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
                $insert_category = "INSERT INTO `services_category`(`category_uniID`, `service_uniID`, `category_title`, `status`, `date_upload`, `date_update`) VALUES ('$cat_uniID','$service_uniID', '$category_title','$status', '$date', '$date')";

                $insert_category_result = mysqli_query($conn, $insert_category);

                if(!$insert_category_result){
                    header("Location: ../services.category.php?error=sql_error");
                    exit();
                }else{
                    header("Location: ../services.category.php?success=new_services_category_upload");
                    exit();
                }
            }
        }

    }else{
        header("Location: ../services.category.php?error=empty_fields");
        exit();
    }  
}


if(isset($_POST['edit_category'])){

    if($_POST['category_uniID'] && $_POST['category_title']  !=''){  

        date_default_timezone_set("Asia/Manila");

        $category_uniID = mysqli_real_escape_string($conn, $_POST['category_uniID']);
        $category_title = mysqli_real_escape_string($conn, $_POST['category_title']);
        $date = date("Y-m-d H:i:s");

        $cat_uniID_query = "SELECT `category_uniID` FROM `services_category` WHERE `category_uniID`= ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $cat_uniID_query)) {
            header("Location: ../services.category.php?error=sql_error");
            exit();
        }else {
            mysqli_stmt_bind_param($stmt, "s", $category_uniID);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);

            if($resultcheck > 0) {

                $cat_update_query = "UPDATE `services_category` SET `category_title`='$category_title',`date_update`=' $date ' WHERE `category_uniID`='$category_uniID ' ";

                $cat_update_query_result = mysqli_query($conn, $cat_update_query);

                if(!$cat_update_query_result){
                    header("Location: ../services.category.php?error=sql_error");
                    exit();
                }else{
                    header("Location: ../services.category.php?success=category_update_successfully");
                    exit();
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
    
    $date = date("Y-m-d H:i:s");

    $cat_uniID_query = "SELECT `category_uniID` FROM `services_category` WHERE `category_uniID`= ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $cat_uniID_query)) {
        header("Location: ../services.category.php?error=sql_error");
        exit();
    }else {
        mysqli_stmt_bind_param($stmt, "s", $cat_uniID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultcheck = mysqli_stmt_num_rows($stmt);

        if($resultcheck > 0) {

            $update_stats = "UPDATE `services_category` SET `status`='$stats', `date_update`='$date' WHERE `category_uniID`='$cat_uniID' ";
            $update_query_result = mysqli_query($conn,$update_stats);

            if($update_query_result){

                $update_sub_catstats = "UPDATE `services_sub_category` SET `status`='$stats', `date_update`='$date' WHERE `category_uniID`='$cat_uniID' ";
                $update_sub_catquery_result = mysqli_query($conn, $update_sub_catstats);

                if($update_sub_catquery_result){
                    
                    header("Location: ../services.category.php?success=update_status_successfully");
                    exit();

                }else{
                    header("Location: ../services.category.php?error=sub_cat_error");
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
        $date = date("Y-m-d H:i:s");

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        // Output: 54esmdr0qfg
        $random_num = substr(str_shuffle($permitted_chars), 0, 7);
        
        $year = date("Y");
        $sub_cat_uniID = $year."-".$random_num;

        $sub_cat_uniID_query = "SELECT `sub_cat_uniID` FROM `services_sub_category` WHERE `sub_cat_uniID`=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sub_cat_uniID_query)) {
            header("Location: ../services.sub.cat.php?error=sql_error");
            exit();
        }else {
            mysqli_stmt_bind_param($stmt, "s", $sub_cat_uniID);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);
    
            if($resultcheck > 0) {
                header("Location: ../services.sub.cat.php?error=category_uniID_is_already_been_exist");
                exit();
            }else{
                
                $insert_sub_cat = "INSERT INTO `services_sub_category`(`sub_cat_uniID`, `service_uniID`, `category_uniID`, `sub_cat_title`, `status`, `date_upload`, `date_update`) VALUES ('$sub_cat_uniID', '$service_uniID', '$category_uniID', '$sub_cat_title', '$status','$date','$date')";

                $insert_sub_cat_result = mysqli_query($conn, $insert_sub_cat);

                if(!$insert_sub_cat_result){
                    header("Location: ../services.sub.cat.php?error=sql_error");
                    exit();
                }else{
                    header("Location: ../services.sub.cat.php?success=new_services_sub_category_upload");
                    exit();
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
    $date = date("Y-m-d H:i:s");
    
    if($_POST['sub_cat_uniID'] && $_POST['sub_cat_title']  !=''){
        
        $sub_cat_uniID_query = "SELECT `sub_cat_uniID` FROM `services_sub_category` WHERE `sub_cat_uniID`=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sub_cat_uniID_query)) {
            header("Location: ../services.sub.cat.php?error=sql_error");
            exit();
        }else {
            mysqli_stmt_bind_param($stmt, "s", $sub_cat_uniID);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);
    
            if($resultcheck > 0) {
                
                $sub_cat_update_query = "UPDATE `services_sub_category` SET `sub_cat_title`='$sub_cat_title', `date_update`='$date' WHERE `sub_cat_uniID`='$sub_cat_uniID' ";
                $sub_cat_update_query_result = mysqli_query($conn, $sub_cat_update_query);

                if(!$sub_cat_update_query_result){
                    header("Location: ../services.sub.cat.php?error=sql_error");
                    exit();
                }else{
                    header("Location: ../services.sub.cat.php?success=sub_category_update_successfully");
                    exit();
                }


            }else{
                header("Location: ../services.sub.cat.php?error=sub_categoty_is_not_exist");
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
    
    $date = date("Y-m-d H:i:s");

    $sub_cat_uniID_query = "SELECT `sub_cat_uniID` FROM `services_sub_category` WHERE `sub_cat_uniID`=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sub_cat_uniID_query)) {
        header("Location: ../services.sub.cat.php?error=sql_error");
        exit();
    }else {
        mysqli_stmt_bind_param($stmt, "s", $subcat_uniID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultcheck = mysqli_stmt_num_rows($stmt);

        if($resultcheck > 0){

            $update_stats = "UPDATE `services_sub_category` SET `status`='$stats', `date_update`='$date' WHERE `sub_cat_uniID`='$subcat_uniID' ";
            $update_query_result = mysqli_query($conn,$update_stats);

            if($update_query_result){
                header("Location: ../services.sub.cat.php?success=update_status_successfully");
                exit();
            }else{
                header("Location: ../services.sub.cat.php?error=sql_error");
                exit();
            }

        }else{
            header("Location: ../services.sub.cat.php?error=sub_categoty_is_not_exist");
            exit();
        } 
    }    
}