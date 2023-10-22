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
							<thead>
								<tr>
									<th>
										<h4>PENDAPATAN</h4>
									</th>
									<th></th>
									<th></th>
								</tr>
								<tr>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">URAIAN</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">JUMLAH BEBAN USAHA (Rp)</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">JUMLAH PENDAPATAN (Rp)</th>
									<th class="text-secondary opacity-7"></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$total = 0;
								$kreditst = 0;
								foreach ($pendapatan as $key => $value) {
									// $total += $value->hasil;
									if ($value->jenis_saldo == 'kredit') {
										$kreditst = $kreditst + $value->saldo;
									}
								?>
									<tr>
										<td>
											<div class="d-flex px-2 py-1">
												<div class="d-flex flex-column justify-content-center">
													<h6 class="mb-0 text-sm"><?= $value->keterangan ?></h6>
												</div>
											</div>
										</td>
										<td>
											<p class="text-xs font-weight-bold mb-0">-</p>
										</td>
										<td>
											<p class="text-xs font-weight-bold mb-0">Rp. <?= number_format($value->saldo, 0) ?></p>
										</td>
									</tr>
								<?php } ?>
								<tr>
									<th>
										<h6>Total Pendapatan</h6>
									</th>
									<th></th>
									<th>Rp. <?= number_format($kreditst, 0) ?></th>
								</tr>
							</tbody>
							<thead>
								<tr>
									<th>BEBAN USAHA</th>
									<th></th>
									<th></th>
								</tr>
								<tr>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">URAIAN</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">JUMLAH BEBAN USAHA (Rp)</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">JUMLAH PENDAPATAN (Rp)</th>
									<th class="text-secondary opacity-7"></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$totals = 0;
								$debits = 0;
								foreach ($beban as $key => $tep) {
									// $totals += $tep->hasil;
									if ($tep->jenis_saldo == 'debit') {
										$debits = $debits + $tep->saldo;
									}
								?>
									<tr>
										<td>
											<div class="d-flex px-2 py-1">
												<div class="d-flex flex-column justify-content-center">
													<h6 class="mb-0 text-sm"><?= $tep->keterangan ?></h6>
												</div>
											</div>
										</td>
										<td>
											<p class="text-xs font-weight-bold mb-0">Rp. <?= number_format($tep->saldo, 0) ?></p>
										</td>
										<td class="align-middle text-center">
											<p class="text-xs font-weight-bold mb-0">-</p>
											<!-- <span class="text-secondary text-xs font-weight-bold">Rp. <?= number_format($hasils, 0) ?></span> -->
										</td>
									</tr>
								<?php } ?>
								<tr>
									<th>
										<h6>Total Beban Usaha</h6>
									</th>
									<th></th>
									<th>Rp. <?= number_format($debits, 0) ?></th>
								</tr>
								<?php
								$total = 0;
								$debitst = 0;
								$kreditst = 0;
								$hasilst = 0;
								foreach ($keuangan as $key => $value) {
									if ($value->jenis_saldo == 'debit') {
										$debitst = $debitst + $value->saldo;
									} else {
										$kreditst = $kreditst + $value->saldo;
									}
									$hasilst = $debitst - $kreditst;
									$total += $hasilst;

									$pph =  (0.5 / 100 * $hasilst);
									$ppn =  (11 / 100 * $pph);
								?>
								<?php } ?>
								<tr>
									<th>
										<h6>Laba Sebelum Dikurangi Pajak</h6>
									</th>
									<th></th>
									<th>Rp. <?= number_format($hasilst, 0) ?></th>
								</tr>
								<tr>
									<th>
										<h6>Pajak PPh dan PPn</h6>
									</th>
									<th></th>
									<th>PPh (0.5%) - PPn (11%)</th>
								</tr>
								<tr>
									<th>
										<h6>Laba Bersih setelah Dikurangi Pajak</h6>
									</th>
									<th></th>
									<th>Rp. <?= number_format($ppn, 0) ?></th>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>