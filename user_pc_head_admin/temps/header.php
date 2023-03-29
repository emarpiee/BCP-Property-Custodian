    <main class="container-fluid container-xxl">
        <ul class="topbar m-0 list-unstyled">
            <div class="topbarChild d-flex justify-content-between align-items-center">
                <li class="topBarLogo text-dark">
                    <div class="logo-details d-flex align-items-center">
                        <i class="bx bx-menu rounded-circle" id="btn"></i>
                        <img class="ms-2 ms-sm-3 my-auto" src="../assets/images/bcp-logo.png" width="35" height="35" alt="bcp-logo" />
                        <div class="logo_name text-dark ms-1 ms-sm-3">Property Custodian | Admin</div>
                        <!-- <div class="my-auto search-boxContainer d-none d-lg-block">
                            <input type="text" class="form-control search-box" type="search" placeholder="Search..." aria-label="Example text with button addon" aria-describedby="button-addon1" />
                        </div> -->
                    </div>
                </li>

                <div class="d-flex align-items-center justify-content-end">
                  <li>
                    <div class="nav-item dropdown my-auto ms-4">
                        <h5>Logged in as <?php echo $accInfo['firstName']." ".$accInfo['lastName']; ?></h3>
                        <!-- <a id="dropdownmenu" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                            <i class="bi bi-person-circle ms-0 ms-sm-3" style="width: 32; height: 32;"></i>
                        </a>
                        <ul class="dropdown-menu border shadow dropdownContainer">
                                <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li>
                                    <a class="dropdown-item" href="../logout.php">Logout</a>
                                </li>
                            </ul> -->
                        </div>
                    </li>
                </div>
            </div>
        </ul>
        <div class="px-0 d-xl-flex position-relative d-flex">
            <div class="sidebar close rounded shadow">
                <ul class="nav-list p-0 m-0">
                    <li class="d-block d-lg-none">
                        <i class="bx bx-search"></i>
                        <input type="text" placeholder="Search..." />
                        <span class="tooltip">Search</span>
                    </li>
                    <!-- DASHBOARD BUTTON -->
                    <li>
                        <a>
                            <i class="bx bx-grid-alt"></i>
                            <span class="links_name">Dashboard</span>
                        </a>
                        <span class="tooltip">Dashboard</span>
                    </li>
                    <span class="lineBreak"></span>
                    <li>
                      <div class="iocn-link arrow">
                        <a>
                            <i class="bi bi-send"></i>
                            <span class="links_name">Request an Item</span>
                        </a>
                        <i class="bx bx-chevron-down arrow"></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a href="Request-Item.php">CHECK AVAILABLE ITEM</a></li>
                        <li><a href="Request-Specific-Item.php">SPECIFY REQUEST</a></li>
                    </ul>
                    </li>
                    <li>
                      <div class="iocn-link arrow">
                        <a>
                        <i class="bx bx-package"></i>
                        <span class="links_name">Manage Request</span>
                    </a>
                        <i class="bx bx-chevron-down arrow"></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a href="Item-Records.php">ALL RECORDS</a></li>
                    </ul>
                    <ul class="sub-menu">
                        <li><a href="Pending-Item-Records.php">PENDING REQUESTS</a></li>
                    </ul>
                </li>
                    <li>
                        <a href="#">
                            <i class="bi bi-flag"></i>
                            <span class="links_name">Item Reports</span>
                        </a>
                        <span class="tooltip">Item Reports</span>
                    </li>
                    <span class="lineBreak"></span>
                    <li>
                        <a href="OSAS-Report.php">
                            <i class="bi bi-flag"></i>
                            <span class="links_name">OSAS Facility Report</span>
                        </a>
                        <span class="tooltip">OSAS Facility Report</span>
                    </li>
                    <span class="lineBreak"></span>
                    <li>
            <a href="../logout.php">
                <i class="bi bi-box-arrow-in-left"></i>
                <span class="links_name">Logout</span>
            </a>
            <span class="tooltip">Logout</span>
        </li>
             </ul>
         </div>
         <section class="home-section mx-3 bg-light rounded shadow">
            <div class="container-fluid mt-3">

