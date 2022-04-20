<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login</title>
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
	<link rel="stylesheet" href="assets/css/atlantis.css">
</head>

<body class="login">
	<div class="wrapper wrapper-login wrapper-login-full p-0">
		<div class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center bg-secondary-gradient">
			<h1 class="title fw-bold text-white mb-3">Internship Management System</h1>
			<p class="subtitle text-white op-7">Politeknik Negeri Batam</p>
		</div>
		<div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
			<div class="container container-login container-transparent animated fadeIn">
				<h3 class="text-center">Sign In To INTERN</h3>
				<form action="" method="post">
					<input type="hidden" name="token" value="9Kylnkoreo7zASjqMh4eEx0Hx9b4h5e2"></input>
					<div class="login-form">
						<div class="form-group">
							<label for="username" class="placeholder"><b>Username</b></label>
							<input id="username" name="username" type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="password" class="placeholder"><b>Password</b></label>
							<div class="position-relative">
								<input id="password" name="password" type="password" class="form-control" required>
								<div class="show-password">
									<i class="icon-eye"></i>
								</div>
							</div>
						</div>
						<div class="form-group form-action-d-flex mb-3">
							<button type="submit" name="login" value="Login" class="btn btn-secondary col-md-5 float-right mt-3 mt-sm-0 fw-bold">Sign In</button>
						</div>
				</form>
				<div class="login-account">
					<span class="msg">Don't have an account yet ?</span>
					<a href="#" id="show-signup" class="link">Sign Up</a>
					<br>
					<?php
					//include "config.php";
					error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));

					if ($_POST['login']) {

						// $user = mysqli_real_escape_string($conn, $_POST['username']);
						// $pass = mysqli_real_escape_string($conn, $_POST['password']);

						$user = $_POST['username'];
						$pass = $_POST['password'];

						$data = array(
							"username"        => $_POST['username'],
							"password"        => $_POST['password'],
							"token"           => $_POST['token'],
						);

						$ch = curl_init('http://sid.polibatam.ac.id/apilogin/web/api/auth/login');
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						$result = json_decode(curl_exec($ch));

						//echo "<pre>";
						//print_r($result);
						//echo "</pre>";

						echo "Status    : " . $result->status . '<br>';
						echo "Message   : " . $result->message . '<br>';

						if ($result->status == "success") {

							//echo "ID        : ".$result->data->id.'<br>';
							//echo "Username  : ".$result->data->username.'<br>';
							//echo "Name      : ".$result->data->name.'<br>';
							//echo "Email     : ".$result->data->email.'<br>';
							//echo "Jabatan   : ".$result->data->jabatan.'<br>';
							$nik = $result->data->nim_nik_unit;
							$nama = $result->data->name;
							$email = $result->data->email;
							$jabatan = $result->data->jabatan;

							if ($user && $pass) {

								session_start();
								$_SESSION['user_nik'] = $nik;
								$_SESSION['user_jabatan'] = $jabatan;
								$_SESSION['nama'] = $nama;

								$length = 32;
								$_SESSION['token'] = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length);


								if ($jabatan == "Dosen") {
									echo "
										<script type='text/javascript'>
										setTimeout(function () { 
										swal({
													title: 'Login Berhasil',
													text:  'Harap tunggu anda akan diarahkan ke page Dashboard',
													type: 'success',
													timer: 2000,
													showConfirmButton: true
												});  
										},10); 
										window.setTimeout(function(){ 
											window.location.replace('index.php?page=dashboard');
										} ,3000); 
										</script>
										";
								}
								if ($jabatan == "Mahasiswa") {
									echo '<script language="javascript">alert("Berhasil"); document.location="index.php?page=home";</script>';
								}
							}
						} else {
							echo '<div class="error">ERROR: Yang bertanda * tidak boleh kosong.</div>';
						}
					}

					?>
				</div>
			</div>


		</div>

		<div class="container container-signup container-transparent animated fadeIn">
			<h3 class="text-center">Sign Up</h3>
			<div class="login-form">
				<div class="form-group">
					<label for="fullname" class="placeholder"><b>Fullname</b></label>
					<input id="fullname" name="fullname" type="text" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="email" class="placeholder"><b>Email</b></label>
					<input id="email" name="email" type="email" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="passwordsignin" class="placeholder"><b>Password</b></label>
					<div class="position-relative">
						<input id="passwordsignin" name="passwordsignin" type="password" class="form-control" required>
						<div class="show-password">
							<i class="icon-eye"></i>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="confirmpassword" class="placeholder"><b>Confirm Password</b></label>
					<div class="position-relative">
						<input id="confirmpassword" name="confirmpassword" type="password" class="form-control" required>
						<div class="show-password">
							<i class="icon-eye"></i>
						</div>
					</div>
				</div>
				<div class="row form-sub m-0">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="agree" id="agree">
						<label class="custom-control-label" for="agree">I Agree the terms and conditions.</label>
					</div>
				</div>
				<div class="row form-action">
					<div class="col-md-6">
						<a href="#" id="show-signin" class="btn btn-danger btn-link w-100 fw-bold">Cancel</a>
					</div>
					<div class="col-md-6">
						<a href="#" class="btn btn-secondary w-100 fw-bold">Sign Up</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="assets/js/core/popper.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	<!-- Sweet Alert -->
	<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>
	<!-- Bootstrap Toggle -->
	<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
	<!-- jQuery Scrollbar -->
	<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Atlantis JS -->
	<script src="assets/js/atlantis.min.js"></script>
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="assets/js/setting-demo2.js"></script>
</body>

</html>