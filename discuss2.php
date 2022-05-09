<?php
include 'config.php';

session_start();
if (!$_SESSION['user_nik']) {
    echo "
	<script>
		alert('YOU ARE NOT LOGIN!');
		window.location.replace('index.php?page=login');
	</script>
              ";
}
$nik = $_SESSION['user_nik'];
$nama = $_SESSION['nama'];
$token = $_SESSION['token'];
$id_offer =  mysqli_real_escape_string($conn, $_POST['id_offer']);

// session_unset();
// session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Sistem Informasi Pengelolaan Magang</title>
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
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands", "simple-line-icons"
                ],
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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

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

        <!-- Main Content -->
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">

                    <!--Discussion-->
                    <div class="row row-card-no-pd">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <?php

                                    $id_diskusi = $_GET['id_discuss'];

                                    $query = mysqli_query($conn, "SELECT * FROM tb_discussion WHERE id_discuss='$id_diskusi'");

                                    while ($data = mysqli_fetch_assoc($query)) {
                                        // print_r($data);


                                    ?>
                                        <div class="card-head-row">
                                            <h4 class="card-title"><b><?= $data['title'] ?></b></h4>
                                            <div class="card-tools">
                                            </div>
                                        </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive table-hover table-sales">
                                                <table class="table">
                                                    <tbody>
                                                        <div class="card-header" style="display: flex; flex-direction:column;">
                                                            <div class="icon">
                                                                <p class="row ml-2" style="float: left;"><i class="fas fa-user-circle fa-2x ml-auto"></i> &nbsp;
                                                                    <?= $data['started_by'] ?></p>
                                                            </div><br>
                                                            <div class="text pl-5">
                                                                <p class="text-left"><?= $data['discuss'] ?></p>
                                                            </div>
                                                        </div>
                                                    <?php
                                                }
                                                    ?>
                                                    </tbody>
                                                </table>
                                                <a class="btn btn-primary text-white col-md-12" data-toggle="modal" data-target="#modal1"><b>GIVE
                                                        COMMENTS</b></a><br><br>
                                                <!--Modal Give Comments-->
                                                <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog  modal-dialog-centered modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 class="modal-title"><b>Give Comment</b></h3>
                                                                <form action="proses_dummy.php?PageAction=add_comment" method="post">
                                                                    <button class="btn btn-primary btn-round ml-auto text-white">
                                                                        <i class="fas fa-paper-plane"></i> Send
                                                                    </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- <div id="summernote"></div> -->
                                                                <input hidden type="text" name="id_diskusi" value="<?= $_GET['id_discuss'] ?>">
                                                                <label class="mb-2" for="">Comment</label>
                                                                <center>
                                                                    <textarea name="komentar" id="" class="w-100 form-control" rows="10" placeholder="Write some comment . . ."></textarea>
                                                                </center>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End Modal Give Comments-->

                                            </div>
                                            <tbody>
                                                <?php

                                                $id_diskusi = $_GET['id_discuss'];
                                                $query = mysqli_query($conn, "SELECT * FROM tb_comment_discussion WHERE id_discuss='$id_diskusi'");

                                                while ($data = mysqli_fetch_assoc($query)) {
                                                    // print_r($data);

                                                ?>
                                                    <div class="card-header mt-2">
                                                        <div class="icon mt-4"><i class="fas fa-user-circle fa-2x"></i>
                                                            <?= $data['replied_by'] ?>
                                                        </div><br>
                                                        <div style="text-align: justify;">
                                                            <p><?= $data['comment'] ?></p>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </tbody><br>
                                            <!-- <tbody>
                                                <div class="card-header">
                                                    <div class="icon"><i class="fas fa-user-circle fa-2x"></i>
                                                        Komaruddin (Supervisor)
                                                    </div><br>
                                                    <div style="text-align: justify;">
                                                        <p>Benar, jika sudah selesai membuat untuk satu bulan, maka
                                                            kumpulkan pada saya untuk di acc.</p>
                                                    </div>
                                                </div>
                                            </tbody> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Discussion-->
                </div>
                <!--page inner-->
            </div>
            <!--container-->
        </div>
        <!--main-panel-->
        <!-- End Main Content -->

        <!-- Footer -->
        <footer style="background-color: white; padding: 10px; border-top: 1px solid #eee; padding-top: 20px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 my-auto" style="display: flex; flex-direction: row;">
                        <a href="">
                            <img src="assets/img/ILO1.png" height="50" alt="navbar brand" class="">
                        </a>
                        <a href="#" class="logo d-flex align-items-center">
                            <img src="assets/img/Indonesia.png" style="margin-left: 12px;" height="50" alt="navbar brand" class="">
                        </a>
                        <a href="#" class="logo d-flex align-items-center">
                            <img src="assets/img/BEJ.png" height="70" alt="navbar brand" class="">
                        </a>
                    </div>
                    <div class="col-md-5"></div>
                    <div class="col-md-3">
                        <div class="copyright ml-auto">
                            2021, made with <i class="fa fa-heart heart text-danger"></i> by <a href="#">PSTeam</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" />

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

        //Summer Note
        $('#summernote').summernote({
            placeholder: '',
            fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Times New Roman'],
            tabsize: 2,
            height: 300
        });
    </script>

</body>

</html>