<div class="container-fluid py-4">
	<div class="row">
		<div class="col-12">
			<div class="card my-4">
				<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
					<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
						<h6 class="text-white text-capitalize ps-3"><?= $title; ?></h6>
					</div>
				</div>
				<!-- Button trigger modal -->


				<div class="card-body px-3 pb-2">
					<div class="table-responsive" style="margin-top:15px;">
						<table class="table table-hover table-bordered">
							<thead>
								<tr class="bg-primary text-light ">
									<th>
										Bulan
									</th>
									<th class="text-center">
										Y<span class="rumus">t-1</span>
									</th>
									<th class="text-center">
										Y<span class="rumus">t-2</span>
									</th>
									<th class="text-center">
										Y<span class="rumus">t-3</span>
									</th>
									<th class="text-center">
										Y<span class="rumus">t-1 </span>(3)
									</th>
									<th class="text-center">
										Y<span class="rumus">t-2 </span>(2)
									</th>
									<th class="text-center">
										Y<span class="rumus">t-3 </span>(1)
									</th>
									<th class="text-center">
										Y<span class="rumus">t-1 </span>(3)+Y<span class="rumus">t-2
										</span>(2)+Y<span class="rumus">t-3 </span>(1)
									</th>
									<th class="text-center">
										(F<span class="rumus">t</span>)=Y<span class="rumus"></span>t / 6
									</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$tmad = 0;
								$tmse = 0;
								$tmape = 0;
								$i = 1;
								foreach ($forecasting as $row) :

								?>
									<tr>
										<?php
										$y1 = '';
										$y2 = '';
										$y3 = '';
										?>
										<td><?= $bulan = date('F', strtotime($row->tanggal_penjualan)); ?>
										</td>
										<td class="text-right">
											<?php
											$min1bulan = $this->data_model->min1bulan('tabel_penjualan', date('Y-m', strtotime($row->tanggal_penjualan) - 60 * 60 * 24 * 31));
											foreach ($min1bulan as $bulan1) {
												echo $y1 = $bulan1->jumlah;
											}
											?>
										</td>
										<td class="text-right">
											<?php
											$min1bulan = $this->data_model->min1bulan('tabel_penjualan', date('Y-m', strtotime($row->tanggal_penjualan) - 60 * 60 * 24 * 31 * 2));
											foreach ($min1bulan as $bulan1) {
												echo $y2 = $bulan1->jumlah;
											}
											?>
										</td>
										</td>
										<td class="text-right">
											<?php
											$min1bulan = $this->data_model->min1bulan('tabel_penjualan', date('Y-m', strtotime($row->tanggal_penjualan) - 60 * 60 * 24 * 31 * 3));
											foreach ($min1bulan as $bulan1) {
												echo $y3 = $bulan1->jumlah;
											}
											?>
										</td>
										<td class="text-right"><?= $y13 = intval($y1) * 3; ?>
										<td class="text-right"><?= $y22 = intval($y2) * 2; ?>
										<td class="text-right"><?= $y31 = intval($y3) * 1; ?>
										<td class="text-right"><?= $total = intval($y13) + intval($y22) + intval($y31); ?>
										</td>
										<?php
										$totalPendapatan = $row->jumlah;

										?>
										<td class="text-right prediksisma"><?= $totalJumlah = round($total / 6, 0); ?>
										</td>

										<?php
										$mad = abs(round($totalPendapatan - $totalJumlah));
										$mse = abs(round(pow($mad, 2), 2));
										$mape = abs(round($mad / $totalPendapatan, 2) * 100);

										?>



									</tr>
									<?php $tmad += $mad; ?>
									<?php $tmse += $mse; ?>
									<?php $tmape += $mape; ?>
									<!-- <?php var_dump(array_slice(array($totalJumlah), 0, 1)); ?> -->
								<?php
									$i++;
								endforeach; ?>
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
			<form action="<?= base_url('penjualan/tambah'); ?>" method="post">
				<div class="modal-body">
					<div class="input-group input-group-outline">
						<label for="bulan" class="form-label">Bulan Penjualan</label>
						<input required type="month" class="form-control " id="bulan" name="bulan">
					</div><br>
					<div class="input-group input-group-outline">
						<label for="jumlah" class="form-label">Jumlah Penjualan</label>
						<input required type="number" class="form-control " id="jumlah" name="jumlah">
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