<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Neraca extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_jurnal');
		$this->load->model('m_akun');
		$this->load->model('m_neraca');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Data Neraca',
			// 'bulantahun' => $this->m_jurnal->bulantahun(),
			'isi' => 'frontend/neraca/v_neraca_lap'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}

	public function search()
	{
		$dari = $this->input->post('dari');
		$sampai = $this->input->post('sampai');
		$data = array(
			'title' => 'Hasil Laporan Neraca',
			'dari' => $dari,
			'sampai' => $sampai,
			'tetap' => $this->m_neraca->hasil_tetap($dari, $sampai),
			'lancar' => $this->m_neraca->hasil_lancar($dari, $sampai),
			'pasiva' => $this->m_neraca->hasil_pasiva($dari, $sampai),
			'isi' => 'frontend/neraca/v_neraca_hasil'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}

	public function detail($bulan, $tahun)
	{
		$data = array(
			'title' => 'Neraca',
			'jurnal' => $this->m_jurnal->jurnaldetail($bulan, $tahun),
			'kredit' => $this->m_jurnal->hasilkredit($bulan, $tahun),
			'debit' => $this->m_jurnal->hasildebit($bulan, $tahun),
			'isi' => 'frontend/neraca/v_detail'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
}

/* End of file Akun.php */
