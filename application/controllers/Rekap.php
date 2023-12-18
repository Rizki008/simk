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
		if ($this->session->userdata('level_user') === 1) {
			$data = array(
				'title' => 'Data Rekap Simpanan Pokok',
				'bulantahun' => $this->m_rekap->bulantahun(),
				'isi' => 'frontend/rekap/pokok/v_rekapmain'
			);
			$this->load->view('frontend/v_wrapper', $data, FALSE);
		} else {
			$data = array(
				'title' => 'Data Rekap Simpanan Pokok',
				'bulantahun' => $this->m_rekap->bulantahun(),
				'isi' => 'backend/rekap/pokok/v_rekapmain'
			);
			$this->load->view('backend/v_wrapper', $data, FALSE);
		}
	}
	public function wajib()
	{
		if ($this->session->userdata('level_user') === 1) {
			$data = array(
				'title' => 'Data Rekap Simpanan Wajib',
				'bulantahun' => $this->m_rekap->bulantahun(),
				'isi' => 'frontend/rekap/wajib/v_rekapmain'
			);
			$this->load->view('frontend/v_wrapper', $data, FALSE);
		} else {
			$data = array(
				'title' => 'Data Rekap Simpanan Wajib',
				'bulantahun' => $this->m_rekap->bulantahun(),
				'isi' => 'backend/rekap/wajib/v_rekapmain'
			);
			$this->load->view('backend/v_wrapper', $data, FALSE);
		}
	}
	public function sukarela()
	{
		if ($this->session->userdata('level_user') === 1) {
			$data = array(
				'title' => 'Data Rekap Simpanan Sukarela',
				'bulantahun' => $this->m_rekap->bulantahun(),
				'isi' => 'frontend/rekap/sukarela/v_rekapmain'
			);
			$this->load->view('frontend/v_wrapper', $data, FALSE);
		} else {
			$data = array(
				'title' => 'Data Rekap Simpanan Sukarela',
				'bulantahun' => $this->m_rekap->bulantahun(),
				'isi' => 'backend/rekap/sukarela/v_rekapmain'
			);
			$this->load->view('backend/v_wrapper', $data, FALSE);
		}
	}

	public function cetak_pokok()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$title = 'Rekap ' . $bulan . ' ' . $tahun;

		$pokok = $this->m_rekap->pokokdetail($bulan, $tahun);

		if ($this->session->userdata('level_user') === 1) {
			$data = $this->load->view('frontend/rekap/pokok/v_pokok', compact('title', 'bulan', 'tahun', 'pokok'), true);
		} else {
			$data = $this->load->view('backend/rekap/pokok/v_pokok', compact('title', 'bulan', 'tahun', 'pokok'), true);
		}

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "rekap_" . $bulan . '_' . $tahun;

		if ($this->session->userdata('level_user') === 1) {
			$this->pdf->load_view('frontend/rekap/pokok/v_pokok', $data);
		} else {
			$this->pdf->load_view('backend/rekap/pokok/v_pokok', $data);
		}
	}
	public function cetak_wajib()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$title = 'Rekap ' . $bulan . ' ' . $tahun;

		$wajib = $this->m_rekap->wajibdetail($bulan, $tahun);

		$data = null;
		$saldo = null;

		if ($this->session->userdata('level_user') === 1) {
			$data = $this->load->view('frontend/rekap/wajib/v_wajib', compact('title', 'bulan', 'tahun', 'wajib'), true);
			// echo var_dump($data);
			// die();
		} else {
			$data = $this->load->view('backend/rekap/wajib/v_wajib', compact('title', 'bulan', 'tahun', 'wajib'), true);
		}

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "rekap_" . $bulan . '_' . $tahun;

		if ($this->session->userdata('level_user') === 1) {
			$this->pdf->load_view('frontend/rekap/wajib/v_wajib', $data);
		} else {
			$this->pdf->load_view('backend/rekap/wajib/v_wajib', $data);
		}
	}
	public function cetak_sukarela()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$title = 'Rekap ' . $bulan . ' ' . $tahun;

		$sukarela = $this->m_rekap->sukareladetail($bulan, $tahun);

		if ($this->session->userdata('level_user') === 1) {
			$data = $this->load->view('frontend/rekap/sukarela/v_sukarela', compact('title', 'bulan', 'tahun', 'sukarela'), true);
		} else {
			$data = $this->load->view('backend/rekap/sukarela/v_sukarela', compact('title', 'bulan', 'tahun', 'sukarela'), true);
		}

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "rekap_" . $bulan . '_' . $tahun;

		if ($this->session->userdata('level_user') === 1) {
			$this->pdf->load_view('frontend/rekap/sukarela/v_sukarela', $data);
		} else {
			$this->pdf->load_view('backend/rekap/sukarela/v_sukarela', $data);
		}
	}
}

/* End of file Laporan.php */
