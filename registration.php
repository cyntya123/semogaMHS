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

    <!-- css forum diskusi -->
    <link rel="stylesheet" href="assets/css/me.css">
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
                                        <div class="card-title intern-title ml-3"><b> Registration </b></div>
                                        <button class="btn btn-primary btn-round ml-auto mr-2" data-toggle="modal" data-target="#jalur">
                                            <i class="fas fa-plus"></i>
                                            Registration
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <!-- Modal Document Detail -->
                                    <div class="modal fade" id="jalur" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="exampleModalLongTitle"><b>This internship opportunity is obtained through collaboration/independent pathways?</b></h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- button cta -->
                                                    <div class="row">
                                                        <div class="col-sm-6 p-2">
                                                            <a href="index.php?page=formkerjasama" class="btn btn-primary" style="width: 100%;">Cooperation</a>
                                                        </div>
                                                        <div class="col-sm-6 p-2">
                                                            <a href="index.php?page=formnonkerjasama" class="btn btn-warning" style="width: 100%;">Independent</a>
                                                        </div>
                                                    </div>
                                                    <!-- end button cta -->
                                                </div>
                                                <div class="modal-footer">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal -->

                                    <div class="table-responsive">
                                        <table id="basic-datatables" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <center>
                                                        <th>Company/Institution</th>
                                                        <th>Address Company/Institution</th>
                                                        <th>Phone Number</th>
                                                        <th>Job Description</th>
                                                        <th>Start Date Intern</th>
                                                        <th>End Date Intern</th>
                                                        <th>Internship Period</th>
                                                        <th>College transcripts Files</th>
                                                        <th>Curriculum Vitae Files</th>
                                                        <th>Additional Files</th>
                                                        <th>Approved</th>
                                                    </center>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include 'config.php';
                                                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                                                $view = mysqli_query($conn, "SELECT * FROM tb_internship
                                                LEFT JOIN tb_company ON tb_internship.id_company = tb_company.id_company
                                                LEFT JOIN tb_job_description ON tb_internship.id_internship = tb_job_description.id_internship
                                                WHERE tb_internship.nim = $nik;");
                                                while ($data = mysqli_fetch_array($view)) {
                                                    ?>
                                                    <tr>
                                                        <td><?= $data['company_name']; ?></td>
                                                        <td><?= $data['address']; ?></td>
                                                        <td><?= $data['phone']; ?></td>
                                                        <td><?= $data['description_jobdesc']; ?></td>
                                                        <td><?= $data['start_date']; ?></td>
                                                        <td><?= $data['end_date']; ?></td>
                                                        <td><?= $data['internship_period']; ?></td>
                                                        <td><?= $data['file1']; ?></td>
                                                        <td><?= $data['file2']; ?></td>
                                                        <td><?= $data['file3']; ?></td>
                                                        <td>
                                                            <?= $data['status_intern'] == 'YES' ? "<span class='badge badge-success'>Yes</span>" : "<span class='badge badge-info'>Pending</span>"; ?>
                                                        </td>

                                                    </tr>
                                            

                                                <?php
                                                }
                                                ?>


                                                <!-- <tr>
                                                    <td>PT. TEC Indonesia</td>
                                                    <td>Baloi Permai, Batam City, Riau Islands 29444, Indonesia</td>
                                                    <td>(0778) 463688</td>
                                                    <td>1 January 2021</td>
                                                    <td>1 August 2021</td>
                                                    <td>8 Month</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>Cooperation Track</td>
                                                    <td>
                                                        <center>
                                                            <p class="text-danger">No</p>
                                                        </center>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>PT. Panasonic Industrial Devices Batam</td>
                                                    <td>Baloi Permai, Batam City, Riau Islands 29444, Indonesia</td>
                                                    <td>(0778) 463688</td>
                                                    <td>1 September 2021</td>
                                                    <td>1 May 2022</td>
                                                    <td>8 Month</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>Cooperation Path</td>
                                                    <td>
                                                        <center>
                                                            <p class="text-success">Yes</p>
                                                        </center>
                                                    </td>
                                                </tr> -->
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
    <!-- akhir konten -->
    </div>


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
</body>

</html>