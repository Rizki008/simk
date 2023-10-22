<div class="container-fluid py-4">
	<div class="row">
		<div class="col-12">
			<div class="card my-4">
				<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
					<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
						<h6 class="text-white text-capitalize ps-3"><?= $title ?></h6>
						<button type="button" class="btn bg-gradient-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
							Tambah Anggota
						</button>
					</div>
				</div>
				<div class="card-body px-0 pb-2">
					<div class="table-responsive p-0">
						<table class="table align-items-center mb-0">
							<thead>
								<tr>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Anggota</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Masuk</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Hp</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
									<th class="text-secondary opacity-7"></th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($anggota as $key => $value) { ?>
									<tr>
										<td>
											<div class="d-flex px-2 py-1">
												<div class="d-flex flex-column justify-content-center">
													<h6 class="mb-0 text-sm"><?= $no++ ?></h6>
												</div>
											</div>
										</td>
										<td class="align-middle text-center">
											<span class="text-secondary text-xs font-weight-bold"><?= $value->no_anggota ?></span>
										</td>
										<td class="align-middle text-center">
											<span class="text-secondary text-xs font-weight-bold"><?= $value->nama ?></span>
										</td>
										<td class="align-middle text-center">
											<span class="text-secondary text-xs font-weight-bold"><?= $value->tgl_masuk ?></span>
										</td>
										<td class="align-middle text-center">
											<span class="text-secondary text-xs font-weight-bold"><?= $value->no_hp ?></span>
										</td>
										<td class="align-middle text-center">
											<span class="text-secondary text-xs font-weight-bold"><?= $value->alamat ?></span>
										</td>
										<td class="align-middle">
											<button type="button" class="btn bg-gradient-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?= $value->id_anggota ?>">
												Edit
											</button>
											<button type="button" class="btn bg-gradient-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?= $value->id_anggota ?>">
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
				echo form_open('anggota/add')
				?>
				<div class="modal-body">
					<label class="form-label">No Anggota</label>
					<div class="input-group input-group-outline mb-3">
						<input type="text" name="no_anggota" class="form-control" placeholder="No Anggota">
					</div>
					<label class="form-label">Nama Anggota</label>
					<div class="input-group input-group-outline mb-3">
						<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
					</div>
					<label class="form-label">Tanggal Masuk</label>
					<div class="input-group input-group-outline mb-3">
						<input type="datetime-local" name="tgl_masuk" class="form-control" value="<?= date('Y-m-d H:i:s') ?>" placeholder="Tanggal Masuk">
					</div>
					<label class="form-label">No Hp</label>
					<div class="input-group input-group-outline mb-3">
						<input type="number" name="no_hp" class="form-control" placeholder="No Hp">
					</div>
					<label class="form-label">Alamat</label>
					<div class="input-group input-group-outline mb-3">
						<input type="text" name="alamat" class="form-control" placeholder="Alamat">
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

	<?php foreach ($anggota as $key => $values) { ?>
		<div class="modal fade" id="edit<?= $values->id_anggota ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<?php
					echo form_open('anggota/update/' . $values->id_anggota)
					?>
					<div class="modal-body">
						<label class="form-label">No Anggotap</label>
						<div class="input-group input-group-outline mb-3">
							<input type="text" name="no_anggota" class="form-control" value="<?= $values->no_anggota ?>" placeholder="No ANggota">
						</div>
						<label class="form-label">Nama Lengkap</label>
						<div class="input-group input-group-outline mb-3">
							<input type="text" name="nama" class="form-control" value="<?= $values->nama ?>" placeholder="Nama Lengkap">
						</div>
						<label class="form-label">Tanggal Masuk</label>
						<div class="input-group input-group-outline mb-3">
							<input type="datetime" name="tgl_masuk" class="form-control" value="<?= $values->tgl_masuk ?>" placeholder="Tanggal Masuk">
						</div>
						<label class="form-label">NO HP</label>
						<div class="input-group input-group-outline mb-3">
							<input type="number" name="no_hp" class="form-control" value="<?= $values->no_hp ?>" placeholder="No HP">
						</div>
						<label class="form-label">Alamat</label>
						<div class="input-group input-group-outline mb-3">
							<input type="text" name="alamat" class="form-control" value="<?= $values->alamat ?>" placeholder="Alamat">
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

	<?php foreach ($anggota as $key => $valuesa) { ?>
		<div class="modal fade" id="delete<?= $valuesa->id_anggota ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<?php
					echo form_open('anggota/delete/' . $valuesa->id_anggota)
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