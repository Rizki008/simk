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
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Data Neraca',
			'bulantahun' => $this->m_jurnal->bulantahun(),
			'isi' => 'frontend/neraca/v_neraca'
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
		// echo $this->db->last_query();
		// die();
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
}

/* End of file Akun.php */
