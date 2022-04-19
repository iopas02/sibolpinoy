<!doctype html>
<html lang="en">
  
  <!-- Header Start -->
  <?php
      require "layout.part/admin.header.php";
  ?>
  <!-- Header End -->

  <body>
    <title>Sibol-PINOY Reservation Info</title>

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
        $eid = '';
        $client_uniID = '';
        $firstName = '';
        $mi = '';
        $lastName = '';
        $contact = '';
        $organization = '';
        $position = '';
        $email_add = '';
        $reservationID = '';
        $eventID = '';
        $event_title = '';
        $date_and_time = '';
        $reg_fee = '';
        $ss_payment = '';
        $payment_method = '';
        $status = '';
        $date_registered = '';
        
        if(isset($_POST['read'])){
            $entryID = mysqli_real_escape_string($conn, $_POST['entryID']);

            $change_action_query = "UPDATE `event_reservation` SET `action`='Read' WHERE `entryID`='$entryID' ";
            if($conn->query($change_action_query) == TRUE ){

                $reload_event_request_query = "SELECT tb1.entryID, tb2.client_uniID, tb2.firstName, tb2.mi, tb2.lastName, tb2.contact, tb2.organization, tb2.position, tb1.email_add, tb1.reservationID, tb3.eventID, tb3.event_title, tb3.date_and_time, tb3.reg_fee, tb1.ss_payment, tb1.payment_method, tb1.date_registered, tb1.status, tb1.action FROM( event_reservation tb1 INNER JOIN client tb2 ON tb1.email_add = tb2.email_add) INNER JOIN events tb3 ON tb1.eventID = tb3.eventID WHERE entryID =$entryID";

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
                        $status = $row['status'];
                        $date_registered = $row['date_registered'];
                    }
                }

            }else{
                exit();
            }
        
        }else{
            header("Location: event.reservation.php");
            exit();
        }
    ?>

    <main class="my-5 py-3">
        <div class="container-fluid p-4">
            <div class="row">
            <div class="col-md-10 my-2">
                <h4 class="page-header">Event Reservation Information</h4>
            </div>
            <div class="col-md-2 my-2">
                <a href="event.reservation" style="text-decoration: none; color:black; ">Back to Reservation List</a>
            </div> 
        </div>
        <hr class="dropdown-divider bg-dark" />
        <div class="col-md-12">
            <div class="row">
                <div>Client Information</div>
                <form action="comptroller/event.reservation.control.php" method="POST">
                    <div class="col-md-12 d-flex">
                        <div class="col-md-3">
                            <label class="col-form-label">Client_uniID:</label>
                            <input class="col-md-12" type="text" name="clientuniID" value="<?= $client_uniID ?>"readonly>
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
                            <input class="col-md-12" type="text" name="lastname" value="<?= $lastName ?>"readonly>
                        </div> 
                    </div>
                    <div class="col-md-12 d-flex">
                        <div class="col-md-6">
                            <label class="col-form-label">Email Address:</label>
                            <input class="col-md-12" type="text" name="emailadd" value="<?= $email_add ?>"readonly>
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
                            <input class="col-md-12" type="text"name="position" value="<?= $position ?>" readonly>
                        </div>
                    </div>
                    <hr class="dropdown-divider bg-dark col-md-11 px-5 my-2" />
                    <div>Event Information</div>
                    <div class="col-md-12 d-flex">
                        <div class="col-md-2">
                            <label class="col-form-label">E-ID:</label>
                            <input class="col-md-12" type="text" name="eventid" value="<?= $eventID  ?>" readonly>
                        </div>
                        <div class="col-md-10">
                            <label class="col-form-label">Event Title:</label>
                            <input class="col-md-12" type="text" name="eventname" value="<?= $event_title ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-12 d-flex">
                        <div class="col-md-6">
                            <label class="col-form-label">Event Date and Time:</label>
                            <input class="col-md-12" type="text" name="dateandtime" value="<?= $date_and_time ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label">Event Reg Fee:</label>
                            <input class="col-md-12" type="text" name="regfee" value="<?= $reg_fee ?>" readonly>
                        </div>
                    </div>
                    <hr class="dropdown-divider bg-dark col-md-11 px-5 my-2" />
                    <div>Reservation Information</div>
                    <div class="row col-md-12">
                        <div class="col-md-4">
                            <label class="col-md-12">SS_Payment:</label>
                            <img src="upload/<?= $ss_payment ?>" class="w-100 h-100">
                        </div>
                        <div class="col-md-8">
                            <div class="col-md-12 d-flex">
                                <div class="col-md-6">
                                    <label class="col-form-label">Reservation ID:</label>
                                    <input class="col-md-12" type="text" name="reservationid" value="<?= $reservationID ?>" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label">Status:</label>
                                    <input class="col-md-12" type="text" value="<?= $status?>" readonly>
                                    <input class="col-md-12" type="text" name="status1" value="Approved" hidden>
                                    <input class="col-md-12" type="text" name="status2" value="Declined" hidden>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex">
                                <div class="col-md-6">
                                    <label class="col-form-label">Payment Method:</label>
                                    <input class="col-md-12" type="text" name="payment" value="<?= $payment_method ?>" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label">Date Registered:</label>
                                    <input class="col-md-12" type="text" name="datergistered" value="<?= date('M d Y',  strtotime($date_registered)) ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex">
                                <input class="col-md-12" type="text" name="adminID" value="<?= $id ?>" hidden>
                                <input class="col-md-12" type="text" name="admin" value="<?= $rusername ?>" hidden>
                                <input class="col-md-12" type="text" name="action1" value="declined event reservation" hidden> 
                                <input class="col-md-12" type="text" name="action2" value="approved event reservation" hidden>                           
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
                                            <td hidden><?= $event_title ?></td>
                                            <td hidden><?= $date_and_time ?></td>
                                            <td hidden><?= $client_uniID ?></td>
                                            <td hidden><?= $id ?></td>
                                            <td hidden><?= $rusername ?></td>
                                            <td hidden><?= $reservationID ?></td>
                                            <td> 
                                                <input type="btn" class="m-2 py-2 px-1 float-right text-center text-dark bg-white sendMail" style="cursor: pointer; width: 100px; height: 40px;" placeholder="Send Mail" >
                                                <button type="submit" name="eventdeclined" class="m-2 py-2 px-4 border-0 float-right text-white bg-coloured">Declined</button>
                                                <button type="submit" name="eventapproved"class="m-2 py-2 px-4 border-0 float-right text-white bg-blue">Approved</button>
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
                    </div>
                </form>    
            </div>
        </div>

        <div class="modal fade" id="sendingMail" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Sending Email</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="comptroller/event.reservation.control.php" method="POST">
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
                            <label for="$email_add" class="col-form-label">Recipient Email Address:</label>
                            <input type="text" class="form-control" id="emailadd" name="emailadd" readonly>
                        </div>
                        <div class="cold-md-12 d-flex">
                            <div class="col-md-12 mb-1">
                                <label for="eventname" class="col-form-label">Subject:</label>
                                <input type="text" class="form-control" id="eventname" name="eventname" readonly>
                            </div>
                        </div>    
                        
                        <div class="cold-md-12 d-flex">
                            <div class="col-md-8 mb-1">
                                <label for="datetime" class="col-form-label">Event Date and Time:</label>
                                <input type="text" class="form-control" id="datetime" name="datetime" readonly>
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="reservationid" class="col-form-label">Reservation ID:</label>
                                <input type="text" class="form-control" id="reservationid" name="reservationid" readonly>
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
                            <input type="text" class="form-control" id="action" name="action" value="reply event reservation" placeholder="reply consultation request">
                        </div>
                       
                        <div class="mb-1">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" rows="4" id="message-text"  name="message" required></textarea>
                        </div>
                        <button type="submit" class="btn bg-blue text-white mt-2" name="sendmessage">Send Message</button>
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
           $('.sendMail').on('click', function(){
               $('#sendingMail').modal('show');

               $tr = $(this).closest('tr');

               var data= $tr.children("td").map(function(){
                   return $(this).text();
               }).get();

               console.log(data);
               $('#emailadd').val(data[0]);
               $('#fullname').val(data[1]);
               $('#eventname').val(data[2]);
               $('#datetime').val(data[3]);
               $('#cuniID').val(data[4]);
               $('#adminID').val(data[5])
               $('#admin').val(data[6])
               $('#reservationid').val(data[7])
           })
       })
   </script>
    <!-- Footer and JS Script End Here -->
  </body>
</html>