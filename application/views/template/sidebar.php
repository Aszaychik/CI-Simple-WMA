<body class="g-sidenav-show  bg-gray-200">
	<aside
		class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
		id="sidenav-main">
		<div class="sidenav-header">
			<i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
				aria-hidden="true" id="iconSidenav"></i>
			<a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
				target="_blank">
				<img src="<?= base_url(); ?>assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
				<span class="ms-1 font-weight-bold text-white">Sistem WMA</span>
			</a>
		</div>
		<hr class="horizontal light mt-0 mb-2">
		<div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link text-white " href="<?= base_url(); ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">dashboard</i>
						</div>
						<span class="nav-link-text ms-1">Dashboard</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="<?= base_url('users'); ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">person</i>
						</div>
						<span class="nav-link-text ms-1">Data User </span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="<?= base_url('pembeli'); ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">groups</i>
						</div>
						<span class="nav-link-text ms-1">Data Pembeli </span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="<?= base_url('pembeli/month_pembeli'); ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">groups</i>
						</div>
						<span class="nav-link-text ms-1">Pembeli Bulanan</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="<?= base_url('penjualan'); ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">table_view</i>
						</div>
						<span class="nav-link-text ms-1">Data Penjualan</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="<?= base_url('wma'); ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">table_view</i>
						</div>
						<span class="nav-link-text ms-1">Prediksi Hitung</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="<?= base_url('wma/hasil'); ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">table_view</i>
						</div>
						<span class="nav-link-text ms-1">Prediksi Hasil</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="<?= base_url('penjualan/predict_chart'); ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">ssid_chart</i>
						</div>
						<span class="nav-link-text ms-1">Prediksi Chart</span>
					</a>
				</li>
				<li class="nav-item mt-3">
					<h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages
					</h6>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="<?= base_url('welcome/profile'); ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">person</i>
						</div>
						<span class="nav-link-text ms-1">Profile</span>
					</a>
				</li>
			</ul>
		</div>
		<div class="sidenav-footer position-absolute w-100 bottom-0 ">
			<div class="mx-3">
				<a class="btn bg-gradient-primary w-100" href="<?= base_url('welcome/logout'); ?>"
					type="button">Logout</a>
			</div>
		</div>
	</aside>
	<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
		<!-- Navbar -->
		<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
			data-scroll="true">
			<div class="container-fluid py-1 px-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
						<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
						</li>
						<li class="breadcrumb-item text-sm text-dark active" aria-current="page"><?= $title; ?></li>
					</ol>
					<h6 class="font-weight-bolder mb-0"><?= $title; ?></h6>
				</nav>
				<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
					<div class="ms-md-auto pe-md-3 d-flex align-items-center">
					</div>
					<ul class="navbar-nav  justify-content-end">
						<li class="nav-item d-xl-none ps-3 d-flex align-items-center">
							<a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
								<div class="sidenav-toggler-inner">
									<i class="sidenav-toggler-line"></i>
									<i class="sidenav-toggler-line"></i>
									<i class="sidenav-toggler-line"></i>
								</div>
							</a>
						</li>
						<li class="nav-item px-3 d-flex align-items-center">
						</li>
						<li class="nav-item dropdown pe-2 d-flex align-items-center">
						</li>
						<li class="nav-item d-flex align-items-center">
							<a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
								<span class="d-sm-inline d-none">
									<?= $this->session->userdata('nama_user') . '  '; ?> </span>
								<i class="fa fa-user me-sm-1"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>