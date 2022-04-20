<!doctype html>
<html lang="en">
  
  <!-- Header Start -->
  <?php
      require "layout.part/admin.header.php";
  ?>
  <!-- Header End -->

  <body>
    <title>Sibol-PINOY Consultation Info</title>

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
    <?php
          $c_id = '';
          $fname = '';
          $mi = '';
          $lname = '';
          $e_add = '';
          $contact = '';
          $org = '';
          $position = '';
          $reg = '';
        if(isset($_POST['readclient'])){
            $email_add = mysqli_real_escape_string($conn, $_POST['client_email']);
            $client_uniID = mysqli_real_escape_string($conn, $_POST['client_id']);
            
            $client_query = "SELECT * FROM `client` WHERE `client_uniID`='$client_uniID' AND `email_add`='$email_add' ";
            $client_query_result = $conn->query($client_query);
            if($client_query_result->num_rows > 0){
                while($info = $client_query_result -> fetch_assoc()){
                    $c_id = $info['client_uniID'];
                    $fname = $info['firstName'];
                    $mi = $info['mi'];
                    $lname = $info['lastName'];
                    $e_add = $info['email_add'];
                    $contact = $info['contact'];
                    $org = $info['organization'];
                    $position = $info['position'];
                    $reg = $info['date_register'];
                }
            }
            
        
        }else{
            header("Location: client.record");
            exit();
        }    
        
    ?>
  

    <main class="my-5">
        <div class="container-fluid p-4">
            <div class="row">
            <div class="col-md-10 my-2">
                <h4 class="page-header">Client Information</h4>
            </div>
            <div class="col-md-2 my-2">
                <a href="clients.record" style="text-decoration: none; color:black; ">Back to Client Record</a>
            </div> 
        </div>
        <hr class="dropdown-divider bg-dark" />
        <div class="col-md-12">
            <div class="row">
                <form action="" method="POST" >
                    <div>Client Information</div>
                    <div class="col-md-12 d-flex">
                        <div class="col-md-3">
                            <label class="col-form-label">Client_uniID:</label>
                            <input class="col-md-12" type="text" name="client_uniID" value="<?= $c_id ?>"readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="col-form-label">First Name:</label>
                            <input class="col-md-12" type="text" name="fname" value="<?= $fname ?>"readonly>
                        </div>
                        <div class="col-md-1">
                            <label class="col-form-label">MI:</label>
                            <input class="col-md-12" type="text" name="mi" value="<?= $mi ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="col-form-label">Last Name:</label>
                            <input class="col-md-12" type="text" name="lname" value="<?= $lname ?>"readonly>
                        </div> 
                    </div>
                    <div class="col-md-12 d-flex">
                        <div class="col-md-6">
                            <label class="col-form-label">Email Address:</label>
                            <input class="col-md-12" type="text" name="email" value="<?= $e_add ?>"readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label">Contact Number:</label>
                            <input class="col-md-12" type="text" name="contact" value="<?= $contact ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-12 d-flex">
                        <div class="col-md-4">
                            <label class="col-form-label">Organization:</label>
                            <input class="col-md-12" type="text" name="orgs" value="<?= $org ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="col-form-label">Position:</label>
                            <input class="col-md-12" type="text" name="position" value="<?= $position ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="col-form-label">Date Registered:</label>
                            <input class="col-md-12" type="text" name="position" value="<?= date('F d Y g:i a',strtotime($reg)) ?>" readonly>
                        </div>
                    </div>
                    <hr class="dropdown-divider bg-dark col-md-11 px-5 my-2" />

                    <div>Client Email List</div>
                    <div class="col-md-12">
                        <table  class="table data-table" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Email ID</th>
                                    <th>Subject</th>
                                    <th>Status</th>
                                    <th>Date Emailed</th>   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $client_email_query = "SELECT *  FROM `email` WHERE `client_uniID`='$c_id'";
                                    $client_email_query_result = mysqli_query($conn, $client_email_query);
                                    if(mysqli_num_rows($client_email_query_result) > 0 ){
                                        foreach($client_email_query_result as $client_email){
                                            ?>
                                                <tr>
                                                    <td><?= $client_email['emailID'] ?></td>
                                                    <td><?= $client_email['subject'] ?></td>
                                                    <td><?= $client_email['status'] ?></td>
                                                    <td><?= date('F d Y g:i a', strtotime($client_email['date_mailed'])) ?></td>
                                                </tr>
                                            <?php
                                        }
                                    }else{
                                        echo '
                                        <tr>
                                            <td class="text-center" colspan="4"><h6>This Client is no Email Query</h6></td>
                                        </tr>
                                        ';
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                    <hr class="dropdown-divider bg-dark col-md-11 px-5 my-2" />

                    <div>Client Event Reservation List</div>
                    <div class="row col-md-12">
                    <table  class="table data-table" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>EntryID</th>
                                    <th>ReservatiodID</th>
                                    <th>Event</th>
                                    <th>Status</th>
                                    <th>Date Registered</th>   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $client_er_query = "SELECT tb1.entryID, tb1.email_add, tb1.reservationID, tb2.eventID, tb2.event_title, tb1.status, tb1.date_registered FROM event_reservation tb1 INNER JOIN events tb2 ON tb1.eventID = tb2.eventID WHERE tb1.email_add='$e_add' ORDER BY tb1.entryID DESC";

                                    $client_er_query_result = mysqli_query($conn, $client_er_query);
                                    if(mysqli_num_rows($client_er_query_result) > 0 ){
                                        foreach($client_er_query_result as $client_er){
                                            ?>
                                                <tr>
                                                    <td><?= $client_er['entryID'] ?></td>
                                                    <td><?= $client_er['reservationID'] ?></td>
                                                    <td><?= $client_er['event_title'] ?></td>
                                                    <td><?= $client_er['status'] ?></td>
                                                    <td><?= date('F d Y g:i a', strtotime($client_er['date_registered'])) ?></td>
                                                </tr>
                                            <?php
                                        }
                                    }else{
                                        echo '
                                        <tr>
                                            <td class="text-center" colspan="5"><h6>This Client is no Event Reservation Query</h6></td>
                                        </tr>
                                        ';
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                    <hr class="dropdown-divider bg-dark col-md-11 px-5 my-2" />

                    <div>Client Consultation Request List</div>
                    <div class="row col-md-12">
                    <table  class="table data-table" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>EntryID</th>
                                    <th>consultationID</th>
                                    <th>Service Title</th>
                                    <th>Sub Category</th>
                                    <th>Set Date</th>
                                    <th>Set time</th>
                                    <th>Status</th>
                                    <th>Date Request</th>   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $client_consul_query = "SELECT tb1.entryID, tb1.email_add, tb1.consultation_id, tb1.service_uniID, tb2.service_title, tb3.sub_cat_uniID, tb4.sub_cat_title, tb1.set_date, tb1.set_time, tb1.status, tb1.registered_date FROM (((consultation tb1 INNER JOIN services tb2 ON tb1.service_uniID = tb2.service_uniID)INNER JOIN consul_list_category tb3 ON tb1.consultation_id = tb3.consultation_id)INNER JOIN services_sub_category tb4 ON tb3.sub_cat_uniID = tb4.sub_cat_uniID) WHERE tb1.email_add='$e_add' ORDER BY tb1.entryID DESC";

                                    $client_consul_query_result = mysqli_query($conn, $client_consul_query);
                                    if(mysqli_num_rows($client_consul_query_result) > 0 ){
                                        foreach($client_consul_query_result as $client_consul){
                                            ?>
                                                <tr>
                                                    <td><?= $client_consul['entryID'] ?></td>
                                                    <td><?= $client_consul['consultation_id'] ?></td>
                                                    <td><?= $client_consul['service_title'] ?></td>
                                                    <td><?= $client_consul['sub_cat_title'] ?></td>
                                                    <td><?= date('F d Y', strtotime($client_consul['set_date'])) ?></td>
                                                    <td><?= date('g:i a', strtotime($client_consul['set_time'])) ?></td>
                                                    <td><?= $client_consul['status'] ?></td>
                                                    <td><?= date('F d Y g:i a', strtotime($client_consul['registered_date'])) ?></td>
                                                </tr>
                                            <?php
                                        }
                                    }else{
                                        echo '
                                        <tr>
                                            <td class="text-center" colspan="8"><h6>This Client is no Consultation Request Query</h6></td>
                                        </tr>
                                        ';
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                    <hr class="dropdown-divider bg-dark col-md-11 px-5 my-2" />

                    <table style="width: 100%">
                        <tbody>
                            <tr>
                                <td hidden><?= $c_id ?></td>
                                <td hidden><?= $e_add ?></td>
                                <td>
                                    <button type="button" class="m-2 rounded py-2 px-4 border-0 float-right text-white bg-coloured delallinfo">Delete All Client Information</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                
            </div>
        </div>

    </main>

    
    <div class="modal fade" id="deleteallinfo" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="comptroller/delete.client.php" method="POST">
                        
                        <input type="text" class="form-control" name="adminID" value="<?= $_SESSION["id"] ?>" hidden/>
                        <input type="text" class="form-control" name="username" value="<?= $_SESSION["username"] ?>" hidden/>
                        <input type="text" class="form-control" name="newaction" value="Delete all info of client" placeholder="Delete all info of client" hidden/>
                        <div class="mb-1">
                            <input class="col-md-12" type="text" name="c_id" id="c_id" hidden>    
                            <input class="col-md-12" type="text" name="e_add" id="e_add" hidden>
                        </div>
                        <h4 class="text-center">Are you sure you want to delete all inforamtion of this Client?!</h4>
                        
                        <button type="submit" class="btn bg-coloured text-white m-1  float-right" name="cancel">Cancel</button>
                        <button type="submit" class="btn bg-blue text-white m-1  float-right" name="deleteallinfo">Delete All Info</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer and JS Script Start Here -->
    <?php
      require "layout.part/admin.footer.php";
    ?>
     <script>
    
        $(document).ready(function(){
            $('.delallinfo').on('click', function(){
                $('#deleteallinfo').modal('show');

                $tr = $(this).closest('tr');

                var data= $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);
                $('#c_id').val(data[0]);
                $('#e_add').val(data[1]);
                
            })
        })

     
    </script>
    <!-- Footer and JS Script End Here -->
  </body>
</html>