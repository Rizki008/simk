<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= $title . ' Dicetak Oleh ' . $this->session->userdata('username') ?></title>
	<style>
		* {
			font-family: sans-serif;
		}

		table {
			width: 100%;
		}

		table,
		th,
		tr,
		td {
			border: 1px solid black;
			border-collapse: collapse;
			border-spacing: 0;
		}

		th,
		td {
			padding: 18px;
		}

		.text-center {
			text-align: center;
		}

		.text-right {
			text-align: right;
		}

		.font-bold {
			font-weight: bold;
		}

		.m-fix {
			margin: 15px;
		}

		.mt-fix {
			margin-top: 15px;
		}

		.mb-fix {
			margin-bottom: 15px;
		}

		hr {
			width: 800px;
			margin-bottom: 30px;
		}

		.d-flex {
			display: flex;
		}

		.w-100 {
			width: 100%;
		}
	</style>
</head>

<body>
	<h1 class="text-center">Laporan Priode Tahun <?= $tahun ?></h1>
	<hr>

	<h3 class="m-fix text-center" style="margin-top:40px">Laporan SHU</h3>
	<table class="mb-fix">
		<?php
		$hasil_shu = 0;
		$penjualan = 0;
		$hpp = 0;
		$biaya = 0;
		foreach ($shu as $value) {
			if ($value->no_reff == '4-111') {
				$penjualan = $penjualan + $value->saldo;
			} elseif ($value->no_reff == '4-112') {
				$hpp = $hpp + $value->saldo;
			} elseif ($value->no_reff == '4-113') {
				$biaya = $biaya + $value->saldo;
			}

			$hasil_shu = $penjualan - ($hpp + $biaya);
		?>
		<?php } ?>
		<tr colspan="5">
			<td colspan="3">ALOKASI PEMBAGIAN SHU Rp. <?= number_format($hasil_shu, 0) ?></td>
		</tr>
		<tr class="text-center font-bold">
			<td>PEMBAGIAN SHU</td>
			<td>PERSENTASI</td>
			<td>JUMLAH</td>
		</tr>
		<tr>
			<td>1. Dana Cadangan</td>
			<th>10%</th>
			<th>Rp. <?= number_format((10 / 100 * $hasil_shu), 0) ?></th>
		</tr>
		<tr>
			<td colspan="3" class="mb-0 text-sm">2. Dana Anggota</td>
		</tr>
		<tr>
			&nbsp;<th>
				<h6 class="mb-0 text-sm"> - Jasa Modal Anggota</h6>
			</th>
			<th>25%</th>
			<th>Rp. <?= number_format((25 / 100 * $hasil_shu), 0) ?></th>
		</tr>
		<tr>
			&nbsp;<th>
				<h6 class="mb-0 text-sm"> - Jasa Anggota</h6>
			</th>
			<th>15%</th>
			<th>Rp. <?= number_format((15 / 100 * $hasil_shu), 0) ?></th>
		</tr>
		<tr>
			<td>3. Dana Pengurus</td>
			<th>10%</th>
			<th>Rp. <?= number_format((10 / 100 * $hasil_shu), 0) ?></th>
		</tr>
		<tr>
			<td>4. Dana Pengawas</td>
			<th>10%</th>
			<th>Rp. <?= number_format((10 / 100 * $hasil_shu), 0) ?></th>
		</tr>
		<tr>
			<td>5. Dana Kesejahtraan Karyawan</td>
			<th>10%</th>
			<th>Rp. <?= number_format((10 / 100 * $hasil_shu), 0) ?></th>
		</tr>
		<tr>
			<td>6. Dana Sosial</td>
			<th>2,5%</th>
			<th>Rp. <?= number_format((2.5 / 100 * $hasil_shu), 0) ?></th>
		</tr>
		<tr>
			<td>7. Dana Pembangunan Daerah Kerja</td>
			<th>2,5%</th>
			<th>Rp. <?= number_format((2.5 / 100 * $hasil_shu), 0) ?></th>
		</tr>
		<tr>
			<td>8. Dana Kesejahtraan Anggota</td>
			<th>15%</th>
			<th>Rp. <?= number_format((15 / 100 * $hasil_shu), 0) ?></th>
		</tr>
		<tr>
			<th>
				<h5 class="text-center">Jumlah SHU Dibagikan</h5>
			</th>
			<th></th>
			<th>
				<h5>Rp. <?= number_format($hasil_shu, 0) ?></h5>
			</th>
		</tr>
	</table>
	<p class="text-right" style="margin-top:50px;">Dicetak Oleh <?= $this->session->userdata('nama') ?> Pada Tanggal
		<?php date_default_timezone_set('Asia/Jakarta');
		$date = new DateTime('now');
		echo $date->format('d-m-Y : H:i:s');
		?>
	</p>
</body>

</html>