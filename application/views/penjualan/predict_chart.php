<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex justify-content-between align-items-center">
					<h6 class="m-0 font-weight-bold text-success">Laporan Statistik Penjualan</h6>
				</div>
				<div class="card-body">
					<div class="chart-container" style="height: 75vh; position: relative;">
						<canvas id="chart"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
	<?php
	foreach ($bulandepan as $key) {
		$b = date('M Y', strtotime($key->tanggal_penjualan) + 60 * 60 * 24 * 31);
	}

	$ft = $this->data_model->ftsma('tabel_penjualan', 3, "DESC");
	$totalft = 0;
	$totalft = ($ft[0]->jumlah * 3) + ($ft[1]->jumlah * 2) + ($ft[2]->jumlah * 1);

	$newft = round($totalft / 6, 2);



	$next2MonthLabel = date('M Y', strtotime($b) + 60 * 60 * 24 * 31);
	$next2MonthValue = round((($newft * 3) + ($ft[0]->jumlah * 2) + ($ft[1]->jumlah * 1)) / 6, 2);

	$next3MonthLabel = date('M Y', strtotime($next2MonthLabel) + 60 * 60 * 24 * 31);
	$next3MonthValue = round((($next2MonthValue * 3) + ($newft * 2) + ($ft[0]->jumlah * 1)) / 6, 2);

	$next4MonthLabel = date('M Y', strtotime($next3MonthLabel) + 60 * 60 * 24 * 31);
	$next4MonthValue = round((($next3MonthValue * 3) + ($next2MonthValue * 2) + ($newft * 1)) / 6, 2);

	$next5MonthLabel = date('M Y', strtotime($next4MonthLabel) + 60 * 60 * 24 * 31);
	$next5MonthValue = round((($next4MonthValue * 3) + ($next3MonthValue * 2) + ($next2MonthValue * 1)) / 6, 2);
	?>

	// PHP Data
	const labels = [
		<?php foreach ($penjualan as $row): ?> "<?= date('M Y', strtotime($row->tanggal_penjualan)); ?>",
		<?php endforeach; ?> "<?= $b; ?>",
		"<?= $next2MonthLabel; ?>",
		"<?= $next3MonthLabel; ?>",
		"<?= $next4MonthLabel; ?>",
		"<?= $next5MonthLabel; ?>",
	];

	const data = [
		<?php foreach ($penjualan as $row): ?>
			<?= $row->jumlah; ?>,
		<?php endforeach; ?>
		<?= number_format(round($newft, 0), 0, ".", ""); ?>,
		<?= number_format(round($next2MonthValue, 0), 0, ".", ""); ?>,
		<?= number_format(round($next3MonthValue, 0), 0, ".", ""); ?>,
		<?= number_format(round($next4MonthValue, 0), 0, ".", ""); ?>,
		<?= number_format(round($next5MonthValue, 0), 0, ".", ""); ?>,
	];

	// Calculate average of actual data
	const actualData = data.slice(0, -5);
	const averageValue = actualData.reduce((acc, val) => acc + val, 0) / actualData.length;

	// Chart.js Configuration
	const ctx = document.getElementById("chart").getContext('2d');
	const myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: labels,
			datasets: [
				// Average line dataset
				{
					label: `Average Sales (${averageValue.toFixed(0)})`,
					borderColor: '#666',
					borderDash: [5, 5], // Dashed line
					data: labels.map(() => averageValue),
					fill: false,
					pointRadius: 0, // Hide points
					borderWidth: 1,
					tension: 0, // Straight lines
				},
				// Original datasets
				{
					label: 'Monthly Sales',
					backgroundColor: 'rgba(129, 199, 132, 1)',
					borderColor: 'rgba(56, 142, 60, 1)',
					data: data.slice(0, -5),
					fill: true,
					pointStyle: 'circle',
					pointRadius: 10,
					pointHoverRadius: 15
				},
				{
					label: 'Predicted Sales',
					backgroundColor: 'rgba(200, 230, 201, 1)',
					borderColor: 'rgba(76, 175, 80, 1)',
					data: Array(data.length - 6).fill(null).concat(data.slice(-6)),
					fill: true,
					pointStyle: 'circle',
					pointRadius: 10,
					pointHoverRadius: 15
				}
			]
		},
		options: {
			scales: {
				y: {
					min: 1200,
					ticks: {
						callback: function(value) {
							return value.toFixed(0);
						}
					}
				}
			}
		}
	});
</script>