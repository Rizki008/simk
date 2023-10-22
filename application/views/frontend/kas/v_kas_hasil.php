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
						<?php if (count($keterangan) > 0) { ?>
							<?php foreach ($keterangan as $key => $ket) { ?>
								<table class="table align-items-center mb-0">
									<thead>
										<tr>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><?= $ket->keterangan ?></th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Debet</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kredit</th>
											<th class="text-secondary opacity-7"></th>
										</tr>
									</thead>
									<tbody>
										<?php
										// $id_index = ['2', '3', '4'];
										// $dari = date('Y-m-d');
										// $samapi = date('Y-m-d');
										// $kasa = $this->m_neraca->hasil_arus_kas2($dari, $sampai);
										// echo $this->db->last_query();
										// die();
										?>
										<?php if (count($keterangan) > 0) { ?>
											<?php
											$total = 0;
											$debit = 0;
											$kredit = 0;
											$hasil = 0;
											foreach ($kas as $key => $value) {
												if (
													$value->jenis_saldo == "debit"
												) {
													$debit = $debit + $value->saldo;
												} else {
													$kredit = $kredit + $value->saldo;
												}
												$hasil = $debit - $kredit;
												$total += $hasil;
											?>
												<tr>
													<td>
														<div class="d-flex px-2 py-1">
															<div class="d-flex flex-column justify-content-center">
																<h6 class="mb-0 text-sm"><?= $value->keterangan ?></h6>
															</div>
														</div>
													</td>
													<?php if ($value->jenis_saldo == "debit") { ?>
														<td>
															<p class="text-xs font-weight-bold mb-0">Rp. <?= number_format($value->saldo, 0) ?></p>
														</td>
														<td>
															<p class="text-xs font-weight-bold mb-0">-</p>
														</td>
													<?php } else { ?>
														<td>
															<p class="text-xs font-weight-bold mb-0">-</p>
														</td>
														<td>
															<p class="text-xs font-weight-bold mb-0">Rp. <?= number_format($value->saldo, 0) ?></p>
														</td>
													<?php } ?>
													<td class="align-middle text-center"></td>
												</tr>
										<?php
											}
										} ?>
										<tr>
											<th>
												<h6>Total</h6>
											</th>
											<th></th>
											<th>Rp. <?= number_format($total, 0) ?></th>
										</tr>
									</tbody>
								</table>
						<?php }
						} ?>
					</div>
				</div>
			</div>
		</div>
	</div>