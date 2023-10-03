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
								echo form_open('jurnal/add')
								?>
								<input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user') ?>" class="form-control">

								<div class="modal-body">
									<label class="form-label">Tanggal Transaksi</label>
									<div class="input-group input-group-outline mb-3">
										<input type="date" name="tgl_transaksi" class="form-control" placeholder="tanggal transaksi">
									</div>
									<label class="form-label">Nama Akun</label>
									<div class="input-group input-group-outline mb-3">
										<select name="no_reff" id="reff" class="form-control">
											<option>--Pilih--</option>
											<?php foreach ($akun as $key => $akuns) { ?>
												<option value="<?= $akuns->no_reff ?>" data-reff="<?= $akuns->no_reff ?>"><?= $akuns->nama_reff ?></option>
											<?php } ?>
										</select>
									</div>
									<label class="form-label">No Reff</label>
									<div class="input-group input-group-outline mb-3">
										<input type="text" name="no_reff" class="no_reff form-control" disabled>
									</div>
									<label class="form-label">Jenis Saldo</label>
									<div class="input-group input-group-outline mb-3">
										<select name="jenis_saldo" class="form-control" id="">
											<option value="debit">Debit</option>
											<option value="kredit">Kredit</option>
										</select>
									</div>
									<label class="form-label">Saldo</label>
									<div class="input-group input-group-outline mb-3">
										<input type="number" name="saldo" class="form-control" placeholder="Saldo">
									</div>
								</div>
								<div class="modal-footer">
									<a href="<?= base_url('jurnal') ?>" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
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