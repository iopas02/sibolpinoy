<div class="offcanvas offcanvas-start sidebar-nav pt-5 bg-blue" tabindex="-1" id="sidebar">
    <div class="offcanvas-body p-0">

        <div class="container text-center">
            <div class="text-white">
            <h4 class="text-normal">Welcome!</h4>
            <h2 class="user-text">Juan Dela Cruz</h2>
            <h6 class="text-muted text-small">Admin</h6>
            </div>
        </div>

        <nav class="navbar-dark">
            <ul class="navbar-nav">
                <hr class="dropdown-divider bg-light" />
                <div class="text-muted small fw-bold text-uppercase px-3">
                    CORE
                </div>  
                <li>
                    <a href="landing.php" class="nav-link px-3 text-light text-normal">
                        <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                        <span>Dashboard</span>
                    </a>
                    <a href="404.php" class="nav-link px-3 text-light text-normal">
                        <span class="me-2"><i class="bi bi-people"></i></span>
                        <span>Clients</span>
                    </a>
                </li>
                <hr class="dropdown-divider bg-light" />
                    <div class="text-muted small fw-bold text-uppercase px-3">
                        Email
                    </div>
                    <li>
                        <a href="404.php" class="nav-link px-3 text-light text-normal">
                            <span class="me-2"><i class="bi bi-calendar-check"></i></span>
                            <span>Event Reservation</span>
                        </a>
                        <a href="consultation.php" class="nav-link px-3 text-light text-normal">
                            <span class="me-2"><i class="bi bi-clipboard-check"></i></span>
                            <span>Consultation</span>
                        </a>
                        <a href="inbox.php" class="nav-link px-3 text-light text-normal">
                            <span class="me-2"><i class="bi bi-envelope"></i></span>
                            <span>Inbox</span>
                        </a>
                        <a href="#" class="nav-link px-3 text-light text-normal">
                            <span class="me-2"><i class="bi bi-pencil-square"></i></span>
                            <span>
                                <button type="button" class="bg-transparent border-0 text-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Compose
                                </button>
                            </span>
                        </a>
                        <a href="404.php" class="nav-link px-3 text-light text-normal">
                            <span class="me-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-check" viewBox="0 0 16 16">
                            <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855a.75.75 0 0 0-.124 1.329l4.995 3.178 1.531 2.406a.5.5 0 0 0 .844-.536L6.637 10.07l7.494-7.494-1.895 4.738a.5.5 0 1 0 .928.372l2.8-7Zm-2.54 1.183L5.93 9.363 1.591 6.602l11.833-4.733Z"/>
                            <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
                            </svg></i></span>
                            <span>Sent</span>
                        </a>
                    </li>
                <hr class="dropdown-divider bg-light" />
                <div class="text-muted small fw-bold text-uppercase px-3">
                    Interface and Events
                </div>
                <li>
                    <a href="calender.php" class="nav-link px-3 text-light text-normal">
                            <span class="me-2"><i class="bi bi-calendar4-week"></i></span>
                            <span>Calendar</span>
                    </a>
                    <a href="404.php" class="nav-link px-3 text-light text-normal">
                            <span class="me-2"><i class="bi bi-bar-chart"></i></span>
                            <span>Reports</span>
                    </a>
                    <a href="services.php" class="nav-link px-3 sidebar-link text-light text-normal" >
                        <span class="me-2"><i class="bi bi-tags"></i></span>
                        <span>Services</span>            
                    </a>
                
                    <a href="404.php" class="nav-link px-3 sidebar-link text-light text-normal">
                        <span class="me-2"><i class="bi bi-table"></i></span>
                        <span>Events</span>
                    </a>
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
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal End Here -->