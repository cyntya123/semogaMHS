<?php
include "config.php";

session_start();
if (!$_SESSION['user_nik']) {
    header("Location: index.php?page=login");
}
$nik = $_SESSION['user_nik'];
$nama = $_SESSION['nama'];
$token = $_SESSION['token'];


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
                        <div class="wizard-container wizard-round col-md-9">
                            <div class="wizard-header text-center">
                                <h3 class="wizard-title"><b>Registration</b> Internship</h3>
                                <small>Independent</small>
                            </div>
                            <form method="POST" action="proses_dummy.php?PageAction=regist2" enctype="multipart/form-data">
                                <input type="hidden" id="token" name="token" value="<?php echo $token; ?>">
                                <div class="wizard-body">
                                    <div class="row">

                                        <ul class="wizard-menu nav nav-pills nav-secondary">
                                            <li class="step" style="width: 33.3333%;">
                                                <a class="nav-link active" href="#about" data-toggle="tab" aria-expanded="true"><i class="fa fa-user mr-0"></i> About</a>
                                            </li>
                                            <li class="step" style="width: 33.3333%;">
                                                <a class="nav-link" href="#account" data-toggle="tab"><i class="flaticon-mailbox"></i>Internship request</a>
                                            </li>
                                            <li class="step" style="width: 33.3333%;">
                                                <a class="nav-link" href="#address" data-toggle="tab"><i class="fa fa-file mr-2"></i> attachment</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="about">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4 class="info-text">I, the undersigned below :</h4> <br>
                                                </div>
                                                <div class="col-md-8 ml-auto mr-auto">
                                                    <div class="form-group">
                                                        <label>Student ID :</label>
                                                        <input name="nim" readonly type="number" class="form-control" id="nim" required="required" value="<?php echo $nik ?>">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="tab-pane" id="account">
                                            <h4 class="info-text">will apply for an internship at the company: </h4>
                                            <div class="row">
                                                <div class="col-md-8 ml-auto mr-auto">
                                                    <div class="form-group">
                                                        <label>Company Name :</label>
                                                        <input name="company_name" type="text" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Address :</label>
                                                        <textarea name="address" type="text" class="form-control" required></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Telephone Number :</label>
                                                        <input name="phone" type="number" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Internship Period (Month)</label>
                                                        <input name="internship_period" type="number" class="form-control" autocomplete="off" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Internship Start Date</label>
                                                        <div class="input-group date" data-target-input="nearest">
                                                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" id="reservationdate" name="start_date" required>
                                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Internship End Date</label>
                                                        <div class="input-group date" data-target-input="nearest">
                                                            <input type="text" class="form-control datetimepicker-input" name="end_date" data-target="#reservationdate1" id="reservationdate1" required>
                                                            <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Job Description</label>
                                                        <textarea name="description_jobdesc" type="text" class="form-control" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="address">
                                            <h4 class="info-text">Attachment for Internship</h4>
                                            <div class="row">
                                                <div class="col-sm-8 ml-auto mr-auto">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">Transcript of college grades</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                                                <label class="custom-file-label" for="exampleInputFile"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">Curriculum Vitae (CV)</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                                                <label class="custom-file-label" for="exampleInputFile"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">Additional Files</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                                                <label class="custom-file-label" for="exampleInputFile"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="wizard-action">
                                    <div class="pull-left">
                                        <input type="button" class="btn btn-previous btn-fill btn-black" name="previous" value="Previous">
                                    </div>
                                    <div class="pull-right">
                                        <input type="button" class="btn btn-next btn-danger" name="next" value="Next">
                                        <input type="submit" class="btn btn-finish btn-danger" name="finish" value="Finish" style="display: none;">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer -->
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
        <!-- end footer -->
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
        // Code for the Validator
        var $validator = $('.wizard-container form').validate({
            validClass: "success",
            highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            },
            success: function(element) {
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            }
        });
    </script>
    <script>
        $(function() {
            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'YYYY/MM/DD'
            });
        })

        $(function() {
            //Date picker
            $('#reservationdate1').datetimepicker({
                format: 'YYYY/MM/DD'
            });
        });
    </script>

</body>

</html>