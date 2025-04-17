<div class="container-fluid py-4">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
	<style>
		.page-item.active .page-link {
			color: white !important;
		}
	</style>
	<div class="row">
		<div class="col-12">
			<div class="card my-4">
				<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
					<div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
						<h6 class="text-white text-capitalize ps-3"><?= $title; ?></h6>
					</div>
				</div>

				<div class="card-body px-3 pb-2">
					<div class="col-12 d-flex justify-content-between align-items-center">
						<div class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalTambah">Tambah
						</div>
					</div>
					<div class="table-responsive p-0">
						<table id="datatable" class="table align-items-center mb-0">
							<thead>
								<tr>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder ms-0 ">
										Nomor</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder ms-0 ">
										Buyer</th>
									<?php foreach ($months as $month) : ?>
										<th class="text-uppercase text-secondary text-xxs font-weight-bolder ms-0 "><?= date('M Y', strtotime($month)) ?></th>
									<?php endforeach; ?>

								</tr>
							</thead>
							<tbody class="px-3">
								<?php
								foreach ($pembeli as $row):
								?>
									<tr>
										<td>
											<h6 class="mb-0 text-sm ps-3 "> <?= $row->id; ?></h6>
										</td>
										<td><?= $row->nama_pembeli ?></td>
										<?php foreach ($months as $month) : ?>
											<td><?= $row->purchases[$month] ?></td>
										<?php endforeach; ?>
									<?php endforeach; ?>
							</tbody>

						</table>
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

<!-- Include jQuery and DataTables Scripts -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<!-- Initialize DataTables -->
<script>
	$(document).ready(function() {
		$('#datatable').DataTable({
			"pagingType": "full_numbers",
			"dom": '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rt<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
			"language": {
				"paginate": {
					"previous": "‹",
					"next": "›",
					"first": "«",
					"last": "»"
				}
			}
		});
	});
</script>