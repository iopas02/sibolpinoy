
<?php
session_start();
require_once('admin.dblink.php');

if(isset($_POST['admin-login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
   
    $admin_log = "SELECT * FROM `login` WHERE username = ? ";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $admin_log)) {
        header("Location: ../index.php?error=sqlerror");
        exit();
    }else {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $log_result = mysqli_stmt_get_result($stmt);
        
        if ($row = mysqli_fetch_assoc($log_result)) {

            $passwordCheck = password_verify($password, $row['password']);
            if ($passwordCheck == false) {
                header("Location: ../index.php?error=wrong_password");
                exit();  

            } else if ($passwordCheck == true) {
                $_SESSION['adminID'] = $row['id'];
                $_SESSION['username'] = $row['email'];
                $_SESSION['level'] = $row['level'];
                $_SESSION['status'] = $row['status'];
                header("Location: ../landing.php?success=log_in_success");
                exit(); 
            }
        }else {
            header("Location: ../index.php?error=email_is_invalid");
            exit();
        }
    }
    
}

?>