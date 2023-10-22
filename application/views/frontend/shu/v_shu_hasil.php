<div class="container-fluid py-4">
	<div class="row">
		<div class="col-12">
			<div class="card my-4">
				<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
					<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
						<h6 class="text-white text-capitalize ps-3"><?= $title ?></h6>
					</div>
				</div>
				<div class="card-body px-0 pb-2">
					<div class="table-responsive p-0">
						<table class="table align-items-center mb-0">
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
							<thead>
								<th>
									<h5>ALOKASI PEMBAGIAN SHU Rp. <?= number_format($hasil_shu, 0) ?></h5>
								</th>
								<th></th>
								<th></th>
								<tr>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PENGGUNAAN SHU</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">PERSENTASE</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">JUMLAH</th>
									<th class="text-secondary opacity-7"></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th>
										<h6 class="mb-0 text-sm">1. Dana Cadangan</h6>
									</th>
									<th>10%</th>
									<th>Rp. <?= number_format($hasil_shu - (10 / 100 * $hasil_shu), 0) ?></th>
								</tr>
								<tr>
									<th>
										<h6 class="mb-0 text-sm">2. Dana Anggota</h6>
									</th>
									<th></th>
								</tr>
								<tr>
									&nbsp;<th>
										<h6 class="mb-0 text-sm"> - Jasa Modal Anggota</h6>
									</th>
									<th>25%</th>
									<th>Rp. <?= number_format($hasil_shu - (25 / 100 * $hasil_shu), 0) ?></th>
								</tr>
								<tr>
									&nbsp;<th>
										<h6 class="mb-0 text-sm"> - Jasa Anggota</h6>
									</th>
									<th>15%</th>
									<th>Rp. <?= number_format($hasil_shu - (15 / 100 * $hasil_shu), 0) ?></th>
								</tr>
								<tr>
									<th>
										<h6 class="mb-0 text-sm">3. Dana Pengurus</h6>
									</th>
									<th>10%</th>
									<th>Rp. <?= number_format($hasil_shu - (10 / 100 * $hasil_shu), 0) ?></th>
								</tr>
								<tr>
									<th>
										<h6 class="mb-0 text-sm">4. Dana Pengawas</h6>
									</th>
									<th>10%</th>
									<th>Rp. <?= number_format($hasil_shu - (10 / 100 * $hasil_shu), 0) ?></th>
								</tr>
								<tr>
									<th>
										<h6 class="mb-0 text-sm">5. Dana Kesejahtraan Karyawan</h6>
									</th>
									<th>10%</th>
									<th>Rp. <?= number_format($hasil_shu - (10 / 100 * $hasil_shu), 0) ?></th>
								</tr>
								<tr>
									<th>
										<h6 class="mb-0 text-sm">6. Dana Sosial</h6>
									</th>
									<th>2,5%</th>
									<th>Rp. <?= number_format($hasil_shu - (2.5 / 100 * $hasil_shu), 0) ?></th>
								</tr>
								<tr>
									<th>
										<h6 class="mb-0 text-sm">7. Dana Pembangunan Daerah Kerja</h6>
									</th>
									<th>2,5%</th>
									<th>Rp. <?= number_format($hasil_shu - (2.5 / 100 * $hasil_shu), 0) ?></th>
								</tr>
								<tr>
									<th>
										<h6 class="mb-0 text-sm">8. Dana Kesejahtraan Anggota</h6>
									</th>
									<th>15%</th>
									<th>Rp. <?= number_format($hasil_shu - (15 / 100 * $hasil_shu), 0) ?></th>
								</tr>
								<br>
								<tr>
									<th>
										<h5 class="text-center">Jumlah SHU Dibagikan</h5>
									</th>
									<th></th>
									<th>
										<h5>Rp. <?= number_format($hasil_shu, 0) ?></h5>
									</th>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>