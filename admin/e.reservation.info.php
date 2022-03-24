<!doctype html>
<html lang="en">
  
  <!-- Header Start -->
  <?php
      require "layout.part/admin.header.php";
  ?>
  <!-- Header End -->

  <body>
    <title>Sibol-PINOY Consultation Inbox</title>

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
        <div class="container-fluid p-4">
            <div class="row">
            <div class="col-md-10 my-2">
                <h4 class="page-header">Event Reservation Information</h4>
            </div>
            <div class="col-md-2 my-2">
                <a href="event.reservation.php" style="text-decoration: none; color:black; ">Back to Reservation List</a>
            </div> 
        </div>
        <hr class="dropdown-divider bg-dark" />
        <div class="col-md-12">
            <div class="row">
            <?php
                if(isset($_POST['read'])){
                    $entryID = mysqli_real_escape_string($conn, $_POST['entryID']);

                    $reload_event_request_query = "SELECT tb1.entryID, tb2.client_uniID, tb2.firstName, tb2.mi, tb2.lastName, tb2.contact, tb2.organization, tb2.position, tb1.email_add, tb1.reservationID, tb3.eventID, tb3.event_title, tb3.date_and_time, tb3.reg_fee, tb1.ss_payment, tb1.payment_method, tb1.registered_by, tb1.date_registered, tb1.status, tb1.action FROM( event_reservation tb1 INNER JOIN client tb2 ON tb1.email_add = tb2.email_add) INNER JOIN events tb3 ON tb1.eventID = tb3.eventID WHERE entryID =$entryID";

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
                            $reservationID = $row['reservationID'];
                            $eventID = $row['eventID'];
                            $event_title = $row['event_title'];
                            $date_and_time = $row['date_and_time'];
                            $reg_fee = $row['reg_fee'];
                            $ss_payment = $row['ss_payment'];
                            $payment_method = $row['payment_method'];
                            $registered_by = $row['registered_by'];
                            $status = $row['status'];
                            $date_registered = $row['date_registered'];
                        }
                    }
                }
            ?>
                <div>Client Information</div>
                <div class="col-md-12 d-flex">
                    <div class="col-md-2">
                        <label class="col-form-label">Client_uniID:</label>
                        <input class="border-0" type="text" value="<?= $client_uniID ?>">
                    </div>
                    <div class="col-md-2">
                        <label class="col-form-label">First Name:</label>
                        <input class="border-0" type="text" value="<?= $firstName ?>">
                    </div>
                    <div class="col-md-2">
                        <label class="col-form-label">MI:</label>
                        <input class="border-0" type="text" value="<?= $mi ?>">
                    </div>
                    <div class="col-md-2">
                        <label class="col-form-label">Last Name:</label>
                        <input class="border-0" type="text" value="<?= $lastName ?>">
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