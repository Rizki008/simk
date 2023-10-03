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
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Akun</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Reff</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Debit</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kredit</th>
									<th class="text-secondary opacity-7"></th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($jurnal as $key => $value) { ?>
									<tr>
										<td>
											<div class="d-flex px-2 py-1">
												<div class="d-flex flex-column justify-content-center">
													<h6 class="mb-0 text-sm"><?= $value->tgl_transaksi ?></h6>
												</div>
											</div>
										</td>
										<td>
											<p class="text-xs font-weight-bold mb-0"><?= $value->nama_reff ?></p>
										</td>
										<td class="align-middle text-center text-sm">
											<span class="badge badge-sm bg-gradient-success"><?= $value->no_reff ?></span>
										</td>
										<td class="align-middle text-center">
											<?php if ($value->jenis_saldo == 'debit') { ?>
												<span class="text-secondary text-xs font-weight-bold">Rp. <?= number_format($value->saldo, 0) ?></span>
											<?php } else { ?>
												<span class="text-secondary text-xs font-weight-bold">0</span>
											<?php } ?>
										</td>
										<td class="align-middle text-center">
											<?php if ($value->jenis_saldo == 'kredit') { ?>
												<span class="text-secondary text-xs font-weight-bold">Rp. <?= number_format($value->saldo, 0) ?></span>
											<?php } else { ?>
												<span class="text-secondary text-xs font-weight-bold">0</span>
											<?php } ?>
										</td>
										<td class="align-middle">
											<a href="<?= base_url('jurnal/update/' . $value->id_transaksi) ?>" class="btn bg-gradient-warning btn-sm">
												Edit
											</a>
											<a href="<?= base_url('jurnal/delete/' . $value->id_transaksi) ?>" class="btn bg-gradient-danger btn-sm">
												Hapus
											</a>
										</td>
									</tr>
								<?php } ?>
								<tr>
									<td></td>
									<td></td>
									<td class="align-middle text-center text-sm">
										<span class="badge badge-sm bg-gradient-success">Total Jumalah</span>
									</td>
									<td class="align-middle text-center">
										<?php foreach ($debit as $key => $debits) { ?>
										<?php } ?>
										<p class="text-xs font-weight-bold mb-0">Rp. <?= number_format($debits->total, 0) ?> </p>
									</td>
									<td class="align-middle text-center">
										<?php foreach ($kredit as $key => $kredits) { ?>
										<?php } ?>
										<p class="text-xs font-weight-bold mb-0">Rp. <?= number_format($kredits->total, 0) ?> </p>
									</td>
								</tr>

							</tbody>
						</table>
					</div>
					<br>
					<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
						<?php if ($debits->total != $kredits->total) { ?>
							<div class="bg-gradient-danger shadow-danger border-radius-lg pt-4 pb-3">
								<h6 class="text-white text-center text-capitalize ps-3">TIDAK SEIMBANG</h6>
							</div>
						<?php } else { ?>
							<div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
								<h6 class="text-white text-center text-capitalize ps-3">SEIMBANG</h6>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>