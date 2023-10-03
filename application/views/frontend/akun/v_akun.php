<div class="container-fluid py-4">
	<div class="row">
		<div class="col-12">
			<div class="card my-4">
				<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
					<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
						<h6 class="text-white text-capitalize ps-3"><?= $title ?></h6>
						<button type="button" class="btn bg-gradient-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
							Tambah Akun
						</button>
					</div>
				</div>
				<div class="card-body px-0 pb-2">
					<div class="table-responsive p-0">
						<table class="table align-items-center mb-0">
							<thead>
								<tr>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No Reff</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Reff</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
									<th class="text-secondary opacity-7"></th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($akun as $key => $value) { ?>
									<tr>
										<td>
											<div class="d-flex px-2 py-1">
												<div class="d-flex flex-column justify-content-center">
													<h6 class="mb-0 text-sm"><?= $no++ ?></h6>
												</div>
											</div>
										</td>
										<td>
											<p class="text-xs font-weight-bold mb-0"><?= $value->no_reff ?></p>
										</td>
										<td class="align-middle text-center text-sm">
											<span class="badge badge-sm bg-gradient-success"><?= $value->nama_reff ?></span>
										</td>
										<td class="align-middle text-center">
											<span class="text-secondary text-xs font-weight-bold"><?= $value->keterangan ?></span>
										</td>
										<td class="align-middle">
											<button type="button" class="btn bg-gradient-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?= $value->id_akun ?>">
												Edit
											</button>
											<button type="button" class="btn bg-gradient-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?= $value->id_akun ?>">
												Hapus
											</button>
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

	<!-- Modal Absensi -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<?php
				echo form_open('akun/add')
				?>
				<input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user') ?>" class="form-control">
				<div class="modal-body">
					<label class="form-label">No Reff</label>
					<div class="input-group input-group-outline mb-3">
						<input type="text" name="no_reff" class="form-control" placeholder="No Reff">
					</div>
					<label class="form-label">Nama Reff</label>
					<div class="input-group input-group-outline mb-3">
						<input type="text" name="nama_reff" class="form-control" placeholder="Nama Reff">
					</div>
					<label class="form-label">Keterangan</label>
					<div class="input-group input-group-outline mb-3">
						<input type="text" name="keterangan" class="form-control" placeholder="Keterangan">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
				<?php echo form_close() ?>
			</div>
		</div>
	</div>

	<?php foreach ($akun as $key => $values) { ?>
		<div class="modal fade" id="edit<?= $values->id_akun ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<?php
					echo form_open('akun/update/' . $values->id_akun)
					?>
					<input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user') ?>" class="form-control">
					<div class="modal-body">
						<label class="form-label">No Reff</label>
						<div class="input-group input-group-outline mb-3">
							<input type="text" name="no_reff" class="form-control" value="<?= $values->no_reff ?>" placeholder="No Reff">
						</div>
						<label class="form-label">Nama Reff</label>
						<div class="input-group input-group-outline mb-3">
							<input type="text" name="nama_reff" class="form-control" value="<?= $values->nama_reff ?>" placeholder="Nama Reff">
						</div>
						<label class="form-label">Keterangan</label>
						<div class="input-group input-group-outline mb-3">
							<input type="text" name="keterangan" class="form-control" value="<?= $values->keterangan ?>" placeholder="Keterangan">
						</div>
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
	<?php foreach ($akun as $key => $valuesa) { ?>
		<div class="modal fade" id="delete<?= $valuesa->id_akun ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<?php
					echo form_open('akun/delete/' . $valuesa->id_akun)
					?>
					<div class="modal-body">
						<h5>Yakin Hapus Nama Reff <?= $valuesa->nama_reff ?></h5>
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