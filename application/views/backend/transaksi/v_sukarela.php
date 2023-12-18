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
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Transaksi</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Anggota</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Simpanan</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Simpanan Hp</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bukti Transaksi</th>
									<th class="text-secondary opacity-7"></th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($sukarela as $key => $value) { ?>
									<tr>
										<td>
											<div class="d-flex px-2 py-1">
												<div class="d-flex flex-column justify-content-center">
													<h6 class="mb-0 text-sm"><?= $no++ ?></h6>
												</div>
											</div>
										</td>
										<td class="align-middle text-center">
											<span class="text-secondary text-xs font-weight-bold"><?= $value->no_transaksi ?></span>
										</td>
										<td class="align-middle text-center">
											<span class="text-secondary text-xs font-weight-bold"><?= $value->no_anggota ?></span>
										</td>
										<td class="align-middle text-center">
											<span class="text-secondary text-xs font-weight-bold"><?= $value->tgl_transaksi ?></span>
										</td>
										<td class="align-middle text-center">
											<span class="text-secondary text-xs font-weight-bold"><?= $value->jenis_saldo ?></span>
										</td>
										<td class="align-middle text-center">
											<div>
												<img src="<?= base_url('assets/bukti/' . $value->bukti) ?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
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