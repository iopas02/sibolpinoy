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