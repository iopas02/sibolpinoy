<?php
require_once('admin.dblink.php');

if(isset($_POST['new_admin'])){
    $fname = mysqli_real_escape_string($conn, $_POST['first_name']);
    $lname = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $fname = mysqli_real_escape_string($conn, $_POST['first_name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $level = mysqli_real_escape_string($conn, $_POST['level']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    if($password  !== $cpassword) {
        header("Location: ../admin.con.php?error=password_and_confirm_password_not_match");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../admin.con.php?error=invalid_email");
        exit();
    } 
    else{
        $email_query = "SELECT `username` FROM `login` WHERE `username` =? ";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $email_query)) {
            header("Location: ../admin.con.php?error=sql_error");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);
            if($resultcheck > 0) {
                header("Location: ../admin.con.php?error=email_is_already_been_use");
                exit();
            }else{
                $hashpassword = password_hash($password, PASSWORD_DEFAULT);

                $admin_reg_query = "INSERT INTO `login` (`username`, `password`, `level`, `status`) VALUES (?, ?, ?, ?)";
                $stmt2 = $conn->prepare($admin_reg_query);
                mysqli_stmt_bind_param($stmt2, "ssss", $email, $hashpassword, $level, $status);

                if($stmt2->execute()){
                    header("Location: ../admin.con.php?success=registration_success");
                    exit();
                }else {
                    header("Location: ../admin.con.php?error=sql_error");
                    exit(); 
                }
            
            }
        }
    }

}
?>