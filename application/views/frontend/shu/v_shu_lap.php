<div class="container-fluid py-4">
	<div class="card mt-4">
		<div class="card-header p-3">
			<h5 class="mb-0"><?= $title ?></h5>
		</div>
		<div class="col-md-12 mb-lg-0 mb-4">
			<div class="card-body p-3">
				<div class="row">
					<div class="card-header">
						<h5>Priode Tahun</h5>
					</div>
					<?php echo form_open('shu/search_shu') ?>
					<div class="row">
						<div class="col">
							<label class="form-label">Tahun Akhir</label>
							<div class="input-group input-group-outline mb-3">
								<select name="sampai" class="form-control">
									<?php $mulai = date('Y') - 1;
									for ($i = $mulai; $i < $mulai + 10; $i++) {
										$sel = $i == date('Y') ? 'selected="selected"' : '';
										echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
									} ?>
								</select>
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