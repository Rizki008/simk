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
	<h1 class="text-center">Laporan Bulan <?= $bulan ?> <?= $tahun ?></h1>
	<hr>
	<h3 class="m-fix text-center" style="margin-top:40px">Jurnal Umum</h3>
	<table class="mb-fix">
		<tr class="text-center font-bold">
			<td>No.</td>
			<td>Tanggal</td>
			<td>Nama Akun</td>
			<td>Reff</td>
			<td>Debit</td>
			<td>Kredit</td>
		</tr>
		<?php
		$i = 1;
		foreach ($jurnal as $row) :
			$timeStampt = strtotime($row->tgl_transaksi);
			$bulan = date('m', $timeStampt);
			$tahun = date('Y', $timeStampt);
			$tgl = date('d', $timeStampt);
			if ($row->jenis_saldo == 'debit') :
		?>
				<tr>
					<td class="text-center"><?= $i++ ?></td>
					<td class="text-center"><?= $tgl . '-' . $bulan . '-' . $tahun ?></td>
					<td class="text-center"><?= $row->nama_reff ?></td>
					<td class="text-center"><?= $row->no_reff ?></td>
					<td class="text-center"><?= 'Rp. ' . number_format($row->saldo, 0, ',', '.') ?></td>
					<td class="text-center">Rp. 0</td>
				</tr>
			<?php
			endif;
			if ($row->jenis_saldo == 'kredit') :
			?>
				<tr>
					<td class="text-center"><?= $i++ ?></td>
					<td class="text-center"><?= $tgl . '-' . $bulan . '-' . $tahun ?></td>
					<td class="text-center"><?= $row->nama_reff ?></td>
					<td class="text-center"><?= $row->no_reff ?></td>
					<td class="text-center">Rp. 0</td>
					<td class="text-center"><?= 'Rp. ' . number_format($row->saldo, 0, ',', '.') ?></td>
				</tr>
		<?php
			endif;
		endforeach;
		?>
		<?php foreach ($debit as $key => $debits) { ?>
		<?php } ?>
		<?php foreach ($kredit as $key => $kredits) { ?>
		<?php } ?>
		<?php if ($debits->total != $kredits->total) { ?>
			<tr>
				<td colspan="4" class="text-center"><b>Jumlah Total</b></td>
				<td class="text-danger"><b><?= 'Rp. ' . number_format($debits->total, 0, ',', '.') ?></b></td>
				<td colspan="2" class="text-danger"><b><?= 'Rp. ' . number_format($kredits->total, 0, ',', '.') ?></b></td>
			</tr>
			<tr class="text-center bg-danger ">
				<td colspan="6" class="text-white" style="font-weight:bolder;font-size:19px">TIDAK SEIMBANG</td>
			</tr>
		<?php } else {  ?>
			<tr>
				<td colspan="4" class="text-center"><b>Jumlah Total</b></td>
				<td class="text-success"><b><?= 'Rp. ' . number_format($debits->total, 0, ',', '.') ?></b></td>
				<td colspan="2" class="text-success"><b><?= 'Rp. ' . number_format($kredits->total, 0, ',', '.') ?></b></td>
			</tr>
			<tr class="text-center bg-success">
				<td colspan="6" class="text-white" style="font-weight:bolder;font-size:19px">SEIMBANG</td>
			</tr>
		<?php } ?>
	</table>
	<p class="text-right" style="margin-top:50px;">Dicetak Oleh <?= $this->session->userdata('nama') ?> Pada Tanggal
		<?php date_default_timezone_set('Asia/Jakarta');
		$date = new DateTime('now');
		echo $date->format('d-m-Y : H:i:s');
		?>
	</p>
</body>

</html>