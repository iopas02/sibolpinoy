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

    <!-- THIS IS FOR SUB NAV-BAR FOR SERVICES TOOLS START HERE -->
    <?php
        require "layout.part/services.subnav.php";
    ?>
    <!-- THIS IS FOR SUB NAV-BAR FOR SERVICES TOOLS END HERE -->


    <!-- THIS IS CREATE NEW SERVICES FORM START HERE -->
        <div class="row col-md-12 border-bottom border-1 border-dark mb-2">
            <div class="row col-md-12 px-5">
                    <h5>Category Services</h5>
            </div>

            <div class="row col-md-12 mb-2">
                <div class="col-md-3">
                    <div class="input-group col-md-12 m-2">
                        <form action="" method="GET">
                            <label for="service_uniID" class="form-label service_uniID">Category UniID</label>
                            <div class="input-group">
                                <select class="form-select" name="service-uniID" value="<?php if(isset($_GET['service-uniID'])){echo $_GET['search']; } ?>" >
                                    <option selected>Find Service uniID</option>
                                    <?php
                                        $uniDI_query = "SELECT * FROM `services` ";
                                        $uniID_query_run = mysqli_query($conn, $uniDI_query);
                                        
                                        foreach($uniID_query_run as $service_uniID) {
                                            ?>      
                                                <option><?=$service_uniID['service_uniID'] ?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                                <button class="btn bg-coloured text-white edit" type="submit"><i class="bi bi-binoculars"></i></button>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div> 

            <form action="">
                <div class="row col-md-12 mb-2" >
                    <div class="col-md-6">
                        <?php
                            $serv_uniID ='';
                            $Service_title = '';
                            if(isset($_GET['service-uniID'])){
                                $service_uniID = $_GET['service-uniID'];

                                $get_service_query = "SELECT * FROM `services` WHERE `service_uniID`='$service_uniID' ";
                                $get_service_query_run = mysqli_query($conn, $get_service_query);
                                                
                                while($row = mysqli_fetch_assoc($get_service_query_run)){
                                    $serv_uniID = $row['service_uniID'];
                                    $Service_title = $row['service_title'];
                                }
                            }
                        ?>
                        <label for="status" class="form-label">Service uniID</label>
                        <input type="text" class="form-control" id="service_title" readonly name="service_title" value="<?= $serv_uniID ?>"> 
                    </div>
                    <div class="col-md-6 ">
                        <label for="status" class="form-label">Service Title</label>
                        <input type="text" class="form-control" id="service_title" readonly name="service_title" value="<?= $Service_title ?>">  
                    </div>   
                </div>   
            
                <div class="row col-md-12 mb-2">
                    <div class="col-md-4">
                        <label for="service_uniID" class="form-label service_uniID">Category UniID</label>
                        <input class="form-control" type="text" readonly id="service_uniID" name="service_uniID">
                    </div>
                    <div class="col-md-8">
                        <label for="service_uniID" class="form-label service_uniID">Category Title</label>
                        <input class="form-control" type="text" id="service_uniID" name="service_uniID">
                    </div>
                </div>


                <div class="row col-md-12">
                    <div class="col-md-6">
                        <button type="submit" name="create_services" class="btn bg-coloured text-white my-2" >
                        <i class="bi bi-folder-plus"></i> Create Services
                        </button>
                    </div>
                    <div class="col-md-6 d-grid gap-2 d-md-flex justify-content-md-end">
                        <button  type="submit" name="edit_services" class="btn bg-coloured text-white my-2" "><i class="bi bi-vector-pen"></i> Update</button>
                        <button  type="submit" name="delete_services" class="btn bg-coloured text-white my-2" ><i class="bi bi-trash"></i> Delete</button>
                    </div>
                </div>

            </form>
            
        </div>
    <!-- THIS IS CREATE NEW SERVICES FORM END HERE -->

    <!-- THIS IS SERVICES TABLE START HERE -->
        <div class="row col-md-12 mt-3">
            <div class="row col-md-12 px-5">
                <h5>Services Table</h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatableid" class="table data-table" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Updated</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $Service_reload = "SELECT * FROM `services` ";
                            $Service_reload_result = mysqli_query($conn, $Service_reload);
                            if(mysqli_num_rows($Service_reload_result) > 0 ){
                                foreach($Service_reload_result as $services){
                                    ?>
                                    <tr >  
                                        <td><?= $services['service_uniID']?></td>
                                        <td><?= $services['service_title']?></td>
                                        <td>
                                            <button type="button" class="btn tooltip-test imgs" title="UPDATE IMAGE" id="imgs">
                                                <img src="./upload/<?= $services['image']?>" class="h-100 w-100">
                                            </button>
                                            <input hidden value="<?= $services['image']?>">
                                        </td>
                                        <td><?= $services['service_desc']?></td>
                                        <td><?= $status = $services['status'];
                                                if($status == 'Active'){
                                                    $stats = "stats-orange";
                                                    $font = "A"; 
                                                }else{
                                                    $stats = "stats-blue";
                                                    $font = "I";
                                                }
                                            ?>
                                            <button type="button" class="<?= $stats ?> tooltip-test status" title="Status" id="status">
                                            <?= $font ?>
                                            </button>
                                            
                                        </td>
                                        <td><?= date('M d Y',  strtotime($services['date_upload'])) ?></td>
                                        <td><?= date('M d Y',  strtotime($services['date_update'])) ?></td>
                                        <td>
                                            <button type="button" class="stats-white tooltip-test read" title="READ" id="read">
                                                <i class="bi bi-arrow-repeat"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }

                            ?>

                            <!-- <tr>
                                <td>Mrs. Maria Fully Grace</td>
                                <td>Strategic Planning and Risk-Based Management</td>
                                <td>12:00 pm</td>
                                <td>
                                    <button type="button" class="btn tooltip-test" title="Read" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">
                                        <i class="bi bi-bookmark"></i>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr> -->

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Updated</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    <!-- THIS IS SERVICES TABLE END HERE -->

    <!-- THIS IS FOR EDIT MODAL START HERE -->                        
        <div class="modal fade" id="editStatus" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Service Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>   
                    <div class="modal-body">
                        <form action="comptroller/service.control.php" method="POST">
                            <div class="row col-md-12">
                                <div class="col-md-3">
                                    <label for="uniID" class="col-form-label">uniID</label>
                                    <input type="text" class="form-control" readonly name="uniID" id="uniID">
                                </div>
                                <div class="col-md-6">
                                    <label for="title" class="col-form-label">Title</label>
                                    <input type="text" class="form-control" readonly name="title" id="title">
                                </div>
                                <div class="col-md-3">
                                    <label for="stats" class="col-form-label">Status</label>
                                    <select class="form-select" name="stats">
                                        <option selected value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                                <div class="my-3 d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn bg-coloured text-white" type="submit" name="update_stats" ><i class="bi bi-vector-pen"></i> Update Status</button>
                                </div>
                            </div>    
                        </form>     
                    </div>
                </div>                
            </div>
        </div>

        <div class="modal fade" id="editImage" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>   
                    <div class="modal-body">
                        <form action="comptroller/service.control.php" method="POST" enctype="multipart/form-data">
                            <div class="row col-sm-12 px-2">
                                <label for="sunid" class="col-form-label">uniID</label>
                                <input type="text" class="form-control" readonly name="sunid" id="sunid">
                            </div>
                            <div class="row col-sm-12 px-2">
                                <label for="stitle" class="col-form-label">Title</label>
                                <input type="text" class="form-control" readonly name="stitle" id="stitle">
                            </div>
                            <div class="row col-sm-12 px-2">
                                <label for="uimg" class="col-form-label">Update Image</label>
                                <input type="file" class="form-control" name="uimg" id="uimg">
                            </div>
                            <div class="my-3 d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn bg-coloured text-white" type="submit" name="update_image" ><i class="bi bi-vector-pen"></i> Update Image</button>
                            </div>
                        </form>     
                    </div>
                </div>                
            </div>
        </div>
    <!-- THIS IS FOR EDIT MODAL END HERE -->                         
    
    </main>

    <!-- Footer and JS Script Start Here -->
    <?php
      require "layout.part/admin.footer.php";
    ?>
    <script>
        $(document).ready(function(){
            $('.read').on('click', function(){
                
                $tr = $(this).closest('tr');

                var data= $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);

                $('#service_uniID').val(data[0]);
                $('#service_title').val(data[1]);
                // $('#image').val(data[2]);
                $('#service_desc').val(data[3]);
           
            })

        })

        $(document).ready(function(){
            $('.status').on('click', function(){
                $('#editStatus').modal('show');

                $tr = $(this).closest('tr');

                var data= $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);
                $('#uniID').val(data[0]);
                $('#title').val(data[1]);
            })
        })

        $(document).ready(function(){
            $('.imgs').on('click', function(){
                $('#editImage').modal('show');

                $tr = $(this).closest('tr');

                var data= $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);
                $('#sunid').val(data[0]);
                $('#stitle').val(data[1]);
            })
        })
        
      
    </script>
    <!-- Footer and JS Script End Here -->
  </body>
</html>