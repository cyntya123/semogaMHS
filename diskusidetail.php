<?php
include 'config.php';

session_start();
if($_SESSION['login_status'] != 'login'){
	echo "
	<script>
		alert('YOU ARE NOT LOGIN!');
		window.location.replace('index.php?page=login');
	</script>
              "; 
			}
$user = $_SESSION['user_fullname'];
$id_company = $_SESSION['id_company'];
$role = $_SESSION['user_type'];
$user_id = $_SESSION['id_user_company'];
$username = $_SESSION['username'];
$name = $_SESSION['user_fullname'];
$token = $_SESSION['token'];

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
            active: function () {
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

        <div class="main-header" data-background-color="purple">
            <div class="nav-top">
                <div class="container d-flex flex-row">
                    <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                        data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <i class="icon-menu"></i>
                        </span>
                    </button>
                    <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                    <!-- Logo SEMOGA -->
                    <a href="index.php?page=spv-home" class="logo d-flex align-items-center">
                        <img src="assets/img/profile1.png" height="60" alt="navbar brand" class="navbar-brand">
                    </a>
                    <!-- End Logo SEMOGA -->

                    <!-- Navbar Header -->
					<nav class="navbar navbar-header navbar-expand-lg p-0">

<div class="container-fluid p-0">
    <div class="collapse" id="search-nav">
        <form class="navbar-left navbar-form nav-search ml-md-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <button type="submit" class="btn btn-search pr-1">
                        <i class="fa fa-search search-icon"></i>
                    </button>
                </div>
                <input type="text" placeholder="Search ..." class="form-control">
            </div>
        </form>
    </div>
    <!-- gatau fungsinya untuk apa -->
    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
        <li class="nav-item toggle-nav-search hidden-caret">
            <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                <i class="fa fa-search"></i>
            </a>
        </li>
        <div class="title-name mt-2 text-white">
            <h5><b>Hi, <?php echo $user; ?></b></h5>
        </div>
        <li class="nav-item dropdown hidden-caret">
            <div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
                <div class="quick-actions-scroll scrollbar-outer">
                </div>
            </div>
        </li>
        <!-- end gatau fungsinya untuk apa -->
        <!-- Profil -->
        <!-- <li class="nav-item dropdown hidden-caret">
            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                <div class="avatar-sm">
                    <img src="assets/img/Ulan.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
            </a>
        </li> -->
        <li class="nav-item dropdown hidden-caret">
            <a class="nav-link dropdown-toggle" href="index.php?page=logout" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-sign-out-alt" title="Logout"></i>
            </a>
        </li>
        <!-- End Profil -->
    </ul>
</div>
</nav>
<!-- End Navbar -->
                </div>
            </div>

            <!-- Menu -->
			<div class="nav-bottom">
				<div class="container">
					<ul class="nav page-navigation page-navigation-secondary bg-white">
						<li class="nav-item submenu">
							<a class="nav-link" href="#">
								<i class="link-icon icon-book-open"></i>
								<span class="menu-title">Profile</span>
							</a>
							<div class="navbar-dropdown animated fadeIn">
								<ul>
									<li>
										<a href="index.php?page=spv-profile">My Profile</a>
									</li>
									<li>
										<a href="index.php?page=spv-company-profile">Company Profile</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item submenu">
							<a class="nav-link" href="index.php?page=spv-studentlist">
								<i class="link-icon icon-layers"></i>
								<span class="menu-title">Student Internship</span>
							</a>
						</li>
						<li class="nav-item submenu">
							<a class="nav-link" href="index.php?page=spv-logbook">
								<i class="link-icon icon-folder-alt"></i>
								<span class="menu-title">Internship Files</span>
							</a>
						</li>
						<li class="nav-item submenu">
							<a class="nav-link" href="index.php?page=spv-tutorial">
								<i class="link-icon icon-screen-desktop"></i>
								<span class="menu-title">Tutorial</span>
							</a>
						</li>
						<li class="nav-item submenu">
							<a class="nav-link" href="index.php?page=spv-information">
								<i class="link-icon icon-question"></i>
								<span class="menu-title">Information</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<!-- End Menu -->
        </div>

        <!-- Main Content -->
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">

                    <!--Discussion-->
                    <div class="row row-card-no-pd">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row">
                                        <h4 class="card-title"><b>Pembuatan Logbook</b></h4>
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
                                                        <div class="card-header">
                                                            <div class="icon"><i
                                                                    class="fas fa-user-circle fa-2x ml-auto"></i>
                                                                Cyntya Maharani (Student)
                                                            </div><br>
                                                            <div style="text-align: justify;">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                    elit, sed do eiusmod tempor incididunt ut labore et
                                                                    dolore magna aliqua. Etiam erat velit scelerisque in
                                                                    dictum non. Nunc eget lorem dolor sed viverra ipsum
                                                                    nunc aliquet bibendum. Ornare arcu odio ut sem
                                                                    nulla. Egestas quis ipsum suspendisse ultrices
                                                                    gravida dictum fusce ut placerat. Purus ut faucibus
                                                                    pulvinar elementum integer enim neque. Aliquam ut
                                                                    porttitor leo a diam sollicitudin tempor. Leo urna
                                                                    molestie at elementum eu facilisis sed odio morbi.
                                                                    Viverra mauris in aliquam sem fringilla ut. Nunc sed
                                                                    blandit libero volutpat sed cras ornare arcu.</p>
                                                            </div>
                                                        </div>
                                                    </tbody>
                                                </table>
                                                <a class="btn btn-modify text-white col-md-12" data-toggle="modal"
                                                    data-target="#modal1"><b>GIVE
                                                        COMMENTS</b></a><br><br>
                                                <!--Modal Give Comments-->
                                                <div class="modal fade" id="modal1" tabindex="-1" role="dialog"
                                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 class="modal-title"><b>Give Comment</b></h3>
                                                                <button class="btn btn-modify btn-round ml-auto text-white">
                                                                    <i class="fas fa-paper-plane"></i> Send
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div id="summernote"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End Modal Give Comments-->

                                            </div>
                                            <tbody>
                                                <div class="card-header">
                                                    <div class="icon mt-2"><i class="fas fa-user-circle fa-2x"></i>
                                                        Yulia Wulandari (Lecturer)
                                                    </div><br>
                                                    <div style="text-align: justify;">
                                                        <p>Logbook dibuat setiap hari kerja, isinya kegiatan apa saja
                                                            yang dilakukan dalam satu minggu.</p>
                                                    </div>
                                                </div>
                                            </tbody><br>
                                            <tbody>
                                                <div class="card-header">
                                                    <div class="icon"><i class="fas fa-user-circle fa-2x"></i>
                                                        Komaruddin (Supervisor)
                                                    </div><br>
                                                    <div style="text-align: justify;">
                                                        <p>Benar, jika sudah selesai membuat untuk satu bulan, maka
                                                            kumpulkan pada saya untuk di acc.</p>
                                                    </div>
                                                </div>
                                            </tbody>
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
    <footer class="footer">
        <div class="container">
            <div class="copyright ml-auto">
                2021, made with <i class="fa fa-heart heart text-danger"></i> by <a
                    href="http://www.themekita.com">PSTeam</a>
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

        $('#addRowButton').click(function () {
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