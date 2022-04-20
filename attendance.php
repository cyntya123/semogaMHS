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
                                        <h2 class="card-title intern-title"><b>Attendance</b></h2>
                                    </div>
                                </div>

                                <!-- new -->
                                <div class="card-body">
                                    <ul class="nav nav-pills nav-secondary  nav-pills-no-bd nav-pills-icons justify-content-center" id="pills-tab-with-icon" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="pills-home-tab-icon" data-toggle="pill" href="#pills-home-icon" role="tab" aria-controls="pills-home-icon" aria-selected="true">
                                                <i class="flaticon-clock-1"></i><i class="fas fa-briefcase"></i>
                                                <h5 class="mt-2 ml-2 mr-2"><b>Check In</b></h5>
                                            </a>
                                        </li>
                                        <li class="nav-item" onclick="timeNow()">
                                            <a class="nav-link" id="pills-profile-tab-icon" data-toggle="pill" href="#pills-profile-icon" role="tab" aria-controls="pills-profile-icon" aria-selected="false">
                                                <i class="icon-clock"></i> <i class="flaticon-home"></i>
                                                <h5 class="mt-2"><b>Check Out</b></h5>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content mt-2 mb-3" id="pills-with-icon-tabContent">

                                        <!-- cek udah absen atau belum, kalau udah jangan di show  -->
                                        <div class="tab-pane fade show active" id="pills-home-icon" role="tabpanel" aria-labelledby="pills-home-tab-icon">

                                            <!-- form absen masuk -->
                                            <form method="POST" action="proses_dummy.php?PageAction=attendance_checkin">

                                                <?php
                                                $nim = $_SESSION['user_nik'];
                                                $select_id = mysqli_query($conn, "SELECT id_internship FROM tb_internship WHERE nim=$nim AND status_intern='YES'");
                                                $id_intern = mysqli_fetch_row($select_id);
                                                // print_r($id_intern);
                                                // exit();
                                                ?>

                                                <input type="hidden" id="token" name="token" class="form-control" value="<?php echo $token; ?>">
                                                <input type="hidden" id="id_attendance" name="id_attendance" class="form-control" value="<?php echo $id_attendance; ?>">
                                                <input type="hidden" id="id_internship" name="id_internship" class="form-control" value="<?php echo $id_intern[0]; ?>">
                                                <input type="hidden" id="nim" name="nim" class="form-control" value="<?php echo $_SESSION['user_nik']; ?>">

                                                <!-- jenis absensi -->
                                                <div class="form-group">
                                                    <label>Attendance</label>
                                                    <select class="form-control select2" style="width: 100%;" name="type_attendance" id="type_attendance" required>
                                                        <option value>- Select -</option>
                                                        <option value="Present">Present</option>
                                                        <option value="Paid Leave">Paid Leave</option>
                                                        <option value="Unpaid Leave">Unpaid Leave</option>
                                                        <option value="Absent">Absent</option>
                                                    </select>
                                                </div>

                                                <!-- keterangan absensi -->
                                                <div class="form-group">
                                                    <label for="user_fullname">Notes</label>
                                                    <input type="text" class="form-control" name="notes" id="notes" placeholder="">
                                                    <small id="user_fullname" class="form-text text-muted"> *Not present without permission</small>
                                                </div>

                                                <div class="form-group">
                                                    <label>Week</label>
                                                    <input type="text" class="form-control" name="week" id="week" placeholder="ex: 1/2/3/etc." required>
                                                </div>

                                                <div class="modal-footer border-top-0 d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-success btn-sm" name="btn-done" id="btn-done">Save</button>
                                                </div>
                                            </form>
                                            <!-- end form absensi -->

                                        </div>


                                        <!-- cek udah absen atau belum, kalau belum jangan di show  -->
                                        <div class="tab-pane fade" id="pills-profile-icon" role="tabpanel" aria-labelledby="pills-profile-tab-icon">

                                            <!-- form absensi -->
                                            <form method="POST" action="proses_dummy.php?PageAction=attendance_checkout">

                                                <?php
                                                $nim = $_SESSION['user_nik'];
                                                $select_id = mysqli_query($conn, "SELECT id_internship FROM tb_internship WHERE nim=$nim AND status_intern='YES'");
                                                $id_intern = mysqli_fetch_row($select_id);
                                                // print_r($id_intern);
                                                // exit();
                                                ?>

                                                <input type="hidden" id="token" name="token" class="form-control" value="<?php echo $token; ?>">
                                                <input type="hidden" id="id_attendance" name="id_attendance" class="form-control" value="<?php echo $id_attendance; ?>">
                                                <input type="hidden" id="id_internship" name="id_internship" class="form-control" value="<?php echo $id_intern[0]; ?>">
                                                <input type="text" id="nim" name="nim" class="form-control" value="<?php echo $_SESSION['user_nik']; ?>">
                                                <input type="text" id="week" class="form-control" name="week" value="<?php echo $week; ?>">
                                                <input type="text" id="type_attendance" class="form-control" name="type_attendance" value="<?php echo $type_attendance; ?>">

                                                <div class="form-group">
                                                    <label for="time-now">Time</label>
                                                    <input type="text" readonly value="" class="form-control" id="time-now" name="check_out" placeholder="" required>
                                                </div>
                                                <div class="modal-footer border-top-0 d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-success btn-sm" name="done-checkout" id="done-checkout">Save</button>
                                                </div>
                                            </form>
                                            <!-- end form absensi -->

                                        </div>

                                    </div>
                                </div>
                                <!-- end new -->

                            </div>

                            <!-- recap -->
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row">
                                        <h4 class="card-title intern-title">Attendance Recap</h4>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table id="basic-datatables" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <center>Week</center>
                                                    </th>
                                                    <th>
                                                        <center>Present</center>
                                                    </th>
                                                    <th>
                                                        <center>Paid Leave</center>
                                                    </th>
                                                    <th>
                                                        <center>Unpaid Leave</center>
                                                    </th>
                                                    <th>
                                                        <center>Absent</center>
                                                    </th>
                                                    <th>
                                                        <center>Approved</center>
                                                    </th>
                                                    <th style="width: 10px;">
                                                        <center>Action</center>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include 'config.php';
                                                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

                                                $view = mysqli_query($conn, "SELECT * FROM tb_attendance WHERE tb_attendance.nim = $nik GROUP BY tb_attendance.week;");
                                                while ($data = mysqli_fetch_array($view)) {
                                                ?>

                                                    <tr>
                                                        <td>
                                                            <center><?php echo $data['week'] ?></center>
                                                        </td>
                                                        <td>
                                                            <center><?php
                                                                    $week = $data['week'];
                                                                    $query = mysqli_query($conn, "SELECT * FROM tb_attendance WHERE type_attendance = 'Present' AND tb_attendance.nim = $nik AND tb_attendance.week = $week;");
                                                                    $hasil = mysqli_num_rows($query);

                                                                    echo $hasil;
                                                                    ?>
                                                            </center>
                                                        </td>
                                                        <td>
                                                            <center><?php
                                                                    $week = $data['week'];
                                                                    $query = mysqli_query($conn, "SELECT * FROM tb_attendance WHERE type_attendance = 'Paid Leave' AND tb_attendance.nim = $nik AND tb_attendance.week = $week;");
                                                                    $hasil = mysqli_num_rows($query);

                                                                    echo $hasil;
                                                                    ?>
                                                            </center>
                                                        </td>
                                                        <td>
                                                            <center><?php
                                                                    $week = $data['week'];
                                                                    $query = mysqli_query($conn, "SELECT * FROM tb_attendance WHERE type_attendance = 'Unpaid Leave' AND tb_attendance.nim = $nik AND tb_attendance.week = $week;");
                                                                    $hasil = mysqli_num_rows($query);

                                                                    echo $hasil;
                                                                    ?>
                                                            </center>
                                                        </td>
                                                        <td>
                                                            <center><?php
                                                                    $week = $data['week'];
                                                                    $query = mysqli_query($conn, "SELECT * FROM tb_attendance WHERE type_attendance = 'Absent' AND tb_attendance.nim = $nik AND tb_attendance.week = $week;");
                                                                    $hasil = mysqli_num_rows($query);

                                                                    echo $hasil;
                                                                    ?>
                                                            </center>
                                                        </td>

                                                        <td>
                                                            <center>
                                                                <?= ($data['approval_spv'] == 'Yes') && ($data['approval_dpm'] == 'Yes') ? "<span class='badge badge-success'>Yes</span>" : "<span class='badge badge-warning'>Pending</span>"; ?>
                                                            </center>
                                                        </td>
                                                        <td>
                                                            <div class="form-button-action">
                                                                <a href="index.php?page=vattendance&id=<?= $data['id_internship'] ?>&week=<?= $data['week'] ?>" title="Details" class="btn btn-link btn-primary btn-lg" data-original-title="Details">
                                                                    <i class="icon-magnifier"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php //penutup perulangan while
                                                }
                                                ?>
                                            </tbody>

                                        </table>
                                    </div>

                                </div>
                            </div>
                            <!-- end recap -->

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
        <!-- <script src="assets/js/demo.js"></script> -->

        <script>
            $(function() {
                //Date picker
                $('#reservationdate').datetimepicker({
                    format: 'L'
                });
            });
        </script>

        <!-- time check out -->
        <script>
            function timeNow() {
                var currentdate = new Date();

                var datetime =
                    currentdate.getHours() + ":" +
                    currentdate.getMinutes() + ":" +
                    currentdate.getSeconds();

                console.log(datetime);
                return document.getElementById("time-now").value = datetime;
            }
        </script>
    </div>

</body>

</html>