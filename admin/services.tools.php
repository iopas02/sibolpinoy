<!doctype html>
<html lang="en">
  
  <!-- Header Start -->
  <?php
      require "layout.part/admin.header.php";
  ?>
  <!-- Header End -->

  <body>
    <title>Sibol-PINOY Services Tools</title>

    <!-- top navigation bar -->
    <?php
      require "layout.part/admin.top.navbar.php";
    ?>
    <!-- top navigation bar -->


    <!-- THIS IS FOR SIDE NAV-BAR and OFF CANVA START HERE -->
    <?php
      require "layout.part/admin.side.navbar.php";
    ?>

    <!-- THIS IS FOR SIDE NAV-BAR and OFF CANVA END HERE -->

    <main class="mt-5 pt-3">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid border-bottom border-3 border-dark mb-2">
                <a class="navbar-brand" href="services.tools.php">Services Tools</a>
                
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="services.php">Services View</a>
                </div>
            </div>
        </nav>
        <div class="row col-md-12">
            <div class="row col-md-12 px-5">
                    <h5>Create Services</h5>
            </div>
            <div class="row col-md-12">
                <form action="comptroller/service.control.php" method="POST">
                    <div class="row col-md-12">
                        <div class="col-md-4 m-2">
                            <label for="formFile" class="form-label">Insert Image</label>
                            <input class="form-control" type="file" id="formFile" name="formFile">
                        </div>
                        <div class="col-md-6 m-2">
                            <label for="service_title" class="form-label">Sevice Title</label>
                            <input type="text" class="form-control" id="service_title" name="service_title" placeholder="Sevice Title">
                        </div>
                    </div>
                    <div class="row col-md-12">
                        <div class="col-md-11 m-2">
                            <label for="service_desc" class="col-form-label">Description:</label>
                            <textarea class="form-control" id="service_desc" name="service_desc" rows="5" placeholder="Type services Description"></textarea>
                        </div>
                    </div>
                    <div class="row col-md-12">
                        <button type="submit" name="create_services" class="btn bg-coloured text-white col-md-3 my-2 mx-4" >
                            Create Services
                        </button>
                    </div>
                </form>
            </div> 
        </div>
    
    </main>

    <!-- Footer and JS Script Start Here -->
    <?php
      require "layout.part/admin.footer.php";
    ?>
    <!-- Footer and JS Script End Here -->
  </body>
</html>