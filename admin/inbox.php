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
                            <table id="datatableid" class="table data-table" style="width: 100%">
                                <thead>
                                    <tr> 
                                        <th hidden>Email ID</th>
                                        <th hidden>Client ID</th>
                                        <th>Sender</th>
                                        <th hidden>Sender Email</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $inbox_mail = "SELECT tb2.emailID, tb1.client_uniID, tb1.firstName, tb1.lastName, tb1.email_add, tb2.subject, tb2.message, tb2.status, tb2.date_mailed  FROM client tb1 INNER JOIN email tb2 ON tb1.client_uniID = tb2.client_uniID";

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
                                                <td hidden><?= $email['client_uniID']?></td>
                                                <?php
                                                    $sender = $email['firstName']." ".$email['lastName'];
                                                ?>
                                                <td><?= $sender ?></td>
                                                <td hidden><?= $email['email_add']?></td>
                                                <td><?= $email['subject']?></td>
                                                <td><?= $email['message']?></td>
                                                <td><?= date('M d Y H:i', strtotime($email['date_mailed'])) ?></td>
                                                <td>
                                                    <button type="button" class="btn tooltip-test read" id="read" title="Read">
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
                                        <th hidden>Email ID</th>
                                        <th hidden>Client ID</th>
                                        <th>Sender</th>
                                        <th hidden>Sender Email</th>
                                        <th>Subject</th>
                                        <th>Message</th>
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

        <div class="modal fade" id="readEmail" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                    <form action="comptroller/update.php" method="POST"> 
                        <div class="modal-header">
                            <h5 class="modal-title">New message</h5>
                            <button type="submit" name="cstatus" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">  
                            <div class="row col-md-12">
                                <input type="text" class="form-control" hidden name="emailID" id="emailID">        
                                <div class="col-md-6 mb-3">
                                    <label for="sender" class="col-form-label">Sender:</label>
                                    <input type="text" class="form-control" readonly name="sender" id="sender">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email_add" name="sender_email" class="col-form-label">Email Address:</label>
                                    <input type="text" class="form-control" readonly name="email_add" id="email_add" >
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
                        </div>
                    </form> 
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-target="#replyMessage" data-bs-toggle="modal" data-bs-dismiss="modal">Reply message</button>
                    </div>
                </div>                
            </div>
        </div>

        <div class="modal fade" id="replyMessage" aria-hidden="true" data-bs-backdrop="static" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                <form action="comptroller/send.mail.php" method="POST" enctype="multipart/form-data">                    
                    <div class="modal-header">
                        <h5 class="modal-title">Compose Email</h5>
                        <button type="submit" name="close_btn" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row col-md-12">
                            <div class="col-md-6 mb-1">
                                <label for="recipient_name" name="sender_email" class="col-form-label">Recipient Name:</label>
                                <input type="text" class="form-control" readonly name="recipient_name" id="client_name" >
                                <input type="text" class="form-control" hidden name="client_uniID" id="client_uniID" >
                                <input type="text" class="form-control" hidden name="emailID" id="emailid" >
                            </div>
                            <div class="col-md-6 mb-1">
                                <label for="sender_email" name="sender_email" class="col-form-label">Recipient Email Address:</label>
                                <input type="text" class="form-control" readonly name="recipient_email" id="email_address" >
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-12 mb-2">
                                <label for="sender_email" name="sender_email" class="col-form-label">Subject:</label>
                                <input type="text" class="form-control" readonly name="subject" id="follow_subject" >
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="form-floating col-md-6 mb-1 px-2">
                                <input type="text" class="form-control" hidden id="floatingInput" name="adminid" value="<?= $id ?>">
                                <input type="text" class="form-control" hidden id="floatingInput" name="username" value="<?= $rusername ?>">
                                <input type="text" class="form-control" readonly id="floatingInput" name="sender" value="<?= $firstName." ".$lastName ?>">
                                <label for="floatingInput">Sender Name</label>
                            </div>
                            <div class="form-floating col-md-6 mb-1 px-2">
                                <input type="email" class="form-control" readonly id="floatingInput" name="sender_email" value="irecommend.ahis.als@gmail.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating col-md-12 mb-1 px-2">
                                <input type="email" class="form-control" id="floatingPassword" name="cc" placeholder="cc:">
                                <label for="floatingPassword">cc:</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2 px-2">
                                <label for="message" class="col-form-label">Message:</label>
                                <textarea class="form-control" rows="4" name="message" id="message"></textarea>
                            </div>
                        </div>
                        <div class="mb-2 px-2">
                            <input class="form-control" type="file" name="attach_file">
                        </div>
                        <div class="mb-2 px-2" hidden>
                            <input class="form-control" type="text" name="reply_email" value="Reply Email">
                        </div>
                        
                        <div class="row col-md-12 mt-3">
                            <button class="btn col-md-4 text-white bg-coloured" type="submit" name="send_reply">
                                Send Message
                            </button>
                        </div>
                    </div>          
                </form>
                        
                    
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#readEmail" data-bs-toggle="modal" data-bs-dismiss="modal">Back to first</button>
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
            $('.read').on('click', function(){
                $('#readEmail').modal('show');
               
                $tr = $(this).closest('tr');

                var data= $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);

                $('#emailID').val(data[0]);
                $('#emailid').val(data[0]);
                $('#client_uniID').val(data[1]);
                $('#sender').val(data[2]);
                $('#client_name').val(data[2]);

                $('#email_add').val(data[3]);
                $('#email_address').val(data[3]);
                $('#subject').val(data[4]);
                $('#follow_subject').val(data[4]);
                $('#message').val(data[5]);
            })

        })
    </script>
    <!-- Footer and JS Script End Here -->
  </body>
</html>