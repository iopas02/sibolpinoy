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
                    <h5>Sub-Category Services</h5>
            </div>

            <div class="row col-md-12 mb-2">
                <div class="col-md-3">
                    <div class="input-group col-md-12 m-2">
                        <form action="" method="GET">
                            <label for="service_uniID" class="form-label service_uniID">Category UniID</label>
                            <div class="input-group">
                                <select class="form-select" name="cat-uniID" value="<?php if(isset($_GET['cat-uniID'])){echo $_GET['search']; } ?>" >
                                    <option selected>Find Category uniID</option>
                                    <?php
                                        $cat_uniDI_query = "SELECT * FROM `services_category` ";
                                        $cat_uniID_query_run = mysqli_query($conn, $cat_uniDI_query);
                                        
                                        foreach($cat_uniID_query_run as $cat_service_uniID) {
                                            ?>      
                                                <option><?=$cat_service_uniID['category_uniID'] ?></option>
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
                            $serv_uniID = $cat_uniID = $Service_title = $cat_title ='';
                            if(isset($_GET['cat-uniID'])){
                                $cat_uniID = $_GET['cat-uniID'];

                                $get_cat_query = "SELECT tb1.category_uniID, tb2.service_uniID, tb2.service_title, tb1.category_title, tb1.status, tb1.date_upload, tb1.date_update FROM services_category tb1 INNER JOIN services tb2 ON tb1.service_uniID = tb2.service_uniID WHERE category_uniID = '$cat_uniID' ";
                                $get_cat_query_run = mysqli_query($conn, $get_cat_query);
                                                
                                while($row = mysqli_fetch_assoc($get_cat_query_run)){
                                    $cat_uniID =$row['category_uniID'];
                                    $serv_uniID = $row['service_uniID'];
                                    $Service_title = $row['service_title'];
                                    $cat_title = $row['category_title'];
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
                        <input class="form-control" type="text" readonly id="category_uniID" name="category_uniID" value="<?= $cat_uniID ?> ">
                    </div>
                    <div class="col-md-8">
                        <label for="category_title" class="form-label service_uniID">Category Title</label>
                        <input class="form-control" type="text" readonly id="category_title" name="category_title" value="<?= $cat_title ?>" >
                    </div>
                </div>

                <div class="row col-md-12 mb-2">
                    <div class="col-md-4">
                        <label for="sub_cat_uniID" class="form-label service_uniID">Sub-Category UniID</label>
                        <input class="form-control" type="text" readonly id="sub_cat_uniID" name="sub_cat_uniID">
                    </div>
                    <div class="col-md-8">
                        <label for="sub_cat_title" class="form-label service_uniID">Sub-Category Title</label>
                        <input class="form-control" type="text" id="sub_cat_title" name="sub_cat_title">
                        <input class="form-control" hidden type="text" id="status" name="status" value="Active">
                    </div>
                </div>


                <div class="row col-md-12">
                    <div class="col-md-6">
                        <button type="submit" name="create_sub_cat" class="btn bg-coloured text-white my-2" >
                        <i class="bi bi-folder-plus"></i> Create Sub-Category
                        </button>
                    </div>
                    <div class="col-md-6 d-grid gap-2 d-md-flex justify-content-md-end">
                        <button  type="submit" name="edit_sub_cat" class="btn bg-coloured text-white my-2" "><i class="bi bi-vector-pen"></i> Update</button>
                        <button  type="submit" name="delete_category" class="btn bg-coloured text-white my-2" ><i class="bi bi-trash"></i> Delete</button>
                    </div>
                </div>

            </form>
            
        </div>
    <!-- THIS IS CREATE NEW SERVICES FORM END HERE -->

    <!-- THIS IS SERVICES TABLE START HERE -->
        <div class="row col-md-12 mt-3">
            <div class="row col-md-12 px-5">
                <h5>Sub-Category Services Table</h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatableid" class="table data-table" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Sub_Cat_ID</th>
                                <th hidden>service_ID</th>
                                <th hidden>cataegory_ID</th>
                                <th>Service Title</th>
                                <th>Category title</th>
                                <th>Sub-Category title</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Update</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sub_cat_reload = "SELECT tb1.sub_cat_uniID, tb1.service_uniID, tb1.category_uniID, tb2.service_title, tb3.category_title, tb1.sub_cat_title, tb1.status, tb1.date_upload, tb1.date_update FROM ((services_sub_category tb1 INNER JOIN services tb2 ON tb1.service_uniID = tb2.service_uniID) INNER JOIN services_category tb3 ON tb1.category_uniID = tb3.category_uniID)" ;

                            $sub_cat_reload_result = mysqli_query($conn, $sub_cat_reload);
                            if(mysqli_num_rows($sub_cat_reload_result) > 0 ){
                                foreach($sub_cat_reload_result as $sub_cat){
                                    ?>
                                    <tr >  
                                        <td><?= $sub_cat['sub_cat_uniID']?></td>
                                        <td hidden><?= $sub_cat['service_uniID']?></td>
                                        <td hidden><?= $sub_cat['category_uniID']?></td>
                                        <td><?= $sub_cat['service_title']?></td>
                                        <td><?= $sub_cat['category_title']?></td>
                                        <td><?= $sub_cat['sub_cat_title']?></td>
                                            <?= $status = $sub_cat['status'];
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
                                        <td><?= date('M d Y',  strtotime($sub_cat['date_upload'])) ?></td>
                                        <td><?= date('M d Y',  strtotime($sub_cat['date_update'])) ?></td>
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
                                <th>Sub_Cat_ID</th>
                                <th hidden>service_ID</th>
                                <th hidden>cataegory_ID</th>
                                <th>Service Title</th>
                                <th>Category title</th>
                                <th>Sub-Category title</th>
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
                                    <label for="subcat_uniID" class="col-form-label">Sub-Category uniID</label>
                                    <input type="text" class="form-control" readonly name="subcat_uniID" id="subcat_uniID">
                                </div>
                                <div class="col-md-6">
                                    <label for="subcat_title" class="col-form-label">Sub-Category Title</label>
                                    <input type="text" class="form-control" readonly name="subcat_title" id="subcat_title">
                                </div>
                                <div class="col-md-3">
                                    <label for="stats" class="col-form-label">Status</label>
                                    <select class="form-select" name="stats">
                                        <option selected value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                                <div class="my-3 d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn bg-coloured text-white" type="submit" name="sub_cat_update_stats" ><i class="bi bi-vector-pen"></i> Update Status</button>
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

                $('#sub_cat_uniID').val(data[0]);
                $('#service_uniID').val(data[1]);
                $('#category_uniID').val(data[2]);
                $('#service_title').val(data[3]);
                $('#category_title').val(data[4]);
                $('#sub_cat_title').val(data[5]);
           
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
                $('#subcat_uniID').val(data[0]);
                $('#subcat_title').val(data[5]);
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