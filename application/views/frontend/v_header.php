<body class="g-sidenav-show  bg-gray-200">
	<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
		<div class="sidenav-header">
			<i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
			<a class="navbar-brand m-0" href=" <?= base_url('admin') ?> " target="_blank">
				<img src="<?= base_url() ?>template/assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
				<span class="ms-1 font-weight-bold text-white">SIMK</span>
			</a>
		</div>
		<hr class="horizontal light mt-0 mb-2">
		<div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link text-white <?php if (
														$this->uri->segment(1) == 'admin'
													) {
														echo "active bg-gradient-primary";
													} ?> " href="<?= base_url('admin') ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">dashboard</i>
						</div>
						<span class="nav-link-text ms-1">Dashboard</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white <?php if (
														$this->uri->segment(1) == 'anggota'
													) {
														echo "active bg-gradient-primary";
													} ?>" href="<?= base_url('anggota') ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">person</i>
						</div>
						<span class="nav-link-text ms-1">Anggota</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white <?php if (
														$this->uri->segment(1) == 'akun'
													) {
														echo "active bg-gradient-primary";
													} ?>" href="<?= base_url('akun') ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">table_view</i>
						</div>
						<span class="nav-link-text ms-1">Akun</span>
					</a>
				</li>
				<li class="nav-item mt-3">
					<h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Simpanan</h6>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white <?php if (
														$this->uri->segment(1) == 'simpanan' && $this->uri->segment(2) == 'pokok'
													) {
														echo "active bg-gradient-primary";
													} ?>" href="<?= base_url('simpanan/pokok') ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">save</i>
						</div>
						<span class="nav-link-text ms-1">Simpanan Pokok</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white <?php if (
														$this->uri->segment(1) == 'simpanan' && $this->uri->segment(2) == 'wajib'
													) {
														echo "active bg-gradient-primary";
													} ?>" href="<?= base_url('simpanan/wajib') ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">save</i>
						</div>
						<span class="nav-link-text ms-1">Simpanan Wajib</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white <?php if (
														$this->uri->segment(1) == 'simpanan' && $this->uri->segment(2) == 'sukarela'
													) {
														echo "active bg-gradient-primary";
													} ?>" href="<?= base_url('simpanan/sukarela') ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">save</i>
						</div>
						<span class="nav-link-text ms-1">Simpanan Sukarela</span>
					</a>
				</li>
				<li class="nav-item mt-3">
					<h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Laporan</h6>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white <?php if (
														$this->uri->segment(1) == 'indeks'
													) {
														echo "active bg-gradient-primary";
													} ?>" href="<?= base_url('indeks') ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">table_view</i>
						</div>
						<span class="nav-link-text ms-1">Data Index</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white <?php if (
														$this->uri->segment(1) == 'transaksi'
													) {
														echo "active bg-gradient-primary";
													} ?>" href="<?= base_url('transaksi') ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">qr_code</i>
						</div>
						<span class="nav-link-text ms-1">Transaksi Usaha</span>
					</a>
				</li>
				<!-- <li class="nav-item">
					<a class="nav-link text-white <?php if (
														$this->uri->segment(1) == 'transaksi' && $this->uri->segment(2) == 'pendapatan'
													) {
														echo "active bg-gradient-primary";
													} ?>" href="<?= base_url('transaksi/pendapatan') ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">archive</i>
						</div>
						<span class="nav-link-text ms-1">Pendapatan Usaha</span>
					</a>
				</li> -->
				<!-- <li class="nav-item">
					<a class="nav-link text-white <?php if (
														$this->uri->segment(1) == 'transaksi' && $this->uri->segment(2) == 'pengeluaran'
													) {
														echo "active bg-gradient-primary";
													} ?>" href="<?= base_url('transaksi/pengeluaran') ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">table_view</i>
						</div>
						<span class="nav-link-text ms-1">Pengeluaran Usaha</span>
					</a>
				</li> -->
				<li class="nav-item">
					<a class="nav-link text-white <?php if (
														$this->uri->segment(1) == 'keuangan'
													) {
														echo "active bg-gradient-primary";
													} ?>" href="<?= base_url('keuangan') ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">credit_card</i>
						</div>
						<span class="nav-link-text ms-1">Keuangan</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white <?php if (
														$this->uri->segment(1) == 'jurnal'
													) {
														echo "active bg-gradient-primary";
													} ?>" href="<?= base_url('jurnal') ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">archive</i>
						</div>
						<span class="nav-link-text ms-1">Jurnal Umum</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white <?php if (
														$this->uri->segment(1) == 'buku'
													) {
														echo "active bg-gradient-primary";
													} ?>" href="<?= base_url('buku') ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">book</i>
						</div>
						<span class="nav-link-text ms-1">Buku Besar</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white <?php if (
														$this->uri->segment(1) == 'neraca'
													) {
														echo "active bg-gradient-primary";
													} ?>" href="<?= base_url('neraca') ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">balance</i>
						</div>
						<span class="nav-link-text ms-1">Neraca saldo</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white <?php if (
														$this->uri->segment(1) == 'arus'
													) {
														echo "active bg-gradient-primary";
													} ?>" href="<?= base_url('arus') ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">wallet</i>
						</div>
						<span class="nav-link-text ms-1">Arus kas</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white <?php if (
														$this->uri->segment(1) == 'shu'
													) {
														echo "active bg-gradient-primary";
													} ?>" href="<?= base_url('shu') ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">scale</i>
						</div>
						<span class="nav-link-text ms-1">SHU</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white <?php if (
														$this->uri->segment(1) == 'laporan'
													) {
														echo "active bg-gradient-primary";
													} ?>" href="<?= base_url('laporan') ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">print</i>
						</div>
						<span class="nav-link-text ms-1">Laporan</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="<?= base_url('home/logout') ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">login</i>
						</div>
						<span class="nav-link-text ms-1">Sign Out</span>
					</a>
				</li>
			</ul>
		</div>
	</aside>