<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url(); ?>assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img/favicon.png">
	<title>
		Login
	</title>
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css"
		href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
	<!-- Nucleo Icons -->
	<link href="<?= base_url(); ?>assets/css/nucleo-icons.css" rel="stylesheet" />
	<link href="<?= base_url(); ?>assets/css/nucleo-svg.css" rel="stylesheet" />
	<!-- Font Awesome Icons -->
	<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
	<!-- Material Icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
	<!-- CSS Files -->
	<link id="pagestyle" href="<?= base_url(); ?>assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
	<!-- Nepcha Analytics (nepcha.com) -->
	<!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
	<script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="bg-gray-200">
	<main class="main-content  mt-0">
		<div class="page-header align-items-start min-vh-100"
			style="background-image: url('<?= base_url(); ?>assets/img/bg.jpg');">
			<span class="mask bg-gradient-dark opacity-6"></span>
			<div class="container my-auto">
				<div class="row">
					<div class="col-lg-4 col-md-8 col-12 mx-auto">
						<div class="card z-index-0 fadeIn3 fadeInBottom">
							<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
								<div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
									<h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
								</div>
							</div>
							<div class="card-body">
								<form role="form" class="text-start" method="post"
									action="<?= base_url('login/aksiLogin'); ?>">
									<div class="input-group input-group-outline my-3">
										<label class="form-label">Username</label>
										<input type="username" name="username" required class="form-control">
									</div>
									<div class="input-group input-group-outline mb-3">
										<label class="form-label">Password</label>
										<input type="password" name="password" required class="form-control">
									</div>
									<div class="text-center">
										<input type="submit" class="btn bg-gradient-success w-100 my-4 mb-2"
											value="Login">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer class="footer position-absolute bottom-2 py-2 w-100">
				<div class="container">
					<div class="row align-items-center justify-content-lg-between">
						<div class="col-12 col-md-6 my-auto">
							<div class="copyright text-center text-sm text-white text-lg-start">
								© <script>
									document.write(new Date().getFullYear())
								</script>,
								made with <i class="fa fa-heart" aria-hidden="true"></i> by
								<a href="https://www.creative-tim.com" class="font-weight-bold text-white"
									target="_blank">Lilis Dwi Suryani</a>
								for a better web.
							</div>
						</div>
						<div class="col-12 col-md-6">
							<ul class="nav nav-footer justify-content-center justify-content-lg-end">
								<p class="text-white">
									Never Give Up
								</p>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</main>
	<!--   Core JS Files   -->
	<script src="<?= base_url(); ?>assets/js/core/popper.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/core/bootstrap.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/plugins/perfect-scrollbar.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/plugins/smooth-scrollbar.min.js"></script>
	<script>
		var win = navigator.platform.indexOf('Win') > -1;
		if (win && document.querySelector('#sidenav-scrollbar')) {
			var options = {
				damping: '0.5'
			}
			Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
		}
	</script>
	<!-- Github buttons -->
	<script async defer src="https://buttons.github.io/buttons.js"></script>
	<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
	<script src="<?= base_url(); ?>assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>