<div class="container-fluid py-4">
	<div class="card mt-4">
		<div class="card-header p-3">
			<h5 class="mb-0"><?= $title ?></h5>
		</div>
		<div class="col-md-12 mb-lg-0 mb-4">
			<div class="card-body p-3">
				<div class="row">
					<div class="card-header">
						<h5>Priode Tanggal</h5>
					</div>
					<?php echo form_open('laporan_full/cetak_kas') ?>
					<div class="row">
						<div class="col">
							<label class="form-label">Arus Kas</label>
							<div class="input-group input-group-outline mb-3">
								<select name="id_index" class="form-control">
									<?php foreach ($keterangan as $key => $value) { ?>
										<option value="<?= $value->id_index ?>"><?= $value->keterangan ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col">
							<label class="form-label">Tanggal Awal</label>
							<div class="input-group input-group-outline mb-3">
								<input type="date" name="dari" value="<?= date('Y-m-d') ?>" class="form-control" required>
							</div>
						</div>
						<div class="col">
							<label class="form-label">Tanggal Akhir</label>
							<div class="input-group input-group-outline mb-3">
								<input type="date" name="sampai" value="<?= date('Y-m-d') ?>" class="form-control" required>
							</div>
						</div>
					</div>
					<div class="text-center">
						<button class="btn bg-gradient-info w-100 mb-0 toast-btn" type="submit">Proses</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<br>