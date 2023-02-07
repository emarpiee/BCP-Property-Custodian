<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../style/main.css" />
    <link rel="stylesheet" href="../style/sidebar.css" />
    <link rel="stylesheet" href="../style/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <title>Dashboard</title>
</head>

<body>
    <main class="container-fluid">
        <ul class="topbar m-0 list-unstyled">
            <div class="topbarChild d-flex justify-content-between align-items-center">
                <li class="topBarLogo text-dark">
                    <div class="logo-details d-flex align-items-center">
                        <i class="bx bx-menu rounded-circle" id="btn"></i>
                        <img class="ms-2 ms-sm-3 my-auto" src="../assets/images/bcp-logo.png" width="35" height="35" alt="bcp-logo" />
                        <div class="logo_name text-dark ms-1 ms-sm-3">BESTLINK</div>
                        <div class="my-auto search-boxContainer d-none d-lg-block">
                            <input type="text" class="form-control search-box" type="search" placeholder="Search..." aria-label="Example text with button addon" aria-describedby="button-addon1" />
                        </div>
                    </div>
                </li>
                <div class="d-flex align-items-center justify-content-end">
                    <li>
                        <a href=""><i class="bx bxs-message-dots fs-4 me-3 mt-1 m-0"></i></a>
                        <a href=""><i class="bx bxs-bell fs-4 mt-1 m-0"></i></a>
                    </li>
                    <li>
                        <div class="nav-item dropdown my-auto ms-4">
                            <a id="dropdownmenu" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <h5 class="m-0 d-none d-sm-block">User Name</h5>
                                <img class="ms-0 ms-sm-3" src="../assets/images/man.png" width="32" height="32" alt="profile-picture" />
                            </a>
                            <ul class="dropdown-menu border shadow dropdownContainer">
                                <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
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
                        <input type="text" placeholder="Search..." />
                        <span class="tooltip">Search</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bx bx-grid-alt"></i>
                            <span class="links_name">Dashboard</span>
                        </a>
                        <span class="tooltip">Dashboard</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bx bx-package"></i>
                            <span class="links_name">Item Requests</span>
                        </a>
                        <span class="tooltip">Item Requests</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bx bx-error-circle"></i>
                            <span class="links_name">Item Reports</span>
                        </a>
                        <span class="tooltip">Item Requests</span>
                    </li>
                </ul>
            </div>
            <section class="home-section mx-3 bg-light rounded shadow">
                <div class="container-fluid mt-3">
                    <h2>Welcome to BCP Property Custodian!</h2>
                </div>
            </section>
        </div>
    </main>