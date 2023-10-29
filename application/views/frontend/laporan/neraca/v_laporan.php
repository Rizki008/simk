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
	<h1 class="text-center">Laporan Neraca Priode <?= $dari ?> Sampai <?= $sampai ?></h1>
	<hr>
	<h3 class="m-fix text-center" style="margin-top:40px">Neraca</h3>
	<table class="mb-fix">
		<tr>
			<th colspan="6">Aktiva Lancar</th>
		</tr>
		<tr class="text-center font-bold">
			<td>No.</td>
			<td>No Reff</td>
			<td colspan="3">Nama Akun</td>
			<td></td>
		</tr>
		<?php
		$i = 1;
		$total = 0;
		$debitst = 0;
		$kreditst = 0;
		$hasilst = 0;
		foreach ($lancar as $row) {
			if ($row->jenis_saldo == 'debit') {
				$debitst = $debitst + $row->saldo;
			} else {
				$kreditst = $kreditst + $row->saldo;
			}
			$hasilst = $debitst - $kreditst;
			$total += $hasilst;
		?>
			<tr>
				<td class="text-center"><?= $i++ ?></td>
				<td class="text-center"><?= $row->no_reff ?></td>
				<td class="text-center" colspan="3"><?= $row->nama_reff ?></td>
				<td class="text-center"><?= 'Rp. ' . number_format($hasilst, 0, ',', '.') ?></td>
			</tr>
		<?php
		}
		?>
		<tr>
			<td colspan="5" class="text-center"><b>Jumlah Total</b></td>
			<td class="text-danger" colspan="3"><b><?= 'Rp. ' . number_format($total, 0, ',', '.') ?></b></td>
			<!-- <td colspan="2" class="text-danger"><b><?= 'Rp. ' . number_format($kredits->total, 0, ',', '.') ?></b></td> -->
		</tr>
		<!-- <tr class="text-center bg-danger ">
			<td colspan="6" class="text-white" style="font-weight:bolder;font-size:19px">TIDAK SEIMBANG</td>
		</tr> -->
	</table>
	<table class="mb-fix">
		<tr>
			<th colspan="6">Aktiva Tetap</th>
		</tr>
		<tr class="text-center font-bold">
			<td>No.</td>
			<td>No Reff</td>
			<td colspan="3">Nama Akun</td>
			<td></td>
		</tr>
		<?php
		$totals = 0;
		$debits = 0;
		$kredits = 0;
		$hasils = 0;
		foreach ($tetap as $tep) {
			// $totals += $tep->hasil;
			if ($tep->jenis_saldo == 'debit') {
				$debits = $debits + $tep->saldo;
			} else {
				$kredits = $kredits + $tep->saldo;
			}
			$hasils = $debits - $kredits;
			$totals += $hasils;
		?>
			<tr>
				<td class="text-center"><?= $i++ ?></td>
				<td class="text-center"><?= $tep->no_reff ?></td>
				<td class="text-center" colspan="3"><?= $tep->nama_reff ?></td>
				<td class="text-center"><?= 'Rp. ' . number_format($hasils, 0, ',', '.') ?></td>
			</tr>
		<?php
		}
		?>
		<tr>
			<td colspan="5" class="text-center"><b>Jumlah Total</b></td>
			<td class="text-danger" colspan="3"><b><?= 'Rp. ' . number_format($totals, 0, ',', '.') ?></b></td>
		</tr>
	</table>
	<table class="mb-fix">
		<tr>
			<th colspan="6">Pasiva</th>
		</tr>
		<tr class="text-center font-bold">
			<td>No.</td>
			<td>No Reff</td>
			<td colspan="3">Nama Akun</td>
			<td></td>
		</tr>
		<?php
		$totalss = 0;
		$debit = 0;
		$kredit = 0;
		$hasil = 0;
		foreach ($pasiva as  $pasiv) {
			// $totalss += $pasiv->hasil;
			if ($pasiv->jenis_saldo == 'debit') {
				$debit = $debit + $pasiv->saldo;
			} else {
				$kredit = $kredit + $pasiv->saldo;
			}
			$hasil = $debit - $kredit;
			$totalss += $hasil;
		?>
			<tr>
				<td class="text-center"><?= $i++ ?></td>
				<td class="text-center"><?= $pasiv->no_reff ?></td>
				<td class="text-center" colspan="3"><?= $pasiv->nama_reff ?></td>
				<td class="text-center"><?= 'Rp. ' . number_format($hasil, 0, ',', '.') ?></td>
			</tr>
		<?php
		}
		?>
		<tr>
			<td colspan="5" class="text-center"><b>Jumlah Total</b></td>
			<td class="text-danger" colspan="3"><b><?= 'Rp. ' . number_format($totalss, 0, ',', '.') ?></b></td>
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