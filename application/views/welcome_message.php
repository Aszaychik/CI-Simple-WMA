<div class="container-fluid py-4">
	<div class="row">
		<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
			<div class="card">
				<div class="card-header p-3 pt-2">
					<div
						class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
						<i class="material-icons opacity-10">person</i>
					</div>
					<div class="text-end pt-1">
						<p class="text-sm mb-0 text-capitalize">User</p>
						<h4 class="mb-0"><?= $user; ?></h4>
					</div>

				</div>
				<hr class="dark horizontal my-0">
				<div class="card-footer p-3">
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
			<div class="card">
				<div class="card-header p-3 pt-2">
					<div
						class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
						<i class="material-icons opacity-10">table_view</i>
					</div>
					<div class="text-end pt-1">
						<p class="text-sm mb-0 text-capitalize">Penjualan Terakhir</p>
						<h4 class="mb-0"><?= $t_terakhir->jumlah; ?></h4>
					</div>
				</div>
				<hr class="dark horizontal my-0">
				<div class="card-footer p-3">
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
			<div class="card">
				<div class="card-header p-3 pt-2">
					<div
						class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
						<i class="material-icons opacity-10">receipt_long</i>
					</div>
					<div class="text-end pt-1">
						<p class="text-sm mb-0 text-capitalize">Penjualan Terendah</p>
						<h4 class="mb-0"><?= $t_terendah->jumlah; ?></h4>
					</div>
				</div>
				<hr class="dark horizontal my-0">
				<div class="card-footer p-3">
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-sm-6">
			<div class="card">
				<div class="card-header p-3 pt-2">
					<div
						class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
						<i class="material-icons opacity-10">weekend</i>
					</div>
					<div class="text-end pt-1">
						<p class="text-sm mb-0 text-capitalize">Penjualan tertinggi</p>
						<h4 class="mb-0"><?= $t_tertinggi->jumlah; ?></h4>
					</div>
				</div>
				<hr class="dark horizontal my-0">
				<div class="card-footer p-3">
				</div>
			</div>
		</div>
	</div>