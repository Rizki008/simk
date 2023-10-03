<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_laporan');
		$this->load->library('pdf');
	}

	// List all your items

	public function index()
	{
		$data = array(
			'title' => 'Data Laporan',
			'bulantahun' => $this->m_laporan->bulantahun(),
			'isi' => 'frontend/laporan/v_laporanmain'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
	// public function cetak()
	// {
	// 	$bulan = $this->input->post('bulan');
	// 	$tahun = $this->input->post('tahun');
	// 	// $no_reff = null;
	// 	$data = array(
	// 		'title' => 'Laporan',
	// 		'bulan' => $bulan,
	// 		'tahun' => $tahun,
	// 		'akun' => $this->m_laporan->akuns($bulan, $tahun),
	// 		// 'jurnals' => $this->m_laporan->jurnaldetail($no_reff, $bulan, $tahun),
	// 		'jurnal' => $this->m_laporan->jurnaldetailsatu($bulan, $tahun),
	// 		'kredit' => $this->m_laporan->hasilkredit($bulan, $tahun),
	// 		'debit' => $this->m_laporan->hasildebit($bulan, $tahun),
	// 	);
	// 	$this->pdf->setPaper('A4', 'potrait');
	// 	$this->pdf->filename = "laporan-data-transaksi.pdf";
	// 	$this->pdf->load_view('frontend/laporan/v_laporan', $data);
	// }

	public function cetak()
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

		$data = $this->load->view('frontend/laporan/v_laporan', compact('title', 'akun', 'bulan', 'tahun', 'jurnal', 'debit', 'kredit', 'data', 'saldo', 'jumlah'), true);
		// echo var_dump($data);
		// die();

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "laporan_" . $bulan . '_' . $tahun;
		$this->pdf->load_view('frontend/laporan/v_laporan', $data);
	}
}

/* End of file Laporan.php */
