<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link href="img/logo.png" rel="icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SS Payment Portal</title>
    <style>
        .logo{
            width: 75px;
            height: 75px;
        }
    </style>
    </head>
    <body>
        <div class="row col-md-12 pt-5">
            <div class="container">
               <div class="col-md-12 d-grid align-items-center justify-content-center">
                    <div class="row col-md-12">
                        <div class="pt-3 text-center">
                            <img class="logo" src="img/logo.png" alt="">
                        </div>
                        <div class="text-center">
                            <h5 class="modal-title" id="registrationTitle">Events SS Payment Form</h5>
                        </div>
                    </div>
                    <div class="card border-0 pt-5" style="width: 25rem;">
                        <form action="controllers/payment.control.php" method="POST" enctype="multipart/form-data">
                            <div class="form-outline mb-2">
                                <label class="form-label" for="form1Example1">Email Address</label>
                                <input type="email" class="form-control" name="email" placeholder="Email Address"/>
                            </div>

                            <div class="form-outline mb-2">
                                <label class="form-label" for="form1Example2">Reservation ID</label>
                                <input type="text" class="form-control" name="rev_id"  placeholder="Reservation ID"/>   
                            </div>

                            <div class="form-outline mb-2">
                                <label class="form-label" for="form1Example2">Upload yoou SS Payments here</label>
                                <input type="file" class="form-control" name="sspayment" />
                                <small>("jpg", "jpeg", "png", are allowed files)</small>   
                            </div>

                            <!-- 2 column grid layout for inline styling -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <small>SPMC <a href=#>TERMS</a> and <a href="#poirty">PRIVACY POLICY</a></small>
                                    <div class="form-check">
                                        <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" aria-describedby="invalidCheck3Feedback" required>
                                        <label class="form-check-label" for="invalidCheck3">
                                            Agree to terms and conditions
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block" name="uplaod">Upload Files</button>
                        </form>
                    </div>  
               </div>
            </div>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>