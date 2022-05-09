<div class="main-header" data-background-color="purple">
    <div class="nav-top">
        <div class="container d-flex flex-row">
            <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="icon-menu"></i>
                </span>
            </button>
            <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
            <!-- Logo Header -->
            <a href="index.php?page=home" class="logo d-flex align-items-center">
                <img src="Logo SEMOGA/SEMOGA2.png" height="50" alt="navbar brand" class="navbar-brand">
            </a>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg p-0">

                <div class="container-fluid p-0">
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

                        <li class="nav-item toggle-nav-search hidden-caret">
                            <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                        <div class="title-name mt-2 mr-2" style="color: white;">
                            <h5><b>Hi, <?php echo $_SESSION['nama'] ?></b></h5>
                        </div>

                        <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link dropdown-toggle" href="index.php?page=logout" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-sign-out-alt" title="Logout"></i>
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
    <!-- navbot -->
    <div class="nav-bottom">
        <div class="container">
            <h3 class="title-menu d-flex d-lg-none">
                Menu
                <div class="close-menu"> <i class="flaticon-cross"></i></div>
            </h3>
            <ul class="nav page-navigation page-navigation-secondary bg-white">

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="link-icon icon-user"></i>
                        <span class="menu-title">Profile</span>
                    </a>
                </li>
                <li class="nav-item submenu">
                    <a class="nav-link" href="#">
                        <i class="link-icon icon-grid"></i>
                        <span class="menu-title">Internship Registration</span>
                    </a>
                    <div class="navbar-dropdown animated fadeIn">
                        <ul>
                            <li>
                                <a href="index.php?page=formkerjasama">Cooperation Track</a>
                            </li>
                            <li>
                                <a href="index.php?page=formnonkerjasama">Independent Track</a>
                            </li>
                            <li>
                                <a href="registration.php">Registration History</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item submenu">
                    <a class="nav-link" href="#">
                        <i class="link-icon flaticon-agenda-1"></i>
                        <span class="menu-title">Assignment</span>
                    </a>
                    <div class="navbar-dropdown animated fadeIn">
                        <ul>
                            <li>
                                <a href="index.php?page=attendance">Attendance List</a>
                            </li>
                            <li>
                                <a href="index.php?page=logbook">Logbook</a>
                            </li>
                            <li>
                                <a href="index.php?page=finalreport">Final Report</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item submenu">
                    <a class="nav-link" href="#">
                        <i class="link-icon icon-list"></i>
                        <span class="menu-title">List</span>
                    </a>
                    <div class="navbar-dropdown animated fadeIn">
                        <ul>
                            <li>
                                <a href="index.php?page=home#company">Company List</a>
                            </li>
                            <li>
                                <a href="index.php?page=home#offer">Internship Offer List</a>
                            </li>
                        </ul>
                    </div>

                </li>
                <li class="nav-item submenu">
                    <a class="nav-link" href="#">
                        <i class="link-icon icon-pie-chart"></i>
                        <span class="menu-title">Other</span>
                    </a>
                    <div class="navbar-dropdown animated fadeIn">
                        <ul>
                            <li>
                                <a href="index.php?page=feedback">Industry Feedback</a>
                            </li>
                            <li>
                                <a href="index.php?page=conversations">Communication</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- end navbot -->

</div>