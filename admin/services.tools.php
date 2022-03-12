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
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid border-bottom border-3 border-dark mb-2">
                <a class="navbar-brand" href="services.tools.php">Services Tools</a>
                
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="services.php">Services View</a>
                </div>
            </div>
        </nav>
    <!-- THIS IS FOR SUB NAV-BAR FOR SERVICES TOOLS END HERE -->


    <!-- THIS IS CREATE NEW SERVICES FORM START HERE -->
        <div class="row col-md-12 border-bottom border-1 border-dark mb-2">
            <div class="row col-md-12 px-5">
                    <h5>Create Services</h5>
            </div>
            <div class="row col-md-12 mb-2">
                <form action="comptroller/service.control.php" method="POST" enctype="multipart/form-data">
                    <div class="row col-md-12">
                        <div class="col-md-2 m-2">
                            <label for="service_uniID" class="form-label service_uniID">uniID</label>
                            <input class="form-control" type="text" readonly id="service_uniID name="service_uniID">
                        </div>
                        <div class="col-md-3     m-2">
                            <label for="image" class="form-label">Insert Image</label>
                            <input class="form-control" type="file" id="image" name="image">
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
                                        <td><img src="./upload/<?= $services['image']?>" class="h-100 w-100" alt="">  </td>
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
                                            <button type="button" class="tooltip-test <?= $stats ?>" title="Status" id="status">
                                            <?= $font ?>
                                            </button>
                                            
                                        </td>
                                        <td><?= date('M d Y',  strtotime($services['date_upload'])) ?></td>
                                        <td><?= date('M d Y',  strtotime($services['date_update'])) ?></td>
                                        <td>
                                            <button type="button" class="btn tooltip-test read" title="READ" id="read">
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


        <div class="modal fade" id="editStatus" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Service Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>   
                        <div class="modal-body">
                            <form action="">
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
                                        <label for="title" class="col-form-label">Status</label>
                                        <select class="form-select" name="status">
                                            <option selected value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="my-3 d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button class="btn bg-coloured text-white" type="submit"><i class="bi bi-vector-pen"></i> Update Status</button>
                                    </div>
                                </div>    
                            </form>      
                        </div>

                </div>                
            </div>
        </div>

    
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
            $('#status').on('click', function(){
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
        
      
    </script>
    <!-- Footer and JS Script End Here -->
  </body>
</html>