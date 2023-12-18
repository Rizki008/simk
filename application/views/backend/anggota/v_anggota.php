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

									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>