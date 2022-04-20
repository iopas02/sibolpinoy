<?php
    $stats = 'New';

    $count_inbox = "SELECT * FROM `email` WHERE `status`='$stats' ";
    $count_inbox_run = mysqli_query($conn, $count_inbox);
    $result_count = mysqli_num_rows($count_inbox_run);
    if($result_count > 0){
        $add_class = '';
    }else{
        $add_class = 'visually-hidden';
    }

    $count_er = "SELECT * FROM `event_reservation` WHERE `action`='$stats' ";
    $count_er_run = mysqli_query($conn, $count_er);
    $er_count = mysqli_num_rows($count_er_run);
    if($er_count > 0){
        $a_class = '';
    }else{
        $a_class = 'visually-hidden';
    }

    $counter_consult = "SELECT * FROM `consultation` WHERE `action`='$stats' ";
    $counter_consult_run = mysqli_query($conn, $counter_consult);
    $consult_count = mysqli_num_rows($counter_consult_run);
    if($consult_count > 0) {
        $c_class = '';
    }else{
        $c_class = 'visually-hidden';
    }

    $all_count = $result_count + $er_count + $consult_count;
    if($all_count > 0){
        $e_class = '';
    }else{
        $e_class = 'visually-hidden';
    }
?>
<div class="offcanvas offcanvas-start sidebar-nav bg-coloured" id="sidebar">
    <div class="offcanvas-body p-0">

        <div class="container pt-3 text-center">
            <div class="text-white">
            <h4 class="welcome-text">Welcome!</h4>
            <h2 class="user-text"><?= $firstName . " " . $lastName?></h2>
            <h6 class="text-muted text-small"><?= levelCheck($level) ?></h6>
            </div>
        </div>

        <nav class="navbar-dark pb-5">
            <ul class="navbar-nav">
                <hr class="dropdown-divider bg-light" />
                <div class="text-muted small fw-bold text-uppercase px-3">
                    CORE
                </div>  
                <li>
                    <a href="landing" class="nav-link px-3 text-light text-normal">
                        <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                        <span>Dashboard</span>
                    </a>
                    <?php
                        if(isset($_SESSION["level"])){
                            $check_level = $_SESSION["level"];                        
                            if($check_level == '1'){
                                echo ' <a href="admin.con" class="nav-link px-3 text-light text-normal">
                                            <span class="me-2"><i class="bi bi-person-bounding-box"></i></span>
                                            <span>Manage Admin</span>
                                        </a>';
                            }
                        }
                    ?>
                    <a href="clients.record" class="nav-link px-3 text-light text-normal">
                        <span class="me-2"><i class="bi bi-people"></i></span>
                        <span>Clients</span>
                    </a>
                </li>
                <hr class="dropdown-divider bg-light" />
                <div class="text-muted small fw-bold text-uppercase px-3">
                    Messages
                </div>
                <li>
                    <a class="nav-link px-3 text-light text-normal position-relative" data-bs-toggle="collapse" href="#email">
                        <span class="me-2"><i class="bi bi-archive"></i></span>
                            <span>Email 
                                <span class="position-absolute top-0 stranslate-middle badge rounded-pill bg-danger <?= $e_class ?>" style="width: 25px; height: 25px;">
                                <p class="mt-1"><?= $all_count ?></p>
                            </span>
                        </span>
                        
                        <span class="ms-auto">
                            <span class="right-icon mx-4">
                            <i class="bi bi-chevron-down"></i>
                            </span>
                        </span>
                    </a>
                    <div class="collapse" id="email">
                        <ul class="navbar-nav ps-3">
                            <li>       
                                <a href="event.reservation" class="nav-link px-3 text-normal">
                                    <span class="me-1"><i class="bi bi-calendar-check"></i></span>
                                    <span>Event Reservation
                                        <span class="position-absolute stranslate-middle badge bg-danger <?= $a_class ?>" style="width: 20px; height: 15px;">
                                        <p class=""><?= $er_count ?></p>
                                    </span>
                                </a>    
                            </li>
                            <li>
                                <a href="consultation" class="nav-link px-3 text-normal">
                                    <span class="me-1"><i class="bi bi-clipboard-check"></i></span>
                                    <span>Consultation
                                        <span class="position-absolute stranslate-middle badge bg-danger <?= $c_class ?>" style="width: 20px; height: 15px;">
                                        <p class=""><?= $consult_count ?></p>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="inbox" class="nav-link px-3 text-normal position-relative">
                                    <span class="me-1"><i class="bi bi-envelope"></i></span>
                                    <span>Inbox
                                        <span class="position-absolute top-0 stranslate-middle badge bg-danger <?= $add_class ?>"  style="width: 20px; height: 15px;">
                                        <p class=""><?= $result_count ?></p>
                                    </span>
                                </a>
                            </li>
                            <li>         
                                <a href="sent" class="nav-link px-3 text-normal">
                                    <span class="me-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-check" viewBox="0 0 16 16">
                                    <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855a.75.75 0 0 0-.124 1.329l4.995 3.178 1.531 2.406a.5.5 0 0 0 .844-.536L6.637 10.07l7.494-7.494-1.895 4.738a.5.5 0 1 0 .928.372l2.8-7Zm-2.54 1.183L5.93 9.363 1.591 6.602l11.833-4.733Z"/>
                                    <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
                                    </svg></span>
                                    <span>Sent</span>
                                </a>
                            </li>
                        </ul>
                    </div>   
                    <a href="#" class="nav-link px-3 text-light text-normal">
                        <span class="me-2"><i class="bi bi-pencil-square"></i></span>
                        <span>
                            <button type="button" class="bg-transparent border-0 text-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Compose
                            </button>
                        </span>
                    </a>   
                </li>
                <hr class="dropdown-divider bg-light" />
                <div class="text-muted small fw-bold text-uppercase px-3">
                    Interface and Events
                </div>
                <li>
                    <a href="calender" class="nav-link px-3 text-light text-normal">
                            <span class="me-2"><i class="bi bi-calendar4-week"></i></span>
                            <span>Calendar</span>
                    </a>
                    <a href="reports" class="nav-link px-3 text-light text-normal">
                            <span class="me-2"><i class="bi bi-bar-chart"></i></span>
                            <span>Reports</span>
                    </a>
                    <a href="services.tools" class="nav-link px-3 sidebar-link text-light text-normal" >
                        <span class="me-2"><i class="bi bi-tags"></i></span>
                        <span>Services</span>            
                    </a>
                
                    <a href="events" class="nav-link px-3 sidebar-link text-light text-normal">
                        <span class="me-2"><i class="bi bi-table"></i></span>
                        <span>Events</span>
                    </a>
                </li>
                <hr class="dropdown-divider bg-light" />
                <div class="text-muted small fw-bold text-uppercase px-3">
                    Archives
                </div>
                <li>
                    <a class="nav-link px-3  text-light text-normal" data-bs-toggle="collapse" href="#archives">
                        <span class="me-2"><i class="bi bi-archive"></i></span>
                        <span>Archive</span>
                        <span class="ms-auto">
                            <span class="right-icon">
                            <i class="bi bi-chevron-down"></i>
                            </span>
                        </span>
                    </a>
                    <div class="collapse" id="archives">
                        <ul class="navbar-nav ps-3">
                            <li>
                            <?php
                                if(isset($_SESSION["level"])){
                                    $check_level = $_SESSION["level"];                        
                                    if($check_level == '1'){
                                        echo ' <a href="user.archive" class="nav-link px-2 text-normal">
                                        <span class="me-2"><i class="bi bi-person-dash"></i></span>
                                        <span>Admin user</span>
                                    </a>';
                                    }
                                }
                            ?>    
                            </li>
                            <li>
                                <a href="client.archive" class="nav-link px-2 text-normal">
                                    <span class="me-2"><i class="bi bi-person-dash"></i></span>
                                    <span>Client</span>
                                </a>
                            </li>
                            <li>
                                <a href="cr.archive" class="nav-link px-2 text-normal">
                                    <span class="me-2"><i class="bi bi-dash-circle"></i></span>
                                    <span>Consultation Request</span>
                                </a>
                            </li>
                            <li>
                                <a href="er_archive" class="nav-link px-2 text-normal">
                                    <span class="me-2"><i class="bi bi-dash-circle"></i></span>
                                    <span>Event Reservation</span>
                                </a>
                            </li>
                            <li>
                                <a href="services.archive" class="nav-link px-2 text-normal">
                                    <span class="me-2"><i class="bi bi-dash-circle"></i></span>
                                    <span>Services</span>
                                </a>
                            </li>
                            <li>
                                <a href="inbox.archive" class="nav-link px-2 text-normal">
                                    <span class="me-2"><i class="bi bi-file-earmark-minus"></i></span>
                                    <span>Message</span>
                                </a>
                            </li>
                        </ul>
                    </div>    
                </li>
            </ul>
        </nav>
    </div>
</div>

<!-- Modal Start Here -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Compose Message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="comptroller/send.mail.php" method="POST">
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Recipient Name:</label>
                <input type="text" class="form-control" name="recipient_name" required>
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Recipient Email Address:</label>
                <input type="text" class="form-control" name="recipient_email" required>
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Sender Email Address:</label>
                <input type="text" class="form-control" name="companyEmail" required>
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Subject:</label>
                <input type="text" class="form-control" name="subject" required> 
            </div>
            <div class="mb-3">
                <label for="message-text" class="col-form-label">Message:</label>
                <textarea class="form-control" name="message" rows="6" required></textarea>
            </div>
           
            <input type="text" class="form-control" name="adminid" value="<?= $_SESSION["id"] ?>" hidden>
            <input type="text" class="form-control" name="username" value="<?= $_SESSION["username"] ?>" hidden>
            <input type="text" class="form-control" name="action" value="Send Message to client" hidden>
            <button type="submit" class="btn bg-blue text-white" name="send_reply">Send Message</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-coloured text-white" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal End Here -->