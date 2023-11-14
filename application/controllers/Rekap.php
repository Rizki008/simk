<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Rekap extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_rekap');
		$this->load->library('pdf');
	}

	// List all your items

	public function pokok()
	{
		$data = array(
			'title' => 'Data Rekap Simpanan Pokok',
			'bulantahun' => $this->m_rekap->bulantahun(),
			'isi' => 'frontend/rekap/pokok/v_rekapmain'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
	public function wajib()
	{
		$data = array(
			'title' => 'Data Rekap Simpanan Wajib',
			'bulantahun' => $this->m_rekap->bulantahun(),
			'isi' => 'frontend/rekap/wajib/v_rekapmain'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
	public function sukarela()
	{
		$data = array(
			'title' => 'Data Rekap Simpanan Sukarela',
			'bulantahun' => $this->m_rekap->bulantahun(),
			'isi' => 'frontend/rekap/sukarela/v_rekapmain'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}

	public function cetak_pokok()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$title = 'Rekap ' . $bulan . ' ' . $tahun;

		$pokok = $this->m_rekap->pokokdetail($bulan, $tahun);


		$data = $this->load->view('frontend/rekap/pokok/v_pokok', compact('title', 'bulan', 'tahun', 'pokok'), true);

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "rekap_" . $bulan . '_' . $tahun;
		$this->pdf->load_view('frontend/rekap/pokok/v_pokok', $data);
	}
	public function cetak_wajib()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$title = 'Rekap ' . $bulan . ' ' . $tahun;

		$wajib = $this->m_rekap->wajibdetail($bulan, $tahun);

		$data = null;
		$saldo = null;

		$data = $this->load->view('frontend/rekap/wajib/v_wajib', compact('title', 'bulan', 'tahun', 'wajib'), true);
		// echo var_dump($data);
		// die();

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "rekap_" . $bulan . '_' . $tahun;
		$this->pdf->load_view('frontend/rekap/wajib/v_wajib', $data);
	}
	public function cetak_sukarela()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$title = 'Rekap ' . $bulan . ' ' . $tahun;

		$sukarela = $this->m_rekap->sukareladetail($bulan, $tahun);

		$data = $this->load->view('frontend/rekap/sukarela/v_sukarela', compact('title', 'bulan', 'tahun', 'sukarela'), true);


		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "rekap_" . $bulan . '_' . $tahun;
		$this->pdf->load_view('frontend/rekap/sukarela/v_sukarela', $data);
	}
}

/* End of file Laporan.php */
