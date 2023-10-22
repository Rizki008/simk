<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Shu extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_neraca');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Informasi Laporan SHU',
			// 'bulantahun' => $this->m_jurnal->bulantahun(),
			// 'keterangan' => $this->m_neraca->keterangan(),
			'isi' => 'frontend/shu/v_shu_lap'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}

	public function search_shu()
	{
		$sampai = $this->input->post('sampai');
		$data = array(
			'title' => 'Informasi Laporan SHU',
			'sampai' => $sampai,
			'shu' => $this->m_neraca->hasil_shu($sampai),
			'isi' => 'frontend/shu/v_shu_hasil'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
}

/* End of file Arus.php */
