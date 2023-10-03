<div class="container-fluid py-4">
	<div class="row">
		<div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
			<div class="card">
				<div class="card-header p-3 pt-2">
					<div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
						<i class="material-icons opacity-10">weekend</i>
					</div>
					<div class="text-end pt-1">
						<p class="text-sm mb-0 text-capitalize">Jumalah Akun</p>
						<h4 class="mb-0"><?= $totalakun ?></h4>
					</div>
				</div>
				<hr class="dark horizontal my-0">
			</div>
		</div>
		<div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
			<div class="card">
				<div class="card-header p-3 pt-2">
					<div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
						<i class="material-icons opacity-10">account_balance_wallet</i>
					</div>
					<?php foreach ($totaldebit as $key => $debit) { ?>
					<?php } ?>
					<div class="text-end pt-1">
						<p class="text-sm mb-0 text-capitalize">Jumlah Saldo Debit</p>
						<h4 class="mb-0">Rp. <?= number_format($debit->total, 0) ?></h4>
					</div>
				</div>
				<hr class="dark horizontal my-0">
			</div>
		</div>
		<div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
			<div class="card">
				<div class="card-header p-3 pt-2">
					<div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
						<i class="material-icons opacity-10">account_balance_wallet</i>
					</div>
					<?php foreach ($totalkredit as $key => $kredit) { ?>
					<?php } ?>
					<div class="text-end pt-1">
						<p class="text-sm mb-0 text-capitalize">Jumlah Saldo Kredit</p>
						<h4 class="mb-0">Rp. <?= number_format($kredit->totals) ?></h4>
					</div>
				</div>
				<hr class="dark horizontal my-0">
			</div>
		</div>
	</div>
	<div class="row mt-4">
	</div>
	<div class="row mb-4">
		<div class="col-lg-12 col-md-6 mb-md-0 mb-4">
			<div class="card">
				<div class="card-header pb-0">
					<div class="row">
						<div class="col-lg-6 col-7">
							<h6>Data Akun</h6>
						</div>
					</div>
				</div>
				<div class="card-body px-0 pb-2">
					<div class="table-responsive">
						<table class="table align-items-center mb-0">
							<thead>
								<tr>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No Reff</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Reff</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($akun as $row) { ?>
									<tr>
										<td>
											<div class="d-flex px-2 py-1">
												<div class="d-flex flex-column justify-content-center">
													<h6 class="mb-0 text-sm"><?= $no++ ?></h6>
												</div>
											</div>
										</td>
										<td>
											<p class="text-xs font-weight-bold mb-0"><?= $row->no_reff ?></p>
										</td>
										<td class="align-middle text-center text-sm">
											<span class="text-xs font-weight-bold"> <?= $row->nama_reff ?> </span>
										</td>
										<td class="align-middle">
											<div class="progress-wrapper w-75 mx-auto">
												<div class="progress-info">
													<div class="progress-percentage">
														<span class="text-xs font-weight-bold"><?= $row->keterangan ?></span>
													</div>
												</div>
											</div>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>