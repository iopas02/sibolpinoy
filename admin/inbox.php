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
                            <table id="datatableid" class="table table-striped data-table" style="width: 100%">
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
                                    <?php
                                    $inbox_mail = "SELECT * FROM `email` ";
                                    $inbox_mail_result = mysqli_query($conn, $inbox_mail);
                                    if(mysqli_num_rows($inbox_mail_result) > 0 ){
                                        foreach($inbox_mail_result as $email){
                                            ?>
                                            <tr <?= 
                                                $status = $email['status'];
                                                
                                                if($status == 'New'){
                                                   echo ' class="card-text" ';
                                                }else {
                                                    echo ' class="" ';
                                                }
                                            
                                            ?> > 
                                                <td hidden><?= $email['emailID']?></td>   
                                                <td><?= $email['sender_name']?></td>
                                                <td hidden><?= $email['sender_email']?></td>
                                                <td><?= $email['subject']?></td>
                                                <td hidden><?= $email['message']?></td>
                                                <td><?= date('M d Y H:i',  strtotime($email['date_mailed'])) ?></td>
                                                <td>
                                                    <button type="button" class="btn tooltip-test" id="read" title="Read" data-bs-toggle="modal" data-bs-target="#readMessage">
                                                        <i class="bi bi-bookmark"></i>
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }else{
                                        echo "No Email Yet";
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
        <div class="modal fade" id="readMessage" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="ereadMessageabel" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="readMessageLabel">New message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row col-md-12">
                            <input type="text" class="form-control" hidden name="emailID" id="emailID">        
                            <div class="col-md-6 mb-3">
                                <label for="sender_name" class="col-form-label">Sender:</label>
                                <input type="text" class="form-control" readonly name="sender_name" id="sender_name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="sender_email" name="sender_email" class="col-form-label">Email Address:</label>
                                <input type="text" class="form-control" readonly name="sender_email" id="sender_email" >
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="mb-3">
                                <label for="subject" class="col-form-label">Subject:</label>
                                <input type="text" class="form-control" readonly name="subject" id="subject">
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="mb-3">
                                <label for="message" class="col-form-label">Message:</label>
                                <textarea class="form-control" rows="5" readonly name="message" id="message"></textarea>
                            </div>
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
     <script>
        $(document).ready(function(){
            $('#read').on('click', function(){
               
                $tr = $(this).closest('tr');

                var data= $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);

                $('#emailID').val(data[0]);
                $('#sender_name').val(data[1]);
                $('#sender_email').val(data[2]);
                $('#subject').val(data[3]);
                $('#message').val(data[4]);
                // $('#lev').val(data[5]);
            })
        })
  
  </script>
    <!-- Footer and JS Script End Here -->
  </body>
</html>