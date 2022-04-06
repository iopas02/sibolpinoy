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
                        $reg_fee = $row['reg_fee'];
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
                <div>Client Information</div>
                <div class="col-md-12 d-flex">
                    <div class="col-md-3">
                        <label class="col-form-label">Client_uniID:</label>
                        <input class="col-md-12" type="text" value="<?= $client_uniID ?>"readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="col-form-label">First Name:</label>
                        <input class="col-md-12" type="text" value="<?= $firstName ?>"readonly>
                    </div>
                    <div class="col-md-1">
                        <label class="col-form-label">MI:</label>
                        <input class="col-md-12" type="text" value="<?= $mi ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="col-form-label">Last Name:</label>
                        <input class="col-md-12" type="text" value="<?= $lastName ?>"readonly>
                    </div> 
                </div>
                <div class="col-md-12 d-flex">
                    <div class="col-md-6">
                        <label class="col-form-label">Email Address:</label>
                        <input class="col-md-12" type="text" value="<?= $email_add ?>"readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="col-form-label">Contact Number:</label>
                        <input class="col-md-12" type="text" value="<?= $contact ?>" readonly>
                    </div>
                </div>
                <div class="col-md-12 d-flex">
                    <div class="col-md-6">
                        <label class="col-form-label">Organization:</label>
                        <input class="col-md-12" type="text" value="<?= $organization ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="col-form-label">Position:</label>
                        <input class="col-md-12" type="text" value="<?= $position ?>" readonly>
                    </div>
                </div>
                <hr class="dropdown-divider bg-dark col-md-11 px-5 my-2" />

                <div class="col-md-12 d-flex">
                    <div class="col-md-4 d-grid">
                        <div>Service Information</div>
                        <div class="col-md-12">
                            <label class="col-form-label">Service ID:</label>
                            <input class="col-md-12" type="text" value="<?= $service_uniID   ?>" readonly>
                        </div>
                        <div class="col-md-12">
                            <label class="col-form-label">Event Title:</label>
                            <input class="col-md-12" type="text" value="<?= $service_title ?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-8 d-grid">
                        <div>Sub Categories Information</div>
                        <div class="col-md-12">
                            <label class="col-form-label">Sub Categories ID and Tittle</label>
                            
                                <?php

                                    $consul_list_query = "SELECT tb1.sub_cat_uniID, tb2.sub_cat_title FROM consul_list_category tb1 INNER JOIN services_sub_category tb2 ON tb1.sub_cat_uniID = tb2.sub_cat_uniID WHERE tb1.email_add='$email_add' AND tb1.consultation_id='$consultationID'";
                                    $consul_list_query_result = $conn->query($consul_list_query);
                                    if($consul_list_query_result->num_rows > 0){
                                        foreach($consul_list_query_result as $list){
                                            ?>
                                                <div class="col-md-12 d-flex">    
                                                    <input class="col-md-4 m-1" type="text" value="<?= $list['sub_cat_uniID'] ?>" readonly>
                                                    <input class="col-md-8 m-1" type="text" value="<?= $list['sub_cat_title'] ?>" readonly>
                                                </div>
                                            <?php
                                        }
                                    }
                                ?>
                        </div>
                    </div>

                    
                </div>
                <hr class="dropdown-divider bg-dark col-md-11 px-5 my-2" />

                <div>Reservation Information</div>
                <div class="row col-md-12">
                    <div class="col-md-12 d-flex">
                        <div class="col-md-2">
                            <label class="col-form-label">Consultation ID:</label>
                            <input class="col-md-12" type="text" value="<?= $consultationID ?>" readonly>
                        </div>
                        <div class="col-md-2">
                            <label class="col-form-label">Set Date:</label>
                            <input class="col-md-12" type="text" value="<?= date('M d Y',  strtotime($set_date)) ?>" readonly>
                        </div>
                        <div class="col-md-2">
                            <label class="col-form-label">Set Time:</label>
                            <input class="col-md-12" type="text" value="<?= date('g:i a',  strtotime($set_time)) ?>" readonly>
                        </div>
                        <div class="col-md-2">
                            <label class="col-form-label">Status:</label>
                            <input class="col-md-12" type="text" value="<?= $status?>" readonly>
                        </div>
                        <div class="col-md-2">
                            <label class="col-form-label">Date Registered:</label>
                            <input class="col-md-12" type="text" value="<?= date('M d Y',  strtotime($date_registered)) ?>" readonly>
                        </div>
                        
                    </div>

                    <div class="col-md-12 d-flex">
                        <div class="col-md-12">
                            <label class="col-form-label">Client Memo:</label>
                            <textarea class="form-control" rows="4" placeholder="<?= $memo ?>" readonly></textarea>
                        </div>                        
                    </div>
                    <div class="col-md-12 mt-5">
                        <button class="m-2 py-2 px-4 border-0 float-right text-white bg-coloured">Declined</button>
                        <button class="m-2 py-2 px-4 border-0 float-right text-white bg-blue">Approved</button>
                    </div>
                </div>
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