<?php
 include_once('../../connection.php');

if(isset($_POST['create_services'])){

    if($_POST['service_title'] && $_POST['service_desc'] && $_FILES['image'] !=''){

        date_default_timezone_set("Asia/Manila");

        $uniID = mysqli_real_escape_string($conn, $_POST['service_uniID']);
        $service_title = mysqli_real_escape_string($conn, $_POST['service_title']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $service_desc = mysqli_real_escape_string($conn, $_POST['service_desc']);
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

                    $insert_services = "INSERT INTO `services`(`service_uniID`, `service_title`, `image`, `service_desc`, `status`, `date_upload`, `date_update`) VALUES ('$uniID', '$service_title','$new_image_name','$service_desc', '$status', '$date', '$date')";

                    $insert_services_result = mysqli_query($conn, $insert_services );
                    if(!$insert_services_result){
                        header("Location: ../services.tools.php?error=sql_error");
                        exit();
                    }else{
                        header("Location: ../services.tools.php?success=new_services_upload");
                        exit();
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

    date_default_timezone_set("Asia/Manila");

    $uniID = mysqli_real_escape_string($conn, $_POST['service_uniID']);
    $update_title = mysqli_real_escape_string($conn, $_POST['service_title']);
    $update_desc = mysqli_real_escape_string($conn, $_POST['service_desc']);

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
            
            $update_query = "UPDATE `services` SET `service_title`='$update_title', `service_desc`='$update_desc' WHERE `service_uniID`='$uniID' ";

            $update_query_result = mysqli_query($conn, $update_query);

            if($update_query_result){
                header("Location: ../services.tools.php?success=update_services_successfully");
                exit();
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

if(isset($_POST['update_stats'])){

    date_default_timezone_set("Asia/Manila");
    
    $uniID = mysqli_real_escape_string($conn, $_POST['uniID']);
    $status = mysqli_real_escape_string($conn, $_POST['stats']);
    $date = date("Y-m-d H:i:s");

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
            
            $update_stats = "UPDATE `services` SET `status`='$status', `date_update`='$date' WHERE `service_uniID`='$uniID' ";
            $update_query_result = mysqli_query($conn,$update_stats);

            if($update_query_result){
                header("Location: ../services.tools.php?success=update_status_successfully");
                exit();
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
    $date = date("Y-m-d H:i:s");

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

                $update_image = "UPDATE `services` SET `image`='$new_image_name',`date_update`='$date' WHERE `service_uniID`='$uniID' ";
                $update_query_result = mysqli_query($conn, $update_image);

                if($update_query_result){
                    header("Location: ../services.tools.php?success=update_image_successfully");
                    exit();
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