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

<body>
	<div class="wrapper horizontal-layout-2">

		<!-- navbar -->
		<?php
		include 'header.php'
		?>
		<!-- end navbar -->

		<div class="main-panel">
			<div class="container">
				<div class="page-inner">

					<!-- MAIN CONTENT -->
					<section class="content">

						<!-- Default box -->
						<div class="card">
							<div class="card-body row">
								<div class="col-5 text-center d-flex align-items-center justify-content-center">
									<div class="">
										<p>
											<img class="alignnone size-full wp-image-6948" style="width: auto; text-align: center;" src="assets/img/polibatam.png" alt="" width="112" height="101">
										</p>
										<h2><strong>Politeknik Negeri Batam</strong></h2>
										<p class="lead mb-3">Jl. Ahmad Yani Batam Kota, Kota Batam, Kepulauan Riau<br>
											Phone: +62-778-469858 Ext.1017<br>
											Fax: +62-778-463620
											Email: info@polibatam.ac.id
										</p>
									</div>
								</div>
								<div class="col-7">
									<div class="form-group">
										<label for="inputName">Name</label>
										<input type="text" id="inputName" class="form-control" />
									</div>
									<div class="form-group">
										<label for="inputEmail">E-Mail</label>
										<input type="email" id="inputEmail" class="form-control" />
									</div>
									<div class="form-group">
										<label for="inputSubject">Subject</label>
										<input type="text" id="inputSubject" class="form-control" />
									</div>
									<div class="form-group">
										<label for="inputMessage">Message</label>
										<textarea id="inputMessage" class="form-control" rows="4"></textarea>
									</div>
									<div class="form-group">
										<input type="button" class="btn btn-secondary" value="Send message">
									</div>
								</div>
							</div>
						</div>

					</section>
				</div>
				<!-- END MAIN CONTENT -->

				<!-- Modal Document Detail -->
				<div class="modal fade" id="doc-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle">Choose Document</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<!-- button cta -->
								<div class="row">
									<div class="col-sm-4 p-2">
										<a href="#" class="btn btn-secondary" style="width: 100%;">CV </a>
									</div>
									<div class="col-sm-4 p-2">
										<a href="#" class="btn btn-secondary" style="width: 100%;">Registry Form </a>
									</div>
									<div class="col-sm-4 p-2">
										<a href="#" class="btn btn-secondary" style="width: 100%;">Optional Files </a>
									</div>
									<div class="col-sm-4 p-2">
										<a href="#" class="btn btn-secondary" style="width: 100%;">Optional Files </a>
									</div>
									<div class="col-sm-4 p-2">
										<a href="#" class="btn btn-secondary" style="width: 100%;">Optional Files </a>
									</div>
									<div class="col-sm-4 p-2">
										<a href="#" class="btn btn-secondary" style="width: 100%;">Optional Files </a>
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

				<!-- Modal Accept -->
				<div class="modal fade" id="modal-accept" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle">Are you sure
									to ACCEPT this candidate?
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

				<!-- Modal Reject -->
				<div class="modal fade" id="modal-reject" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle">Are you sure
									to REJECT this candidate?
								</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn-sm btn-danger" data-dismiss="modal">Yes</button>
							</div>
						</div>
					</div>
				</div>
				<!-- End Modal Delete -->

				<footer class="footer fixed-bottom">
					<div class="container">
						<div class="copyright ml-auto">
							2021, Develop with <i class="fa fa-heart heart text-danger"></i> by <a href="http://www.themekita.com">PSTeam</a>
						</div>
					</div>
				</footer>
			</div>
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