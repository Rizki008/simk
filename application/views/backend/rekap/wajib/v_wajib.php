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
	<h1 class="text-center">Rekap Simpanan Wajib <?= $bulan ?> <?= $tahun ?></h1>
	<hr>
	<h3 class="m-fix text-center" style="margin-top:10px">Rekap Simpanan Wajib</h3>

	<table class="mb-fix" style="margin-top:20px;margin-bottom:10px;margin-bottom:10px">
		<tr class="text-center font-bold">
			<td rowspan="2">No.</td>
			<td rowspan="2">Nomor Anggota</td>
			<td rowspan="2">Jumlah Total Simpanan </td>
		</tr><br>
		<?php $o = 1;
		$debit = 0;
		$kredit = 0;
		$hasil = 0;
		foreach ($wajib as $value) {
			if ($value->jenis_saldo == "debit") {
				$debit = $debit + $value->saldo;
			} else {
				$kredit = $kredit + $value->saldo;
			}
			$hasil = $debit - $kredit;
		?>
			<tr class="text-center">
				<td><?= $o++; ?></td>
				<td><?= $value->no_anggota ?></td>
				<td><?= $hasil ?></td>
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