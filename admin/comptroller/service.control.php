<?php
 include_once('../../connection.php');

if(isset($_POST['create_services'])){

    if($_POST['service_title'] && $_POST['service_desc'] && $_FILES['image'] !=''){

        date_default_timezone_set("Asia/Manila");

        $uniID = mysqli_real_escape_string($conn, $_POST['service_uniID']);
        $service_title = mysqli_real_escape_string($conn, $_POST['service_title']);
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

                    $insert_services = "INSERT INTO `services`(`service_uniID`, `service_title`, `image`, `service_desc`, `date_upload`) VALUES ('$uniID', '$service_title','$new_image_name','$service_desc','$date')";

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