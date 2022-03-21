<!doctype html>
<html lang="en">
  
  <!-- Header Start -->
  <?php
      require "layout.part/admin.header.php";
  ?>
  <!-- Header End -->

  <body>
    <title>Sibol-PINOY Create Celebration</title>

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

    <main class="mt-5 pt-2">

        <!-- THIS IS FOR SUB NAV-BAR FOR EVENT START HERE -->
        <?php
            require "layout.part/events.subnav.php";
        ?>
        <!-- THIS IS FOR SUB NAV-BAR FOR EVENT END HERE -->

        <!-- THIS IS HEADER PAGE START HERE -->
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-12 mb-4">
                <h5 class="page-header">Create New Celebration</h5>
            </div>
        </div>
        <!-- THIS IS HEADER PAGE END HERE -->
        
        <!-- THIS IS CREATE NEW EVENTS FORM START HERE -->
        <div class="p-2">
            <form action="comptroller/celebration.control.php" enctype="multipart/form-data" method="post">
                <div class="">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-4" style="min-height: 400px;">
                                <label for="#eventID">Celebration ID</label>
                                <input type="text" id="keepingID" name="eventID" class="form-control w-50" readonly>                           
                                <div class="position-relative" >
                                    <div class="pb-2" >
                                        <label>Upload Image Here</label>
                                        <img class="img-fluid w-100" style="height: 250px" src="svg/default_new_image.jpg">  
                                    </div>
                                </div>
                                <input type="file" name="celeb_image">
                                       
                            </div>
                            <div class="col-lg-8">
                                
                                <div class="bg-white text-dark mb-2">
                                    <label>Header</label>
                                    <input class="w-100 h-100 p-1" type="text" id="header" name="header" placeholder="e.g `We Celebrate on this Month` ">    
                                </div>
                                
                                <div class="bg-white text-dark mb-2">
                                    <label>Celebration Title:</label>
                                    <input class="w-100 h-100 p-1" type="text" id="commemoration" name="celeb_title" placeholder="e.g `Happy Mother's Day` ">  
                                </div>
                                   
                                <div class="mb-2">
                                    <label>Message 1</label>
                                    <input class="w-100 p-1" type="text" id="message1" name="message1" placeholder="e.g `A simple Message and Celebration From Sibol-Pinoy` ">
                                </div>

                                <div class="mb-2">
                                    <label>Message 2</label>
                                    <input class="w-100 p-1" type="text" id="message2" name="message2" placeholder="e.g `` ">
                                </div>

                                <div class="mb-2"> 
                                    <label>Status</label>
                                        <select class="w-40 p-2" name="status" id="">
                                                <option value="">Select Status</option>
                                                <option value="sample">sample</option>
                                                <option value="published">published</option>
                                                <option value="unpublished">unpublished</option>
                                        </select> 
                                </div>
           
                                <input type="text" hidden name="loginid" value="<?= $id?>">
                                <input type="text" hidden name="admin" value="<?= $rusername?>">
                                <input type="text" hidden name="action" value="created new celebration post">
                                <input type="text" hidden name="action1" value="update celebration">   
                                <input type="text" hidden name="action2" value="delete celebation"> 
                                
                                <div class="row col-md-12">
                                    <div class="col-md-6">
                                        <button type="submit" name="create_celeb" class="btn bg-coloured text-white my-2" >
                                        <i class="bi bi-folder-plus"></i> Create Celebration Post
                                        </button>
                                    </div>
                                    <div class="col-md-6 d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button  type="submit" name="edit_celeb" class="btn bg-coloured text-white my-2" "><i class="bi bi-vector-pen"></i> Update</button>
                                        <button  type="submit" name="delete_services" class="btn bg-coloured text-white my-2" ><i class="bi bi-trash"></i> Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- THIS IS CREATE NEW EVENTS FORM END HERE -->

        <!-- THIS IS EVENTS TABLE START HERE -->
        <div class="row col-md-12 my-3">
            <hr class="dropdown-divider bg-dark" />
            <div class="row col-md-12 px-5">
                <h5>Events Table</h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatableid" class="table data-table" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Header</th>
                                <th>Image</th>
                                <th>msg One</th>
                                <th>msg Two</th>
                                <th>Status</th>
                                <th hidden>admin id</th>
                                <th hidden>Created By</th>
                                <th hidden>Action</th>
                                <th>Date Created</th>
                                <th>Date Update</th>   
                                <th>Log</th>
                                <th>Read</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $celeb_reload_query = "SELECT tb1.keepingID, tb1.commemoration, tb1.header, tb1.image, tb1.message1, tb1.message2, tb1.status, tb1.loginId, tb2.username, tb1.action, tb1.uploaded, tb1.updated FROM celebration tb1 INNER JOIN login tb2 ON tb1.loginId = tb2.loginId";

                            $celeb_reload_query_result = mysqli_query($conn, $celeb_reload_query);
                            if(mysqli_num_rows($celeb_reload_query_result) > 0 ){
                                foreach($celeb_reload_query_result as $celebration){
                                    ?>
                                    <tr >  
                                        <td><?= $celebration['keepingID']?></td>
                                        <td><?= $celebration['commemoration']?></td>
                                        <td><?= $celebration['header']?></td>
                                        <td>
                                            <button type="button" class="btn tooltip-test imgs" title="UPDATE IMAGE" id="imgs">
                                                <img src="./upload/<?= $celebration['image']?>" class="h-100 w-100">
                                            </button>
                                        </td>
                                        <td><?= $celebration['message1']?></td>
                                        <td><?= $celebration['message2']?></td>
                                        <?php
                                                if($celebration['status'] == 'published'){
                                                    $stats = "stats-orange";
                                                    $font = "P"; 
                                                }else if($celebration['status'] == 'unpublished'){
                                                    $stats = "stats-blue";
                                                    $font = "UP";
                                                }else{
                                                    $stats = "stats-white";
                                                    $font = "S";
                                                }
                                            ?>
                                        <td>
                                            <button type="button" class="<?= $stats ?> tooltip-test status" title="Update Status" id="status">
                                            <?= $font ?>
                                            </button>
                                        </td>
                                        <td hidden><?= $celebration['loginId']?></td>
                                        <td hidden><?= $celebration['username']?></td>
                                        <td hidden><?= $celebration['action']?></td>      
                                        <td><?= date('M d Y',  strtotime($celebration['uploaded'])) ?></td>
                                        
                                        <td><?= date('M d Y',  strtotime($celebration['updated'])) ?></td>
                                        <td>
                                            <button type="button" class="border-0 bg-white p-2" data-bs-toggle="popover" title="Last Admin Log" data-bs-content="<?= $celebration['action']?> by <?= $celebration['username']?>"><i class="bi bi-exclamation-circle"></i></button>
                                        </td>
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
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Header</th>
                                <th>Image</th>
                                <th>msg One</th>
                                <th>msg Two</th>
                                <th>Status</th>
                                <th hidden>admin id</th>
                                <th hidden>Created By</th>
                                <th hidden>Action</th>
                                <th>Date Created</th>
                                <th>Date Update</th>   
                                <th>Log</th>
                                <th>Read</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <!-- THIS IS EVENTS TABLE END HERE -->

        <!-- THIS IS FOR EDIT MODAL START HERE -->                        
        <div class="modal fade" id="editStatus" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Event Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>   
                    <div class="modal-body">
                        <form action="comptroller/event.control.php" method="POST">
                            <div class="row col-md-12">
                                <div class="col-md-3">
                                    <label for="eventid" class="col-form-label">Event ID</label>
                                    <input type="text" class="form-control" readonly name="eventid" id="eventid">
                                </div>
                                <div class="col-md-6">
                                    <label for="eventtitle" class="col-form-label">Event Title</label>
                                    <input type="text" class="form-control" readonly name="eventtitle" id="eventtitle">
                                </div>
                                <div class="col-md-3">
                                    <label for="stats" class="col-form-label">Status</label>
                                    <select class="form-select" name="stats">
                                            <option value="">Select Status</option>
                                            <option value="sample">sample</option>
                                            <option value="published">published</option>
                                            <option value="unpublished">unpublished</option>
                                    </select>
                                </div>

                    <!---- THIS IS HIDDEN PART OF THE CREATE SERVICES START HERE --->
                                <div class="row col-md-12" hidden>
                                    <div class="col-md-2 m-2">
                                        <label for="user_id" class="form-label service_uniID">User ID</label>
                                        <input class="form-control" type="text" readonly id="user_id" name="user_id" value="<?=$id?>">
                                    </div>
                                    <div class="col-md-2 m-2">
                                        <label for="username" class="form-label">User Name</label>
                                        <input type="text" class="form-control" id="username" name="username" value="<?= $rusername ?>">
                                    </div>
                                    <div class="col-md-2 m-2">
                                        <label for="user_level" class="form-label">level</label>
                                        <input type="text" class="form-control" id="user_level" name="user_level" value="<?= $level ?>">
                                    </div>
                                    <div class="col-md-2 m-2">
                                        <label for="status_update" class="form-label">Action 1</label>
                                        <input type="text" class="form-control" id="status_update" name="status_update" value="update event status">
                                    </div>
                                </div>
                    <!---- THIS IS HIDDEN PART OF THE CREATE SERVICES START HERE --->

                                <div class="my-3 d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn bg-coloured text-white" type="submit" name="update_event_stats" ><i class="bi bi-vector-pen"></i> Update Status</button>
                                </div>
                            </div>    
                        </form>     
                    </div>
                </div>                
            </div>
        </div>

        <div class="modal fade" id="editImage" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>   
                    <div class="modal-body">
                        <form action="comptroller/event.control.php" method="POST" enctype="multipart/form-data">
                            <div class="row col-sm-12 px-2">
                                <label for="eid" class="col-form-label">Event uniID</label>
                                <input type="text" class="form-control" readonly name="eid" id="eid">
                            </div>
                            <div class="row col-sm-12 px-2">
                                <label for="etitle" class="col-form-label">Event Title</label>
                                <input type="text" class="form-control" readonly name="etitle" id="etitle">
                            </div>
                            <div class="row col-sm-12 px-2">
                                <label for="uimg" class="col-form-label">Update Image</label>
                                <input type="file" class="form-control" name="event_img" id="event_img">
                            </div>
                            
                    <!---- THIS IS HIDDEN PART OF THE CREATE SERVICES START HERE --->
                            <div class="row col-md-12" hidden>
                                <div class="col-md-2 m-2">
                                    <label for="user_id" class="form-label service_uniID">User ID</label>
                                    <input class="form-control" type="text" readonly id="user_id" name="user_id" value="<?=$id?>">
                                </div>
                                <div class="col-md-2 m-2">
                                    <label for="username" class="form-label">User Name</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?= $rusername ?>">
                                </div>
                                <div class="col-md-2 m-2">
                                    <label for="user_level" class="form-label">level</label>
                                    <input type="text" class="form-control" id="user_level" name="user_level" value="<?= $level ?>">
                                </div>
                                <div class="col-md-2 m-2">
                                    <label for="image_update" class="form-label">Action 1</label>
                                    <input type="text" class="form-control" id="image_update" name="image_update" value="update event image">
                                </div>
                            </div>
                    <!---- THIS IS HIDDEN PART OF THE CREATE SERVICES START HERE --->
                            <div class="my-3 d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn bg-coloured text-white" type="submit" name="update_event_img" ><i class="bi bi-vector-pen"></i> Update Image</button>
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

                $('#keepingID').val(data[0]);
                $('#commemoration').val(data[1]);
                $('#header').val(data[2]);
                $('#message1').val(data[4]);
                $('#message2').val(data[5]);
              
           
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
                $('#eventid').val(data[0]);
                $('#eventtitle').val(data[3]);
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
                $('#eid').val(data[0]);
                $('#etitle').val(data[3]);
            })
        })

        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
            var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>
    <!-- Footer and JS Script End Here -->
  </body>
</html>