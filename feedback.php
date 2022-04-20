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
    <title>Sistem Pengelolaan Magang Polibatam</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="assets/img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script src="assets/js/core/jquery.3.2.1.min.js"></script>
    <!-- datatable -->
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ['assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
        $(document).ready(function() {
            $('#tabel-data').DataTable();
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/atlantis2.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css">
    <link rel="stylesheet" href="assets/css/me.css">

</head>
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

                <!-- MAIN CONTENT -->
                <!-- Evaluation Parameter -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Evaluation Parameter</h4>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">No</th>
                                                <th>Parameters</th>
                                                <th style="width: 40px">Excellent<br>
                                                    <center>4</center>
                                                </th>
                                                <th style="width: 40px">Good<br>
                                                    <center>3</center>
                                                </th>
                                                <th style="width: 40px">Fair<br>
                                                    <center>2</center>
                                                </th>
                                                <th style="width: 40px">Poor<br>
                                                    <center>1</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1.</td>
                                                <td>The position of the internship according to the field of science</td>
                                                <td class="text-center">
                                                    <input class="form-check-input ml-1" name="k" type="radio">
                                                </td>
                                                <td class="text-center">
                                                    <input class="form-check-input ml-1" name="k" type="radio">
                                                </td>
                                                <td class="text-center">
                                                    <input class="form-check-input ml-1" name="k" type="radio">
                                                </td>
                                                <td class="text-center">
                                                    <input class="form-check-input ml-1" name="k" type="radio">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2.</td>
                                                <td>Knowledge gained on campus can be implemented in an internship</td>
                                                <td class="text-center">
                                                    <input class="form-check-input ml-1" name="k" type="radio">
                                                </td>
                                                <td class="text-center">
                                                    <input class="form-check-input ml-1" name="k" type="radio">
                                                </td>
                                                <td class="text-center">
                                                    <input class="form-check-input ml-1" name="k" type="radio">
                                                </td>
                                                <td class="text-center">
                                                    <input class="form-check-input ml-1" name="k" type="radio">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3.</td>
                                                <td>Gaining new knowledge that is not available on campus</td>
                                                <td class="text-center">
                                                    <input class="form-check-input ml-1" name="k" type="radio">
                                                </td>
                                                <td class="text-center">
                                                    <input class="form-check-input ml-1" name="k" type="radio">
                                                </td>
                                                <td class="text-center">
                                                    <input class="form-check-input ml-1" name="k" type="radio">
                                                </td>
                                                <td class="text-center">
                                                    <input class="form-check-input ml-1" name="k" type="radio">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4.</td>
                                                <td>Get data from internships used for Internship or TA</td>
                                                <td class="text-center">
                                                    <input class="form-check-input ml-1" name="k" type="radio">
                                                </td>
                                                <td class="text-center">
                                                    <input class="form-check-input ml-1" name="k" type="radio">
                                                </td>
                                                <td class="text-center">
                                                    <input class="form-check-input ml-1" name="k" type="radio">
                                                </td>
                                                <td class="text-center">
                                                    <input class="form-check-input ml-1" name="k" type="radio">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                    </div>
                </div>

                <!-- Overall Comments -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Impressions and Messages on the internship</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>1. Impression of the Internship:</label>
                                        <textarea class="form-control" rows="3" placeholder=""></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>2. Obstacles When Internships:</label>
                                        <textarea class="form-control" rows="3" placeholder=""></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>3. Suggestions for Politeknik Negeri Batam:</label>
                                        <textarea class="form-control" rows="3" placeholder=""></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-accept">SUBMIT</button>

                                <!-- Modal Accept -->
                                <div class="modal fade" id="modal-accept" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Are you sure
                                                    have filled in correctly?
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn-sm btn-success" data-dismiss="modal">Yes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal Accept -->
                            </div>
                    </div>
                    </form>
                </div>
                <!--End Overall Comments -->


                <!-- /.card-body -->
            </div>
            <!-- END MAIN CONTENT -->
        </div>
    </div>

    <!--Footer -->
    <footer class="footer">
        <div class="container">
            <nav class="pull-left">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
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
    <!--End Footer-->
</div>


<!--   Core JS Files   -->

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

<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

<script>
    // Add Row
    $('#add-row').DataTable({
        "pageLength": 5,
    });

    var action =
        '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

    $('#addRowButton').click(function() {
        $('#add-row').dataTable().fnAddData([
            $("#addName").val(),
            $("#addPosition").val(),
            $("#addOffice").val(),
            action
        ]);
        $('#addRowModal').modal('hide');

    });
</script>

</body>

</html>