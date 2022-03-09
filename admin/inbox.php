<!doctype html>
<html lang="en">
  
  <!-- Header Start -->
  <?php
      require "layout.part/admin.header.php";
  ?>
  <!-- Header End -->

  <body>
    <title>Sibol-PINOY Inbox</title>

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
                <h4 class="page-header">Inbox</h4>
                <hr class="dropdown-divider bg-dark" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-envelope"></i></span> Inbox Messages
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped data-table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Sender</th>
                                        <th>Subject</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
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
                                    </tr>

                                    <tr>
                                        <td>Mr. Don Paquito </td>
                                        <td>ISO 9001:2015 Requirments and Internal Quality Audit</td>
                                        <td>March 3</td>
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
                                    </tr>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sender</th>
                                        <th>Subject</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                        <th>Delete</th>
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
                    <h5 class="modal-title" id="exampleModalToggleLabel">New message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Sender:</label>
                            <input type="text" class="form-control" readonly id="recipient-name" value="Mrs. Maria Fully Grace">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Email Address:</label>
                            <input type="text" class="form-control" readonly id="recipient-name" value="MariaFullyGrace@x123.com">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Subject:</label>
                            <input type="text" class="form-control" readonly id="recipient-name" value="Strategic Planning and Risk-Based Management">
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