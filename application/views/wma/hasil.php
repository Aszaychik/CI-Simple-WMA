<div class="container-fluid py-4">
	<div class="row">
		<div class="col-12">
			<div class="card my-4">
				<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
					<div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
						<h6 class="text-white text-capitalize ps-3"><?= $title; ?></h6>
					</div>
				</div>
				<!-- Button trigger modal -->


				<div class="card-body px-3 pb-2">
					<div class="table-responsive" style="margin-top:15px;">
						<table class="table table-hover table-bordered">
							<thead>
								<tr class="bg-success text-light ">
									<th>
										Bulan
									</th>
									<th class="text-center">
										Aktual
									</th>
									<th class="text-center">
										(F<span class="rumus">t</span>)=Y<span class="rumus"></span>t / 6
									</th>
									<th class="text-center">
										MAD
									</th>
									<th class="text-center">
										MSE
									</th>
									<th class="text-center">
										MAPE
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
										<?php
										$min1bulan = $this->data_model->min1bulan('tabel_penjualan', date('Y-m', strtotime($row->tanggal_penjualan) - 60 * 60 * 24 * 31));
										foreach ($min1bulan as $bulan1) {
											$y1 = $bulan1->jumlah;
										}
										?>

										<?php
										$min1bulan = $this->data_model->min1bulan('tabel_penjualan', date('Y-m', strtotime($row->tanggal_penjualan) - 60 * 60 * 24 * 31 * 2));
										foreach ($min1bulan as $bulan1) {
											$y2 = $bulan1->jumlah;
										}
										?>

										<?php
										$min1bulan = $this->data_model->min1bulan('tabel_penjualan', date('Y-m', strtotime($row->tanggal_penjualan) - 60 * 60 * 24 * 31 * 3));
										foreach ($min1bulan as $bulan1) {
											$y3 = $bulan1->jumlah;
										}
										?>

										<?php
										$y13 = intval($y1) * 3;
										$y22 = intval($y2) * 2;
										$y31 = intval($y3) * 1;
										$total = intval($y13) + intval($y22) + intval($y31);
										?>

										<td class="text-right pendapatansma">
											<?= $totalPendapatan = $row->jumlah; ?></td>
										<td class="text-right prediksisma"><?= $totalJumlah = round($total / 6, 0); ?>
										</td>
										<td class="text-right">
											<?= $mad = abs(round($totalPendapatan - $totalJumlah)); ?>
										</td>
										<td class="text-right"><?= $mse = abs(round(pow($mad, 2), 2)); ?></td>
										<td class="text-right">
											<?= $mape = abs(round($mad / $totalPendapatan, 2) * 100); ?>%
										</td>
									</tr>
									<?php $tmad += $mad; ?>
									<?php $tmse += $mse; ?>
									<?php $tmape += $mape; ?>
									<!-- <?php var_dump(array_slice(array($totalJumlah), 0, 1)); ?> -->
								<?php
									$i++;
								endforeach; ?>

								<tr class="text-success">
									<td colspan="1" class="text-center ">Hasil Peramalan
										<?php
										foreach ($bulandepan as $key) {
											echo $b = date('F', strtotime($key->tanggal_penjualan) + 60 * 60 * 24 * 31);
										}
										?>
									</td>
									<td class="text-right"></td>
									<td class="text-right">
										<?php
										$ft = $this->data_model->ftsma('tabel_penjualan', 3, "DESC");
										$totalft = 0;
										$totalft = ($ft[0]->jumlah * 3) + ($ft[1]->jumlah * 2) + ($ft[2]->jumlah * 1);

										echo $newft = round($totalft / 6, 2);
										?>
									</td>
									<td class="text-right"> <?php echo $kmad = round($tmad / $jumlahn, 2); ?></td>
									<td class="text-right"><?= $kmse = round($tmse / $jumlahn, 2); ?></td>
									<td class="text-right"><?= $kmape = round($tmape / $jumlahn, 2); ?>%</td>
									<input type="hidden" name="" id="mapee"
										value="<?= $kmape = round($tmape / $jumlahn, 2) * 100; ?>">
								</tr>
							</tbody>
						</table>
						<h5 class="text-center mb-3 mt-5">Hasil Forecasting atau prediksi penjualan di bulan <?= $b; ?>
							adalah
							sebanyak
						</h5>
						<h2 class="text-center cookiewma"><?= number_format(round($newft, 0), 0, ",", "."); ?> Tabung</h2>
						<?php $this->session->set_userdata('boxwma', number_format(round($newft, 0), 0, ",", ".")); ?>
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