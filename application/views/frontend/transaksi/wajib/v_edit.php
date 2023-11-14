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
							<tbody>
								<?php
								//notifikasi form kosong
								echo validation_errors('<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fa fa-exclamation-triangle"></i>', '</h5></div>');

								//notifikasi gagal upload gambar
								if (isset($error_upload)) {
									echo '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-exclamation-triangle"></i>' . $error_upload . '</h5></div>';
								}

								echo form_open_multipart('simpanan/update_wajib/' . $transaksi->id_transaksi);
								$no_transaksi = date('Ymd') . strtoupper(random_string('alnum', 8));
								?>
								<input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user') ?>" class="form-control">
								<input type="hidden" name="no_transaksi" value="<?= $no_transaksi ?>" class="form-control">

								<div class="modal-body">
									<label class="form-label">Tanggal Transaksi</label>
									<div class="input-group input-group-outline mb-3">
										<input type="date" name="tgl_transaksi" class="form-control" value="<?= $transaksi->tgl_transaksi ?>" readonly>
									</div>
									<label class="form-label">No Anggota</label>
									<div class="input-group input-group-outline mb-3">
										<select name="no_anggota" class="form-control">
											<option value="<?= $transaksi->no_anggota ?>"><?= $transaksi->no_anggota ?></option>
											<option>--Pilih--</option>
											<?php foreach ($anggota as $key => $anggotas) { ?>
												<option value="<?= $anggotas->no_anggota ?>" data-reff="<?= $anggotas->no_anggota ?>"><?= $anggotas->no_anggota ?></option>
											<?php } ?>
										</select>
									</div>
									<label class="form-label">Nama Akun</label>
									<div class="input-group input-group-outline mb-3">
										<select name="no_reff" id="reff" class="form-control">
											<option value="<?= $transaksi->no_reff ?>"><?= $transaksi->nama_reff ?></option>
											<option>--Pilih--</option>
											<?php foreach ($akun as $key => $akuns) { ?>
												<option value="<?= $akuns->no_reff ?>" data-reff="<?= $akuns->no_reff ?>"><?= $akuns->nama_reff ?></option>
											<?php } ?>
										</select>
									</div>
									<label class="form-label">No Reff</label>
									<div class="input-group input-group-outline mb-3">
										<input type="text" name="no_reff" value="<?= $transaksi->no_reff ?>" class="no_reff form-control" disabled>
									</div>
									<!-- <label class="form-label">Keterangan</label>
									<div class="input-group input-group-outline mb-3">
										<input type="text" name="keterangan" value="<?= $transaksi->keterangan ?>" class="form-control" placeholder="Keterangan">
									</div> -->
									<label class="form-label">Jenis Saldo</label>
									<div class="input-group input-group-outline mb-3">
										<select name="jenis_saldo" class="form-control" id="">
											<option value="<?= $transaksi->jenis_saldo ?>"><?= $transaksi->jenis_saldo ?></option>
											<option value="debit">Debit</option>
											<option value="kredit">Kredit</option>
										</select>
									</div>
									<label class="form-label">Jumlah</label>
									<div class="input-group input-group-outline mb-3">
										<input type="number" name="saldo" value="<?= $transaksi->saldo ?>" class="form-control" placeholder="Saldo">
									</div>
									<label class="form-label">Bukti Transaksi</label>
									<div class="input-group input-group-outline mb-3">
										<input type="file" name="bukti" class="form-control" value="<?= $transaksi->bukti ?>" placeholder="Bukti Transaksi">
									</div>
								</div>
								<div class="modal-footer">
									<a href="<?= base_url('simpanan/wajib') ?>" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
								<?php echo form_close() ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>