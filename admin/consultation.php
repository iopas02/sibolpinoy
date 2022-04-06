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
            <div class="col-md-12 my-2">
                <h4 class="page-header">Consultation</h4>
                <hr class="dropdown-divider bg-dark" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-clipboard-check"></i></span>Consultation Reservation
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table data-table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>C_Number</th>
                                        <th>From</th>
                                        <th>Consultation ID</th>
                                        <th>Service</th>
                                        <th>Status</th>
                                        <th>Date Send</th>
                                        <th>Read</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $consultation_query = "SELECT tb3.entryID, tb1.firstName, tb1.mi, tb1.lastName, tb1.email_add, tb2.service_uniID, tb2.service_title, tb3.consultation_id, tb3.status, tb3.action, tb3.registered_date FROM (client tb1 INNER JOIN consultation tb3 ON tb1.email_add = tb3.email_add) INNER JOIN services tb2 ON tb2.service_uniID = tb3.service_uniID";

                                        $consultation_query_results = $conn->query($consultation_query);
                                        if($consultation_query_results->num_rows > 0){
                                            foreach($consultation_query_results as $consultation){
                                                ?>
                                                <tr class="
                                                <?php
                                                    $a = $consultation['action'];

                                                    if($a == "New"){
                                                        echo 'card-text';
                                                    }else{
                                                        echo 'card-tex2';
                                                    }   
                                                ?>
                                                ">
                                                        <td><?= $consultation['entryID'] ?></td>
                                                        <td><?= $consultation['firstName'].' '.$consultation['mi'].' '.$consultation['lastName'] ?></td>
                                                        <td><?= $consultation['consultation_id'] ?></td>
                                                        <td><?= $consultation['service_title'] ?></td>
                                                        <td><?= $consultation['status'] ?></td>
                                                        <td><?= date('M d Y',  strtotime($consultation['registered_date'])) ?></td>
                                                        <td>
                                                            <form action="consultation.info" method="POST">
                                                                <input name="entryID" value="<?= $consultation['entryID'] ?>" hidden>
                                                                <button type="submit" class="stats-white tooltip-test" title="READ" id="read" name="read">
                                                                    <i class="bi bi-arrow-repeat"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>

                                                <?php
                                            }
                                        }

                                    ?>
                                       
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>C_Number</th>
                                        <th>From</th>
                                        <th>Consultation ID</th>
                                        <th>Service</th>
                                        <th>Status</th>
                                        <th>Date Send</th>
                                        <th>Read</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
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