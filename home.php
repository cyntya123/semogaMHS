<?php
//Mengkoneksikan dengan Database
include 'config.php';

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
    <title>Sistem Pengelolaan Magang</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="Logo SEMOGA/SEMOGA_logogram White.png" type="image/x-icon" />

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

    <!-- calender -->

    <link href='/assets/demo-to-codepen.css' rel='stylesheet' />


    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 1100px;
            margin: 40px auto;
        }
    </style>



    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>
    <script src='/assets/demo-to-codepen.js'></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'dayGridMonth,timeGridWeek,timeGridDay custom1',
                    center: 'title',
                    right: 'custom2 prevYear,prev,next,nextYear'
                },
                footerToolbar: {
                    left: 'custom1,custom2',
                    center: '',
                    right: 'prev,next'
                },
                customButtons: {
                    custom1: {
                        text: 'custom 1',
                        click: function() {
                            alert('clicked custom button 1!');
                        }
                    },
                    custom2: {
                        text: 'custom 2',
                        click: function() {
                            alert('clicked custom button 2!');
                        }
                    }
                }
            });

            calendar.render();
        });
    </script>

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
                    <div class="row ml-auto mr-auto mt-3">

                        <!-- card pendaftaran magang -->
                        <div class="col-6 col-sm-4 col-lg-2">
                            <div class="card">

                                <div class="card-body p-3 text-center"><a href="index.php?page=registration">
                                        <span class="stamp stamp-md bg-success m-0" data-toggle="modal" data-target="#registration">
                                            <i class="fa fa-file-alt"></i>
                                        </span>
                                        <div class="mb-3 mt-2"><b> Registration </b></div>
                                </div>
                            </div>
                        </div>
                        <!-- /card pendaftaran magang -->

                        <!-- card absensi -->
                        <div class="col-6 col-sm-4 col-lg-2">
                            <div class="card">
                                <div class="card-body p-3 text-center"><a href="index.php?page=attendance">
                                        <span class="stamp stamp-md bg-warning m-0">
                                            <i class="far fa-calendar-check"></i>
                                        </span>
                                        <div class="mb-3 mt-2"><b>Attendance</b></div>
                                </div>
                            </div>
                        </div>
                        <!-- /card absensi -->

                        <!-- card logbook -->
                        <div class="col-6 col-sm-4 col-lg-2">
                            <div class="card">
                                <div class="card-body p-3 text-center"><a href="index.php?page=logbook">
                                        <span class="stamp stamp-md bg-secondary m-0">
                                            <i class="fa fa-book-open"></i>
                                        </span>
                                        <div class="mb-3 mt-2"><b>Logbook</b></div>
                                </div>
                            </div>
                        </div>
                        <!-- /card logbook -->

                        <!-- card laporan akhir magang -->
                        <div class="col-6 col-sm-4 col-lg-2">
                            <div class="card">
                                <div class="card-body p-3 text-center"><a href="index.php?page=finalreport">
                                        <span class="stamp stamp-md bg-danger m-0">
                                            <i class="fa fa-book"></i>
                                        </span>
                                        <div class="mb-3 mt-2"><b>Final Report</b></div>
                                </div>
                            </div>
                        </div>
                        <!-- /card laporan akhir magang -->

                        <!-- card umpan balik -->
                        <div class="col-6 col-sm-4 col-lg-2">
                            <div class="card">
                                <div class="card-body p-3 text-center"><a href="index.php?page=feedback">
                                        <span class="stamp stamp-md bg-warning m-0">
                                            <i class="far fa-comments"></i>
                                        </span>
                                        <div class="mb-3 mt-2"><b>Feedback</b></div>
                                </div>
                            </div>
                        </div>
                        <!-- /card umpan balik -->

                        <!-- coming soon -->
                        <div class="col-6 col-sm-4 col-lg-2">
                            <div class="card">
                                <div class="card-body p-3 text-center"><a href="#">
                                        <span class="stamp stamp-md bg-success m-0">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </span>
                                        <div class="mb-3 mt-2"><b>Coming Soon</b></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /coming soon -->
                    </div>
                </div>

                <!-- isi bagian dibawah menu fitur -->
                <div class="page-inner mt--1">

                    <!-- tampilan identitas -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-space">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-md-5">
                                            <div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd nav-pills-icons" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <img class="card-img" src="assets/img/home.jpg">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 ">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade active show" id="v-pills-home-icons" role="tabpanel" aria-labelledby="v-pills-home-tab-icons">
                                                    <div class="accordion accordion-secondary">
                                                        <div class="card">
                                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                                <div class="card-body">
                                                                    <h5 class="card-title"><b>
                                                                            <center>Internship Data</center>
                                                                        </b></h5>
                                                                    <hr>
                                                                    <?php
                                                                    include 'config.php';
                                                                    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                                                                    $nim = $_SESSION['user_nik'];
                                                                    $data = mysqli_query($conn, "SELECT i.id_company, i.nik, i.id_user_company, c.company_name, c.address, c.phone, l.name_lecturer, l.user_phone, u.user_fullname, u.user_phone
                                                                    FROM tb_internship i 
                                                                    LEFT JOIN tb_company c ON i.id_company = c.id_company
                                                                    LEFT JOIN tb_lecturer l ON i.nik = l.nik
                                                                    LEFT JOIN tb_user_company u ON i.id_user_company = u.id_user_company
                                                                    WHERE i.nim = $nim AND i.status_intern='YES'");

                                                                    while ($view = mysqli_fetch_array($data)) {
                                                                    ?>
                                                                        <table>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="30%">Company</td>
                                                                                    <td>:&nbsp;&nbsp;</td>
                                                                                    <td><?= $view['company_name'] ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Company Address</td>
                                                                                    <td>:&nbsp;&nbsp;</td>
                                                                                    <td><?= $view['address'] ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Company Phone</td>
                                                                                    <td>:&nbsp;&nbsp;</td>
                                                                                    <td><?= $view['phone'] ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Supervisor</td>
                                                                                    <td>:&nbsp;&nbsp;</td>
                                                                                    <td><?= $view['user_fullname'] ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Supervisor Phone</td>
                                                                                    <td>:&nbsp;&nbsp;</td>
                                                                                    <td><?= $view['user_phone'] ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Lecturer</td>
                                                                                    <td>:&nbsp;&nbsp;</td>
                                                                                    <td><?= $view['name_lecturer'] ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Lecturer Phone</td>
                                                                                    <td>:&nbsp;&nbsp;</td>
                                                                                    <td><?= $view['user_phone'] ?></td>
                                                                                </tr>

                                                                            <?php
                                                                        }

                                                                            ?>
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
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row">
                                        <div class="card-title">Recap Attendance</div>
                                        <div class="card-tools">
                                            <a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2">
                                                <span class="btn-label">
                                                    <i class="fa fa-pencil"></i>
                                                </span>
                                                Export
                                            </a>
                                            <a href="#" class="btn btn-info btn-border btn-round btn-sm">
                                                <span class="btn-label">
                                                    <i class="fa fa-print"></i>
                                                </span>
                                                Print
                                            </a>
                                        </div>
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
                        </div>
                        <!-- <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header card-primary">
                                        <div class="card-title">Calender</div>
                                    </div>
                                    <div class="card-body">
                                        <div id="calendar">
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                    </div>

                    <div class="row row-card-no-pd">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row">
                                        <div class="card-title">Discussion</div>
                                        <div class="card-tools">
                                            <ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm" id="pills-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pills-today" data-toggle="pill" href="#pills-today" role="tab" aria-selected="true">Today</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="pills-week" data-toggle="pill" href="#pills-week" role="tab" aria-selected="false">Week</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pills-month" data-toggle="pill" href="#pills-month" role="tab" aria-selected="false">Month</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="avatar avatar-online">
                                                <span class="avatar-title rounded-circle border border-white bg-info">J</span>
                                            </div>
                                            <div class="flex-1 ml-3 pt-1">
                                                <h6 class="text-uppercase fw-bold mb-1">Joko Subianto <span class="text-warning pl-3">pending</span></h6>
                                                <span class="text-muted">I am facing some trouble with my viewport. When i start my</span>
                                            </div>
                                            <div class="float-right pt-1">
                                                <small class="text-muted">8:40 PM</small>
                                            </div>
                                        </div>
                                        <div class="separator-dashed"></div>
                                        <div class="d-flex">
                                            <div class="avatar avatar-offline">
                                                <span class="avatar-title rounded-circle border border-white bg-secondary">P</span>
                                            </div>
                                            <div class="flex-1 ml-3 pt-1">
                                                <h6 class="text-uppercase fw-bold mb-1">Prabowo Widodo <span class="text-success pl-3">open</span></h6>
                                                <span class="text-muted">I have some query regarding the license issue.</span>
                                            </div>
                                            <div class="float-right pt-1">
                                                <small class="text-muted">1 Day Ago</small>
                                            </div>
                                        </div>
                                        <div class="separator-dashed"></div>
                                        <div class="d-flex">
                                            <div class="avatar avatar-away">
                                                <span class="avatar-title rounded-circle border border-white bg-danger">L</span>
                                            </div>
                                            <div class="flex-1 ml-3 pt-1">
                                                <h6 class="text-uppercase fw-bold mb-1">Lee Chong Wei <span class="text-muted pl-3">closed</span></h6>
                                                <span class="text-muted">Is there any update plan for RTL version near future?</span>
                                            </div>
                                            <div class="float-right pt-1">
                                                <small class="text-muted">2 Days Ago</small>
                                            </div>
                                        </div>
                                        <div class="separator-dashed"></div>
                                        <div class="d-flex">
                                            <div class="avatar avatar-offline">
                                                <span class="avatar-title rounded-circle border border-white bg-secondary">P</span>
                                            </div>
                                            <div class="flex-1 ml-3 pt-1">
                                                <h6 class="text-uppercase fw-bold mb-1">Peter Parker <span class="text-success pl-3">open</span></h6>
                                                <span class="text-muted">I have some query regarding the license issue.</span>
                                            </div>
                                            <div class="float-right pt-1">
                                                <small class="text-muted">2 Day Ago</small>
                                            </div>
                                        </div>
                                        <div class="separator-dashed"></div>
                                        <div class="d-flex">
                                            <div class="avatar avatar-away">
                                                <span class="avatar-title rounded-circle border border-white bg-danger">L</span>
                                            </div>
                                            <div class="flex-1 ml-3 pt-1">
                                                <h6 class="text-uppercase fw-bold mb-1">Logan Paul <span class="text-muted pl-3">closed</span></h6>
                                                <span class="text-muted">Is there any update plan for RTL version near future?</span>
                                            </div>
                                            <div class="float-right pt-1">
                                                <small class="text-muted">2 Days Ago</small>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="company" class="col-md-12">
                            <div class="card full-height">
                                <div class="card-header">
                                    <div class="card-title">List Company</div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="company-datatables" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <center>Company</center>
                                                    </th>
                                                    <th>
                                                        <center>Address</center>
                                                    </th>
                                                    <th>
                                                        <center>Telephone</center>
                                                    </th>
                                                    <th>
                                                        <center>Website</center>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include 'config.php';
                                                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                                                $view = mysqli_query($conn, "SELECT * FROM tb_company");
                                                while ($data = mysqli_fetch_array($view)) {
                                                ?>
                                                    <tr>
                                                        <td><?= $data['company_name']; ?></td>
                                                        <td><?= $data['address']; ?></td>
                                                        <td><?= $data['phone'] ?></td>
                                                        <td><?= $data['website'] ?></td>
                                                    </tr>

                                                <?php //penutup perulangan while
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- list offer -->
                        <div id="offer" class="col-md-12">
                            <div class="card full-height">
                                <div class="card-header">
                                    <div class="card-head-row">
                                        <div class="card-title">List Internship Offer</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="offer-datatables" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <center>Company</center>
                                                    </th>
                                                    <th>
                                                        <center>Address</center>
                                                    </th>
                                                    <th>
                                                        <center>Telephone</center>
                                                    </th>
                                                    <th>
                                                        <center>Position</center>
                                                    </th>
                                                    <th>
                                                        <center>Jobdesk</center>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include 'config.php';
                                                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                                                $view = mysqli_query($conn, "SELECT * FROM tb_offer LEFT JOIN tb_company ON tb_offer.id_company = tb_company.id_company");
                                                while ($data = mysqli_fetch_array($view)) {
                                                ?>
                                                    <tr>
                                                        <td><?= $data['company_name']; ?></td>
                                                        <td><?= $data['address']; ?></td>
                                                        <td><?= $data['phone'] ?></td>
                                                        <td><?= $data['position'] ?></td>
                                                        <td>
                                                            <center>
                                                                <button type="button" data-toggle='modal' data-target='#modalview<?php echo $data['id_offer'] ?>' title='View' class='btn btn-secondary' data-original-title='View'>View</button>
                                                            </center>
                                                        </td>
                                                    </tr>

                                                    <!-- Modal View -->
                                                    <div class="modal fade" id="modalview<?php echo $data['id_offer'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h3 class="modal-title" id="exampleModalScrollableTitle"><b>Job Description</b></h3>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body px-0">
                                                                    <div style="overflow-y: hidden; height: calc(100vh - 15rem);">
                                                                        <div class="px-2" style="overflow-y: auto; height: 100%;">
                                                                            <?= $data['description'] ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                <?php //penutup perulangan while
                                                }
                                                ?>
                                            </tbody>

                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>


                <!-- akhir konten -->




                <a class="diskusi" href="diskusi.php" style="text-decoration: none; color: white; cursor: pointer;">
                    <span><i class="far fa-comments my-float"></i></span>
                </a>

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
                $('#basic-datatables').DataTable({
                    "scrollY": "200px"

                });
                $('#company-datatables').DataTable({
                    "scrollY": "200px"

                });
                $('#offer-datatables').DataTable({
                    "scrollY": "200px"

                });

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

        <script>
            /* initialize the calendar
		-----------------------------------------------------------------*/
            $(document).ready(function() {
                var date = new Date();
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();
                var className = Array('fc-primary', 'fc-danger', 'fc-black', 'fc-success', 'fc-info', 'fc-warning', 'fc-danger-solid', 'fc-warning-solid', 'fc-success-solid', 'fc-black-solid', 'fc-success-solid', 'fc-primary-solid');

                $calendar = $('#calendar');
                $calendar.fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay,listWeek'
                    },
                    selectable: true,
                    selectHelper: true,
                    select: function(start, end) {

                        // on select we show the Sweet Alert modal with an input
                        swal({
                            title: 'Create an Event',
                            html: '<br><input class="form-control" placeholder="Event Title" id="input-field">',
                            content: {
                                element: "input",
                                attributes: {
                                    placeholder: "Event Title",
                                    type: "text",
                                    id: "input-field",
                                    className: "form-control"
                                },
                            },
                            buttons: {
                                cancel: true,
                                confirm: true,
                            },
                        }).then(
                            function() {
                                var eventData;
                                var classRandom = className[Math.floor(Math.random() * className.length)];
                                event_title = $('#input-field').val();

                                if (event_title) {
                                    eventData = {
                                        title: event_title,
                                        start: start,
                                        className: classRandom,
                                        end: end
                                    };
                                    $calendar.fullCalendar('renderEvent', eventData, true); // stick? = true
                                }

                                $calendar.fullCalendar('unselect');
                            }
                        );
                    },
                    events: [{
                            title: 'All Day Event',
                            start: new Date(y, m, 1),
                            className: 'fc-black'
                        },
                        {
                            id: 999,
                            title: 'Repeating Event',
                            start: new Date(y, m, d - 3, 16, 0),
                            allDay: false,
                            className: 'fc-warning'
                        },
                        {
                            id: 999,
                            title: 'Repeating Event',
                            start: new Date(y, m, d + 4, 16, 0),
                            allDay: false,
                            className: 'fc-info'
                        },
                        {
                            title: 'Meeting',
                            start: new Date(y, m, d, 10, 30),
                            allDay: false,
                            className: 'fc-danger'
                        },
                        {
                            title: 'Lunch',
                            start: new Date(y, m, d, 12, 0),
                            end: new Date(y, m, d, 14, 0),
                            allDay: false,
                            className: 'fc-primary',
                            description: 'Eat Bro'
                        },
                        {
                            title: 'Meeting',
                            start: new Date(y, m, d + 3, 13, 30),
                            allDay: false,
                            className: 'fc-primary-solid',
                            description: 'Meeting'
                        },
                        {
                            title: 'Birthday Party',
                            start: new Date(y, m, d + 1, 19, 0),
                            end: new Date(y, m, d + 1, 22, 30),
                            allDay: false,
                            className: 'fc-success',
                            description: 'Coba Googling dulu'
                        },
                        {
                            title: 'Lunch',
                            start: new Date(y, m, d + 6, 13, 30),
                            allDay: false,
                            className: 'fc-success-solid',
                            description: 'Lunch'
                        },
                        {
                            title: 'Click for Google',
                            start: new Date(y, m, 28),
                            end: new Date(y, m, 29),
                            allDay: false,
                            url: 'http://google.com/',
                            className: 'fc-info-solid',
                        }
                    ],


                });
            });
        </script>

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




        <?php
        include 'footer.php'
        ?>

</body>

</html>