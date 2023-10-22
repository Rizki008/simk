<div class="container-fluid py-4">
	<div class="row">
		<div class="col-12">
			<div class="card my-4">
				<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
					<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
						<h6 class="text-white text-capitalize ps-3"><?= $title ?></h6>
						<a href="<?= base_url('simpanan/add_wajib') ?>" class="btn bg-gradient-success btn-sm">
							Tambah Simpanan Wajib
						</a>
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
								foreach ($wajib as $key => $value) { ?>
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
										<td class="align-middle">
											<a href="<?= base_url('simpanan/update_wajib/' . $value->id_transaksi) ?>" class="btn bg-gradient-warning btn-sm">
												Edit
											</a>
											<!-- <button type="button" class="btn bg-gradient-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?= $value->id_anggota ?>">
												Hapus
											</button> -->
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

	<?php foreach ($wajib as $key => $valuesa) { ?>
		<div class="modal fade" id="delete<?= $valuesa->id_transaksi ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<?php
					echo form_open('anggota/delete_wajib/' . $valuesa->id_transaksi)
					?>
					<div class="modal-body">
						<h5>Yakin Hapus Nama Index <?= $valuesa->nama ?></h5>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
					<?php echo form_close() ?>
				</div>
			</div>
		</div>
	<?php } ?>
