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
                                        <h4 class="card-title intern-title ml-4 mt-2"><b>Details Attendance</b></h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="attendance-datatables" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <center>Week</center>
                                                    </th>
                                                    <th>
                                                        <center>Date</center>
                                                    </th>
                                                    <th>
                                                        <center>Check In</center>
                                                    </th>
                                                    <th>
                                                        <center>Check Out</center>
                                                    </th>
                                                    <th>
                                                        <center>Attendance Status</center>
                                                    </th>
                                                    <th>
                                                        <center>Description</center>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
													<?php
													include 'config.php';
													error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
													$week = $_GET['week'];
													$query = mysqli_query($conn, "SELECT * FROM tb_attendance WHERE week = $week;");
													while ($data = mysqli_fetch_array($query)) {
													?>
													<tr>
														<td><center><?php echo $data['week'] ?></center></td>
														<td><center><?php echo $data['date'] ?></center></td>
														<td><center><?php echo $data['check_in'] ?></center></td>
														<td><center><?php echo $data['check_out'] ?></center></td>
														<td><center><?php echo $data['type_attendance'] ?></center></td>
                                                        <td><center><?php echo $data['description'] ?></center></td>
													</tr>

													<!--Menutup Perulangan While-->
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

                <!-- Modal edit attendance -->
                <div class="modal fade" id="jalur" tabindex="-1" role="dialog" aria-labelledby="modaladdspv" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered cascading-modal modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modaladdspv">Edit Attendance</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Date:</label>
                                        <div class="input-group date" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" id="reservationdate" />
                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="user_fullname">Time In</label>
                                        <input type="text" class="form-control" id="user_fullname" placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="department">Time Out</label>
                                        <input type="text" class="form-control" id="department" placeholder="" required>
                                    </div>
                                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                                        <button type="button" class="btn btn-success" id="alert_demo_3_3"> Success</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->
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
            $('#attendance-datatables').DataTable({
                "paging": false,
                "info": false
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

    <!-- DateTimePicker -->
    <script src="assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>
    <script>
        $(function() {
            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });
        });
    </script>

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

    <!-- sweetalaert -->
    <script>
        //== Class definition
        var SweetAlert2Demo = function() {
            $('#alert_demo_3_3').click(function(e) {
                swal("Good job!", "You clicked the button!", {
                    icon: "success",
                    buttons: {
                        confirm: {
                            className: 'btn btn-success'
                        }
                    },
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