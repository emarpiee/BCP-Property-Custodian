    <main class="container-fluid container-xxl">
        <ul class="topbar m-0 list-unstyled">
            <div class="topbarChild d-flex justify-content-between align-items-center">
                <li class="topBarLogo text-dark">
                    <div class="logo-details d-flex align-items-center">
                        <i class="bx bx-menu rounded-circle" id="btn"></i>
                        <img class="ms-2 ms-sm-3 my-auto" src="../assets/images/bcp-logo.png" width="35" height="35" alt="bcp-logo" />
                        <div class="logo_name text-dark ms-1 ms-sm-3">Property Custodian</div>
                        <!-- <div class="my-auto search-boxContainer d-none d-lg-block">
                            <input type="text" class="form-control search-box" type="search" placeholder="Search..." aria-label="Example text with button addon" aria-describedby="button-addon1" />
                        </div> -->
                    </div>

                    <div class="d-flex align-items-center justify-content-end">
                    <li>
                        <div class="nav-item dropdown my-auto ms-4">
                          <a id="dropdownmenu" class="nav-link d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <h5 class="m-0 d-none d-sm-block"></li>Logged in as <?php echo $accInfo['firstName']." ".$accInfo['lastName']; ?></h5>
                            <img class="ms-0 ms-sm-3" src="../assets/icons/profile-icon.png" width="32" height="32" alt="profile-picture" />
                        </a>
                        <ul class="dropdown-menu border shadow dropdownContainer">
                            <!-- <li><a class="dropdown-item" href="#">Edit Profile</a></li><li><a class="dropdown-item" href="#">Settings</a></li><li><hr class="dropdown-divider" /></li> -->
                            <li>
                              <a class="dropdown-item" href="#">Logout</a>
                          </li>
                      </ul>
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
                <input type="text" placeholder="" disabled  readonly />
                <span class="tooltip"></span>
            </li>
            <!-- DASHBOARD BUTTON -->
            <li>
                <a href="dashboard.php">
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>

            <li>
              <div class="iocn-link arrow">
                <a>
                    <i class="bi bi-send"></i>
                    <span class="links_name">Item Request</span>
                </a>
                <i class="bx bx-chevron-down arrow"></i>
            </div>
            <ul class="sub-menu">
                <li><a href="Request-Consumable.php">REQUEST CONSUMABLE</a></li>
                <li><a href="Request-Non-Consumable.php"> REQUEST NON-CONSUMABLE</a></li>
                <li><a href="Request-Specific.php">SPECIFY REQUEST</a></li>
            </ul>
        </li>

        <li>
          <div class="iocn-link arrow">
            <a>
                <i class="bi bi-box-seam"></i>
                <span class="links_name">Item Records</span>
            </a>
            <i class="bx bx-chevron-down arrow"></i>
        </div>
        <ul class="sub-menu">
            <li><a href="Item-Records.php">CONSUMABLE & NON-CONSUMABLE RECORD</a></li>
            <li><a href="Item-Specific-Records.php">ITEM-SPECIFIC RECORD</a></li>
            <li><a href="t-My-Requests.php">MY REQUESTS</a></li>
            <li><a href="t-My-Specific-Requests.php">MY SPECIFIC REQUESTS</a></li>
        </ul>
    </li>

    <li>
      <div class="iocn-link arrow">
        <a>
         <i class="bi bi-people"></i>
         <span class="links_name">Manage Accounts</span>
     </a>
     <i class="bx bx-chevron-down arrow"></i>
 </div>
 <ul class="sub-menu">
    <li><a href="Account-Records.php">DEPARMENT ACCOUNTS</a></li>
    <li><a href="Add-Department.php">ADD DEPARTMENT</a></li>
    <li><a href="Add-Assistant.php">ADD ASSISTANT</a></li>
</ul>
</li>

<li>
    <a href="Inventory.php">
        <i class="bi bi-box2-heart"></i>
        <span class="links_name">Inventory</span>
    </a>
    <span class="tooltip">Inventory </span>
</li>


<li>
    <a href="OSAS-Facility-Report.php">
        <i class="bi bi-card-checklist"></i>
        <span class="links_name">OSAS Facility Report</span>
    </a>
    <span class="tooltip">OSAS Facility Report</span>
</li>

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

