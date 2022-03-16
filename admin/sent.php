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
                <h4 class="page-header">Replied Queries</h4>
                <hr class="dropdown-divider bg-dark" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-check"       viewBox="0 0 16 16">
                            <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855a.75.75 0 0 0-.124 1.329l4.995 3.178 1.531 2.406a.5.5 0 0 0 .844-.536L6.637 10.07l7.494-7.494-1.895 4.738a.5.5 0 1 0 .928.372l2.8-7Zm-2.54 1.183L5.93 9.363 1.591 6.602l11.833-4.733Z"/>
                            <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
                            </svg>
                        </span>Email Sent
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table data-table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th hidden>Client ID/th>
                                        <th hidden>C_email_add</th>
                                        <th>To:</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>Replied</th>
                                        <th>Action</th>
                                        <th>Replied</th>
                                        <th>Attachment</th>
                                        <th>CC</th>
                                        <th>Date Reply</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sent_table_query = "SELECT tb1.client_uniID, tb1.email_add, tb1.firstName, tb1.lastName, tb2.subject, tb2.message, tb2.status, tb3.username, tb4.action, tb4.reply, tb4.attachment, tb4.cc, tb4.date_reply FROM (((client tb1 INNER JOIN sent_email tb4 ON tb1.client_uniID = tb4.client_uniID) INNER JOIN email tb2 ON tb2.emailID = tb4.emailID) INNER JOIN login tb3 ON tb3.loginId = tb4.loginId)";

                                        $sent_table_query_result = mysqli_query($conn, $sent_table_query);
                                        if(mysqli_num_rows($sent_table_query_result) > 0 ){
                                            foreach($sent_table_query_result as $sent){
                                            ?>
                                                <tr>
                                                    <td hidden><?=$sent['client_uniID']?></td>
                                                    <td hidden><?=$sent['email_add']?></td>
                                                    <?php
                                                        $to = $sent['firstName']." ".$sent['lastName'];
                                                    ?>
                                                    <td><?= $to ?></td>
                                                    <td><?=$sent['subject']?></td>
                                                    <td><?=$sent['message']?></td>
                                                    <td><?=$sent['status']?></td>
                                                    <td><?=$sent['username']?></td>
                                                    <td><?=$sent['action']?></td>
                                                    <td><?=$sent['reply']?></td>
                                                    <?php
                                                        // if(!empty($_GET['file'])){
                                                        //     $fileName  = basename($_GET['file']);
                                                        //     $filePath  = 'upload/'.$fileName;

                                                        //     // $file_id = $_GET['file'];
                                                        //     // $sql = "SELECT `attachment` FROM `sent_email` WHERE `attachment`='$file_id' ";
                                                        //     // $sql_result = mysqli_query($conn, $sql);
                                                        //     // $file = mysqli_fetch_assoc($sql_result);

                                                        //     // $filepath = 'upload/'.$file['name'];
                                                            
                                                        //     if(!empty($fileName) && file_exists($filePath)){
                                                        //         //define header
                                                        //         header("Cache-Control: public");
                                                        //         header("Content-Description: File Transfer");
                                                        //         header("Content-Disposition: attachment; filename=$fileName");
                                                        //         header("Content-Type: application/pdf");
                                                        //         header("Content-Transfer-Encoding: binary");
                                                                
                                                        //         //read file 
                                                        //         readfile($filePath);
                                                        //         exit;

                                                        //         // header('Content-Type: application/octet-stream');
                                                        //         // header('Content-Description: File Transfer');
                                                        //         // header('Content-Disposition: filename='.basename($filepath));
                                                        //         // header('Expires: 0');
                                                        //         // header('Cache-Control: must-revalidate');
                                                        //         // header('Pragma:public');

                                                        //         // readfile('upload/'.$file['name']);
                                                        //     }
                                                        //     else{
                                                        //         echo "file not exit";
                                                        //     }
                                                        // }
                                                    ?>
                                                    <td> <a href="sent.php?file=<?php echo $sent['attachment'] ?>"><?= $sent['attachment'] ?></a>
                                                    <td><?=$sent['cc']?></td>
                                                    <td><?= date('M d Y H:i', strtotime($sent['date_reply'])) ?></td>
                                                </tr>

                                            <?php
                                            }
                                        }
                                    ?>
                                    <!-- <tr>
                                        <td>1</td>
                                        <td>Peter Pan</td>
                                        <td>Business Consultation</td>
                                        <td>Pending</td>
                                        <td>2:00 pm</td>
                                        <td>
                                            <button type="button" class="btn tooltip-test" title="Read" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">
                                                <i class="bi bi-bookmark"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="update status">
                                                <i class="bi bi-vector-pen"></i>
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
                                        <th hidden>Client ID/th>
                                        <th hidden>C_email_add</th>
                                        <th>To:</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>Replied</th>
                                        <th>Action</th>
                                        <th>Replied</th>
                                        <th>Attachment</th>
                                        <th>CC</th>
                                        <th>Date Reply</th>
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