<?php
$err_message = "";
if(isset($_GET["error"])){
    $error = $_GET["error"];
    if($error == "username_null"){
        $err_message = "Username field empty.";
    }
    else if($error == "password_null"){
        $err_message = "Password field empty.";
    }
    else if($error == "no_account"){
        $err_message = "Wrong username or password.";
    }
    else if($error == "inactive"){
        $err_message = "You are inactive. Please contact your superadmin.";
    }
}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="../img/logo.png" rel="icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Template Stylesheet -->
    <link href="style/admin.style.css" rel="stylesheet">

    <title>Sibol-PINOY Admin Login</title>
  </head>
  <body">

    <!-- Admin LogIn Form Start -->
    <section class="form mx-5" >
        <div class="container container-position">
            <div class="row no-gutters">
                <div class="col-lg-5">
                    <img src="../img/sibol-GIF.gif" class="img-fluid" alt="">
                </div>
                <div class="col-lg-5 form-postion">
                    <div class="">
                        <h4 class="welcome-note text-center">Welcome To Login Form</h4>
                    </div>
                    <form action="login.php" method="POST">
                        <div class="form-row my-3">
                            <div class="col-lg-7">

                                <label for="admin-email" class="login-text">Username</label>
                                <input id="admin-email" name="username" type="text" placeholder="Enter username" class="form-control text-normal input-form">
                            </div>
                        </div>
                        <div class="form-row my-3">
                            <div class="col-lg-7">

                            
                                <label for="admin-password" class="login-text">Password</label>
                                <input id="admin-password" name="password" type="password" placeholder="Enter password" class="form-control text-normal input-form">
                            </div>
                        </div>
                        <div class="dropdown col-md-3">
                            <select class="form-select" aria-label="Default select example" id="level" name="level">
                                <option selected>Select Level</option>
                                <option value="0">Admin</option>
                                <option value="1">Superadmin</option>
                            </select>
                        </div>
                        <Br>
                        <div class="form-row">
                            <div class="col-lg-7 my-2">
                                <button type="submit" name="submit" class="btn-login login-text" >Login</button>
                            </div>
                        </div>
                        <?php if(isset($err_message)){?>
                            <div class="form-group">
                                <h5 class="text-danger"><?= $err_message ?></h5>
                            </div>
                        <?php 
                            unset($_GET["error"]);    
                        }
                        ?>
                    
                        <a href="#" class="text-normal">Forgot Password</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Admin LogIn Form End -->


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  </body>
</html>