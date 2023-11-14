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
	<h1 class="text-center">Laporan <?= $tahun ?></h1>
	<hr>

	<h3 class="m-fix text-center" style="margin-top:40px">Laba Rugi</h3>
	<table class="mb-fix">
		<tr>
			<td colspan="5">PENDAPATAN</td>
		</tr>
		<tr class="text-center font-bold">
			<td>No.</td>
			<td>Uraian</td>
			<td>Jumlah Beban Usaha (Rp)</td>
			<td>Jumlah Pendapatan (Rp)</td>
			<td>#</td>
		</tr>
		<?php
		$i = 1;
		$total = 0;
		$kreditst = 0;
		foreach ($jurnal_pendapatan as $row) {
			// $total += $value->hasil;
			if ($row->jenis_saldo == 'kredit') {
				$kreditst = $kreditst + $row->saldo;
			}
		?>
			<tr>
				<td class="text-center"><?= $i++ ?></td>
				<td class="text-center"><?= $row->keterangan ?></td>
				<td class="text-center"> - </td>
				<td class="text-center"><?= 'Rp. ' . number_format($row->saldo, 0, ',', '.') ?></td>
				<td class="text-center"></td>
			</tr>
		<?php } ?>

		<tr>
			<td colspan="4"><b>Total Pendapatan</b></td>
			<!-- <td class="text-danger"><b><?= 'Rp. ' . number_format($debits->total, 0, ',', '.') ?></b></td> -->
			<td colspan="2" class="text-danger"><b><?= 'Rp. ' . number_format($kreditst, 0, ',', '.') ?></b></td>
		</tr>
	</table>
	<table class="mb-fix">
		<tr>
			<th colspan="5">BEBAN USAHA</th>
		</tr>
		<tr class="text-center font-bold">
			<td>No.</td>
			<td>Uraian</td>
			<td>Jumlah Beban Usaha (Rp)</td>
			<td>Jumlah Pendapatan (Rp)</td>
			<td>#</td>
		</tr>
		<?php
		$i = 1;
		$total = 0;
		$debits = 0;
		foreach ($jurnal_beban as $row) {
			// $total += $value->hasil;
			if ($row->jenis_saldo == 'debit') {
				$debits = $debits + $row->saldo;
			}
		?>
			<tr>
				<td class="text-center"><?= $i++ ?></td>
				<td class="text-center"><?= $row->keterangan ?></td>
				<td class="text-center"><?= 'Rp. ' . number_format($row->saldo, 0, ',', '.') ?></td>
				<td class="text-center"> - </td>
				<td class="text-center"></td>
			</tr>
		<?php } ?>

		<tr>
			<td colspan="4"><b>Total Beban Usaha</b></td>
			<td colspan="2" class="text-danger"><b><?= 'Rp. ' . number_format($debits, 0, ',', '.') ?></b></td>
		</tr>
		<?php
		$total = 0;
		$debitst = 0;
		$kreditst = 0;
		$hasilst = 0;
		foreach ($keuangan as $row) {
			if ($row->jenis_saldo == 'debit') {
				$debitst = $debitst + $row->saldo;
			} else {
				$kreditst = $kreditst + $row->saldo;
			}
			$hasilst = $debitst - $kreditst;
			$total += $hasilst;

			// $pph =  (0.5 / 100 * $hasilst);
			// $ppn =  (11 / 100 * $pph);
			$pph =  (0.5 / 100 * $hasilst);
			$ppn =  $hasilst - ($hasilst * 11.5 / 100);
		?>
		<?php } ?>
		<tr>
			<td colspan="4"><b>Laba Sebelum Dikurangi Pajak</b></td>
			<td colspan="2" class="text-danger"><b><?= 'Rp. ' . number_format($hasilst, 0, ',', '.') ?></b></td>
		</tr>
		<tr>
			<td colspan="4"><b>Pajak PPh dan PPn</b></td>
			<td colspan="2" class="text-danger"><b>PPh (0.5%) - PPn (11%)</b></td>
		</tr>
		<tr>
			<td colspan="4"><b>Laba Bersih Setelah Dikurangi Pajak</b></td>
			<td colspan="2" class="text-danger"><b><?= 'Rp. ' . number_format($ppn, 0, ',', '.') ?></b></td>
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