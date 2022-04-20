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
                    <div class="row row-card-no-pd">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row">
                                        <h4 class="card-title intern-title"><b>Final Report</b></h4>
                                    </div>
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabel-data" class="table table-bordered table-striped" style="margin-left: -12px;">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <center>Date</center>
                                                </th>
                                                <th>
                                                    <center>File Final Report</center>
                                                </th>
                                                <th style="width: 10px;">
                                                    <center> Action</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include 'config.php';
                                            error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                                            $view = mysqli_query($conn, "SELECT * FROM tb_internship WHERE tb_internship.nim = $nik;");
                                            while ($data = mysqli_fetch_array($view)) {

                                            ?>
                                                <td>
                                                    <center><?= $data['date_finalreport']; ?></center>
                                                </td>
                                                <td><?= $data['finalreport']; ?></td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a data-toggle='modal' data-target='#modaleditlogbook<?php echo $data['id_logbook'] ?>' title='Edit' class='btn btn-link btn-secondary' data-original-title='Edit'><i class='fa fa-edit fa-lg'></i></a>
                                                        <a data-toggle='modal' data-target='#modaldeletelogbook<?php echo $data['id_logbook'] ?>' title='Delete' class='btn btn-link btn-danger' data-original-title='Delete'><i class='fa fa-times fa-lg'></i></a>
                                                    </div>
                                                </td>
                                            <?php
                                            }
                                            ?>

                                            <!-- <tr>
                                                <td></td>
                                                <td></td>
                                                <td style="width: 20%;">
                                                    <center>
                                                        <button type="button" id="" title="Edit" class="btn btn-link btn-warning" data-original-title="View">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button type="button" id="" title="Remove" class="btn btn-link btn-warning" data-original-title="View">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </center>
                                                </td>
                                            </tr> -->

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- akhir konten -->

                    </div>
                    <div class="card">

                        <div class="card-header">
                            <div class="card-title"><b>Upload File</b></div>
                        </div>

                        <div class="card-body" style="height: 30%;">
                            <form method="POST" action="proses_dummy.php?PageAction=finalreport">

                                <div class="dropzone">
                                    <div class="dz-message" data-dz-message>
                                        <div class="icon">
                                            <i class="flaticon-file"></i>
                                        </div>
                                        <h4 class="message">Drag and Drop files here</h4>
                                        <div class="note">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</div>
                                    </div>
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                </div>
                            </form>



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
                    format: 'YYYY/MM/DD'
                });
            });
        </script>
</body>

</html>