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
                <h4 class="page-header">Clients Record</h4>
                <hr class="dropdown-divider bg-dark" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-people"></i></span> Client List
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table data-table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Client uniID</th>
                                        <th>First Name</th>
                                        <th>M.I.</th>
                                        <th>Last Name</th>
                                        <th>Email Add</th>
                                        <th>Contact No.</th>
                                        <th>Organization</th>
                                        <th>Position</th>
                                        <th>Date Register</th>
                                        <th>Read</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $clients_list_query = "SELECT * FROM `client` ";
                                        $clients_list_query_result = mysqli_query($conn, $clients_list_query);
                                        if(mysqli_num_rows($clients_list_query_result) > 0){
                                            foreach($clients_list_query_result as $client_list){
                                                ?>
                                                <tr>
                                                    <td><?= $client_list['client_uniID'] ?></td>
                                                    <td><?= $client_list['firstName'] ?></td>
                                                    <td><?= $client_list['m.i.'] ?></td>
                                                    <td><?= $client_list['lastName'] ?></td>
                                                    <td><?= $client_list['email_add'] ?></td>
                                                    <td><?= $client_list['contact'] ?></td>
                                                    <td><?= $client_list['organization'] ?></td>
                                                    <td><?= $client_list['position'] ?></td>
                                                    <td><?= date('M d Y',  strtotime($client_list['date_register'])) ?></td>
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
                                        <th>Client uniID</th>
                                        <th>First Name</th>
                                        <th>M.I.</th>
                                        <th>Last Name</th>
                                        <th>Email Add</th>
                                        <th>Contact No.</th>
                                        <th>Organization</th>
                                        <th>Position</th>
                                        <th>Date Register</th>
                                        <th>Read</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Start Here -->
        <div class="modal fade" id="exampleModalToggle" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">Consultation Reservation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="recipient-name" class="col-form-label">Sender:</label>
                                    <input type="text" class="form-control" readonly id="recipient-name" value="Peter Pan">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="recipient-name" class="col-form-label">Email Address:</label>
                                    <input type="text" class="form-control" readonly id="recipient-name" value="peterpan@wonderland.com">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="recipient-name" class="col-form-label">Subject:</label>
                                    <input type="text" class="form-control mb-2" readonly id="recipient-name" value="Business Consultation">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <label for="recipient-name" class="col-form-label">Compliance and Standards:</label>
                                    <input type="text" class="form-control mb-2" readonly id="recipient-name" value="Automotive Quality Management System Standard (IATF 16949:2016)">
                                    <input type="text" class="form-control mb-2" readonly iid="recipient-name" value="Food Safety Management System (ISO 22000:2005) & HACCP">
                                </div>
                                <div class="col-md-4">
                                    <label for="recipient-name" class="col-form-label">Performance Excellence:</label>
                                    <input type="text" class="form-control" readonly id="recipient-name" value="Leadership Excellence">
                                </div>
                                <div class="col-md-4">
                                    <label for="recipient-name" class="col-form-label">Productivity & Quality:</label>
                                    <input type="text" class="form-control mb-2" readonly id="recipient-name" value="P&Q Diagnosis">
                                    <input type="text" class="form-control mb-2" readonly id="recipient-name" value="5s">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Message:</label>
                                <textarea class="form-control" readonly id="message-text" placeholder="Where na you? Dito na me.."></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Reply message</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalToggle2" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel2">Compose Message Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Recipient Email Address:</label>
                            <input type="text" class="form-control" id="recipient-name" >
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Sender Email Address:</label>
                            <input type="text" class="form-control" id="recipient-name" >
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Subject:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text" ></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="file" class="form-control" id="recipient-name" placeholder="attach you files here">
                        </div>
                        <button type="button" class="btn bg-blue text-white" data-bs-dismiss="modal">Send Message</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Back to first</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
        <!-- Modal End Here -->

    </main>

    <!-- Footer and JS Script Start Here -->
    <?php
      require "layout.part/admin.footer.php";
    ?>
    <!-- Footer and JS Script End Here -->
  </body>
</html>