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
        if(isset($_POST['read'])){
            $entryID = mysqli_real_escape_string($conn, $_POST['entryID']);

            $change_action_query = "UPDATE `consultation` SET `action`='Read' WHERE `entryID`='$entryID' ";

            if($conn->query($change_action_query) == TRUE ){

                $reload_event_request_query = "SELECT tb3.entryID, tb1.client_uniID, tb1.firstName, tb1.mi, tb1.lastName, tb1.email_add, tb1.contact, tb1.organization, tb1.position, tb2.service_uniID, tb2.service_title, tb3.consultation_id, tb3.memo, tb3.set_date, tb3.set_time, tb3.status, tb3.action, tb3.registered_date FROM (client tb1 INNER JOIN consultation tb3 ON tb1.email_add = tb3.email_add) INNER JOIN services tb2 ON tb2.service_uniID = tb3.service_uniID WHERE entryID=$entryID";

                $reload_event_request_query_result = $conn->query($reload_event_request_query);
                if($reload_event_request_query_result->num_rows > 0){
                    while($row = $reload_event_request_query_result->fetch_assoc()){
                        $eid = $row['entryID'];
                        $client_uniID = $row['client_uniID'];
                        $firstName = $row['firstName'];
                        $mi = $row['mi'];
                        $lastName = $row['lastName'];
                        $contact = $row['contact'];
                        $organization = $row['organization'];
                        $position = $row['position'];
                        $email_add = $row['email_add'];

                        $service_uniID = $row['service_uniID'];
                        $service_title = $row['service_title'];

                        $consultationID = $row['consultation_id']; 
                        $set_date = $row['set_date'];
                        $set_time = $row['set_time'];
                        $status = $row['status'];
                        $memo = $row['memo'];
                        $date_registered = $row['registered_date'];
                    }
                }

            }else{
                exit();
            }
        
        }
    ?>
  

    <main class="my-5">
        <div class="container-fluid p-4">
            <div class="row">
            <div class="col-md-10 my-2">
                <h4 class="page-header">Consultation Information</h4>
            </div>
            <div class="col-md-2 my-2">
                <a href="consultation" style="text-decoration: none; color:black; ">Back to Consultation List</a>
            </div> 
        </div>
        <hr class="dropdown-divider bg-dark" />
        <div class="col-md-12">
            <div class="row">
                <form action="comptroller/consultation.control.php" method="POST" >
                    <div>Client Information</div>
                    <div class="col-md-12 d-flex">
                        <div class="col-md-3">
                            <label class="col-form-label">Client_uniID:</label>
                            <input class="col-md-12" type="text" name="client_uniID" value="<?= $client_uniID ?>"readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="col-form-label">First Name:</label>
                            <input class="col-md-12" type="text" name="fname" value="<?= $firstName ?>"readonly>
                        </div>
                        <div class="col-md-1">
                            <label class="col-form-label">MI:</label>
                            <input class="col-md-12" type="text" name="mi" value="<?= $mi ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="col-form-label">Last Name:</label>
                            <input class="col-md-12" type="text" name="lname" value="<?= $lastName ?>"readonly>
                        </div> 
                    </div>
                    <div class="col-md-12 d-flex">
                        <div class="col-md-6">
                            <label class="col-form-label">Email Address:</label>
                            <input class="col-md-12" type="text" name="email" value="<?= $email_add ?>"readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label">Contact Number:</label>
                            <input class="col-md-12" type="text" name="contact" value="<?= $contact ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-12 d-flex">
                        <div class="col-md-6">
                            <label class="col-form-label">Organization:</label>
                            <input class="col-md-12" type="text" name="orgs" value="<?= $organization ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label">Position:</label>
                            <input class="col-md-12" type="text" name="position" value="<?= $position ?>" readonly>
                        </div>
                    </div>
                    <hr class="dropdown-divider bg-dark col-md-11 px-5 my-2" />

                    <div class="col-md-12 d-flex">
                        <div class="col-md-4">
                            <div>Service Information</div>
                            <div class="col-md-12" hidden>
                                <label class="col-form-label">Service ID:</label>
                                <input class="col-md-12" type="text" name="service_uniID" value="<?= $service_uniID   ?>" readonly>
                            </div>
                            <div class="col-md-12">
                                <label class="col-form-label">Event Title:</label>
                                <input class="col-md-12" type="text" name="service_title" value="<?= $service_title ?>" readonly>
                            </div>
                        </div>

                        <div class="col-md-8 d-grid">
                            <div>Sub Categories Information</div>
                            <div class="col-md-12">
                                <label class="col-form-label">Sub Categories Tittle <small>(Please select Sub Categories Tittle that "NEED TO REMOVE" if any, then click "EDIT" before approving)</small></label>
                                <?php
                                    $consul_list_query = "SELECT tb1.sub_cat_uniID, tb2.sub_cat_title FROM consul_list_category tb1 INNER JOIN services_sub_category tb2 ON tb1.sub_cat_uniID = tb2.sub_cat_uniID WHERE tb1.email_add='$email_add' AND tb1.consultation_id='$consultationID'";
                                    $consul_list_query_result = $conn->query($consul_list_query);
                                    if($consul_list_query_result->num_rows > 0){
                                        foreach($consul_list_query_result as $list){
                                            ?>
                                                <div class="col-md-12 d-flex form-check form-switch">    
                                                    <input class="form-check-input" type="checkbox" name="subcatid[]" id="flexSwitchCheckDefault" value="<?= $list['sub_cat_uniID'] ?>" checked/>
                                                    
                                                    <label class="form-check-label" for="flexSwitchCheckDefault"><?= $list['sub_cat_title'] ?> </label> <br>
                                                </div>
                                                
                                            <?php
                                        }
                                    }
                                ?>
                                <small><Span>(Note: blue means selected)</Span></small>
                            </div>
                            <input class="col-md-12" type="text" name="adminID" value="<?= $id ?>" hidden>
                            <input class="col-md-12" type="text" name="admin" value="<?= $rusername ?>" hidden>
                            <input class="col-md-12" type="text" name="action3" value="update colsultaion sub categories request" hidden> 
                            <input class="col-md-12" type="text" name="consulID" value="<?= $consultationID ?>" hidden>
                            <div class="col-md-12">
                                <button type="submit" name="btnedit" class="m-2 px-4 rounded border-0 float-right text-white bg-blue">Edit</button>
                            </div>
                        </div>

                    </div>
                    <hr class="dropdown-divider bg-dark col-md-11 px-5 my-2" />

                    <div>Reservation Information</div>
                    <div class="row col-md-12">
                        <div class="col-md-12 d-flex">
                            <div class="col-md-3">
                                <label class="col-form-label">Consultation ID:</label>
                                <input class="col-md-12" type="text" name="consulID" value="<?= $consultationID ?>" readonly>
                            </div>
                            <div class="col-md-2">
                                <table class="">
                                    <thead hidden>
                                        <tr>
                                            <th>Email</th>
                                            <th>Consultation</th>                            
                                        </tr>
                                    </thead>
                                    <tbody >
                                        <tr>
                                            <td hidden><?= $email_add ?></td>
                                            <td hidden><?= $consultationID ?></td>
                                            <td hidden><?= $id ?></td>
                                            <td hidden><?= $rusername ?></td>
                                            <label class="col-form-label">Set Date: <small>(Editable Date)</small></label>
                                            <td> 
                                <input class="col-md-12" type="button" class="text-dark bg-white dateset" id="dateset" value="<?= date('F d Y',strtotime($set_date)) ?>" readonly>
                                            </td>
                                            
                                        </tr>
                                    </tbody>
                                    <tfoot hidden>
                                        <tr>
                                            <th>Email</th>
                                            <th>Consultation</th>   
                                        </tr>
                                        </tr>
                                    </tfoot>
                                </table>
                                <input class="col-md-12" type="text" name="setdate" value="<?= $set_date ?>" readonly>
                            </div>
                            <div class="col-md-2">
                            <table class="">
                                    <thead hidden>
                                        <tr>
                                            <th>Email</th>
                                            <th>Consultation</th>                            
                                        </tr>
                                    </thead>
                                    <tbody >
                                        <tr>
                                            <td hidden><?= $email_add ?></td>
                                            <td hidden><?= $consultationID ?></td>
                                            <td hidden><?= $id ?></td>
                                            <td hidden><?= $rusername ?></td>
                                            <label class="col-form-label">Set Time: <small>(Editable Time)</small></label>
                                            <td> 
                                            <input class="col-md-12" type="button" class="text-dark bg-white timeset" id="timeset" value="<?= date('g:i a', strtotime($set_time)) ?>" readonly>
                                            </td>
                                            
                                        </tr>
                                    </tbody>
                                    <tfoot hidden>
                                        <tr>
                                            <th>Email</th>
                                            <th>Consultation</th>   
                                        </tr>
                                        </tr>
                                    </tfoot>
                                </table>
                                <input class="col-md-12" type="text" name="settime" value="<?= $set_time ?>" readonly>
                            </div>
                            <div class="col-md-2">
                                <label class="col-form-label">Status:</label>
                                <input class="col-md-12" type="text" value="<?= $status?>" readonly>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label">Date Registered:</label>
                                <input class="col-md-12" type="text" value="<?= date('F d Y g:i a',  strtotime($date_registered)) ?>" readonly>
                            </div>
                            
                        </div>

                        <div class="col-md-12 d-flex">
                            <div class="col-md-12">
                                <label class="col-form-label">Client Memo:</label>
                                <textarea class="w-100 p-3" rows="4" placeholder="<?= $memo ?>" readonly></textarea>
                            </div>
                            <input class="col-md-12" type="text" name="adminID" value="<?= $id ?>" hidden>
                            <input class="col-md-12" type="text" name="admin" value="<?= $rusername ?>" hidden>
                            <input class="col-md-12" type="text" name="action1" value="declined consultation" hidden> 
                            <input class="col-md-12" type="text" name="action2" value="approved  consultation" hidden>                           
                        </div>
                        <div class="col-md-12 mt-5">
                            <table class="table data-table">
                                <thead hidden>
                                    <tr>
                                        <th>Email</th>
                                        <th>Full Name</th>
                                        <th>Service Name</th>
                                        <th>Set Date</th>
                                        <th>Set Time</th>
                                        <th>Set Time</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    <tr>
                                        <td hidden><?= $email_add ?></td>
                                        <td hidden><?= $firstName ?> <?= $mi ?> <?= $lastName ?></td>
                                        <td hidden><?= $service_title ?></td>
                                        <td hidden><?= date('F d Y', strtotime($set_date)) ?></td>
                                        <td hidden><?= date('g:i a',  strtotime($set_time)) ?></td>
                                        <td hidden><?= $client_uniID ?></td>
                                        <td hidden><?= $id ?></td>
                                        <td hidden><?= $rusername ?></td>
                                        <td hidden><?= $consultationID ?></td>
                                        <td> 
                                            <input type="button" class="m-2 rounded py-2 px-1 float-right text-center text-dark bg-white sendMail" style="cursor: pointer; width: 100px; height: 40px;" placeholder="Send Mail" value="Send Mail">
                                            <button type="submit" name="declined" class="m-2 rounded py-2 px-4 border-0 float-right text-white bg-coloured">Declined</button>
                                            <button type="submit" name="approved" class="m-2 rounded py-2 px-4 border-0 float-right text-white bg-blue">Approved</button>
                                        </td>
                                        
                                    </tr>
                                </tbody>
                                <tfoot hidden>
                                    <tr>
                                        <th>Email</th>
                                        <th>Full Name</th>
                                        <th>Service Name</th>
                                        <th>Set Date</th>
                                        <th>Set Time</th>
                                        <th>Set Time</th>
                                    </tr>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>

    </main>

    <div class="modal fade" id="sendingMail" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Sending Email</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="comptroller/consultation.control.php" method="POST">
                        <div class="cold-md-12 d-flex">
                            <div class="col-md-6 mb-1">
                                <label for="cuniID" class="col-form-label">Client uniID:</label>
                                <input type="text" class="form-control" id="cuniID" name="cuniID" readonly>
                            </div>
                            <div class="col-md-6 mb-1">
                                <label for="fullname" class="col-form-label">Recipient Fullname:</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" readonly>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label for="email_add" class="col-form-label">Recipient Email Address:</label>
                            <input type="text" class="form-control" id="emailadd" name="emailadd" readonly>
                        </div>
                        <div class="cold-md-12 d-flex">
                            <div class="col-md-8 mb-1">
                                <label for="service" class="col-form-label">Subject:</label>
                                <input type="text" class="form-control" id="service" name="service" readonly>
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="consulid" class="col-form-label">Consultation ID:</label>
                                <input type="text" class="form-control" id="consulid" name="consulid" readonly>
                            </div>
                        </div>    
                        
                        <div class="cold-md-12 d-flex">
                            <div class="col-md-6 mb-1">
                                <label for="setdate" class="col-form-label">Set Date:</label>
                                <input type="text" class="form-control" id="setdate" name="setdate" readonly>
                            </div>
                            <div class="col-md-6 mb-1">
                                <label for="settime" class="col-form-label">Set Time:</label>
                                <input type="text" class="form-control" id="settime" name="settime" readonly>
                            </div>
                        </div>
                        <div class="cold-md-12 d-flex">
                            <div class="col-md-6 mb-1"  hidden>
                                <label for="adminID" class="col-form-label">admin ID:</label>
                                <input type="text" class="form-control" id="adminID" name="adminID" readonly>
                            </div>
                            <div class="col-md-6 mb-1" hidden>
                                <label for="admin" class="col-form-label">Admin:</label>
                                <input type="text" class="form-control" id="admin" name="admin" readonly>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label for="companymail" class="col-form-label">Sender Email Address:</label>
                            <input type="text" class="form-control" id="companymail" name="companymail" required>
                        </div>
                        <div class="mb-1" hidden>
                            <label for="action" class="col-form-label">action:</label>
                            <input type="text" class="form-control" id="action" name="action" value="reply consultation request" placeholder="reply consultation request">
                        </div>
                       
                        <div class="mb-1">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" rows="4" id="message-text"  name="message" required></textarea>
                        </div>
                        <button type="submit" class="btn bg-blue text-white mt-2" name="send">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="dateedit" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Set New Date</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="comptroller/consultation.control.php" method="POST">
                        
                        <input type="text" class="form-control" id="cemailadd" name="cemailadd" hidden>
                        <input type="text" class="form-control" id="cconsulid" name="cconsulid" hidden>
                        <input type="text" class="form-control" id="adminid" name="adminid" hidden>
                        <input type="text" class="form-control" id="useradmin" name="useradmin" hidden>
                        <input type="text" class="form-control" id="newaction" name="newaction" value="Edit consultation date" placeholder="Edit consultation date" hidden>
                        <div class="mb-1">
                            <input class="col-md-12" type="date" name="newdate" required>
                        </div>
                        <button type="submit" class="btn bg-blue text-white mt-2" name="dateedit">Edit Date</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="timeedit" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Set New Time</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="comptroller/consultation.control.php" method="POST">
                        
                        <input type="text" class="form-control" id="cusemailadd" name="cusemailadd" hidden>
                        <input type="text" class="form-control" id="cusconsulid" name="cusconsulid" hidden>
                        <input type="text" class="form-control" id="id" name="id" hidden>
                        <input type="text" class="form-control" id="user" name="user" hidden>
                        <input type="text" class="form-control" id="newaction" name="newaction" value="Edit consultation time" placeholder="Edit consultation date" hidden>
                        <div class="mb-1">
                            <input class="col-md-12" type="time" name="newdtime" required>
                        </div>
                        <button type="submit" class="btn bg-blue text-white mt-2" name="timeedit">Edit Time</button>
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
            $('.sendMail').on('click', function(){
                $('#sendingMail').modal('show');

                $tr = $(this).closest('tr');

                var data= $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);
                $('#emailadd').val(data[0]);
                $('#fullname').val(data[1]);
                $('#service').val(data[2]);
                $('#setdate').val(data[3]);
                $('#settime').val(data[4]);
                $('#cuniID').val(data[5]);
                $('#adminID').val(data[6])
                $('#admin').val(data[7])
                $('#consulid').val(data[8])
            })
        })

        $(document).ready(function(){
            $('#dateset').on('click', function(){
                $('#dateedit').modal('show');

                $tr = $(this).closest('tr');

                var data= $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);
                $('#cemailadd').val(data[0]);
                $('#cconsulid').val(data[1]);
                $('#adminid').val(data[2]);
                $('#useradmin').val(data[3]);
            })
        })

        $(document).ready(function(){
            $('#timeset').on('click', function(){
                $('#timeedit').modal('show');

                $tr = $(this).closest('tr');

                var data= $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);
                $('#cusemailadd').val(data[0]);
                $('#cusconsulid').val(data[1]);
                $('#id').val(data[2]);
                $('#user').val(data[3]);
            })
        })
    </script>
    <!-- Footer and JS Script End Here -->
  </body>
</html>