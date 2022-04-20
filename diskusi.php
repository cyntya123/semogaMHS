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
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
					"simple-line-icons"
				],
				urls: ['assets/css/fonts.min.css']
			},
			active: function () {
				sessionStorage.fonts = true;
			}
		});

		function timeNow(){
			var currentdate = new Date(); 

			var datetime =   
                currentdate.getHours() + ":"  
                + currentdate.getMinutes() + ":" 
                + currentdate.getSeconds();
				
			console.log(datetime);
			return document.getElementById("time-now").value = datetime;
		}
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
						<img src="assets/img/profile1.png" height="60 " alt="navbar brand" class="navbar-brand">
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

					<!--Category Filters-->
					<!-- <div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<div class="card-title fw-mediumbold">Topic Filters</div>
						<div id="myBtnContainer">
							<button class="btn-cat active onclick="filterSelection('all')">No Category</button>
							<button class="btn-cat" onclick="filterSelection('cars')"> Job Description</button>
							<button class="btn-cat" onclick="filterSelection('cars')"> Attendance</button>
							<button class="btn-cat" onclick="filterSelection('animals')"> Logbook</button>
							<button class="btn-cat" onclick="filterSelection('fruits')"> Final Report</button>
							<button class="btn-cat" onclick="filterSelection('colors')"> Feedback</button>
						</div>
					</div>
				</div>
			</div>
		</div> -->
					<!--End Category Filters-->

					<div class="row row-card-no-pd">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title"><b>FORUM DISCUSSION</b></h4>
										<button class="btn btn-modify btn-round ml-auto text-white" data-toggle="modal"
											data-target="#modal-add" onclick="timeNow()">
											<i class="fa fa-plus"></i>
											Add New Discussion
										</button>
										<!-- Modal Add New Discussion-->
										<div class="modal fade" id="modal-add" tabindex="-1" role="dialog"
											aria-labelledby="modal-edit" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered cascading-modal modal-lg"
												role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="modal-add">
															ADD NEW DISCUSSION</h5>
														<button type="button" class="close" data-dismiss="modal"
															aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>

													<form>
														<div class="modal-body">
															<!-- <div class="form-group">
																<label>Today's Date</label>
																  <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
																	  <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime"/>
																	  <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
																		  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
																	  </div>
																  </div>
															  </div> -->
															  <div class="form-group">
																<label for="id_topic">Today's Date</label>
																<input type="date" class="form-control" id="id_topic"
																	placeholder="" required>
															</div>
															  <div class="form-group">
																<label for="id_topic">Time</label>
																<input type="text" readonly value="" class="form-control" id="time-now"
																	placeholder="" required>
															</div>
															<div class="form-group">
																<label for="id_topic">What the topic?</label>
																<input type="text" class="form-control" id="id_topic"
																	placeholder="" required>
															</div>
															<div class="form-group">
																<label>Who is join with this discussion?</label>
																<select class="form-control" id="id_user_company" name="id_user_company" value="0">
																<option></option>
																	<?php
																	$sql = mysqli_query($conn, "SELECT * FROM tb_user_company WHERE id_company = $id_company AND user_type = 'supervisor'");
																	if (mysqli_num_rows($sql) != 0) {
																	while ($row = mysqli_fetch_assoc($sql)) {
																	echo '<option value=' . $row["id_user_company"] . '>' . $row['user_fullname'] . ' </option>';
																		}
																	}
																	?>
																</select>
															</div>
															<div class="form-group">
																<label for="id_company">Discussion</label>
																<textarea class="form-control" rows="10" cols="100"
																	id="message-text"
																	placeholder="Fill here..."></textarea>
															</div>
														</div>
														<div
															class="modal-footer border-top-0 d-flex justify-content-center">
															<button type="submit"
																class="btn btn-modify btn-sm text-white">SEND</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!-- End Modal -->
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-head-bg-white mb-3">
											<thead>
												<tr>
													<th scope="col" style="width: 50%;">Discussion Title</th>
													<th scope="col">Topic</th>
													<th scope="col">Date</th>
													<th scope="col"><center>Member</center></th>
													<th scope="col"><center><i class="fas fa-eye fa-lg" title="Viewer"></i></center></th>
													<th scope="col"><center><i class="fas fa-comments fa-lg" title="Comment"></i></center></th> 
												</tr>
											</thead> 
											<tbody>
												<tr>
													<td><a href="spv-discuss2.php">Pembuatan Logbook</a></td>
													<td>Logbook</td>
													<td>24/01/2022</td>
													<td>
														<center><i class="fas fa-user-circle fa-lg"
																title="Cyntya Maharani Nurul Istiqomah"></i>
															</center</td> <td>
															<center><a
																	class="btn btn-success btn-xs text-center text-white">6</a>
															</center>
													</td>
													<td>
														<center><a
																class="btn btn-success btn-xs text-center text-white">5</a>
														</center>
													</td>
												</tr>
												<tr>
													<td><a href="spv-discuss3.php">Poin Kehadiran</a></td>
													<td>Attendance</td>
													<td>30/02/2022</td>
													<td>
														<center><i class="fas fa-user-circle fa-lg"
																title="Yulia Wulandari"></i></center>
													</td>
													<td>
														<center><a
																class="btn btn-success btn-xs text-center text-white">3</a>
														</center>
													</td>
													<td>
														<center><a
																class="btn btn-success btn-xs text-center text-white">0</a>
														</center>
													</td>
												</tr>
												</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>

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

	<!-- Select2 -->
	<script src="assets/js/plugin/select2/select2.full.min.js"></script>

	<!-- Sweet Alert -->
	<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="assets/js/atlantis2.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>

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

		//Datemask dd/mm/yyyy
		$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
	</script>

</body>

</html>