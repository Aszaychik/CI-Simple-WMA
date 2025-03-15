<div class="container-fluid py-4">
	<div class="row">
		<div class="col-12">
			<div class="card my-4">
				<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
					<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
						<h6 class="text-white text-capitalize ps-3"><?= $title; ?></h6>
					</div>
				</div>

				<div class="card-body px-3 pb-2">
					<div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalTambah">Tambah
					</div>
					<div class="input-group mb-3">
						<input type="text" id="searchInput" class="form-control" placeholder="Cari berdasarkan nama pembeli..."
							aria-label="Search" aria-describedby="basic-addon2">
						<span class="input-group-text" id="basic-addon2">
							<i class="fas fa-search"></i>
						</span>
					</div>
					<div class="table-responsive p-0">
						<table class="table align-items-center mb-0">
							<thead>
								<tr>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder ms-0 ">
										Nomor</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder ms-0 ">
										Nama Pembeli</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder ms-0  ">
										Gaji</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder ms-0  ">
										Usia</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder ms-0  ">
										Jumlah Tanggungan</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder ms-0">Subsidi</th>
									<th
										class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
										Aksi</th>
								</tr>
							</thead>
							<tbody class="px-3">
								<?php
								$no = 1;
								foreach ($pembeli as $row):
								?>
									<tr>
										<td>
											<h6 class="mb-0 text-sm ps-3 "> <?= $no++; ?></h6>
										</td>
										<td>
											<h6 class="mb-0 text-sm ps-3 "> <?= $row->nama_pembeli; ?></h6>
										</td>
										<td>
											<h6 class="mb-0 text-sm ps-3 "> <?= $row->gaji_penghasilan; ?></h6>
										</td>
										<td>
											<h6 class="mb-0 text-sm ps-3 "> <?= $row->usia; ?></h6>
										</td>
										<td>
											<h6 class="mb-0 text-sm ps-3 "> <?= $row->jumlah_tanggungan; ?></h6>
										</td>
										<td>
											<h6 class="mb-0 text-sm ps-3">
												<?php
												// Konversi gaji ke angka
												$gaji = (float)str_replace(',', '', $row->gaji_penghasilan);

												// Rumus pembobotan
												$threshold = 1000000 + ($row->jumlah_tanggungan * 200000);

												// Bonus threshold untuk usia di atas 50
												if ($row->usia > 50) {
													$threshold += 100000;
												}

												// Tentukan subsidi
												echo ($gaji < $threshold) ? '<span class="badge bg-success">Subsidi</span>' :
													'<span class="badge bg-danger">Tanpa Subsidi</span>';
												?>
											</h6>
										</td>
										<td class="align-middle text-center">
											<a href="javascript:;"
												class="text-secondary text-center font-weight-bold text-xs"
												data-original-title="Edit user" data-bs-toggle="modal"
												data-bs-target="#exampleModal<?= $row->id; ?>">
												Edit |
											</a>
											<a href="javascript:;"
												class="text-secondary text-center font-weight-bold text-xs"
												data-original-title="Edit user" data-bs-toggle="modal"
												data-bs-target="#exampleModalHapus<?= $row->id; ?>">
												Hapus
											</a>
										</td>
										<!-- Modal Ubah-->
										<div class="modal fade" id="exampleModal<?= $row->id; ?>" tabindex="-1"
											aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data
															<?= $row->nama_pembeli; ?></h1>
														<button type="button" class="btn-close" data-bs-dismiss="modal"
															aria-label="Close"></button>
													</div>
													<form action="<?= base_url('pembeli/ubah/' . $row->id); ?>"
														method="post">
														<div class="modal-body">
															<div class="input-group input-group-outline">
																<label for="nama_pembeli" class="form-label">Nama
																	(<?= $row->nama_pembeli; ?>)</label>
																<input required type="number" class="form-control "
																	id="nama_pembeli" name="nama_pembeli">
															</div>
															<br>
															<div class="input-group input-group-outline">
																<label for="gaji_penghasilan" class="form-label">Gaji
																	(<?= $row->gaji_penghasilan; ?>)</label>
																<input required type="number" class="form-control "
																	id="gaji_penghasilan" name="gaji_penghasilan">
															</div>
															<br>
															<div class="input-group input-group-outline">
																<label for="jumlah_tanggungan" class="form-label">Tanggungan
																	(<?= $row->jumlah_tanggungan; ?>)</label>
																<input required type="number" class="form-control "
																	id="jumlah_tanggungan" name="jumlah_tanggungan">
															</div>
															<br>
															<div class="input-group input-group-outline">
																<label for="usia" class="form-label">Usia
																	(<?= $row->usia; ?>)</label>
																<input required type="number" class="form-control "
																	id="usia" name="usia">
															</div>
															<br>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary"
																data-bs-dismiss="modal">Close</button>
															<button type="submit" class="btn btn-success">Ubah</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!-- Modal Hapus-->
										<div class="modal fade" id="exampleModalHapus<?= $row->id; ?>"
											tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
														<button type="button" class="btn-close" data-bs-dismiss="modal"
															aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<p class="text-danger">Apakah Kamu Yakin Ingin Menghapus Data
															<?= $row->nama_pembeli; ?>
														</p>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary"
															data-bs-dismiss="modal">Close</button>
														<a type="button"
															href="<?= base_url('pembeli/hapus/' . $row->id); ?>"
															class="btn btn-danger">Hapus</a>
													</div>
												</div>
											</div>
										</div>
									</tr>
								<?php endforeach; ?>
							</tbody>

						</table>
						<!-- Pagination -->
						<nav aria-label="Page navigation">
							<?php echo $pagination; ?>
						</nav>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="exampleModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= base_url('pembeli/tambah'); ?>" method="post">
				<div class="modal-body">
					<div class="input-group input-group-outline">
						<label for="nama_pembeli" class="form-label">Nama</label>
						<input required type="number" class="form-control " id="nama_pembeli" name="nama_pembeli">
					</div>
					<br>
					<div class="input-group input-group-outline">
						<label for="gaji_penghasilan" class="form-label">Gaji</label>
						<input required type="number" class="form-control " id="gaji_penghasilan" name="gaji_penghasilan">
					</div>
					<br>
					<div class="input-group input-group-outline">
						<label for="jumlah_tanggungan" class="form-label">Jumlah Tanggungan</label>
						<input required type="number" class="form-control " id="jumlah_tanggungan" name="jumlah_tanggungan">
					</div>
					<br>
					<div class="input-group input-group-outline">
						<label for="usia" class="form-label">Usia</label>
						<input required type="number" class="form-control " id="usia" name="usia">
					</div>
					<br>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		const searchInput = document.getElementById('searchInput');
		const tableRows = document.querySelectorAll('tbody tr');

		function filterTable() {
			const searchTerm = searchInput.value.toLowerCase();

			tableRows.forEach(row => {
				const namaCell = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
				if (namaCell.includes(searchTerm)) {
					row.style.display = '';
				} else {
					row.style.display = 'none';
				}
			});
		}

		searchInput.addEventListener('input', filterTable);
	});
</script>
