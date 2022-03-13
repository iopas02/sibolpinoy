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
                            <label for="service_uniID" class="form-label service_uniID">Service UniID</label>
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

            <form action="comptroller/category.control.php" method="POST">
                <div class="row col-md-12 mb-2" >
                    <div class="col-md-4">
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
                        <label for="service_uniID" class="form-label">Service uniID</label>
                        <input type="text" class="form-control" id="service_uniID" readonly name="service_uniID" value="<?= $serv_uniID ?>"> 
                    </div>
                    <div class="col-md-8 ">
                        <label for="service_title" class="form-label">Service Title</label>
                        <input type="text" class="form-control" id="service_title" readonly name="service_title" value="<?= $Service_title ?>">  
                    </div>   
                </div>   
            
                <div class="row col-md-12 mb-2">
                    <div class="col-md-4">
                        <label for="category_uniID" class="form-label service_uniID">Category UniID</label>
                        <input class="form-control" type="text" readonly id="category_uniID" name="category_uniID">
                    </div>
                    <div class="col-md-8">
                        <label for="category_title" class="form-label service_uniID">Category Title</label>
                        <input class="form-control" type="text" id="category_title" name="category_title">
                        <input class="form-control" hidden type="text" id="status" name="status" value="Active">
                    </div>
                </div>


                <div class="row col-md-12">
                    <div class="col-md-6">
                        <button type="submit" name="create_category" class="btn bg-coloured text-white my-2" >
                        <i class="bi bi-folder-plus"></i> Create Services
                        </button>
                    </div>
                    <div class="col-md-6 d-grid gap-2 d-md-flex justify-content-md-end">
                        <button  type="submit" name="edit_category" class="btn bg-coloured text-white my-2" "><i class="bi bi-vector-pen"></i> Update</button>
                        <button  type="submit" name="delete_category" class="btn bg-coloured text-white my-2" ><i class="bi bi-trash"></i> Delete</button>
                    </div>
                </div>

            </form>
            
        </div>
    <!-- THIS IS CREATE NEW SERVICES FORM END HERE -->

    <!-- THIS IS SERVICES TABLE START HERE -->
        <div class="row col-md-12 mt-3">
            <div class="row col-md-12 px-5">
                <h5>Category Services Table</h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatableid" class="table data-table" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Cat_ID</th>
                                <th hidden>Serv_ID</th>
                                <th>Service Title</th>
                                <th>Category_title</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Update</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $category_reload = "SELECT tb1.category_uniID, tb2.service_uniID, tb2.service_title, tb1.category_title, tb1.status, tb1.date_upload, tb1.date_update FROM services_category tb1 INNER JOIN services tb2 ON tb1.service_uniID = tb2.service_uniID";
                            $category_reload_result = mysqli_query($conn, $category_reload);
                            if(mysqli_num_rows($category_reload_result) > 0 ){
                                foreach($category_reload_result as $category){
                                    ?>
                                    <tr >  
                                        <td><?= $category['category_uniID']?></td>
                                        <td hidden><?= $category['service_uniID']?></td>
                                        <td><?= $category['service_title']?></td>
                                        <td><?= $category['category_title']?></td>
                                            <?= $status = $category['status'];
                                                if($status == 'Active'){
                                                    $stats = "stats-orange";
                                                    $font = "A"; 
                                                }else{
                                                    $stats = "stats-blue";
                                                    $font = "I";
                                                }
                                            ?>
                                        <td>
                                            <button type="button" class="<?= $stats ?> tooltip-test status" title="Status" id="status">
                                            <?= $font ?>
                                            </button>
                                            
                                        </td>
                                        <td><?= date('M d Y',  strtotime($category['date_upload'])) ?></td>
                                        <td><?= date('M d Y',  strtotime($category['date_update'])) ?></td>
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
                                <th>Cat_ID</th>
                                <th hidden>Serv_ID</th>
                                <th>Service Title</th>
                                <th>Category_title</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Update</th>
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
                        <form action="comptroller/category.control.php" method="POST">
                            <div class="row col-md-12">
                                <div class="col-md-3">
                                    <label for="cat_uniID" class="col-form-label">Category uniID</label>
                                    <input type="text" class="form-control" readonly name="cat_uniID" id="cat_uniID">
                                </div>
                                <div class="col-md-6">
                                    <label for="cat_title" class="col-form-label">Category Title</label>
                                    <input type="text" class="form-control" readonly name="cat_title" id="cat_title">
                                </div>
                                <div class="col-md-3">
                                    <label for="stats" class="col-form-label">Status</label>
                                    <select class="form-select" name="stats">
                                        <option selected value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                                <div class="my-3 d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn bg-coloured text-white" type="submit" name="cat_update_stats" ><i class="bi bi-vector-pen"></i> Update Status</button>
                                </div>
                            </div>    
                        </form>     
                    </div>
                </div>                
            </div>
        </div>

        <!-- <div class="modal fade" id="editImage" data-bs-backdrop="static">
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
        </div> -->
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

                $('#category_uniID').val(data[0]);
                $('#service_uniID').val(data[1]);
                $('#service_title').val(data[2]);
                $('#category_title').val(data[3]);
           
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
                $('#cat_uniID').val(data[0]);
                $('#cat_title').val(data[3]);
            })
        })

        // $(document).ready(function(){
        //     $('.imgs').on('click', function(){
        //         $('#editImage').modal('show');

        //         $tr = $(this).closest('tr');

        //         var data= $tr.children("td").map(function(){
        //             return $(this).text();
        //         }).get();

        //         console.log(data);
        //         $('#sunid').val(data[0]);
        //         $('#stitle').val(data[1]);
        //     })
        // })
        
      
    </script>
    <!-- Footer and JS Script End Here -->
  </body>
</html>