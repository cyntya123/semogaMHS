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

// include 'config.php';
// error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
// $id_company = base64_decode($_GET['id']);
// $sql  = $conn->query("SELECT * FROM `tb_company` WHERE id_company = $id_company;");
// $data = mysqli_fetch_assoc($sql);

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
        <!-- akhir navbar -->

        <!-- konten -->
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row">
                                        <h4 class="card-title intern-title">Logbook</h4>
                                        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#logbook">
                                            <i class="fa fa-plus"></i>
                                            Add Logbook
                                        </button>
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
                                                        <center>Start Date</center>
                                                    </th>
                                                    <th>
                                                        <center>End Date</center>
                                                    </th>
                                                    <th>
                                                        <center>Details of Activities</center>
                                                    </th>
                                                    <th>
                                                        <center>Documentation</center>
                                                    </th>
                                                    <th>
                                                        <center>Status</center>
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
                                                $view = mysqli_query($conn, "SELECT * FROM tb_logbook WHERE tb_logbook.nim = $nik;");
                                                while ($data = mysqli_fetch_array($view)) {
                                                    // echo "<td>" . (($data['approval_spv'] == 'Yes') && ($data['approval_dpm'] == 'Yes') ? "Yes" : "Pending") . "</td>";
                                                ?>
                                                    <tr>
                                                        <td><?= $data['week_num']; ?></td>
                                                        <td><?= $data['startdate']; ?></td>
                                                        <td><?= $data['enddate'] ?></td>
                                                        <td>
                                                            <center>
                                                                <button type="button" data-toggle='modal' data-target='#modalview<?php echo $data['id_logbook'] ?>' title='View' class='btn btn-secondary' data-original-title='View'>View</button>
                                                            </center>
                                                        </td>
                                                        <td><?= $data['documentation']; ?></td>
                                                        <td>
                                                            <?= ($data['approval_spv'] == 'Yes') && ($data['approval_dpm'] == 'Yes') ? "<span class='badge badge-success'>Yes</span>" : "<span class='badge badge-warning'>Pending</span>"; ?>
                                                        </td>

                                                        <td>
                                                            <div class="form-button-action">
                                                                <a data-toggle='modal' data-target='#modaleditlogbook<?php echo $data['id_logbook'] ?>' title='Edit' class='btn btn-link btn-secondary' data-original-title='Edit'><i class='fa fa-edit fa-lg'></i></a>
                                                                <a data-toggle='modal' data-target='#modaldeletelogbook<?php echo $data['id_logbook'] ?>' title='Delete' class='btn btn-link btn-danger' data-original-title='Delete'><i class='fa fa-times fa-lg'></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <!-- Modal View -->
                                                    <div class="modal fade" id="modalview<?php echo $data['id_logbook'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h3 class="modal-title" id="exampleModalScrollableTitle"><b>Description</b></h3>
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

                                                    <!--Modal Delete-->
                                                    <div class="modal fade" id="modaldeletelogbook<?php echo $data['id_logbook'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure to delete this?
                                                                </div>
                                                                <form action="proses_dummy.php?PageAction=delete_log" method="POST">
                                                                    <input type="hidden" name="id_logbook" value="<?php echo $data['id_logbook'] ?>">
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--Modal edit Student-->
                                                    <div class="modal fade" id="modaleditlogbook<?php echo $data['id_logbook'] ?>" tabindex=" -1" role="dialog" aria-labelledby="modaleditlogbook" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered cascading-modal modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h3 class="modal-title" id="modaleditlogbook">Edit Logbook</h3>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>

                                                                <form class="form-horizontal" action="proses_dummy.php?PageAction=update_logbook" method="POST">
                                                                    <?php
                                                                    $nim = $_SESSION['user_nik'];
                                                                    $select_id = mysqli_query($conn, "SELECT id_internship FROM tb_internship WHERE nim=$nim AND status_intern='YES'");
                                                                    $id_intern = mysqli_fetch_row($select_id);
                                                                    //print_r($id_intern);
                                                                    ?>
                                                                    <input type="hidden" id="token" name="token" class="form-control" value="<?php echo $token; ?>">
                                                                    <input type="hidden" id="id_logbook" name="id_logbook" class="form-control" value="<?php echo $id_logbook; ?>">
                                                                    <input type="hidden" id="id_internship" name="id_internship" class="form-control" value="<?php echo $id_intern[0]; ?>">
                                                                    <input type="hidden" id="nik" name="nim" class="form-control" value="<?php echo $_SESSION['user_nik']; ?>">

                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <div class="form-group">
                                                                                <label>Start Date:</label>
                                                                                <div class="input-group date" data-target-input="nearest">
                                                                                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" id="updatedate" name="start_date">
                                                                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>End Date:</label>
                                                                                <div class="input-group date" data-target-input="nearest">
                                                                                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate1" id="updatedate1" name="end_date">
                                                                                    <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="week">Week</label>
                                                                                <input type="text" name="week_num" id="week_num" class="form-control" id="week_num" aria-describedby="week" placeholder="ex: 1/2/3/etc.">
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="details">Details of Activity</label>
                                                                                <textarea class="form-control" name="description" id="summernote1" aria-describedby="details" cols="50" rows="10" placeholder=""></textarea>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="exampleInputFile">Activity Attachment</label>
                                                                                <div class="input-group">
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" name="documentation" id="documentation">
                                                                                        <label class="custom-file-label" for="exampleInputFile"></label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                                                                            <button type="submit" class="btn btn-secondary btn-sm" name="btn-add" id="btn-save">Done</button>
                                                                            <button type="submit" class="btn btn-danger btn-sm" name="btn-cancel" id="btn-cancel">Cancel</button>
                                                                        </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>


                                    </div>


                                <?php //penutup perulangan while
                                                }
                                ?>
                                <!--End Modal Delete-->
                                </tbody>

                                </table>
                                </div>

                            </div>
                        </div>



                    </div>


                </div>

            </div>

            <!-- Modal Add Logbook -->

            <div class="modal fade" id="logbook" tabindex="-1" role="dialog" aria-labelledby="modallogbook" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered cascading-modal modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modallogbook">Add Logbook</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form class="form-horizontal" action="proses_dummy.php?PageAction=add_log" method="POST">
                            <?php
                            $nim = $_SESSION['user_nik'];
                            $select_id = mysqli_query($conn, "SELECT id_internship FROM tb_internship WHERE nim=$nim AND status_intern='YES'");
                            $id_intern = mysqli_fetch_row($select_id);
                            //print_r($id_intern);
                            ?>
                            <input type="hidden" id="token" name="token" class="form-control" value="<?php echo $token; ?>">
                            <input type="hidden" id="id_logbook" name="id_logbook" class="form-control" value="<?php echo $id_logbook; ?>">
                            <input type="hidden" id="id_internship" name="id_internship" class="form-control" value="<?php echo $id_intern[0]; ?>">
                            <input type="hidden" id="nik" name="nim" class="form-control" value="<?php echo $_SESSION['user_nik']; ?>">

                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Start Date:</label>
                                        <div class="input-group date" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" id="reservationdate" name="start_date" required>
                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>End Date:</label>
                                        <div class="input-group date" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate1" id="reservationdate1" name="end_date" required>
                                            <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="week">Week</label>
                                        <input type="text" name="week_num" id="week_num" class="form-control" id="week_num" aria-describedby="week" placeholder="ex: 1/2/3/etc." required>
                                    </div>

                                    <div class="form-group">
                                        <label for="details">Details of Activity</label>
                                        <textarea class="form-control" name="description" id="summernote" aria-describedby="details" cols="50" rows="10" placeholder="" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputFile">Activity Attachment</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="documentation" id="documentation">
                                                <label class="custom-file-label" for="exampleInputFile"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer border-top-0 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-secondary btn-sm" name="btn-add" id="alert_demo_3_3">Done</button>
                                    <button type="submit" class="btn btn-danger btn-sm" name="btn-cancel" id="btn-cancel">Cancel</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Modal -->

        </div>
    </div>
    <!-- akhir konten -->

    </div>

    <!-- footer -->
    <?php
    include 'footer.php'
    ?>
    <!-- end footer -->


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
    <script>
        $('#summernote').summernote({
            placeholder: 'Details Description ',
            fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
            tabsize: 2,
            height: 150
        });

        $('#summernote1').summernote({
            placeholder: 'Details Description ',
            fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
            tabsize: 2,
            height: 150
        });
    </script>

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
            $(function() {
                //Date picker
                $('#reservationdate').datetimepicker({
                    format: 'YYYY/MM/DD'
                });

                $('#reservationdate1').datetimepicker({
                    format: 'YYYY/MM/DD'
                });

                $('#updatedate').datetimepicker({
                    format: 'YYYY/MM/DD'
                });

                $('#updatedate1').datetimepicker({
                    format: 'YYYY/MM/DD'
                });
            });
        });
    </script>

</body>

</html>