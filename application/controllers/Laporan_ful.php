<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_ful extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_laporan');
		$this->load->library('pdf');
	}

	// List all your items

	public function jurnal()
	{
		$data = array(
			'title' => 'Data Laporan',
			'bulantahun' => $this->m_laporan->bulantahun(),
			'isi' => 'backend/laporan/jurnal/v_laporanmain'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}
	public function buku()
	{
		$data = array(
			'title' => 'Data Laporan',
			'bulantahun' => $this->m_laporan->bulantahun(),
			'isi' => 'backend/laporan/buku/v_laporanmain'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}
	public function neraca()
	{
		$data = array(
			'title' => 'Data Laporan',
			'bulantahun' => $this->m_laporan->bulantahun(),
			'isi' => 'backend/laporan/neraca/v_laporanmain'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}
	public function saldo()
	{
		$data = array(
			'title' => 'Data Laporan',
			'bulantahun' => $this->m_laporan->bulantahun(),
			'isi' => 'backend/laporan/neraca_saldo/v_laporanmain'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}
	public function kas()
	{
		$data = array(
			'title' => 'Data Laporan',
			'keterangan' => $this->m_laporan->keterangan(),
			'isi' => 'backend/laporan/arus/v_laporanmain'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}
	public function shu()
	{
		$data = array(
			'title' => 'Data Laporan',
			'bulantahun' => $this->m_laporan->bulantahun(),
			'isi' => 'backend/laporan/shu/v_laporanmain'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}
	public function laba()
	{
		$data = array(
			'title' => 'Data Laporan',
			'bulantahun' => $this->m_laporan->bulan(),
			'isi' => 'backend/laporan/laba_rugi/v_laporanmain'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}

	public function cetak_jurnal()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$title = 'Laporan ' . $bulan . ' ' . $tahun;

		$akun = $this->m_laporan->akuns($bulan, $tahun);

		$jurnal = $this->m_laporan->jurnaldetailsatu($bulan, $tahun);
		$debit = $this->m_laporan->hasildebit($bulan, $tahun);
		$kredit = $this->m_laporan->hasilkredit($bulan, $tahun);

		$data = null;
		$saldo = null;

		foreach ($akun as $row) {
			$data[] = (array) $this->m_laporan->jurnaldetail($row->no_reff, $bulan, $tahun);
			$saldo[] = (array) $this->m_laporan->jurnaldetailsaldo($row->no_reff, $bulan, $tahun);
		}

		if ($data == null || $saldo == null) {
			$this->session->set_flashdata('pesan', 'Laporan Tidak Ditemukan');
			redirect('laporan');
		}

		$jumlah = count($data);

		$data = $this->load->view('backend/laporan/jurnal/v_laporan', compact('title', 'akun', 'bulan', 'tahun', 'jurnal', 'debit', 'kredit', 'data', 'saldo', 'jumlah'), true);
		// echo var_dump($data);
		// die();

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "laporan_" . $bulan . '_' . $tahun;
		$this->pdf->load_view('backend/laporan/jurnal/v_laporan', $data);
	}
	public function cetak_buku()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$title = 'Laporan ' . $bulan . ' ' . $tahun;

		$akun = $this->m_laporan->akuns($bulan, $tahun);

		$jurnal = $this->m_laporan->jurnaldetailsatu($bulan, $tahun);
		$debit = $this->m_laporan->hasildebit($bulan, $tahun);
		$kredit = $this->m_laporan->hasilkredit($bulan, $tahun);

		$data = null;
		$saldo = null;

		foreach ($akun as $row) {
			$data[] = (array) $this->m_laporan->jurnaldetail($row->no_reff, $bulan, $tahun);
			$saldo[] = (array) $this->m_laporan->jurnaldetailsaldo($row->no_reff, $bulan, $tahun);
		}

		if ($data == null || $saldo == null) {
			$this->session->set_flashdata('pesan', 'Laporan Tidak Ditemukan');
			redirect('laporan');
		}

		$jumlah = count($data);

		$data = $this->load->view('backend/laporan/buku/v_laporan', compact('title', 'akun', 'bulan', 'tahun', 'jurnal', 'debit', 'kredit', 'data', 'saldo', 'jumlah'), true);
		// echo var_dump($data);
		// die();

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "laporan_" . $bulan . '_' . $tahun;
		$this->pdf->load_view('backend/laporan/buku/v_laporan', $data);
	}
	public function cetak_neraca()
	{
		$dari = $this->input->post('dari');
		$sampai = $this->input->post('sampai');
		$title = 'Laporan ' . $dari . ' ' . $sampai;

		$akun = $this->m_laporan->akuns($dari, $sampai);

		$lancar = $this->m_laporan->hasil_lancar($dari, $sampai);
		$tetap = $this->m_laporan->hasil_tetap($dari, $sampai);
		$pasiva = $this->m_laporan->hasil_pasiva($dari, $sampai);

		$data = $this->load->view('backend/laporan/neraca/v_laporan', compact('title', 'akun', 'dari', 'sampai', 'lancar', 'tetap', 'pasiva'), true);


		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "laporan_" . $dari . '_' . $sampai;
		$this->pdf->load_view('backend/laporan/neraca/v_laporan', $data);
	}
	public function cetak_saldo()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$title = 'Laporan ' . $bulan . ' ' . $tahun;

		$akun = $this->m_laporan->akuns($bulan, $tahun);

		$jurnal = $this->m_laporan->jurnaldetailsatu($bulan, $tahun);
		$debit = $this->m_laporan->hasildebit($bulan, $tahun);
		$kredit = $this->m_laporan->hasilkredit($bulan, $tahun);

		$data = null;
		$saldo = null;

		foreach ($akun as $row) {
			$data[] = (array) $this->m_laporan->jurnaldetail($row->no_reff, $bulan, $tahun);
			$saldo[] = (array) $this->m_laporan->jurnaldetailsaldo($row->no_reff, $bulan, $tahun);
		}

		if ($data == null || $saldo == null) {
			$this->session->set_flashdata('pesan', 'Laporan Tidak Ditemukan');
			redirect('laporan');
		}

		$jumlah = count($data);

		$data = $this->load->view('backend/laporan/neraca_saldo/v_laporan', compact('title', 'akun', 'bulan', 'tahun', 'jurnal', 'debit', 'kredit', 'data', 'saldo', 'jumlah'), true);
		// echo var_dump($data);
		// die();

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "laporan_" . $bulan . '_' . $tahun;
		$this->pdf->load_view('backend/laporan/neraca_saldo/v_laporan', $data);
	}
	public function cetak_kas()
	{
		$dari = $this->input->post('dari');
		$sampai = $this->input->post('sampai');
		$id_index = $this->input->post('id_index');
		$title = 'Laporan ' . $dari . ' ' . $sampai . '' . $id_index;


		$keterangan = $this->m_laporan->keterangan_hasil($id_index);
		$kas = $this->m_laporan->hasil_arus_kas2($id_index, $dari, $sampai);

		$data = $this->load->view('backend/laporan/arus/v_laporan', compact('title', 'id_index', 'dari', 'sampai', 'keterangan', 'kas'), true);
		// echo var_dump($data);
		// die();

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "laporan_" . $dari . '_' . $sampai . '_' . $id_index;
		$this->pdf->load_view('backend/laporan/arus/v_laporan', $data);
	}
	public function cetak_shu()
	{
		$tahun = $this->input->post('tahun');
		$title = 'Laporan ' . $tahun;

		$shu = $this->m_laporan->hasil_shu($tahun);

		$data = $this->load->view('backend/laporan/shu/v_laporan', compact('title', 'tahun', 'shu'), true);
		// echo var_dump($data);
		// die();

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "laporan_" . $tahun;
		$this->pdf->load_view('backend/laporan/shu/v_laporan', $data);
	}
	public function cetak_laba()
	{
		// $bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$title = 'Laporan ' . $tahun;

		$akun = $this->m_laporan->akuns_laba($tahun);

		$jurnal_pendapatan = $this->m_laporan->jurnaldetailsatupendapatan_laba($tahun);
		$jurnal_beban = $this->m_laporan->jurnaldetailsatubeban_laba($tahun);
		$keuangan = $this->m_laporan->jurnaldetailsatukeuangan_laba($tahun);
		$debit = $this->m_laporan->hasildebit_laba($tahun);
		$kredit = $this->m_laporan->hasilkredit_laba($tahun);

		$data = null;
		$saldo = null;

		foreach ($akun as $row) {
			$data[] = (array) $this->m_laporan->jurnaldetail_laba($row->no_reff,  $tahun);
			$saldo[] = (array) $this->m_laporan->jurnaldetailsaldo_laba($row->no_reff,  $tahun);
		}

		if ($data == null || $saldo == null) {
			$this->session->set_flashdata('pesan', 'Laporan Tidak Ditemukan');
			redirect('laporan');
		}

		$jumlah = count($data);

		$data = $this->load->view('backend/laporan/laba_rugi/v_laporan', compact('title', 'akun', 'tahun', 'jurnal_pendapatan', 'jurnal_beban', 'keuangan', 'debit', 'kredit', 'data', 'saldo', 'jumlah'), true);
		// echo var_dump($data);
		// die();

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "laporan_" . $tahun;
		$this->pdf->load_view('backend/laporan/laba_rugi/v_laporan', $data);
	}
}

/* End of file Laporan.php */
