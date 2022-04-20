<?php
include "config.php";

session_start();
if (!$_SESSION['user_nik']) {
    header("Location: index.php?page=login");
}
$nik = $_SESSION['user_nik'];
$nama = $_SESSION['nama'];
$token = $_SESSION['token'];
$id_offer =  mysqli_real_escape_string($conn, $_POST['id_offer']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Atlantis Bootstrap 4 Admin Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="assets/img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/atlantis2.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css">
    <link rel="stylesheet" href="assets/css/me.css">


    <!-- Datatables -->
    <script src="assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- daterange picker -->
    <link rel="stylesheet" href="assets/njs/plugins/daterangepicker/daterangepicker.css">
</head>

<body>
    <div class="wrapper horizontal-layout-2">
        <!-- navbar -->
        <?php
        include 'header.php'
        ?>
        <!-- end navbar -->

        <!-- konten -->
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row">
                                        <h4 class="card-title intern-title">Detail Logbook</h4>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table id="basic-datatables" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <center>No</center>
                                                    </th>
                                                    <th>
                                                        <center>Company</center>
                                                    </th>
                                                    <th>
                                                        <center>Address Company</center>
                                                    </th>
                                                    <th>
                                                        <center>Phone Number</center>
                                                    </th>
                                                    <th>
                                                        <center>Mentor</center>
                                                    </th>
                                                    <th>
                                                        <center>Position</center>
                                                    </th>
                                                    <th>
                                                        <center>Phone Number</center>
                                                    </th>
                                                    <th>
                                                        <center>Date</center>
                                                    </th>
                                                    <th>
                                                        <center>Details of Activities</center>
                                                    </th>
                                                    <th>
                                                        <center>Activity Attachment</center>
                                                    </th>
                                                    <th>
                                                        <center>Status</center>
                                                    </th>
                                                    <th>
                                                        <center>Action</center>
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tfoot>
                                                <tr>
                                                    <th>
                                                        <center>No</center>
                                                    </th>
                                                    <th>
                                                        <center>Company</center>
                                                    </th>
                                                    <th>
                                                        <center>Address Company</center>
                                                    </th>
                                                    <th>
                                                        <center>Phone Number</center>
                                                    </th>
                                                    <th>
                                                        <center>Mentor</center>
                                                    </th>
                                                    <th>
                                                        <center>Position</center>
                                                    </th>
                                                    <th>
                                                        <center>Phone Number</center>
                                                    </th>
                                                    <th>
                                                        <center>Date</center>
                                                    </th>
                                                    <th>
                                                        <center>Details of Activities</center>
                                                    </th>
                                                    <th>
                                                        <center>Activity Attachment</center>
                                                    </th>
                                                    <th>
                                                        <center>Status</center>
                                                    </th>
                                                    <th>
                                                        <center>Action</center>
                                                    </th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>PT. Panasonic Industrial Devices Batam</td>
                                                    <td>Baloi Permai, Batam City, Riau Islands 29444, Indonesia</td>
                                                    <td>(0778) 463688</td>
                                                    <td>Supardianto, S.ST., M.Eng.</td>
                                                    <td>Pembimbing Magang</td>
                                                    <td>123456780</td>
                                                    <td>10/11/2020</td>
                                                    <td>Konten kreator, Videographer, Fotographer</td>
                                                    <td>"upload lampiran berupa pdf"</td>
                                                    <td>
                                                        <center>
                                                            <p class="text-success">Yes</p>
                                                        </center>
                                                    </td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <button type="button" data-toggle="modal" title="Edit" data-target="#modal-edit" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                                                <i class="fa fa-edit fa-lg"></i>
                                                            </button>
                                                            <button type="button" id="alert_demo_7" title="Delete" class="btn btn-link btn-danger" data-original-title="Delete">
                                                                <i class="fa fa-times fa-lg"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>PT. Panasonic Industrial Devices Batam</td>
                                                    <td>Baloi Permai, Batam City, Riau Islands 29444, Indonesia</td>
                                                    <td>(0778) 463688</td>
                                                    <td>Supardianto, S.ST., M.Eng.</td>
                                                    <td>Pembimbing Magang</td>
                                                    <td>123456780</td>
                                                    <td>10/11/2020</td>
                                                    <td>Konten kreator, Videographer, Fotographer</td>
                                                    <td>"upload lampiran berupa pdf"</td>
                                                    <td>
                                                        <center>
                                                            <p class="text-success">Yes</p>
                                                        </center>
                                                    </td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <button type="button" data-toggle="modal" title="Edit" data-target="#modal-edit" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                                                <i class="fa fa-edit fa-lg"></i>
                                                            </button>
                                                            <button type="button" id="alert_demo_7" title="Delete" class="btn btn-link btn-danger" data-original-title="Delete">
                                                                <i class="fa fa-times fa-lg"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>PT. Panasonic Industrial Devices Batam</td>
                                                    <td>Baloi Permai, Batam City, Riau Islands 29444, Indonesia</td>
                                                    <td>(0778) 463688</td>
                                                    <td>Supardianto, S.ST., M.Eng.</td>
                                                    <td>Pembimbing Magang</td>
                                                    <td>123456780</td>
                                                    <td>10/11/2020</td>
                                                    <td>Konten kreator, Videographer, Fotographer</td>
                                                    <td>"upload lampiran berupa pdf"</td>
                                                    <td>
                                                        <center>
                                                            <p class="text-primary" style="width: 70px;">Request</p>
                                                        </center>
                                                    </td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <button type="button" data-toggle="modal" title="Edit" data-target="#modal-edit" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                                                <i class="fa fa-edit fa-lg"></i>
                                                            </button>
                                                            <button type="button" id="alert_demo_7" title="Delete" class="btn btn-link btn-danger" data-original-title="Delete">
                                                                <i class="fa fa-times fa-lg"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>

                                        </table>
                                    </div>

                                </div>
                            </div>



                        </div>


                    </div>

                </div>
            </div>

        </div>
        <!-- akhir konten -->

    </div>

    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <nav class="pull-left">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link">
                            <br>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">

                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">

                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright ml-auto">
                2021, made with <i class="fa fa-heart heart text-danger"></i> by <a href="#">PSTeam</a>
            </div>
        </div>
    </footer>
    <!-- end footer -->

    <div class="quick-sidebar">
        <a href="#" class="close-quick-sidebar">
            <i class="flaticon-cross"></i>
        </a>
        <div class="quick-sidebar-wrapper">
            <ul class="nav nav-tabs nav-line nav-color-secondary" role="tablist">
                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#messages" role="tab" aria-selected="true">Messages</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tasks" role="tab" aria-selected="false">Tasks</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-selected="false">Settings</a> </li>
            </ul>
            <div class="tab-content mt-3">
                <div class="tab-chat tab-pane fade show active" id="messages" role="tabpanel">
                    <div class="messages-contact">
                        <div class="quick-wrapper">
                            <div class="quick-scroll scrollbar-outer">
                                <div class="quick-content contact-content">
                                    <span class="category-title mt-0">Contacts</span>
                                    <div class="avatar-group">
                                        <div class="avatar">
                                            <img src="assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                        </div>
                                        <div class="avatar">
                                            <img src="assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                        </div>
                                        <div class="avatar">
                                            <img src="assets/img/mlane.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                        </div>
                                        <div class="avatar">
                                            <img src="assets/img/talha.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                        </div>
                                        <div class="avatar">
                                            <span class="avatar-title rounded-circle border border-white">+</span>
                                        </div>
                                    </div>
                                    <span class="category-title">Recent</span>
                                    <div class="contact-list contact-list-recent">
                                        <div class="user">
                                            <a href="#">
                                                <div class="avatar avatar-online">
                                                    <img src="assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                                </div>
                                                <div class="user-data">
                                                    <span class="name">Jimmy Denis</span>
                                                    <span class="message">How are you ?</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="user">
                                            <a href="#">
                                                <div class="avatar avatar-offline">
                                                    <img src="assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                                </div>
                                                <div class="user-data">
                                                    <span class="name">Chad</span>
                                                    <span class="message">Ok, Thanks !</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="user">
                                            <a href="#">
                                                <div class="avatar avatar-offline">
                                                    <img src="assets/img/mlane.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                                </div>
                                                <div class="user-data">
                                                    <span class="name">John Doe</span>
                                                    <span class="message">Ready for the meeting today with...</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <span class="category-title">Other Contacts</span>
                                    <div class="contact-list">
                                        <div class="user">
                                            <a href="#">
                                                <div class="avatar avatar-online">
                                                    <img src="assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                                </div>
                                                <div class="user-data2">
                                                    <span class="name">Jimmy Denis</span>
                                                    <span class="status">Online</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="user">
                                            <a href="#">
                                                <div class="avatar avatar-offline">
                                                    <img src="assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                                </div>
                                                <div class="user-data2">
                                                    <span class="name">Chad</span>
                                                    <span class="status">Active 2h ago</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="user">
                                            <a href="#">
                                                <div class="avatar avatar-away">
                                                    <img src="assets/img/talha.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                                </div>
                                                <div class="user-data2">
                                                    <span class="name">Talha</span>
                                                    <span class="status">Away</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="messages-wrapper">
                        <div class="messages-title">
                            <div class="user">
                                <div class="avatar avatar-offline float-right ml-2">
                                    <img src="assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                </div>
                                <span class="name">Chad</span>
                                <span class="last-active">Active 2h ago</span>
                            </div>
                            <button class="return">
                                <i class="flaticon-left-arrow-3"></i>
                            </button>
                        </div>
                        <div class="messages-body messages-scroll scrollbar-outer">
                            <div class="message-content-wrapper">
                                <div class="message message-in">
                                    <div class="avatar avatar-sm">
                                        <img src="assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                    </div>
                                    <div class="message-body">
                                        <div class="message-content">
                                            <div class="name">Chad</div>
                                            <div class="content">Hello, Rian</div>
                                        </div>
                                        <div class="date">12.31</div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-content-wrapper">
                                <div class="message message-out">
                                    <div class="message-body">
                                        <div class="message-content">
                                            <div class="content">
                                                Hello, Chad
                                            </div>
                                        </div>
                                        <div class="message-content">
                                            <div class="content">
                                                What's up?
                                            </div>
                                        </div>
                                        <div class="date">12.35</div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-content-wrapper">
                                <div class="message message-in">
                                    <div class="avatar avatar-sm">
                                        <img src="assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                    </div>
                                    <div class="message-body">
                                        <div class="message-content">
                                            <div class="name">Chad</div>
                                            <div class="content">
                                                Thanks
                                            </div>
                                        </div>
                                        <div class="message-content">
                                            <div class="content">
                                                When is the deadline of the project we are working on ?
                                            </div>
                                        </div>
                                        <div class="date">13.00</div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-content-wrapper">
                                <div class="message message-out">
                                    <div class="message-body">
                                        <div class="message-content">
                                            <div class="content">
                                                The deadline is about 2 months away
                                            </div>
                                        </div>
                                        <div class="date">13.10</div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-content-wrapper">
                                <div class="message message-in">
                                    <div class="avatar avatar-sm">
                                        <img src="assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                    </div>
                                    <div class="message-body">
                                        <div class="message-content">
                                            <div class="name">Chad</div>
                                            <div class="content">
                                                Ok, Thanks !
                                            </div>
                                        </div>
                                        <div class="date">13.15</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="messages-form">
                            <div class="messages-form-control">
                                <input type="text" placeholder="Type here" class="form-control input-pill input-solid message-input">
                            </div>
                            <div class="messages-form-tool">
                                <a href="#" class="attachment">
                                    <i class="flaticon-file"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tasks" role="tabpanel">
                    <div class="quick-wrapper tasks-wrapper">
                        <div class="tasks-scroll scrollbar-outer">
                            <div class="tasks-content">
                                <span class="category-title mt-0">Today</span>
                                <ul class="tasks-list">
                                    <li>
                                        <label class="custom-checkbox custom-control checkbox-secondary">
                                            <input type="checkbox" checked="" class="custom-control-input"><span class="custom-control-label">Planning new project structure</span>
                                            <span class="task-action">
                                                <a href="#" class="link text-danger">
                                                    <i class="flaticon-interface-5"></i>
                                                </a>
                                            </span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="custom-checkbox custom-control checkbox-secondary">
                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Create the main structure </span>
                                            <span class="task-action">
                                                <a href="#" class="link text-danger">
                                                    <i class="flaticon-interface-5"></i>
                                                </a>
                                            </span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="custom-checkbox custom-control checkbox-secondary">
                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Add new Post</span>
                                            <span class="task-action">
                                                <a href="#" class="link text-danger">
                                                    <i class="flaticon-interface-5"></i>
                                                </a>
                                            </span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="custom-checkbox custom-control checkbox-secondary">
                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Finalise the design proposal</span>
                                            <span class="task-action">
                                                <a href="#" class="link text-danger">
                                                    <i class="flaticon-interface-5"></i>
                                                </a>
                                            </span>
                                        </label>
                                    </li>
                                </ul>

                                <span class="category-title">Tomorrow</span>
                                <ul class="tasks-list">
                                    <li>
                                        <label class="custom-checkbox custom-control checkbox-secondary">
                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Initialize the project </span>
                                            <span class="task-action">
                                                <a href="#" class="link text-danger">
                                                    <i class="flaticon-interface-5"></i>
                                                </a>
                                            </span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="custom-checkbox custom-control checkbox-secondary">
                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Create the main structure </span>
                                            <span class="task-action">
                                                <a href="#" class="link text-danger">
                                                    <i class="flaticon-interface-5"></i>
                                                </a>
                                            </span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="custom-checkbox custom-control checkbox-secondary">
                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Updates changes to GitHub </span>
                                            <span class="task-action">
                                                <a href="#" class="link text-danger">
                                                    <i class="flaticon-interface-5"></i>
                                                </a>
                                            </span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="custom-checkbox custom-control checkbox-secondary">
                                            <input type="checkbox" class="custom-control-input"><span title="This task is too long to be displayed in a normal space!" class="custom-control-label">This task is too long to be displayed in a normal space! </span>
                                            <span class="task-action">
                                                <a href="#" class="link text-danger">
                                                    <i class="flaticon-interface-5"></i>
                                                </a>
                                            </span>
                                        </label>
                                    </li>
                                </ul>

                                <div class="mt-3">
                                    <div class="btn btn-primary btn-rounded btn-sm">
                                        <span class="btn-label">
                                            <i class="fa fa-plus"></i>
                                        </span>
                                        Add Task
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="settings" role="tabpanel">
                    <div class="quick-wrapper settings-wrapper">
                        <div class="quick-scroll scrollbar-outer">
                            <div class="quick-content settings-content">

                                <span class="category-title mt-0">General Settings</span>
                                <ul class="settings-list">
                                    <li>
                                        <span class="item-label">Enable Notifications</span>
                                        <div class="item-control">
                                            <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                        </div>
                                    </li>
                                    <li>
                                        <span class="item-label">Signin with social media</span>
                                        <div class="item-control">
                                            <input type="checkbox" data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                        </div>
                                    </li>
                                    <li>
                                        <span class="item-label">Backup storage</span>
                                        <div class="item-control">
                                            <input type="checkbox" data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                        </div>
                                    </li>
                                    <li>
                                        <span class="item-label">SMS Alert</span>
                                        <div class="item-control">
                                            <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                        </div>
                                    </li>
                                </ul>

                                <span class="category-title mt-0">Notifications</span>
                                <ul class="settings-list">
                                    <li>
                                        <span class="item-label">Email Notifications</span>
                                        <div class="item-control">
                                            <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                        </div>
                                    </li>
                                    <li>
                                        <span class="item-label">New Comments</span>
                                        <div class="item-control">
                                            <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                        </div>
                                    </li>
                                    <li>
                                        <span class="item-label">Chat Messages</span>
                                        <div class="item-control">
                                            <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                        </div>
                                    </li>
                                    <li>
                                        <span class="item-label">Project Updates</span>
                                        <div class="item-control">
                                            <input type="checkbox" data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                        </div>
                                    </li>
                                    <li>
                                        <span class="item-label">New Tasks</span>
                                        <div class="item-control">
                                            <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery UI -->
    <script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Moment JS -->
    <script src="assets/js/plugin/moment/moment.min.js"></script>

    <!-- Chart JS -->
    <script src="assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="assets/js/plugin/datatables/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#basic-datatables').DataTable({});
        });
    </script>

    <!-- Bootstrap Notify -->
    <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- Bootstrap Toggle -->
    <script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
    <script src="assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

    <!-- Google Maps Plugin -->
    <script src="assets/js/plugin/gmaps/gmaps.js"></script>

    <!-- Dropzone -->
    <script src="assets/js/plugin/dropzone/dropzone.min.js"></script>

    <!-- Fullcalendar -->
    <script src="assets/js/plugin/fullcalendar/fullcalendar.min.js"></script>

    <!-- DateTimePicker -->
    <script src="assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>

    <!-- Bootstrap Tagsinput -->
    <script src="assets/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

    <!-- Bootstrap Wizard -->
    <script src="assets/js/plugin/bootstrap-wizard/bootstrapwizard.js"></script>

    <!-- jQuery Validation -->
    <script src="assets/js/plugin/jquery.validate/jquery.validate.min.js"></script>

    <!-- Summernote -->
    <script src="assets/js/plugin/summernote/summernote-bs4.min.js"></script>

    <!-- Select2 -->
    <script src="assets/js/plugin/select2/select2.full.min.js"></script>

    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Atlantis JS -->
    <script src="assets/js/atlantis2.min.js"></script>

    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>

    <script>
        $(function() {
            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });
        });
    </script>

    <!-- sweetalert -->
    <script>
        //== Class definition
        var SweetAlert2Demo = function() {
            $('#alert_demo_7').click(function(e) {
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    buttons: {
                        confirm: {
                            text: 'Yes, delete it!',
                            className: 'btn btn-success'
                        },
                        cancel: {
                            visible: true,
                            className: 'btn btn-danger'
                        }
                    }
                }).then((Delete) => {
                    if (Delete) {
                        swal({
                            title: 'Deleted!',
                            text: 'Your file has been deleted.',
                            type: 'success',
                            buttons: {
                                confirm: {
                                    className: 'btn btn-success'
                                }
                            }
                        });
                    } else {
                        swal.close();
                    }
                });
            });
            return {
                //== Init
                init: function() {
                    initDemos();
                },
            };
        }();

        //== Class Initialization
        jQuery(document).ready(function() {
            SweetAlert2Demo.init();
        });
    </script>


</body>

</html>