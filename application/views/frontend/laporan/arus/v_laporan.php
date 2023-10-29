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
	<h1 class="text-center">Laporan Arus Kas <?= $id_index ?> <?= $dari ?> Sampai <?= $sampai ?></h1>
	<hr>
	<h3 class="m-fix text-center">Data Arus Kas</h3>
	<?php if (count($keterangan) > 0) { ?>
		<?php foreach ($keterangan as $key => $ket) { ?>
			<table class="mb-fix">
				<tr class="text-center font-bold">
					<td>No.</td>
					<td><?= $ket->keterangan ?></td>
					<td>Debet</td>
					<td>Kredit</td>
				</tr>
				<?php
				$i = 1;
				$total = 0;
				$debit = 0;
				$kredit = 0;
				$hasil = 0;
				foreach ($kas as $key => $value) {
					if (
						$value->jenis_saldo == "debit"
					) {
						$debit = $debit + $value->saldo;
					} else {
						$kredit = $kredit + $value->saldo;
					}
					$hasil = $debit - $kredit;
					$total += $hasil;
				?>
					<tr class="text-center">
						<td><?= $i++ ?></td>
						<td><?= $value->keterangan ?></td>
						<?php if ($value->jenis_saldo == "debit") { ?>
							<td>Rp. <?= number_format($value->saldo, 0) ?></td>
							<td> - </td>
						<?php } else { ?>
							<td> - </td>
							<td>Rp. <?= number_format($value->saldo, 0) ?></td>
						<?php } ?>
					</tr>
				<?php } ?>
				<tr>
					<td class="text-center" colspan="3"><b>Total</b></td>
					<td class="text-success text-center"><?= 'Rp. ' . number_format($total, 0, ',', '.') ?></td>
				</tr>
			</table>
	<?php }
	} ?>
	<p class="text-right" style="margin-top:50px;">Dicetak Oleh <?= $this->session->userdata('nama') ?> Pada Tanggal
		<?php date_default_timezone_set('Asia/Jakarta');
		$date = new DateTime('now');
		echo $date->format('d-m-Y : H:i:s');
		?>
	</p>
</body>

</html>