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
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Keterangan</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Debit</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kredit</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Saldo</th>
									<th class="text-secondary opacity-7"></th>
								</tr>
							</thead>
							<tbody>
								<?php $saldos = 0;
								$debit = 0;
								$kredit = 0;
								foreach ($transaksi as $key => $value) {
									if ($value->jenis_saldo == 'debit') {
										$debit = $debit + $value->saldo;
									} else {
										$kredit = $kredit + $value->saldo;
									}
									$saldos = $debit - $kredit;
									// $saldos += $value->debet;
									// $saldos -= $value->kredit;
								?>
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
										<td>
											<p class="text-xs font-weight-bold mb-0"><?= $value->keterangan ?></p>
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
										<td class="align-middle text-center text-sm">
											<span class="badge badge-sm bg-gradient-success">Rp. <?= number_format($saldos, 0) ?></span>
										</td>
										<td class="align-middle">
											<a href="<?= base_url('transaksi/update/' . $value->id_transaksi) ?>" class="btn bg-gradient-warning btn-sm">
												Edit
											</a>
											<a href="<?= base_url('transaksi/delete/' . $value->id_transaksi) ?>" class="btn bg-gradient-danger btn-sm">
												Hapus
											</a>
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