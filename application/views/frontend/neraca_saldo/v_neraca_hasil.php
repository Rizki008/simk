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
										<h4>Aktiva</h4>
									</th>
									<th></th>
									<th></th>
								</tr>
								<tr>
									<th>Aktiva Lancar</th>
									<th></th>
									<th></th>
								</tr>
								<tr>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Reff</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Akun</th>
									<th class="text-secondary opacity-7"></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$total = 0;
								$debitst = 0;
								$kreditst = 0;
								$hasilst = 0;
								foreach ($lancar as $key => $value) {
									// $total += $value->hasil;
									if ($value->jenis_saldo == 'debit') {
										$debitst = $debitst + $value->saldo;
									} else {
										$kreditst = $kreditst + $value->saldo;
									}
									$hasilst = $debitst - $kreditst;
									$total += $hasilst;
								?>
									<tr>
										<td>
											<div class="d-flex px-2 py-1">
												<div class="d-flex flex-column justify-content-center">
													<h6 class="mb-0 text-sm"><?= $value->no_reff ?></h6>
												</div>
											</div>
										</td>
										<td>
											<p class="text-xs font-weight-bold mb-0"><?= $value->nama_reff ?></p>
										</td>
										<td class="align-middle text-center">
											<span class="text-secondary text-xs font-weight-bold">Rp. <?= number_format($hasilst, 0) ?></span>
										</td>
									</tr>
								<?php } ?>
								<tr>
									<th>
										<h6>Total</h6>
									</th>
									<th></th>
									<th>Rp. <?= number_format($total, 0) ?></th>
								</tr>
							</tbody>
							<thead>
								<tr>
									<th>Aktiva Tetap</th>
									<th></th>
									<th></th>
								</tr>
								<tr>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Reff</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Akun</th>
									<th class="text-secondary opacity-7"></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$totals = 0;
								$debits = 0;
								$kredits = 0;
								$hasils = 0;
								foreach ($tetap as $key => $tep) {
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
										<td>
											<div class="d-flex px-2 py-1">
												<div class="d-flex flex-column justify-content-center">
													<h6 class="mb-0 text-sm"><?= $tep->no_reff ?></h6>
												</div>
											</div>
										</td>
										<td>
											<p class="text-xs font-weight-bold mb-0"><?= $tep->nama_reff ?></p>
										</td>
										<td class="align-middle text-center">
											<span class="text-secondary text-xs font-weight-bold">Rp. <?= number_format($hasils, 0) ?></span>
										</td>
									</tr>
								<?php } ?>
								<tr>
									<th>
										<h6>Total</h6>
									</th>
									<th></th>
									<th>Rp. <?= number_format($totals, 0) ?></th>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="table-responsive p-0">
						<table class="table align-items-center mb-0">
							<thead>
								<tr>
									<th>
										<h4>Pasiva</h4>
									</th>
									<th></th>
									<th></th>
								</tr>
								<tr>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Reff</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Akun</th>
									<th class="text-secondary opacity-7"></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$totalss = 0;
								$debit = 0;
								$kredit = 0;
								$hasil = 0;
								foreach ($pasiva as $key => $pasiv) {
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
										<td>
											<div class="d-flex px-2 py-1">
												<div class="d-flex flex-column justify-content-center">
													<h6 class="mb-0 text-sm"><?= $pasiv->no_reff ?></h6>
												</div>
											</div>
										</td>
										<td>
											<p class="text-xs font-weight-bold mb-0"><?= $pasiv->nama_reff ?></p>
										</td>
										<td class="align-middle text-center">
											<span class="text-secondary text-xs font-weight-bold">Rp. <?= number_format($hasil, 0) ?></span>
										</td>
									</tr>
								<?php } ?>
								<tr>
									<th>
										<h6>Total</h6>
									</th>
									<th></th>
									<th>Rp. <?= number_format($totalss, 0) ?></th>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>