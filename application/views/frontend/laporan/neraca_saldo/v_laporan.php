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
	<h3 class="m-fix text-center" style="margin-top:10px">Neraca Saldo</h3>
	<table class="mb-fix">
		<tr class="text-center font-bold">
			<td>No.</td>
			<td>Nama Akun</td>
			<td>Reff</td>
			<td>Debit</td>
			<td>Kredit</td>
		</tr>
		<?php
		$totalDebit = 0;
		$totalKredit = 0;
		$debit = 0;
		$kredit = 0;
		$o = 1;
		foreach ($jurnal as $neraca) :
			$s = 0;
		?>
			<tr>
				<td><?= $o++ ?></td>
				<td>
					<?= $neraca->nama_reff ?>
				</td>
				<td>
					<?= $neraca->no_reff ?>
				</td>
				<?php
				if ($neraca->jenis_saldo == "debit") {
					$debit = $debit + $neraca->saldo;
				} else {
					$kredit = $kredit + $neraca->saldo;
				}
				$hasil = $debit - $kredit;
				?>
				<?php
				if ($hasil >= 0) { ?>
					<td class="text-success"><?= 'Rp. ' . number_format($hasil, 0, ',', '.') ?></td>
					<td> - </td>
					<?php $totalDebit += $hasil; ?>
				<?php } else { ?>
					<td> - </td>
					<td class="text-danger"><?= 'Rp. ' . number_format(abs($hasil), 0, ',', '.') ?></td>
					<?php $totalKredit += $hasil; ?>
				<?php } ?>
				<?php
				$debit = 0;
				$kredit = 0;
				?>
			</tr>
		<?php endforeach ?>
		<?php if ($totalDebit != abs($totalKredit)) { ?>
			<tr>
				<td class="text-center" colspan="3"><b>Total</b></td>
				<td class="text-danger"><?= 'Rp. ' . number_format($totalDebit, 0, ',', '.') ?></td>
				<td class="text-danger"><?= 'Rp. ' . number_format(abs($totalKredit), 0, ',', '.') ?></td>
			</tr>
			<tr class="bg-danger text-center">
				<td colspan="6" class="text-white" style="font-weight:bolder;font-size:19px">TIDAK SEIMBANG</td>
			</tr>
		<?php } else { ?>
			<tr>
				<td class="text-center" colspan="3"><b>Total</b></td>
				<td class="text-success"><?= 'Rp. ' . number_format($totalDebit, 0, ',', '.') ?></td>
				<td class="text-success"><?= 'Rp. ' . number_format(abs($totalKredit), 0, ',', '.') ?></td>
			</tr>
			<tr class="bg-success text-center">
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